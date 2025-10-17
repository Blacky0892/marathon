<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Stage2Export implements FromArray, WithHeadings, WithTitle, WithStyles, WithEvents
{
    private Carbon $date;
    private int $count = 3;

    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    public function array(): array
    {
        $result = [];
        $orders = Order::where('stage', 2)->with(['user', 'school.area'])->get();

        foreach ($orders as $order){

            $result[] = [
                $order->area->short_name ?? null,
                $order->mrsd ?? null,
                $order->school->short_name ?? null,
                $order->class ?? null,
                $order->count_student ?? null,
                $order->count_adult ?? null,
                $order->link ?? null,
                $order->user->name ?? null,
                $order->user->email ?? null,
                $order->created_at ? $order->created_at->format('d.m.Y') : null,
                $order->id,
            ];
            $this->count++;
        }
        return $result;
    }

    public function headings(): array
    {
        return [
            ['Дата выгрузки', Carbon::now()->format('d.m.Y H:i:s')],
            [
                'Округ',
                'МРСД',
                'ОО',
                'Классы',
                'Количество обучающихся',
                'Количество взрослых',
                'Ссылка',
                'ФИО',
                'email',
                'Дата заявки',
                'ID заявки',
            ]
        ];

    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:J2' =>
            [
                'font' => ['bold' => true]
            ],
            'A2:J' . $this->count => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color'       => ['argb' => 'FF000000'],
                    ],
                ],
            ]
        ];
    }

    public function title(): string
    {
        return '2 этап';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setWidth('A', 20);
                $event->sheet->setWidth('B', 15);
                $event->sheet->setWidth('C', 40);
                $event->sheet->setWidth('D', 15);
                $event->sheet->setWidth('E', 15);
                $event->sheet->setWidth('F', 15);
                $event->sheet->setWidth('G', 20);
                $event->sheet->setWidth('H', 40);
                $event->sheet->setWidth('I', 20);
                $event->sheet->setWidth('J', 20);
                $event->sheet->setWidth('K', 20);

                /*for ($column = 'F'; $column <= 'S'; $column++){
                    if($column !== 'M'){
                        for ($row = 3; $row <= $this->count; $row++){
                            $link = $event->sheet->getCell($column.$row);
                            $value = $link->getValue();
                            if(str_starts_with($value, 'http')){
                                $link->getHyperlink()->setUrl($value);
                            }
                        }
                    }
                }*/

                $event->sheet->getDelegate()->setAutoFilter('A2:K2');
                $event->sheet->styleCells('A1', []);
            }
        ];

    }
}
