<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertCompanyRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    public function index(CompanyRepository $companyRepo)
    {
       $company=$companyRepo->getAll();
       
        return view('companies.list', ["companyList"=>$company,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista organizacji"]);
    }
    public function create()
    {
        return view('companies.create', ["footerYear"=>date("Y"),
                                        "title"=>"Dodaj organizację"]);
    }

    public function store(UpsertCompanyRequest $request)
    {

        Company::create($request->validated());
    
        return redirect()->route('companies.index');
    }

    public function edit(CompanyRepository $companyRepo, $id)
    {
        $company=$companyRepo->find($id);

        return view('companies.edit', ["company"=>$company,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja organizacji"]);
    }

    public function update(UpsertCompanyRequest $request, $companyId)
    {

        $company = Company::find($companyId);
        $company->update($request->validated());
    
        return redirect()->route('companies.index');
    }
}
