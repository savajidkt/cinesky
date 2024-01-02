<?php

namespace App\Http\Controllers\Admin\Tvepisode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tvepisode\CreateRequest;
use App\Http\Requests\Tvepisode\EditRequest;
use App\Models\Tvepisode;
use App\Models\Tvshow;
use App\Repositories\TvepisodeRepository;
use App\Repositories\TvshowRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TvepisodesController extends Controller
{
    /** \App\Repository\TvepisodeRepository $tvepisodeRepository */
    protected $tvepisodeRepository;
    protected $tvshowRepository;

    public function __construct(TvepisodeRepository $tvepisodeRepository , TvshowRepository $tvshowRepository)
    {
        $this->tvepisodeRepository          = $tvepisodeRepository;
        $this->tvshowRepository       = $tvshowRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Tvepisode::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('episode_title', function (Tvepisode $tvepisode) {
                    return $tvepisode->episode_title;
                })
                ->editColumn('tvshow_id', function (Tvepisode $tvepisode) {
                    return $tvepisode->tvshows->title;
                })
                ->filterColumn('tvshow_id', function ($query, $keyword) {
                    $query->whereHas('tvshows', function ($query) use ($keyword) {
                        $query->where('title', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('poster_image', function (Tvepisode $tvepisode) {
                    return $tvepisode->image_path;
                })
                ->editColumn('total_views', function (Tvepisode $tvepisode) {
                    return $tvepisode->total_views;
                })
                ->editColumn('status', function (Tvepisode $tvepisode) {
                    return $tvepisode->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','poster_image'])->make(true);
        }

        return view('admin.tvepisode.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Tvepisode;
        $tvshows  = $this->tvshowRepository->getTvshow();
        return view('admin.tvepisode.create', ['model' => $rawData,'tvshows' => $tvshows]);
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
        $this->tvepisodeRepository->create($request->all());
        return redirect()->route('tvepisodes.index')->with('success', "Episode created successfully!");
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
     * @param Tvepisode $tvepisode [explicite description]
     *
     * @return void
     */
    public function edit(Tvepisode $tvepisode)
    {
        $tvshows  = $this->tvshowRepository->getTvshow();
        return view('admin.tvepisode.edit', ['model' => $tvepisode, 'tvshows' => $tvshows]);
    }


    public function update(EditRequest $request, Tvepisode $tvepisode)
    {
        $this->tvepisodeRepository->update($request->all(), $tvepisode);

        return redirect()->route('tvepisodes.index')->with('success', "Episode updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tvepisode $tvepisode)
    {
        $this->tvepisodeRepository->delete($tvepisode);

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
        $tvepisode  = Tvepisode::find($input['user_id']);
        // dd($user);
        if ($this->tvepisodeRepository->changeStatus($input, $tvepisode)) {
            return response()->json([
                'status' => true,
                'message' => 'episode status updated successfully.'
            ]);
        }

        throw new Exception('episode status does not change. Please check sometime later.');
    }




}