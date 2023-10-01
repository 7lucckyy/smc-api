<?php

namespace App\Imports;

use App\Models\Cohort;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Http\Requests\CohortCreateRequest;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class ImportCohort implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $request = request()->all();
        return new Cohort([
            'lga' => $row['lga'],
            'boys_spaq1' => $row['boys_spaq1'],
            'boys_spaq2' => $row['boys_spaq2'],
            'girls_spaq1' => $row['girls_spaq1'],
            'girls_spaq2' => $row['girls_spaq2'],
            'total_reached' => $row['total_reached'],
            'cycle' => $request['cycle'],
            'day' => $request['day'],
        ]);
    }

    public function rules(): array{
        return [
            'lga' => 'required',
            'boys_spaq1' => 'required',
            'boys_spaq2' => 'required',
            'girls_spaq1' => 'required',
            'girls_spaq2' => 'required',
            'total_reached' => 'required',
        ];
    }

    public function customValidationMessages(){
        return [
            'lga.required' => 'LGA Name is required',
            'boys_spaq1.required' => 'No. of Boys who recieved spaq 1 is required',
            'boys_spaq2.required' => 'No. of Boys who recieved spaq 2 is required',
            'girls_spaq1.required' => 'No. of Girls who recieved spaq 1 is required',
            'girls_spaq2.required' => 'No. of Girls who recieved spaq 2 is required',
            'total_reached.required' => 'Total children reached is required',
        ];
    }
}
