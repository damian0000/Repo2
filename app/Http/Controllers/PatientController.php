<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function create(UserRepository $userRepo,RoleRepository $roleRepo)
    {
        $userId = Auth::id();
        $user=$userRepo->find($userId);
        return view('patients.create', ["user"=>$user,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj pacjenta"]);
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'disability' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:50',
            'phone' => 'required|regex:/^[0-9]{9}/',
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
            'disability.required' => 'Pole wymagane',
            'disability.min' => 'Pole musi mieć minimum 3 znaki',
            'disability.max' => 'Pole musi mieć maksymalnie 50 znaków',
            'pesel.required' => 'Wymagany pesel',
            'pesel.numeric' => 'Pesel cyfry',
            'email.required' => 'Wymagany email',
            'email.email' => 'Niepoprawny email',
            'email.unique' => 'Podany email już istnieje',
            'password.required' => 'Wymagane hasło',
            'password.min' => 'Hasło musi mieć minimum 3 znaki',
            'password.max' => 'Hasło musi mieć maksymalnie 50 znaków',
            'phone.required' => 'Wymagany telefon',
            'phone.regex' => 'Numer telefonu w formacie 000000000',
            'street.required' => 'Wymagana ulica i numer domu',
            'post_code.required' => 'Wymagany kod pocztowy',
            'post_code.regex' => 'Kod pocztowy w formacie 00-000',
            'city.required' => 'Wymagana miejscowość',
            'city.min' => 'Miejscowość musi mieć minimum 3 znaki',
            'city.max' => 'Miejscowość musi mieć maksymalnie 50 znaków',
        ]);
        $password_input=$request->input('password');
        $pasword=bcrypt($password_input);
        $data = $request->all();
        $data['password']=$pasword;
        $user = User::create($data);
        $user->role()->sync('3');
        return redirect()->route('patients.index');
    }

    public function edit(UserRepository $userRepo, $id)
    {
        $patient=$userRepo->find($id);
        return view('patients.edit', ["patient"=>$patient,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja danych podopiecznego"]);
    }


    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'disability' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{9}/',
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
            'disability.required' => 'Pole wymagane',
            'disability.min' => 'Pole musi mieć minimum 3 znaki',
            'disability.max' => 'Pole musi mieć maksymalnie 50 znaków',
            'pesel.required' => 'Wymagany pesel',
            'pesel.numeric' => 'Pesel cyfry',
            'email.required' => 'Wymagany email',
            'email.email' => 'Niepoprawny email',
            'phone.required' => 'Wymagany telefon',
            'phone.regex' => 'Numer telefonu w formacie 000000000',
            'street.required' => 'Wymagana ulica i numer domu',
            'post_code.required' => 'Wymagany kod pocztowy',
            'post_code.regex' => 'Kod pocztowy w formacie 00-000',
            'city.required' => 'Wymagana miejscowość',
            'city.min' => 'Miejscowość musi mieć minimum 3 znaki',
            'city.max' => 'Miejscowość musi mieć maksymalnie 50 znaków',
        ]);

        $user = User::find($userId);
        $user->update($request->all());

        $updatedUser = User::find($user->id);
        // Synchronizuj role
        $updatedUser->role()->sync('3');

        return redirect()->route('patients.index');
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