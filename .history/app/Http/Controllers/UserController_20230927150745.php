<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;


class UserController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        //$users=$userRepo->getAllAsistant();

        $statistics=$userRepo->getStatistics();
        $users=User::all();

        return view('AllUsers.list', ["assistantList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }

    public function show(UserRepository $userRepo, $id)
    {

        $assistant=$userRepo->find($id);
        return view('AllUsers.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Asystent"]);

    }
    public function create(UserRepository $userRepo)
    {
        $userRepo->create([
            'name'=>'Daniel2',
            'email'=>"daniel2son@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Kotecki",
            'pesel'=>'058564545',
            'phone'=>'991-555-666',
            'street'=>'Wiosenna 8',
            'post_code'=>'62-200',
            'city'=>'Skoki',
            'isActive'=>true,
            'role'=>2
        ]);
        return redirect('AllUsers');
    }

    public function edit(UserRepository $userRepo, $id)
    {
        $assistant=$userRepo->update(['name' => 'Jurek'], $id);
        return redirect('AllUsers');
    }
}
