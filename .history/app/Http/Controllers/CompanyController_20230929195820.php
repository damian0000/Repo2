<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Validator;

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
        $company=new Company;

        $validatedData=$request->validate([
            'name' => ['required', 'max:50'],
        ]);

        if ($validatedData->fails()) {
            return redirect()->route('companies')
                        ->withErrors($validatedData)
                        ->withInput();
        }

        $company->name=$request->input('name');

        $company->save();

        return redirect()->route('companies');
    }

}