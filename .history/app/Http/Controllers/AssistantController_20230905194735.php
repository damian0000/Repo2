<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function index()
    {
        $assistantList=array(
            array("id"=>1, "name"=>"Hanna", "surname"=>"Kowalska", "email"=>"hanna.kowalska@wp.pl", "phone"=>"666-909-743", "address"=>"Jeżyka 6, 62-100 Wągrowiec"),
            array("id"=>2, "name"=>"Maciej", "surname"=>"Madej", "email"=>"maciej.madej@wp.pl", "phone"=>"966-987-789", "address"=>"Bolesława 8, 62-100 Wągrowiec"),
            array("id"=>3, "name"=>"Damian", "surname"=>"Matoga", "email"=>"damian.matoga@wp.pl", "phone"=>"666-987-789", "address"=>"Kościuszki 6, 62-100 Wągrowiec"),
            array("id"=>4, "name"=>"Piotr", "surname"=>"Mincel", "email"=>"mincel098a@wp.pl", "phone"=>"890-654-321", "address"=>"Jarosza 6, 62-100 Wągrowiec"),

        );
        return view('Assistants.list', ["assistantList"=>$assistantList,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }
}
