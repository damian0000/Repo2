<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class PatientController extends Controller
{
     public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAlPatients();
        $statistics=$userRepo->getStatistics();


        return view('Assistants.list', ["assistantList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }
}
