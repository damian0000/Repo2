<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class PatientController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users=$userRepo->getAlPatients();
        $statistics=$userRepo->getStatistics();


        return view('patients.list', ["patientsList"=>$users,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista pacjentów"]);
    }

    public function show(UserRepository $userRepo, $id)
    {

        $patient=$userRepo->find($id);
        return view('patients.show', ["patient"=>$patient,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Pacjent"]);

    }
    public function create(RoleRepository $roleRepo)
    {
        $companies=Company::all();
        $roles=$roleRepo->getRolePatient();
        return view('patients.create', ["companiesList"=>$companies,
                                        "rolesList"=>$roles,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj pacjenta"]);
    }

    public function store(Request $request, RoleRepository $roleRepo)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'disability' => 'required',
            'required|email|unique:users,email',
            'password' => 'required|min:4|max:50',
            'phone' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{3}/',
            'street' => 'required',
            'post_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}/',
            'city' => 'required|min:3|max:50',
            'roles' => 'required|min:1|max:1'
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
            'disability.required' => 'Wymagane pole',
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
            'roles.required' => 'Wymagana rola',
            'roles.min' => 'Zaznacz jedną rolę',
            'roles.mmax' => 'Zaznacz jedną rolę'
        ]);

        $password=$request->input('password');
        $password_bcrypt=bcrypt($password);

        $patient=new User;
        $patient->name=$request->input('name');
        $patient->surname=$request->input('surname');
        $patient->pesel=$request->input('pesel');
        $patient->disability=$request->input('disability');
        $patient->email=$request->input('email');
        $patient->password=$password_bcrypt;
        $patient->phone=$request->input('phone');
        $patient->street=$request->input('street');
        $patient->post_code=$request->input('post_code');
        $patient->city=$request->input('city');
        $patient->status=$request->input('status');
        $patient->company_id=$request->input('company');
        $patient->save();

        $patient->roles()->sync($request->input('roles'));
        return redirect()->route('patients');



    }

    public function edit(UserRepository $userRepo, $id)
    {
        $patient=$userRepo->find($id);
        return view('patients.edit', ["patient"=>$patient,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja danych podopiecznego"]);
    }


    public function editStore(UserRepository $userRepo, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'disability' => 'required|min:3|max:50',
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
            'disability.required' => 'Wymagany rodzaj/opis niepełnosprawności',
            'disability.min' => 'Rodzaj/opis niepełnosprawności musi mieć minimum 3 znaki',
            'disability.max' => 'Rodzaj/opis niepełnosprawności musi mieć maksymalnie 50 znaków',
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

        $patient=User::find($request->input('id'));
        $patient->name=$request->input('name');
        $patient->surname=$request->input('surname');
        $patient->disability=$request->input('disability');
        $patient->pesel=$request->input('pesel');
        $patient->email=$request->input('email');
        $patient->phone=$request->input('phone');
        $patient->street=$request->input('street');
        $patient->post_code=$request->input('post_code');
        $patient->city=$request->input('city');
        $patient->status=$request->input('status');
        $patient->save();

        $patient->roles()->sync($request->input('roles'));

        return redirect()->route('patients');
    }




    public function newStore(Request $request, RoleRepository $roleRepo)
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

        $patient=new User;
        $patient->name=$request->input('name');
        $patient->surname=$request->input('surname');
        $patient->pesel=$request->input('pesel');
        $patient->email=$request->input('email');
        $patient->password=$request->input('password');
        $patient->phone=$request->input('phone');
        $patient->street=$request->input('street');
        $patient->post_code=$request->input('post_code');
        $patient->city=$request->input('city');
        $patient->status=$request->input('status');
        $patient->company_id=$request->input('company');
        $patient->save();

        $patient->roles()->sync($request->input('role'));
        return view('patients.welcome', ["footerYear"=>date("Y"),
                                        "title"=>"Nowy pacjent"]);



    }
}