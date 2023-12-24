<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Http\Requests\User\DemofromCreateRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    /** @var UserRepository $userRepository */
    protected $userRepository;

    /**
     * Constructor to initialize class
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository       = $userRepository;

    }
    /**
     * Method changePassword
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(PasswordRequest $request)
    {
        $user = auth()->user();
        $this->userRepository->changePassword($user, $request->except(['_token', '_method']));

        return redirect()->route('demographic')->with('success','Your password changed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function demoGraphicSave(DemofromCreateRequest $request)
    {
        
        $this->userRepository->demoformcreate($request->all());

        return redirect()->route('home')->with('success', "User update successfully!");
    }


    public function unSubscribe()
    {
        return view('unsubscribe');
    }
    public function reportExcelExport($id)
    {
        
        return Excel::download(new ReportsExport($id), 'survey-reports-'.$id.'.xlsx');
    }
}
