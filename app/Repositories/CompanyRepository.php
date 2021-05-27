<?php


namespace App\Repositories;


use App\Models\Company;

class CompanyRepository implements RepositoryInterface
{

    function getAll()
    {
        $companies = Company::query()
            ->with("user")
            ->with("halls")
            ->get();

        return $companies;
    }

    function get($options)
    {
        // TODO: Implement get() method.
    }

    function add($data)
    {
        // TODO: Implement add() method.
    }

    function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
