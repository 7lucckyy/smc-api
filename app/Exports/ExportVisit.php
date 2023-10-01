<?php

namespace App\Exports;

use App\Models\ExportVisitTemplate;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportVisit implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportVisitTemplate::all();
    }

    public function headings() :array{
      return  ['lga', 'ward', 'hf', 'username', 'phone', 'total_spaq_administered'];
    }
}
