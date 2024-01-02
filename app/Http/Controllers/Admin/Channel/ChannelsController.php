<?php

namespace App\Http\Controllers\Admin\Channel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Channel\CreateRequest;
use App\Http\Requests\Channel\EditRequest;
use App\Http\Requests\Banner\PDFRequest;
use App\Models\Channel;

use App\Repositories\ChannelRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ChannelsController extends Controller
{
    /** \App\Repository\ChannelRepository $channelRepository */
    protected $channelRepository;

    public function __construct(ChannelRepository $channelRepository)
    {
        $this->channelRepository      = $channelRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Channel::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Channel $channel) {
                    return $channel->name;
                })
                ->editColumn('image', function (Channel $channel) {
                    return $channel->image_path;
                })
                ->editColumn('status', function (Channel $channel) {

                    return $channel->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.channel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Channel;
        return view('admin.channel.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->channelRepository->create($request->all());
        return redirect()->route('channels.index')->with('success', "Channel created successfully!");
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
     * @param Channel $channel [explicite description]
     *
     * @return void
     */
    public function edit(Channel $channel)
    {
        return view('admin.channel.edit', ['model' => $channel]);
    }


    public function update(EditRequest $request, Channel $channel)
    {
        $this->channelRepository->update($request->all(), $channel);

        return redirect()->route('channels.index')->with('success', "Channel updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Channel $channel)
    {
        $this->channelRepository->delete($channel);

        return redirect()->route('channels.index')->with('success', "Channel deleted successfully!");
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
        $channel  = Channel::find($input['user_id']);
        // dd($user);
        if ($this->channelRepository->changeStatus($input, $channel)) {
            return response()->json([
                'status' => true,
                'message' => 'Channel status updated successfully.'
            ]);
        }

        throw new Exception('Channel status does not change. Please check sometime later.');
    }



}
