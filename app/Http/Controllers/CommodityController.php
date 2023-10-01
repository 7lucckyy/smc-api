<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        return Excel::download(new ExportCommodity, 'commodityTemplate.xlsx');
        
        
        
    }
}
