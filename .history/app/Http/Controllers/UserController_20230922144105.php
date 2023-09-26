<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;


class UserController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAllAsistant();

        return view('Assistants.list', ["assistantList"=>$users,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }

    public function show(UserRepository $userRepo, $id)
    {
        $assistant=$userRepo->find($id);
        return view('Assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }
    public function create(UserRepository $userRepo)
    {
        $userRepo->create([
            'name'=>'Igor',
            'email'=>"igor.kol@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kol",
            'pesel'=>'058564545',
            'phone'=>'991-555-666',
            'street'=>'Wiosenna',
            'post_code'=>'62-200',
            'city'=>'Skoki',
            'isActive'=>true,
            'role'=>2
        ]);
        return redirect('assistant');
    }

    public function edit(UserRepository $userRepo, $id)
    {
        $assistant=$userRepo->update(['name' => 'Adam'], $id);
        return redirect('assistant');
    }
}
