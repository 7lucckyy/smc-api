<?php

namespace App\Exports;

use App\Models\ExportUserTemplate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportUserTemplate::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Password',
        ];
    }
}
