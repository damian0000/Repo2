<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class AssistantController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAllAsistants();
        $statistics=$userRepo->getStatistics();

        //$users = User::get();

        // foreach($users as $user)
        // {
        //     if($user->hasRole('Pacjent'))
        //     {
        //         dd($user);
        //     }
        // }

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
    public function create(UserRepository $userRepo)
    {

        return view('assistants.create', ["footerYear"=>date("Y"),
                                        "title"=>"Dodaj asystenta"]);
    }

    public function edit(UserRepository $userRepo, $id)
    {
        $assistant=$userRepo->update(['name' => 'Jurek'], $id);
        return redirect('assistants');
    }
}