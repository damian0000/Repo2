<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class AssistantController extends Controller
{

    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAllAsistants();
        $statistics=$userRepo->getStatistics();

        return view('assistants.list', ["assistantList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }
    public function show(UserRepository $userRepo, $id)
    {

        $assistant=$userRepo->find($id);
        return view('assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Asystent"]);

    }
    public function create(RoleRepository $roleRepo)
    {
        $companies=Company::all();
        $roles=$roleRepo->getRoleWithoutPatient();
        return view('assistants.create', ["companiesList"=>$companies,
                                        "rolesList"=>$roles,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj asystenta"]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:50',
            'phone' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}/',
            'street' => 'required',
            'post_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}/',
            'city' => 'required|min:3|max:50',
        ],
        [
            'name.required' => 'Wymagane imię',
            'name.min' => 'Imię musi mieć minimum 3 znaki',
            'name.max' => 'Imię musi mieć maksymalnie 50 znaków',
            'surname.required' => 'Wymagane nazwisko',
            'surname.min' => 'Nazwisko musi mieć minimum 3 znaki',
            'surname.max' => 'Nazwisko musi mieć maksymalnie 50 znaków',
            'pesel.required' => 'Wymagany pesel',
            'pesel.numeric' => 'Pesel cyfry',
            'email.required' => 'Wymagany email',
            'email.email' => 'Niepoprawny email',
            'email.unique' => 'Podany email już istnieje',
            'password.required' => 'Wymagane hasło',
            'password.min' => 'Hasło musi mieć minimum 3 znaki',
            'password.max' => 'Hasło musi mieć maksymalnie 50 znaków',
            'phone.required' => 'Wymagany telefon',
            'phone.regex' => 'Numer telefonu w formacie 000-000-000',
            'street.required' => 'Wymagana ulica i numer domu',
            'post_code.required' => 'Wymagany kod pocztowy',
            'post_code.regex' => 'Kod pocztowy w formacie 00-000',
            'city.required' => 'Wymagana miejscowość',
            'city.min' => 'Miejscowość musi mieć minimum 3 znaki',
            'city.max' => 'Miejscowość musi mieć maksymalnie 50 znaków',


        ]);
        $password=$request->input('password');
        $password_bcrypt=bcrypt($password);
        $assistant=new User;
        $assistant->name=$request->input('name');
        $assistant->surname=$request->input('surname');
        $assistant->pesel=$request->input('pesel');
        $assistant->email=$request->input('email');
        $assistant->password=$password_bcrypt;
        $assistant->phone=$request->input('phone');
        $assistant->street=$request->input('street');
        $assistant->post_code=$request->input('post_code');
        $assistant->city=$request->input('city');
        $assistant->status=$request->input('status');
        $assistant->company_id =$request->input('company');
        $assistant->save();

        $assistant->roles()->sync($request->input('roles'));

        return redirect()->route('assistants');

    }

    public function edit(UserRepository $userRepo, RoleRepository $roleRepo, $id)
    {
        $assistant=$userRepo->find($id);
        $roles=$roleRepo->getRoleWithoutPatient();
        return view('assistants.edit', ["assistant"=>$assistant,
                                        "rolesList"=>$roles,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja asystenta"]);
    }

    public function delete(UserRepository $userRepo, $id)
    {

        // $assistant=$userRepo->delete($id);
        // return redirect()->route('assistants');
    }

    public function editStore(UserRepository $userRepo, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}/',
            'street' => 'required',
            'post_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}/',
            'city' => 'required|min:3|max:50',
        ],
        [
            'name.required' => 'Wymagane imię',
            'name.min' => 'Imię musi mieć minimum 3 znaki',
            'name.max' => 'Imię musi mieć maksymalnie 50 znaków',
            'surname.required' => 'Wymagane nazwisko',
            'surname.min' => 'Nazwisko musi mieć minimum 3 znaki',
            'surname.max' => 'Nazwisko musi mieć maksymalnie 50 znaków',
            'pesel.required' => 'Wymagany pesel',
            'pesel.numeric' => 'Pesel cyfry',
            'email.required' => 'Wymagany email',
            'email.email' => 'Niepoprawny email',
            'phone.required' => 'Wymagany telefon',
            'phone.regex' => 'Numer telefonu w formacie 000-000-000',
            'street.required' => 'Wymagana ulica i numer domu',
            'post_code.required' => 'Wymagany kod pocztowy',
            'post_code.regex' => 'Kod pocztowy w formacie 00-000',
            'city.required' => 'Wymagana miejscowość',
            'city.min' => 'Miejscowość musi mieć minimum 3 znaki',
            'city.max' => 'Miejscowość musi mieć maksymalnie 50 znaków',


        ]);

        $assistant=User::find($request->input('id'));
        $assistant->name=$request->input('name');
        $assistant->surname=$request->input('surname');
        $assistant->pesel=$request->input('pesel');
        $assistant->email=$request->input('email');
        $assistant->phone=$request->input('phone');
        $assistant->street=$request->input('street');
        $assistant->post_code=$request->input('post_code');
        $assistant->city=$request->input('city');
        $assistant->status=$request->input('status');
        $assistant->save();

        $assistant->roles()->sync($request->input('roles'));

        return redirect()->route('assistants');
    }
}