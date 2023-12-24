<?php
namespace App\Repositories;
use App\Exceptions\GeneralException;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{
    /**
     * Method create
     *
     * @param array $data [explicite description]
     *
     * @return Company
     */
    public function create(array $data): Company
    {
        $data = [
            'name'    => $data['company_name'],
        ];

        return Company::create($data);
    }

    /**
     * Method update
     *
     * @param array $data [explicite description]
     * @param Company $company [explicite description]
     *
     * @return Company
     * @throws GeneralException
     */
    public function update(array $data, Company $company): Company
    {
        $data = [
            'name'    => $data['name'],
        ];

        if( $company->update($data) )
        {
            return $company;
        }

        throw new GeneralException('Company update failed.');
    }

    /**
     * Method delete
     *
     * @param Company $company [explicite description]
     *
     * @return bool
     * @throws GeneralException
     */
    public function delete(Company $company): bool
    {
        if( $company->delete() )
        {
            return true;
        }

        throw new GeneralException('Company delete failed.');
    }


    /**
     * Method changeStatus
     *
     * @param array $input [explicite description]
     *
     * @return bool
     */
    public function changeStatus(array $input, Company $company): bool
    {
        $company->status = !$input['status'];
        return $company->save();
    }

    /**
     * Method getCompany
     *
     * @return Collection
     */
    public function getCompany(): Collection
    {
        return Company::all();
    }


}