<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    /** \App\Repository\CompanyRepository $companyRepository */
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request):JsonResponse
    {
        $company = $this->companyRepository->create($request->all());
        return response()->json([
            'status'    => true,
            'data'      => $company->toArray(),
            'message'   => 'Company add successfully.'
        ]);
    }
}
