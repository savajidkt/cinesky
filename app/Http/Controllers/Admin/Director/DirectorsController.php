<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\Director\CreateRequest;
use App\Http\Requests\Director\EditRequest;
use App\Http\Requests\Director\PDFRequest;
use App\Models\Director;

use App\Repositories\DirectorRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DirectorsController extends Controller
{
    /** \App\Repository\DirectorRepository $directorRepository */
    protected $directorRepository;

    public function __construct(DirectorRepository $directorRepository)
    {
        $this->directorRepository       = $directorRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Director::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function (Director $director) {
                    return $director->full_name;
                })
                ->editColumn('email', function (Director $director) {
                    return $director->email;
                })
                ->editColumn('password', function (Director $director) {
                    return $director->password;
                })
                ->editColumn('image', function (Director $director) {
                    return $director->image_path;
                })
                ->editColumn('status', function (Director $director) {

                    return $director->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.director.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Director;
        return view('admin.director.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->directorRepository->create($request->all());
        return redirect()->route('directors.index')->with('success', "Director created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Method edit
     *
     * @param Director $director [explicite description]
     *
     * @return void
     */
    public function edit(Director $director)
    {
        return view('admin.director.edit', ['model' => $director]);
    }


    public function update(EditRequest $request, Director $director)
    {
        $this->directorRepository->update($request->all(), $director);

        return redirect()->route('directors.index')->with('success', "Director updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $this->directorRepository->delete($director);

        return redirect()->route('directors.index')->with('success', "Director deleted successfully!");
    }

    /**
     * Method changeStatus
     *
     * @param Request $request [explicite description]
     *
     * @return JsonResponse
     */
    public function changeStatus(Request $request): JsonResponse
    {
        $input = $request->all();
        $director  = Director::find($input['user_id']);
        // dd($user);
        if ($this->directorRepository->changeStatus($input, $director)) {
            return response()->json([
                'status' => true,
                'message' => 'Director status updated successfully.'
            ]);
        }

        throw new Exception('Director status does not change. Please check sometime later.');
    }



    /**
     * Method generatePDF
     *
     * @param int $id [explicite description]
     * @param PDFRequest $request [explicite description]
     *
     * @return \Illuminate\Http\Response
     */


    function invoice_num($input, $pad_len = 7, $prefix = null)
    {
        if ($pad_len <= strlen($input))
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

        if (is_string($prefix))
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }

    public function reportExcelExport(User $user)
    {
        //$user->loadMissing(['survey','survey_answers']);
        $id= $user->id;
        return Excel::download(new ReportsExport($user), 'survey-reports-'.$id.'.xlsx');
    }

    public function percentagerankCalculate($valueSet, $lastValue)
    {

        $valueSet    = $valueSet;
        $value        = $lastValue;
        $significance    = 3;

        foreach ($valueSet as $key => $valueEntry) {
            if (!is_numeric($valueEntry)) {
                unset($valueSet[$key]);
            }
        }
        sort($valueSet, SORT_NUMERIC);
        $valueCount = count($valueSet);
        if ($valueCount == 0) {
            return 0;
        }

        $valueAdjustor = $valueCount - 1;
        if (($value < $valueSet[0]) || ($value > $valueSet[$valueAdjustor])) {
            return 0;
        }

        $pos = array_search($value, $valueSet);
        if ($pos === False) {
            $pos = 0;
            $testValue = $valueSet[0];
            while ($testValue < $value) {
                $testValue = $valueSet[++$pos];
            }
            --$pos;
            $pos += (($value - $valueSet[$pos]) / ($testValue - $valueSet[$pos]));
        }

        return  round($pos / $valueAdjustor, $significance);
    }
}
