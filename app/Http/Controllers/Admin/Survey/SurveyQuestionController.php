<?php

namespace App\Http\Controllers\Admin\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\CreateRequest;
use App\Http\Requests\Question\EditRequest;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SurveyQuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Question::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('question', function (Question $question) {
                    return $question->question;
                })
                ->editColumn('status', function (Question $question) {
                    return $question->status_name;
                })
                ->editColumn('type', function (Question $question) {
                    return $question->type_name;
                })
                // ->filterColumn('first_name', function ($query, $keyword) {
                //     $query->orWhere('first_name', 'like', '%'.$keyword.'%');
                // })
                // ->filterColumn('last_name', function ($query, $keyword) {
                //     $query->orWhere('last_name', 'like', '%'.$keyword.'%');
                // })
                // ->filterColumn('user_status', function ($query, $keyword) {
                //     $status = strtolower($keyword) =='active'? 1 : 0;
                //     return $query->orWhere('user_status', $status);
                // })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action'])->make(true);
        }

        return view('admin.survey-question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData = new Question;
        return view('admin.survey-question.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->questionRepository->create($request->all());
        return redirect()->route('question.index')->with('success', "Question created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $question->loadMissing('options');
        return view('admin.survey-question.view', ['model' => $question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Question $usquestioner [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Question $question)
    {
        $question->loadMissing('options');
        return view('admin.survey-question.edit', ['model' => $question]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Question\EditRequest $request
     * @param \App\Models\Question $question
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Question $question)
    {
        $this->questionRepository->update($request->all(), $question);

        return redirect()->route('question.index')->with('success', "Question updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $this->questionRepository->delete($question);

        return redirect()->route('question.index')->with('success', "Question deleted successfully!");
    }
}
