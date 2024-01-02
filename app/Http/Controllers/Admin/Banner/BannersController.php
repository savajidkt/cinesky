<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateRequest;
use App\Http\Requests\Banner\EditRequest;
use App\Http\Requests\Banner\PDFRequest;
use App\Models\Banner;

use App\Repositories\BannerRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BannersController extends Controller
{
    /** \App\Repository\BannerRepository $bannerRepository */
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository       = $bannerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Banner::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Banner $banner) {
                    return $banner->name;
                })
                ->editColumn('category', function (Banner $banner) {
                    return $banner->category;
                })
                ->editColumn('image', function (Banner $banner) {
                    return $banner->image_path;
                })
                ->editColumn('status', function (Banner $banner) {

                    return $banner->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Banner;
        return view('admin.banner.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->bannerRepository->create($request->all());
        return redirect()->route('banners.index')->with('success', "Banner created successfully!");
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
     * @param Banner $director [explicite description]
     *
     * @return void
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['model' => $banner]);
    }


    public function update(EditRequest $request, Banner $banner)
    {
        $this->bannerRepository->update($request->all(), $banner);

        return redirect()->route('banners.index')->with('success', "Banner updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $this->bannerRepository->delete($banner);

        return redirect()->route('banners.index')->with('success', "Banner deleted successfully!");
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
        $banner  = Banner::find($input['user_id']);
        // dd($user);
        if ($this->bannerRepository->changeStatus($input, $banner)) {
            return response()->json([
                'status' => true,
                'message' => 'Banner status updated successfully.'
            ]);
        }

        throw new Exception('Banner status does not change. Please check sometime later.');
    }



}
