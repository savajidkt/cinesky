<?php

namespace App\Http\Controllers\Admin\Tvshow;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tvshow\CreateRequest;
use App\Http\Requests\Tvshow\EditRequest;
use App\Models\Tvshow;
use App\Models\Channel;

use App\Repositories\TvshowRepository;
use App\Repositories\ChannelRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TvshowsController extends Controller
{
    /** \App\Repository\TvshowRepository $tvshowRepository */
    protected $tvshowRepository;
    protected $channelRepository;

    public function __construct(TvshowRepository $tvshowRepository , ChannelRepository $channelRepository)
    {
        $this->tvshowRepository       = $tvshowRepository;
        $this->channelRepository       = $channelRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Tvshow::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function (Tvshow $tvshow) {
                    return $tvshow->title;
                })
                ->editColumn('image', function (Tvshow $tvshow) {
                    return $tvshow->image_path;
                })
                ->editColumn('channel_id', function (Tvshow $tvshow) {
                    return $tvshow->channels->name;
                })
                ->filterColumn('channel_id', function ($query, $keyword) {
                    $query->whereHas('channels', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('description', function (Tvshow $tvshow) {
                    return $tvshow->description;
                })
                ->editColumn('status', function (Tvshow $tvshow) {

                    return $tvshow->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.tvshow.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Tvshow;
        $channels  = $this->channelRepository->getChannel();
        //dd($series);
        return view('admin.tvshow.create', ['model' => $rawData,'channels' => $channels]);
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
        $this->tvshowRepository->create($request->all());
        return redirect()->route('tvshows.index')->with('success', "Show created successfully!");
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
     * @param Tvshow $tvshow [explicite description]
     *
     * @return void
     */
    public function edit(Tvshow $tvshow)
    {
        $channels  = $this->channelRepository->getChannel();
        return view('admin.tvshow.edit', ['model' => $tvshow, 'channels' => $channels]);
    }


    public function update(EditRequest $request, Tvshow $tvshow)
    {
        $this->tvshowRepository->update($request->all(), $tvshow);

        return redirect()->route('tvshows.index')->with('success', "Show updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Tvshow $tvshow)
    {
        $this->tvshowRepository->delete($tvshow);

        return redirect()->route('tvshows.index')->with('success', "Show deleted successfully!");
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
        $tvshow  = Tvshow::find($input['user_id']);
        // dd($user);
        if ($this->tvshowRepository->changeStatus($input, $tvshow)) {
            return response()->json([
                'status' => true,
                'message' => 'Tv show status updated successfully.'
            ]);
        }

        throw new Exception('Tvshow status does not change. Please check sometime later.');
    }



}
