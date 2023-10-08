<?php

namespace App\Exports;

use App\Models\ExportCommodityTemplate;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCommodity implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportCommodityTemplate::all();
    }

    public function headings(): array {
        return [        
            'lga', 
            'spaq1', 
            'spaq2', 
            'total_spaq',
            'total_spaq1_used',
            'total_spaq2_used',
            'total_spaq_used',
        ];
    }
}
