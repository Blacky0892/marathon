<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromArray, WithHeadings, WithTitle, WithStyles, WithEvents
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
        $orders = User::whereHas('roles', function ($role){
            $role->where('slug', 'user');
        })->with(['post', 'school.area'])->get();

        foreach ($orders as $order){

            $result[] = [
                $order->name,
                $order->post->title ?? null,
                $order->email,
                $order->phone,
                $order->school->short_name ?? null,
                $order->created_at ? $order->created_at->format('d.m.Y') : null,
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
                'ФИО',
                'Должность',
                'Email',
                'Телефон',
                'Образовательная организация',
                'Дата регистрации',
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
            ]
        ];
    }

    public function title(): string
    {
        return 'Список заявок';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setWidth('A', 38);
                $event->sheet->setWidth('B', 30);
                $event->sheet->setWidth('C', 32);
                $event->sheet->setWidth('D', 16);
                $event->sheet->setWidth('E', 50);
                $event->sheet->setWidth('F', 40);

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

                $event->sheet->getDelegate()->setAutoFilter('A2:F2');
                $event->sheet->styleCells('A1', []);
            }
        ];

    }
}
