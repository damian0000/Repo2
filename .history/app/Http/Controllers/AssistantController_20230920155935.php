<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AssistantController extends Controller
{
    public function index()
    {
        $users=DB::table('users')->join('user_role', 'user_role.id', '=', 'users.role')->where('user_role.name','Administrator');


//        $users=User::all();

        return view('Assistants.list', ["assistantList"=>$users,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }
}
