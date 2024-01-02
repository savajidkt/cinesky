<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\PDFRequest;
use App\Models\Users;

use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /** \App\Repository\UserRepository $usersRepository */
    protected $usersRepository;

    public function __construct(UserRepository $usersRepository)
    {
        $this->usersRepository       = $usersRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Users::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function (Users $users) {
                    return $users->name;
                })
                ->editColumn('email', function (Users $users) {
                    return $users->email;
                })
                ->editColumn('city', function (Users $users) {
                    return $users->city;
                })
                ->editColumn('password', function (Users $users) {
                    return $users->password;
                })
                ->editColumn('phone', function (Users $users) {
                    return $users->phone;
                })
                ->editColumn('balance', function (Users $users) {
                    return $users->balance;
                })
                ->editColumn('refferal_code', function (Users $users) {
                    return $users->refferal_code;
                })
                ->editColumn('register_on', function (Users $users) {
                    return $users->register_on;
                })
                ->editColumn('status', function (Users $users) {

                    return $users->status_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->action;
                })->rawColumns(['action','status'])->make(true);
        }

        return view('admin.users.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        //
        $rawData    = new Users;
        return view('admin.users.create', ['model' => $rawData]);
    }


    public function store(CreateRequest $request)
    {
        $this->usersRepository->create($request->all());
        return redirect()->route('users.index')->with('success', "Users created successfully!");
    }


    public function show($id)
    {
        //
    }



    public function edit(Users $users)
    {
        return view('admin.users.edit', ['model' => $users]);
    }


    public function update(EditRequest $request, Users $users)
    {
        $this->usersRepository->update($request->all(), $users);

        return redirect()->route('users.index')->with('success', "Users updated successfully!");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $this->usersRepository->delete($user);

        return redirect()->route('users.index')->with('success', "Users deleted successfully!");
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
        $users  = Users::find($input['user_id']);
        if ($this->usersRepository->changeStatus($input, $users)) {
            return response()->json([
                'status' => true,
                'message' => 'Users status updated successfully.'
            ]);
        }

        throw new Exception('Users status does not change. Please check sometime later.');
    }


    /**
     * Method generatePDF
     *
     * @param int $id [explicite description]
     * @param PDFRequest $request [explicite description]
     *
     * @return \Illuminate\Http\Response
     */


    function invoice_num($input, $pad_len = 7, $prefix = null)
    {
        if ($pad_len <= strlen($input))
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

        if (is_string($prefix))
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }

    public function reportExcelExport(User $user)
    {
        //$user->loadMissing(['survey','survey_answers']);
        $id= $user->id;
        return Excel::download(new ReportsExport($user), 'survey-reports-'.$id.'.xlsx');
    }

    public function percentagerankCalculate($valueSet, $lastValue)
    {

        $valueSet    = $valueSet;
        $value        = $lastValue;
        $significance    = 3;

        foreach ($valueSet as $key => $valueEntry) {
            if (!is_numeric($valueEntry)) {
                unset($valueSet[$key]);
            }
        }
        sort($valueSet, SORT_NUMERIC);
        $valueCount = count($valueSet);
        if ($valueCount == 0) {
            return 0;
        }

        $valueAdjustor = $valueCount - 1;
        if (($value < $valueSet[0]) || ($value > $valueSet[$valueAdjustor])) {
            return 0;
        }

        $pos = array_search($value, $valueSet);
        if ($pos === False) {
            $pos = 0;
            $testValue = $valueSet[0];
            while ($testValue < $value) {
                $testValue = $valueSet[++$pos];
            }
            --$pos;
            $pos += (($value - $valueSet[$pos]) / ($testValue - $valueSet[$pos]));
        }

        return  round($pos / $valueAdjustor, $significance);
    }
}
