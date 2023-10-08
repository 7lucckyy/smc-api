<?php

namespace App\Imports;

use App\Models\Visit;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportVisit implements ToModel, WithValidation, WithHeadingRow
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $request = request()->all();

        return new Visit([
            'lga' => $row['lga'],
            'ward' => $row['ward'],
            'hf' => $row['hf'],
            'recoder_username' => $row['recoder_username'],
            'phone' => $row['phone'],
            'total_spaq_administered' => $row['total_spaq_administered'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'cycle' => $request['cycle'],
            'day' => $request['day'],
        ]);
    }
    
    public function rules():array {
        return [
            'lga' => 'required',
            'ward' => 'required',
            'hf' => 'required',
            'recorder_username' => 'required',
            'total_spaq_administered' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            
        ];
    }

    public function customValidationMessages(){
        return [
            'lga.required' => 'LGA name can not be black',
            'ward.required' => 'Ward is required',
            'hf.required' => 'Health facility name is required',
            'recorder_username.required' => 'Recorders username is required',
            'total_spaq_administered.required' => 'Total No. of SPAQ Dispense is required',
            'latitude.required' => 'Geo_coordinate, Latitude is required',
            'longitude.required' => 'Geo_coordinate, Longitude is required',
           
        ];
        
    }
}
