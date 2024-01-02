<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\EditRequest;
use App\Http\Requests\Admin\PDFRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportsExport;

class AdminsController extends Controller
{
    /** \App\Repository\UserRepository $adminRepository */
    protected $adminRepository;


    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository       = $adminRepository;
      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Admin::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Admin $admin) {
                    return $admin->name;
                })
                ->editColumn('type', function (Admin $admin) {
                    return $admin->role;
                })
                ->editColumn('status', function (Admin $admin) {
                    return $admin->status_name;
                })
                ->addColumn('action', function (Admin $admin) {
                    return $admin->action;
                })->rawColumns(['action', 'status','type'])->make(true);
        }

        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //

        $rawData    = new Admin;
        return view('admin.admin.create', ['model' => $rawData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $this->adminRepository->create($request->all());

        return redirect()->route('admins.index')->with('success', "Admin created successfully!");
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin [explicite description]
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Admin $admin)
    {
      
        return view('admin.admin.edit', ['model' => $admin]);
    }

    /**
     * Method update
     *
     * @param \App\Http\Requests\Admin\EditRequest $request
     * @param \App\Models\Admin $admin
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(EditRequest $request, Admin $admin)
    {
        $this->adminRepository->update($request->all(), $admin);

        return redirect()->route('admins.index')->with('success', "Admin updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $this->adminRepository->delete($admin);

        return redirect()->route('admins.index')->with('success', "Admin deleted successfully!");
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
        $admin  = Admin::find($input['user_id']);
        // dd($user);
        if ($this->adminRepository->changeStatus($input, $admin)) {
            return response()->json([
                'status' => true,
                'message' => 'Admin status updated successfully.'
            ]);
        }

        throw new Exception('Admin status does not change. Please check sometime later.');
    }

    

}
