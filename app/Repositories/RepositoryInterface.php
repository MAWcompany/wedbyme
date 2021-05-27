<?php


namespace App\Repositories;


interface RepositoryInterface
{
    function getAll();
    function get($options);
    function add($data);
    function update($id,$data);
    function delete($id);
}
