<?php

namespace App\Imports;

use App\Models\Coverage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Http\Requests\CommodityCreateRequest;



class ImportCoverage implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $request = request()->all();

        return new Coverage([
            'lga' => $row['lga'],
            'cdd_teams' => $row['cdd_teams'],
            'cdd_syched' => $row['cdd_syched'],
            'child_who_received_spaq1' => $row['child_who_received_spaq1'],
            'child_who_received_spaq2' => $row['child_who_received_spaq1'],
            'redose_spaq1' => $row['redose_spaq1'],
            'redose_spaq2' => $row['redose_spaq2'],
            'referral1' => $row['referral1'],
            'referral2' => $row['referral2'],
            'total_adr' => $row['total_adr'],
            'total_ineligible' => $row['total_ineligible'],
            'target' => $row['target'],
            'total_spaq' => $row['total_spaq'],
            'total_wastage' => $row['total_wastage'],
            'cycle' => $request['cycle'],
            'day' => $request['day'],
        ]);
    }

    public function rules():array {
        return [
            'lga' => 'required',
            'cdd_teams' => 'required',
            'cdd_syched' => 'required',
            'child_who_received_spaq1' => 'required',
            'child_who_received_spaq2' => 'required',
            'redose_spaq1' => 'required',
            'redose_spaq2' => 'required',
            'referral1' => 'required',
            'referral2' => 'required',
            'total_adr' => 'required',
            'total_ineligible' => 'required',
            'total_spaq' => 'required',
            'target' => 'required',
            'total_wastage' => 'required',
            
        ];
    }

    public function customValidationMessages(){
        return [
            'lga.required' => 'LGA name can not be black',
            'cdd_teams.required' => 'No. of CDD Teams can not be black',
            'cdd_syched.required' => 'No. of CDD Syched can not be black',
            'child_who_received_spaq1.required' => 'No. of Children who received SPAQ 1 can not be black',
            'child_who_received_spaq2.required' => 'No. of Children who received SPAQ 2 can not be black',
            'redose_spaq1.required' => 'No. of Children who redose with SPAQ 1 can not be black',
            'redose_spaq2.required' => 'No. of Children who redose with SPAQ 2 can not be black',
            'referral1.required' => 'No. of 3 - 11 months Children referred to HF can not be black',
            'referral2.required' => 'No. of 12 - 59 months Children referred to HF can not be black',
            'total_adr.required' => 'No of children who are ADR Suspected cases can not be black',
            'total_ineligible.required' => 'No. of ineligible children can not be black',
            'total_spaq.required' => 'No. of Total SPAQ can not be black',
            'total_wastage.required' => 'No. Total wastage SPAQ can not be black',
        ];
        
    }
}
