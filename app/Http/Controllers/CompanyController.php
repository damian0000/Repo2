<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:50|unique:companies,name'
        ],
        [
            'name.required' => 'Wymagana nazwa firmy',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków',
            'name.unique' => 'Podana organizacja już istnieje'
        ]);

        Company::create($request->all());
    
        return redirect()->route('companies.index');
    }

    public function edit(CompanyRepository $companyRepo, $id)
    {
        $company=$companyRepo->find($id);

        return view('companies.edit', ["company"=>$company,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja organizacji"]);
    }

    public function update(Request $request, $companyId)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:50|unique:companies,name'
        ],
        [
            'name.required' => 'Wymagana nazwa firmy',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków',
            'name.unique' => 'Podana organizacja już istnieje'
        ]);

        $company = Company::find($companyId);
        $company->update($request->all());
    
        return redirect()->route('companies.index');
    }
}
