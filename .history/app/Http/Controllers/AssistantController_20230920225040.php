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
            'name'=>'Alan',
            'email'=>"alan.johnsona@wp.pl",
            'password'=>bcrypt('password'),
            'surname'=>"Johnson",
            'pesel'=>'000004545',
            'phone'=>'111-555-666',
            'street'=>'Wągrowiecka',
            'post_code'=>'62-200',
            'city'=>'Skoki',
            'isActive'=>true,
            'role'=>2
        ]);
        return redirect('assistants');
    }
}
