<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\UserSurvey;
use App\Repositories\QuestionRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $questionRepository;

    /**
     * Method __construct
     *
     * @param QuestionRepository $questionRepository [explicite description]
     *
     * @return void
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->questionRepository = $questionRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user   = auth()->user();
        $survey = $user->survey;

        if (!isset($survey))
        {

            $survey = $this->questionRepository->saveSurvey();
        }
        $questions = isset($survey->questions) ? $survey->questions()->count() : 0;
        $allQuestionsCnt    = $this->questionRepository->getQuestionCount();
        $percentage = $this->questionRepository->getProgressBar($questions, $allQuestionsCnt);

        // check if time actual time is completed
        sleep(1);
        $survey_time =  $this->questionRepository->checkTime($survey);
        if(!$survey_time)
        {
            return redirect()->route('time-out');
        }


        return view('survey.take-survey', ['survey' => $survey,'survey_time'=>$survey_time,'questions'=>$questions,'percentage'=>$percentage]);
    }
    public function demographic()
    {
        $user = auth()->user();
        if($user->gender){
            return redirect()->route('take-survey');
        }
        return view('survey.demographic');
    }

    public function demoSurvey()
    {
        return view('survey.demo-survey');
        //return redirect()->route('demo-survey');
    }

    /**
     * Method thankYou
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function thankYou()
    {
        return view('survey.thank-you');
    }

    /**
     * Method timeOut
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function timeOut()
    {

        return view('survey.time-out');
    }

    /**
     * Method getQuestion
     *
     * @param Request $request [explicite description]
     *
     * @return JsonResponse
     */
    public function getQuestion(Request $request): JsonResponse
    {
        $data       = $request->all();
        $userSurvey = auth()->user()->survey;
        $survey_time =  $this->questionRepository->checkTime($userSurvey);
        if(!$survey_time)
        {
            return response()->json([
                'status'        =>false,
                'finish_button' => true, //$questions === ($allQuestionsCnt - 1) ? true : false, // Need to uncomment this condition with static 4
                'message'       => 'Request created successfully.',
                'page'          => 1,
                'redirect_uri'  => route('time-out'),
                'percentage'    => 0 //$data
            ]);

        }
        $question   = $this->questionRepository->getQuestion($data);

        if ( $data['type'] == 1 )
        {
            if( isset( $data['question_id'] ) && isset( $data['options'] ) )
            {
                $userSurvey = $this->questionRepository->questionAttempt($data);
                $userSurvey->loadMissing(['questions', 'questions.options']);
                //$preQuestion = $userSurvey->questions()->where('question_id', $question->id)->first()->options()->first();
            }
            $page = $data['page'] == 0 ? 0 : $data['page'];
        } else {
            $page = $data['page'] - 1;
        }

        $allQuestionsCnt    = $this->questionRepository->getQuestionCount();
        $questions          = $userSurvey->questions()->count();
        if( $questions < ( $allQuestionsCnt+1 ) )
        {
            $percentage = $this->questionRepository->getProgressBar($questions, $allQuestionsCnt);
            return response()->json([
                'status'        => $questions === $allQuestionsCnt ? false : true,
                'finish_button' => $questions === ($allQuestionsCnt - 1) ? true : false, //$questions === ($allQuestionsCnt - 1) ? true : false, // Need to uncomment this condition with static 4
                'message'       => 'Request created successfully.',
                'page'          => $page + 1,
                'redirect_uri'  => route('thank-you'),
                'percentage'    => $percentage,
                'data'          => view('survey.question', [
                    'model'         => $question,
                    'survey'        => $userSurvey,
                    'questions'     => $questions,
                    'attepmtQuestion'
                ])->render() //$data
            ]);
        }
    }

    /**
     * Method updateSurveyTime
     *
     * @param Request $request [explicite description]
     *
     * @return JsonResponse
     */
    public function updateSurveyTime(Request $request): JsonResponse
    {
        $data = $request->all();
        $survey = $this->questionRepository->startSurvey($data['survey_id']);

        return response()->json(['status'=>$survey['status'],'minutes'=>$survey['minutes'],'seconds'=>$survey['seconds']], 200);
    }
}
