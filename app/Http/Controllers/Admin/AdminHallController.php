<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HallStoreRequest;
use App\Repositories\HallRepository;
use Illuminate\Http\Request;

class AdminHallController extends Controller
{
    /**
     * @var HallRepository
     */
    private $hallRepository;

    function __construct(HallRepository $hallRepository)
    {
        $this->hallRepository = $hallRepository;
    }

    public function index($company_id)
    {

    }

    public function create()
    {
        //
    }

    public function store(HallStoreRequest $request,$company_id)
    {
        $data = $request->all();
        $data['user_id'] = $company_id;
        $hall = $this->hallRepository->add($data);
        return $this->response($hall);
    }

    public function show($id)
    {
        $hall = $this->hallRepository->get($id);
        return $this->response($hall);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
