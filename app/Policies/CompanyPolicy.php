<?php

namespace App\Policies;


use App\User;
use App\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    /**
     * Checks to see if user can view company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        // Update $user authorization to view $company here.
        return true;
    }

    /**
     * Can user create company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function create(User $user, Company $company)
    {
        // Update $user authorization to create $company here.
        return true;
    }

    /**
     * Can user update Company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        // Update $user authorization to update $company here.
        return true;
    }

    /**
     * Checks for users permission to delete Company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        // Update $user authorization to delete $company here.
        return true;
    }
}
