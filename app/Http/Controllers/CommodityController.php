<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Exports\ExportCommodity;
use App\Imports\ImportCommodity;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CommodityCreateRequest;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {    
        $Data = Commodity::all();
            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $Data
            ], 200);
    }

    public function store(CommodityCreateRequest $request)
    {
        try {
            
            Excel::import(new ImportCommodity, $request->file('file')->store('files'));
            return response()->json([
                'Sucess' => true,
                'Message' => 'Commodity Imported Successfully',
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
        return Excel::download(new ExportCommodity, 'commodityTemplate.xlsx');
        
        
        
    }
}
