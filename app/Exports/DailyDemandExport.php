<?php

namespace App\Exports;

use App\Models\DailyDemand;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DailyDemandExport implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths
{
    use Exportable;

    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }
    public function view(): View
    {
        $query =  DailyDemand::whereDate('date', Carbon::parse($this->date))->get();
        return view('export.daily_demand', [
            'reports' => $query,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
            'A' => ['font' => ['bold' => true]],
            'J' => ['font' => ['bold' => true],
            ],
            'A:Z' => [
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],

        ];
    }


    public function columnWidths(): array
    {
        return [
            'K' => 10,
        ];
    }
}

