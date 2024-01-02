<?php

namespace App\Http\Controllers\Admin\Season;

use App\Http\Controllers\Controller;
use App\Http\Requests\Season\CreateRequest;
use App\Http\Requests\Season\EditRequest;
use App\Models\Season;

use App\Repositories\SeasonRepository;
use App\Repositories\SerieRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SeasonsController extends Controller
{
    /** \App\Repository\SeasonRepository $seasonRepository */
    protected $seasonRepository;
    protected $serieRepository;

    public function __construct(SeasonRepository $seasonRepository , SerieRepository $serieRepository)
    {
        $this->seasonRepository       = $seasonRepository;
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

            $data = Season::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('season_name', function (Season $season) {
                    return $season->season_name;
                })
                ->editColumn('series_id', function (Season $season) {
                    return $season->series->series_name;
                })
                ->filterColumn('series_id', function ($query, $keyword) {
                   // dd($season->series);
                    //$season->series()->where('series_name', 'like', '%'.$keyword.'%');
                    $query->whereHas('series', function ($query) use ($keyword) {
                        $query->where('series_name', 'LIKE', '%' . $keyword . '%');
                    });
                })

                ->editColumn('status', function (Season $season) {

                    return $season->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status'])->make(true);
        }

        return view('admin.season.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Season;
        $series  = $this->serieRepository->getSerie();
        //dd($series);
        return view('admin.season.create', ['model' => $rawData,'series' => $series]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        //dd($request->all());
        $this->seasonRepository->create($request->all());
        return redirect()->route('seasons.index')->with('success', "Season created successfully!");
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
     * @param Season $season [explicite description]
     *
     * @return void
     */
    public function edit(Season $season)
    {
        $series  = $this->serieRepository->getSerie();
        return view('admin.season.edit', ['model' => $season, 'series' => $series]);

    }


    public function update(EditRequest $request, Season $season)
    {

        $this->seasonRepository->update($request->all(), $season);

        return redirect()->route('seasons.index')->with('success', "Season updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Season $season)
    {
        $this->seasonRepository->delete($season);

        return redirect()->route('seasons.index')->with('success', "Seasons deleted successfully!");
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
        $season  = Season::find($input['user_id']);
        // dd($user);
        if ($this->seasonRepository->changeStatus($input, $season)) {
            return response()->json([
                'status' => true,
                'message' => 'Season status updated successfully.'
            ]);
        }

        throw new Exception('Season status does not change. Please check sometime later.');
    }



}
