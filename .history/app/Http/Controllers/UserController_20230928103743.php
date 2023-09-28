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

        return view('AllUsers.list', ["userList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista użytkowników"]);


    }
    public function show(UserRepository $userRepo, $id)
    {

        $assistant=$userRepo->find($id);
        return view('Assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Użytkownik"]);

    }

}