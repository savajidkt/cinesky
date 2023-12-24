<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $questionRepository;
    protected $companyRepository;
    protected $projectRepository;
    /**
     * Method __construct
     *
     * @param QuestionRepository $questionRepository [explicite description]
     *
     * @return void
     */
    public function __construct(QuestionRepository $questionRepository, CompanyRepository $companyRepository, ProjectRepository $projectRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->companyRepository = $companyRepository;
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        //dd($request->all());
        $data =[];
        $completed = $this->questionRepository->getTotalCompletedSurveys($data);
        $pending = $this->questionRepository->getTotalPendingSurveys($data);
        $percentage = (int) (100 * $completed) / ($completed + $pending);
        $survey_results = [
            'completed'     =>   $completed,
            'pending'       =>   $pending,
            'percentage'    =>   number_format((float)$percentage, 2, '.', '')
        ];
        //dd($survey_results);
        $recent_activity= $this->questionRepository->getSubmitedSurveys($data);
        $companies  = $this->companyRepository->getCompany();
        $projects   = $this->projectRepository->getProject();
        //dd($recent_activity);
        return view('admin.dashboard.index',['companies' => $companies, 'projects' => $projects,'survey_results' => $survey_results,'recent_activity'=>$recent_activity]);
    }

    public function getDashboardData(Request $request): JsonResponse
    {

        $data = $request->all();
        //$data = [];
        $completed = $this->questionRepository->getTotalCompletedSurveys($data);
        $pending = $this->questionRepository->getTotalPendingSurveys($data);
        $percentage = (int) (100 * $completed) / ($completed + $pending);
        $survey_results = [
            'completed'     =>   $completed,
            'pending'       =>   $pending,
            'percentage'    =>   number_format((float)$percentage, 2, '.', '')
        ];
        $recent_activity= $this->questionRepository->getSubmitedSurveys($data);
        return response()->json([
            'status'        => true,
            'message'       => 'Request created successfully.',
            'survey_results'       => $survey_results,
            'dataActivity'          => view('admin.dashboard.recent-activity', [
            'recent_activity'        => $recent_activity
            ])->render()
        ]);
    }
}
