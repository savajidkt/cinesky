<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /** \App\Repository\ProjectRepository $projectRepository */
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request):JsonResponse
    {
        $project = $this->projectRepository->create($request->all());
        return response()->json([
            'status' => true,
            'data'=>$project->toArray(),
            'message'=> 'Project add successfully.'
        ]);
    }
}
