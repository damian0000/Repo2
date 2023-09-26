<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AssistantController extends Controller
{
    public function index()
    {
        //$users=DB::table('users')->join('user_role', 'user_role.id', '=', 'users.role')->where('user_role.name','Administrator');


        $users=User::all();

        return view('Assistants.list', ["assistantList"=>$users,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }

    public function show($id)
    {
        $assistant=User::find($id);
        return view('Assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }
    public function create()
    {
        User::create([
            'name'=>'Bartek',
            'email'=>"adrian.kol@wp.pl",
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
        return redirect('Assistants');
    }
}