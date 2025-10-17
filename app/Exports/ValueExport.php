<?php

namespace App\Exports;

use App\Models\Criteria;
use App\Models\Nomination;
use App\Models\Order;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ValueExport implements FromArray, WithHeadings, WithTitle, WithStyles, WithEvents
{
    private Nomination $nomination;
    private Collection|Builder $orders;
    private int $count = 2;

    public function __construct(
        private Carbon $date,
        private string $type)
    {
        $ids = Program::select('order_id')->get()->pluck('order_id')->toArray();
        $this->orders = Order::with(['values.user', 'area']);
        $this->orders->whereIn('orders.id', $ids);
        $this->nomination = Nomination::where('slug', $this->type)->withCount([ 'experts'])->first();
        //$this->orders->where('nomination_id', $this->nomination->id);
        $criterias = Criteria::all();

        $this->orders = $this->orders->get();
        $this->orders->each(function ($order) use ($criterias){
            $values = $order->values;
            $full = $values->pluck('values')->flatten()->sum();
            $average = $full / $criterias->count() / 1;
            $moreValues = [];
            foreach ($values as $value)
            {
                $moreValues[] = $value->user->name . ": " . implode(',', $value->values);
            }
            $order->moreValue = $moreValues;

            $order->valueFull = $full;
            $order->valueAvg = round($average, 2);
        });

        $this->orders = $this->orders->sortByDesc('valueFull');
    }

    public function array(): array
    {
        $result = [];

        foreach ($this->orders as $order){
            $result[] = [
                $order->area->short_name,
                $order->mrsd,
                $order->school->short_name,
                $order->valueAvg ?? 0,
                $order->valueFull ?? 0,
                implode(';'.PHP_EOL, $order->moreValue) ?? 0,
            ];
            $this->count++;
        }

        return $result;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setWidth('A', 14);
                $event->sheet->setWidth('B', 14);
                $event->sheet->setWidth('C', 38);
                $event->sheet->setWidth('D', 18);
                $event->sheet->setWidth('E', 10);
                $event->sheet->setWidth('F', 40);

                $event->sheet->getDelegate()->setAutoFilter('A2:F2');
                $event->sheet->styleCells('A1', []);
            }
        ];
    }

    public function headings(): array
    {
        return [
            ['Дата выгрузки', Carbon::now()->format('d.m.Y H:i:s')],
            [
                'Округ',
                'МРСД',
                'Образовательная организация',
                'Среднее',
                'Сумма',
                'Подробно',
            ]
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:F2' =>
                [
                    'font' => ['bold' => true]
                ],
            'A2:F' . $this->count => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color'       => ['argb' => 'FF000000'],
                    ],
                ],
                'alignment' => [
                    'vertical'   => 'center',
                    'wrapText'   => true,
                ],
            ]
        ];
    }

    public function title(): string
    {
        return $this->nomination->name;
    }
}
