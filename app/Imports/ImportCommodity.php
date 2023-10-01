<?php

namespace App\Imports;

use App\Http\Requests\CommodityCreateRequest;
use App\Models\Commodity;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;



class ImportCommodity implements ToModel, WithValidation, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $request = request()->all();
        return new Commodity([
            'lga' => $row['lga'],
            'spaq1' => $row['spaq1'],
            'spaq2' => $row['spaq2'],
            'total_spaq' => $row['total_spaq'],
            'cycle' => $request['cycle'],
            'day' => $request['day'],
        ]);
    }

    public function rules():array {
        return [
            'lga' => 'required',
            'spaq1' => 'required',
            'spaq2' => 'required',
            'total_spaq' => 'required',
        ];
    }

    public function customValidationMessages(){
        return [
            'lga.required' => 'LGA name can not be black',
            'spaq1.required' => 'No. SPAQ 1 can not be black',
            'spaq2.required' => 'No. SPAQ 2 can not be black',
            'total_spaq.required' => 'No. of Total SPAQ can not be black',
           
        ];
    }    
}