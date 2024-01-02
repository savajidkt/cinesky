<?php

namespace App\Http\Controllers\Admin\Homecategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Homecategory\CreateRequest;
use App\Http\Requests\Homecategory\EditRequest;
use App\Http\Requests\Homecategory\PDFRequest;
use App\Models\Homecategory;

use App\Repositories\HomecategoryRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomecategorysController extends Controller
{
    /** \App\Repository\HomecategoryRepository $homecategoryRepository*/
    protected $homecategoryRepository;

    public function __construct(HomecategoryRepository $homecategoryRepository)
    {
        $this->homecategoryRepository       = $homecategoryRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Homecategory::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('home_title', function (Homecategory $homecategory) {
                    return $homecategory->home_title;
                })
                ->editColumn('cat_type', function (Homecategory $homecategory) {
                    return $homecategory->cat_type;
                })
                ->editColumn('status', function (Homecategory $homecategory) {

                    return $homecategory->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status'])->make(true);
        }

        return view('admin.homecategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Homecategory;
        return view('admin.homecategory.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->homecategoryRepository->create($request->all());
        return redirect()->route('homecategorys.index')->with('success', "Plan created successfully!");
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
     * @param Homecategory $homecategory [explicite description]
     *
     * @return void
     */
    public function edit(Homecategory $homecategory)
    {
        return view('admin.homecategory.edit', ['model' => $homecategory]);
    }


    public function update(EditRequest $request, Homecategory $homecategory)
    {
        $this->homecategoryRepository->update($request->all(), $homecategory);

        return redirect()->route('homecategorys.index')->with('success', "Homecategory updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homecategory $homecategory)
    {
        $this->homecategoryRepository->delete($homecategory);

        return redirect()->route('homecategorys.index')->with('success', "Plan deleted successfully!");
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
        $homecategory  = Homecategory::find($input['user_id']);
        // dd($user);
        if ($this->homecategoryRepository->changeStatus($input,$homecategory)) {
            return response()->json([
                'status' => true,
                'message' => 'Homecategory status updated successfully.'
            ]);
        }

        throw new Exception('Homecategory status does not change. Please check sometime later.');
    }




}
