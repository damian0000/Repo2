<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                                        "title"=>"Lista organizacji"]);
    }

    public function store(Request $request)
    {
        $company=new Company;
        $company->name=$request->input('name');
        $company->save();

        return redirect()->action('CompanyController@index');
    }

}
