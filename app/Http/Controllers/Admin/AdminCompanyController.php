<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\User;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCompanyController extends Controller
{
    private $companyRepository;

    function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getAll();
        return $this->response($companies);
    }

    public function store(CompanyStoreRequest $request)
    {
        $companyData = $request->only("phone","email","title","password");
        $company = $this->companyRepository->add($companyData);
        return $this->response($company);
    }

    public function show($id)
    {
        $company = $this->companyRepository->get($id);
        return $this->response($company);
    }

    public function update(Request $request, $id)
    {
        $companyData = $request->only("phone","email","title","password","about","logo");
        $response = $this->companyRepository->update($id,$companyData);
        return $this->response($response);
    }

    public function destroy($id)
    {
        $response = $this->companyRepository->delete($id);
        return $this->response($response);
    }
}
