<?php

namespace App\Http\Controllers\Admin\Adds;


use App\Http\Controllers\Controller;
use App\Http\Requests\Add\CreateRequest;
use App\Http\Requests\Add\EditRequest;
use App\Http\Requests\Add\PDFRequest;
use App\Models\Add;

use App\Repositories\AddRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AddsController extends Controller
{
    /** \App\Repository\AddRepository $addRepository */
    protected $addRepository;

    public function __construct(AddRepository $addRepository)
    {
        $this->addRepository       = $addRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Add::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function (Add $add) {
                    return $add->title;
                })
                ->editColumn('image', function (Add $add) {
                    return $add->image_path;
                })
                ->editColumn('status', function (Add $add) {

                    return $add->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status','image'])->make(true);
        }

        return view('admin.add.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Add;
        return view('admin.add.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->addRepository->create($request->all());

        return redirect()->route('adds.index')->with('success', "Add created successfully!");
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
     * @param Add $add [explicite description]
     *
     * @return void
     */
    public function edit(Add $add)
    {
        return view('admin.add.edit', ['model' => $add]);
    }


    public function update(EditRequest $request, Add $add)
    {
        $this->addRepository->update($request->all(), $add);

        return redirect()->route('adds.index')->with('success', "Add updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add $add)
    {
        $this->addRepository->delete($add);

        return redirect()->route('adds.index')->with('success', "Add deleted successfully!");
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
        $add  = Add::find($input['user_id']);
        // dd($user);
        if ($this->addRepository->changeStatus($input, $add)) {
            return response()->json([
                'status' => true,
                'message' => 'Add status updated successfully.'
            ]);
        }

        throw new Exception('Add status does not change. Please check sometime later.');
    }





}
