<?php

namespace App\Http\Controllers\Admin\Serie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serie\CreateRequest;
use App\Http\Requests\Serie\EditRequest;
use App\Http\Requests\Serie\PDFRequest;
use App\Models\Serie;

use App\Repositories\SerieRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /** \App\Repository\SerieRepository $serieRepository */
    protected $serieRepository;

    public function __construct(SerieRepository $serieRepository)
    {
        $this->serieRepository       = $serieRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Serie::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('series_name', function (Serie $serie) {
                    return $serie->series_name;
                })
                ->editColumn('series_desc', function (Serie $serie) {
                    return $serie->series_desc;
                })
                ->editColumn('series_poster', function (Serie $serie) {
                    return $serie->imageposter_path;
                })
                ->editColumn('series_cover', function (Serie $serie) {
                    return $serie->imagecover_path;
                })
                ->editColumn('status', function (Serie $serie) {

                    return $serie->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','series_poster','series_cover'])->make(true);
        }

        return view('admin.serie.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Serie;
        return view('admin.serie.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->serieRepository->create($request->all());
        return redirect()->route('series.index')->with('success', "Series created successfully!");
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
     * @param Serie $serie [explicite description]
     *
     * @return void
     */
    public function edit(Serie $series)
    {
        return view('admin.serie.edit', ['model' => $series]);
    }


    public function update(EditRequest $request, Serie $series)
    {
        $this->serieRepository->update($request->all(), $series);

        return redirect()->route('series.index')->with('success', "Series updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $series)
    {
        $this->serieRepository->delete($series);

        return redirect()->route('series.index')->with('success', "Series deleted successfully!");
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
        $serie  = Serie::find($input['user_id']);
        // dd($user);
        if ($this->serieRepository->changeStatus($input, $serie)) {
            return response()->json([
                'status' => true,
                'message' => 'Series status updated successfully.'
            ]);
        }

        throw new Exception('Series status does not change. Please check sometime later.');
    }



}