<?php

namespace App\Exports;

use App\Models\ExportCoverageTemplate;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCoverage implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExportCoverageTemplate::all();
    }

    public function headings(): array {
        return ['lga', 'cdd_teams', 'ccd_synched', 'child_who_received_spaq1', 'child_who_received_spaq2', 'redose_spaq1', 'redose_spaq2', 'referral1', 'referral2', 'total_adr', 'total_ineligible', 'target', 'total_spaq', 'total_wastage'];

    }
}
