<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\CreateRequest;
use App\Http\Requests\Plan\EditRequest;
use App\Http\Requests\Plan\PDFRequest;
use App\Models\Plan;

use App\Repositories\PlanRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PlansController extends Controller
{
    /** \App\Repository\PlanRepository $planRepository */
    protected $planRepository;

    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository       = $planRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Plan::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nameplan', function (Plan $plan) {
                    return $plan->nameplan;
                })
                ->editColumn('validity', function (Plan $plan) {
                    return $plan->validity;
                })
                ->editColumn('description', function (Plan $plan) {
                    return $plan->description;
                })
                ->editColumn('price', function (Plan $plan) {
                    return $plan->price;
                })
                ->editColumn('discount_price', function (Plan $plan) {
                    return $plan->discount_price;
                })
                ->editColumn('status', function (Plan $plan) {

                    return $plan->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action', 'status'])->make(true);
        }

        return view('admin.plan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Plan;
        return view('admin.plan.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->planRepository->create($request->all());
        return redirect()->route('plans.index')->with('success', "Plan created successfully!");
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
     * @param Plan $plan [explicite description]
     *
     * @return void
     */
    public function edit(Plan $plan)
    {
        return view('admin.plan.edit', ['model' => $plan]);
    }


    public function update(EditRequest $request, Plan $plan)
    {
        $this->planRepository->update($request->all(), $plan);

        return redirect()->route('plans.index')->with('success', "Plan updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $this->planRepository->delete($plan);

        return redirect()->route('plans.index')->with('success', "Plan deleted successfully!");
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
       $plan  = Plan::find($input['user_id']);
        // dd($user);
        if ($this->planRepository->changeStatus($input,$plan)) {
            return response()->json([
                'status' => true,
                'message' => 'Plan status updated successfully.'
            ]);
        }

        throw new Exception('Plan status does not change. Please check sometime later.');
    }




}
