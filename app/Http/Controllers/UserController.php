<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VisitUser;
use App\Models\RolesUser;
use App\Models\Role;
use App\Models\Visit;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        // }

        $statistics=$userRepo->getStatistics();
        $users=User::all();
        $visit=Visit::with('visitUsers.assistant', 'visitUsers.patient', 'visitUsers.fromPatient')->get();
 //       dd($visit);
Log::info($visit);
        return view('AllUsers.list', ["userList"=>$users,
                                        "statistics"=>$statistics,
                                        "visitLList"=>$visit,
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