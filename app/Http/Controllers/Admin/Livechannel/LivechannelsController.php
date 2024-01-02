<?php

namespace App\Http\Controllers\Admin\Livechannel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Livechannel\CreateRequest;
use App\Http\Requests\Livechannel\EditRequest;
use App\Models\Livechannel;
use App\Models\Category;

use App\Repositories\LivechannelRepository;
use App\Repositories\CategoryRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LivechannelsController extends Controller
{
    /** \App\Repository\LivechannelRepository $livechannelRepository */
    protected $livechannelRepository;
    protected $categoryRepository;

    public function __construct(LivechannelRepository $livechannelRepository , CategoryRepository $categoryRepository)
    {
        $this->livechannelRepository       = $livechannelRepository;
        $this->categoryRepository       = $categoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Livechannel::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('channel_title', function (Livechannel $livechannel) {
                    return $livechannel->channel_title;
                })
                ->editColumn('cat_id', function (Livechannel $livechannel) {
                    return $livechannel->categorys->category_name;
                })
                ->filterColumn('cat_id', function ($query, $keyword) {
                    $query->whereHas('categorys', function ($query) use ($keyword) {
                        $query->where('category_name', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->editColumn('channel_type', function (Livechannel $livechannel) {
                    return $livechannel->channel_type;
                })
                ->editColumn('channel_url', function (Livechannel $livechannel) {
                    return $livechannel->channel_url;
                })
                ->editColumn('channel_desc', function (Livechannel $livechannel) {
                    return $livechannel->channel_desc;
                })
                ->editColumn('channel_poster', function (Livechannel $livechannel) {
                    return $livechannel->imageposter_path;
                })
                ->editColumn('channel_cover', function (Livechannel $livechannel) {
                    return $livechannel->imagecover_path;
                })
                ->editColumn('status', function (Livechannel $livechannel) {

                    return $livechannel->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','channel_poster','channel_cover'])->make(true);
        }

        return view('admin.livechannel.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Livechannel;
        $categorys  = $this->categoryRepository->getCategory();
        //dd($series);
        return view('admin.livechannel.create', ['model' => $rawData,'categorys' => $categorys]);
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
        $this->livechannelRepository->create($request->all());
        return redirect()->route('livechannels.index')->with('success', "Channel created successfully!");
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
     * @param Livechannel $livechannel [explicite description]
     *
     * @return void
     */
    public function edit(Livechannel $livechannel)
    {
        $categorys  = $this->categoryRepository->getCategory();
        return view('admin.livechannel.edit', ['model' => $livechannel, 'categorys' => $categorys]);
    }


    public function update(EditRequest $request, Livechannel $livechannel)
    {
        $this->livechannelRepository->update($request->all(), $livechannel);

        return redirect()->route('livechannels.index')->with('success', "Channel updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livechannel $livechannel)
    {
        $this->livechannelRepository->delete($livechannel);

        return redirect()->route('livechannels.index')->with('success', "Channel deleted successfully!");
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
        $livechannel  = Livechannel::find($input['user_id']);
        // dd($user);
        if ($this->livechannelRepository->changeStatus($input, $livechannel)) {
            return response()->json([
                'status' => true,
                'message' => 'channel status updated successfully.'
            ]);
        }

        throw new Exception('channel status does not change. Please check sometime later.');
    }



}