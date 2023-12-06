<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    public function index(CompanyRepository $companyRepo)
    {
       $company=$companyRepo->getAll();

        return view('company.list', ["companyList"=>$company,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista organizacji"]);


    }
    public function create()
    {
        return view('company.create', ["footerYear"=>date("Y"),
                                        "title"=>"Dodaj organizację"]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:50'
        ],
        [
            'name.required' => 'Wymagana nazwa firmy',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków'
        ]);

        $company_table = Company::where('name', '=', $request->input('name'))->first();
        if ($company_table === null) {
            $company=new Company;
            $company->name=strip_tags($request->input('name'));
            $company->save();
            return redirect()->route('companies');
        }else
        {
            $community='Podana nazwa firmy istnieje w bazie';
            return view('company.create', ["footerYear"=>date("Y"),
                                            'community' => $community,
                                            "title"=>"Dodaj organizację"]);
            //return redirect()->route('create_company', ['community' => $community]);
        }


    }

}
