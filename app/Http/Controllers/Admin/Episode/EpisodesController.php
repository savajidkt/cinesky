<?php

namespace App\Http\Controllers\Admin\Episode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Episode\CreateRequest;
use App\Http\Requests\Episode\EditRequest;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\Season;
use App\Repositories\EpisodeRepository;
use App\Repositories\SerieRepository;
use App\Repositories\SeasonRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    /** \App\Repository\EpisodeRepository $episodeRepository */
    protected $episodeRepository;
    protected $serieRepository;
    protected $seasonRepository;


    public function __construct(EpisodeRepository $episodeRepository , SerieRepository $serieRepository , SeasonRepository $seasonRepository)
    {
        $this->episodeRepository          = $episodeRepository;
        $this->serieRepository       = $serieRepository;
        $this->seasonRepository       = $seasonRepository;


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Episode::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('episode_title', function (Episode $episode) {
                    return $episode->episode_title;
                })
                ->editColumn('series_id', function (Episode $episode) {
                    return $episode->series->series_name;
                })
                ->filterColumn('series_id', function ($query, $keyword) {
                    $query->whereHas('series', function ($query) use ($keyword) {
                        $query->where('series_name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('season_id', function (Episode $episode) {
                    return $episode->seasons->season_name;
                })
                ->filterColumn('season_id', function ($query, $keyword) {
                    $query->whereHas('seasons', function ($query) use ($keyword) {
                        $query->where('season_name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('poster_image', function (Episode $episode) {
                    return $episode->image_path;
                })
                ->editColumn('total_views', function (Episode $episode) {
                    return $episode->total_views;
                })
                ->editColumn('status', function (Episode $episode) {
                    return $episode->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','poster_image'])->make(true);
        }

        return view('admin.episode.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Episode;
        $series  = $this->serieRepository->getSerie();
        $lists  = $this->seasonRepository->getSeason();
        return view('admin.episode.create', ['model' => $rawData,'series' => $series,'lists' => $lists]);
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
        $this->episodeRepository->create($request->all());
        return redirect()->route('episodes.index')->with('success', "Episode created successfully!");
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
     * @param Episode $episode [explicite description]
     *
     * @return void
     */
    public function edit(Episode $episode)
    {
        $series  = $this->serieRepository->getSerie();
        $lists  = $this->seasonRepository->getSeason();
        return view('admin.episode.edit', ['model' => $episode, 'series' => $series,'lists' => $lists]);
    }


    public function update(EditRequest $request, Episode $episode)
    {
        $this->episodeRepository->update($request->all(), $episode);

        return redirect()->route('episodes.index')->with('success', "Episode updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $this->episodeRepository->delete($episode);

        return redirect()->route('episodes.index')->with('success', "Episode deleted successfully!");
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
        $episode  = Episode::find($input['user_id']);
        // dd($user);
        if ($this->episodeRepository->changeStatus($input, $episode)) {
            return response()->json([
                'status' => true,
                'message' => 'episode status updated successfully.'
            ]);
        }

        throw new Exception('episode status does not change. Please check sometime later.');
    }




}