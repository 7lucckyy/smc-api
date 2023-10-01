<?php

namespace App\Exports;

use App\Models\ExportCohortTemplate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCohort implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportCohortTemplate::all();
    }

    public function headings() :array{
      return  ['lga', 'boys_spaq1', 'boys_spaq2', 'girls_spaq1', 'girls_spaq2', 'total_reached'];
    }
}
