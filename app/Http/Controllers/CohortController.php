<?php

namespace App\Http\Controllers;


use App\Actions\CohortActions;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\V1\Cohorts\CreateCohortRequest;
use App\Http\Requests\Base\DeleteRequest;
use App\Http\Requests\Base\FetchRequest;

class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private CohortActions $cohortActions,
       
    ) {
    }
    public function index(FetchRequest $request)

    {      
        $validatedRequest = $request->validated();
        
        $data = $this->cohortActions->getAllRecord([
            'fetch_payload' => [
                'cycle' => $validatedRequest['cycle'],
                'day' => $validatedRequest['day'],
            ],
        ]);
       
        return successResponse('cohort data fetch successfully', 200, $data);
    }

    public function store(CreateCohortRequest $request)

    {
        $validatedRequest = $request->validated();
        DB::transaction(function () use ($validatedRequest) {
            $data = $this->cohortActions->store([
                'create_payload' => [
                    'cycle' => $validatedRequest['cycle'],
                    'day' => $validatedRequest['day'],
                    'file' => $validatedRequest['file'],
                ],
            ]);
        });
            return successResponse(
                'Cohort data was imported successfully',
                201,
            );
    }

    public function delete(DeleteRequest $request){
        $validatedRequest = $request->validated();

        $this->cohortActions->deleteCohortRecord([
            'delete_payload' => [
                'cycle' => $validatedRequest['cycle'],
                'day' => $validatedRequest['day'],
            ],
        ]);

        return successResponse(
            'Cohort data deleted successfully',
            200,
        );
    }


}

