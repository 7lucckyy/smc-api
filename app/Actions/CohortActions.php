<?php
namespace App\Actions;
use App\Imports\ImportCohort;
use App\Models\Cohort;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

    class CohortActions {

        public function __construct(
            private ImportCohort $importCohort,
            private Cohort $cohort
        )
        {}
        public function store($createCohortRecordOptions)
        {
            try {

                $data = $createCohortRecordOptions['create_payload'];

                Excel::import(new $this->importCohort, $data['file']);
               
                return;
                
            } catch (ValidationException $e) {
                 $failures = $e->failures();
                 return errorResponse($failures, 400);
            }
        }

        public function deleteCohortRecord($deleteCohortRecordOptions){
            $data = $deleteCohortRecordOptions['delete_payload'];
            $this->cohort->where([
                'cycle'=> $data['cycle'],
                'day' => $data['day'],
            ])->delete();

            return;
        }

        public function getAllRecord($getAllCohortRecordOptions)
        {
            $data = $getAllCohortRecordOptions['fetch_payload'];
            return $this->cohort
            ->where('cycle', $data['cycle'])
            ->where('day', $data['day'])
            ->get();

           
        }
    }

    