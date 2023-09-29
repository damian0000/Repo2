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
//$users = User::get();

        // foreach($users as $user)
        // {
        //     if($user->hasRole('Pacjent'))
        //     {
        //         dd($user);
        //     }
        // }

        $statistics=$userRepo->getStatistics();
        $users=User::all();

        return view('AllUsers.list', ["userList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista użytkowników"]);


    }
    public function show(UserRepository $userRepo, $id)
    {

        $user=$userRepo->find($id);
        return view('AllUsers.show', ["user"=>$user,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Użytkownik"]);

    }

}