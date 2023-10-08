<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Exports\ExportCohort;
use App\Http\Requests\CohortCreateRequest;
use App\Imports\ImportCohort;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;


class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {    
        $Data = Cohort::all();
            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $Data
            ], 200);
    }

    public function store(CohortCreateRequest $request)

    {
        try {
    
            Excel::import(new ImportCohort, $request->file('file')->store('files'));
            return response()->json([
                'Sucess' => true,
                'Message' => 'Cohort Imported Successfully',
                'Status' => 200
            ]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return response()->json([
                'Success' => false,
                'Message' => $failures,
             ], 500);
        }
    }

    public function Export()
    {
        return Excel::download(new ExportCohort, 'cohortTemplate.xlsx');   

    }
}

