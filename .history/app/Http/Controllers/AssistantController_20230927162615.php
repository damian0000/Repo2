<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class AssistantController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        //$users=$userRepo->getAllAsistant();


        $statistics=$userRepo->getStatistics();
        $users=User::all();
foreach($users as $user)
        {
            if($user->roles('Asystent'))
            {
                dd("Asystent");
            }
        }
        return view('Assistants.list', ["assistantList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }
}