<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function index()
    {
        $assistantList=array(
            array("id"=>1, "name"=>"Hanna", "surname"=>"Kowalska", "email"=>"hanna.kowalska@wp.pl", "phone"=>"666-909-743", "street"=>"Jeżyka 6", "city"=>"Wągrowiec"),
            array("id"=>2, "name"=>"Maciej", "surname"=>"Madej", "email"=>"maciej.madej@wp.pl", "phone"=>"966-987-789", "street"=>"Bolesława 8", "city"=>"Przebędowo"),
            array("id"=>3, "name"=>"Damian", "surname"=>"Matoga", "email"=>"damian.matoga@wp.pl", "phone"=>"666-987-789", "street"=>"Kościuszki 6", "city"=>"Wągrowiec"),
            array("id"=>4, "name"=>"Piotr", "surname"=>"Mincel", "email"=>"mincel098a@wp.pl", "phone"=>"890-654-321", "street"=>"Jarosza 6", "city"=>"Skoki"),

        );
        return view('Assistants.list', ["assistantList"=>$assistantList,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);
    }
}