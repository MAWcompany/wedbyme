<?php


namespace App\Repositories;


use App\Models\Hall;

class HallRepository implements RepositoryInterface
{

    function getAll()
    {

    }

    function get($id)
    {
        return Hall::query()->where("id",$id)->with("calendar")->firstOrFail();
    }

    function add($data)
    {
        return Hall::create($data);
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
