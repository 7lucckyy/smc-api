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
        return ['lga', 'total_reached'];
    }
}
