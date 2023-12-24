<?php

namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Project
     */
    public function create(array $data): Project
    {
        $data = [
            'name'    => $data['project_name'],
        ];

        return Project::create($data);
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Project $project [explicite description]
     *
     * @return Project
     * @throws GeneralException
     */
    public function update(array $data, Project $project): Project
    {
        $data = [
            'name'    => $data['project_name'],
        ];

        if( $project->update($data) )
        {
            return $project;
        }

        throw new GeneralException('Project update failed.');
    }

    /**
     * Method delete
     *
     * @param Project $project [explicite description]
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(Project $project): bool
    {
        if( $project->delete() )
        {
            return true;
        }

        throw new GeneralException('Project delete failed.');
    }


    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Project $project): bool
    {
        $project->status = !$input['status'];
        return $project->save();
    }

    /**
     * Method getProject
     *
     * @return Collection
     */
    public function getProject(): Collection
    {
        return Project::all();
    }
}