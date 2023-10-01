<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Http\Request;
use App\Exports\ExportCohort;
use App\Http\Requests\CohortCreateRequest;
use App\Http\Requests\FiltersCreateRequest;
use App\Imports\ImportCohort;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;


class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FiltersCreateRequest $request)

    {   
        
        $Data = Cohort::all();
      
            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $Data
            ], 200);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Export(Request $request)
    {
        return Excel::download(new ExportCohort, 'cohortTemplate.xlsx');   

    }
}

