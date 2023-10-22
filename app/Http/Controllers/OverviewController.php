<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Commodity;
use App\Models\Coverage;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    //OverView Endpint
    public function index(){
        try {
            $coverage = Coverage::all();
            $cohort = Cohort::all();
            $commodity = Commodity::all();

            $overviewData = [
                'coverage' => $coverage,
                'cohort' => $cohort,
                'commodity' => $commodity
            ];
            return response()->json([
                'Message' => 'Data Retrieved Successfully',
                'Data' => $overviewData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'Message' => 'Error retrieving data: ' . $e->getMessage(),
            ], 500);
        }
    }
}
