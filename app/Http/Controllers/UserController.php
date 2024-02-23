<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CountHoursYear;
use App\Models\Project;
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
        // $visit=Visit::with('visitUsers.assistant', 'visitUsers.patient', 'visitUsers.fromPatient')->get();
        // $project=Project::all();
        // $countHoursYear=CountHoursYear::all();
//Log::info($users);
        return view('AllUsers.list', ["userList"=>$users,
                                        "statistics"=>$statistics,
                                        // "visitLList"=>$visit,
                                        // "projectList"=>$project,
                                        // "hoursList"=>$countHoursYear,
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