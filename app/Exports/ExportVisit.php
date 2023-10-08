<?php

namespace App\Exports;

use App\Models\ExportVisitTemplate;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportVisit implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportVisitTemplate::all();
    }

    public function headings() :array{
      return  ['lga', 'ward', 'hf', 'recorder_username', 'phone', 'total_spaq_administered'];
    }
}
