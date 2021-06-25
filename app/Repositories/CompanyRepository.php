<?php


namespace App\Repositories;


use App\Models\User;

class CompanyRepository implements RepositoryInterface
{

    function getAll()
    {
        $companies = User::query()
            ->where("role",User::ROLE_COMPANY)
            ->withCount("halls")
            ->get();

        return $companies;
    }

    function get($id)
    {
        return User::query()->where("id",$id)->firstOrFail();
    }

    function add($data)
    {
        return User::create($data);
    }

    function update($id, $data)
    {
        return $this->get($id)->update($data);
    }

    function delete($id)
    {
        return $this->get($id)->delete();
    }
}
