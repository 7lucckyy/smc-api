<?php

namespace App\Http\Controllers;

use App\Exports\ExportVisit;
use App\Http\Requests\VisitCreateRequest;
use App\Imports\ImportVisit;
use App\Models\Visit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VisitController extends Controller
{
    public function Export()
    {
        return Excel::download(new ExportVisit, 'cohortTemplate.xlsx');   

    }

    public function index()

    {    
        $Data = Visit::all();
            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $Data
            ], 200);
    }

    public function store(VisitCreateRequest $request)

    {
        try {
    
            Excel::import(new ImportVisit, $request->file('file')->store('files'));
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



}
