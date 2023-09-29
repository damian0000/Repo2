<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Repositories\UserRepository;

class AssistantController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAllAsistants();
        $statistics=$userRepo->getStatistics();

        return view('assistants.list', ["assistantList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }
    public function show(UserRepository $userRepo, $id)
    {

        $assistant=$userRepo->find($id);
        return view('assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Asystent"]);

    }
    public function create()
    {
        $companies=Company::all();
        return view('assistants.create', ["companyList"=>$companies,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj asystenta"]);
    }


    public function store(Request $request)
    {

        $assistant=new User;
        $assistant->name=$request->input('name');
        $assistant->surname=$request->input('surname');
        $assistant->pesel=$request->input('pesel');
        $assistant->email=$request->input('email');
        $assistant->password=$request->input('password');
        $assistant->phone=$request->input('phone');
        $assistant->street=$request->input('street');
        $assistant->post_code=$request->input('post_code');
        $assistant->city=$request->input('city');
        $assistant->city=$request->input('city');
        $assistant->status=$request->input('status');

        $assistant->company_id =$request->input('company');


        $assistant->save();

        return redirect()->route('assistants');

    }

    public function edit(UserRepository $userRepo, $id)
    {

    }
}