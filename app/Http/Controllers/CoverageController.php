<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportCoverage;
use App\Imports\ImportCoverage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CoverageCreateRequest;
use App\Models\Coverage;

class CoverageController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CoverageCreateRequest $request)
    {
        {
            try {
                
                Excel::import(new ImportCoverage, $request->file('file')->store('files'));
                return response()->json([
                    'Sucess' => true,
                    'Message' => 'Coverage Data Imported Successfully',
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

    public function Export(Request $request){

         return Excel::download(new ExportCoverage, 'coverageTemplate.xlsx');  

    }
    
    public function index()

    {    
        $Data = Coverage::all();

            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $Data
            ], 200);
    }
   
}
