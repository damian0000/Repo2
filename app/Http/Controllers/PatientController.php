<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Mpdf\Tag\Dd;

class PatientController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        //$users=$userRepo->getAlPatients();

        $userId = Auth::id();
        $user = User::find($userId);
        $company=$user->company;

        $roleId=4;
        // Pobierz listę wszystkich pacjentów z firmy
        $patient = $company->user()->whereHas('role', function ($query) use ($roleId) {
            $query->where('role_id', $roleId);
        })->get();

        $statistics=$userRepo->getStatistics();
        return view('patients.list', ["patientsList"=>$patient,
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
        $company=$user->company;
        $projects=$company->project;
        return view('patients.create', ["user"=>$user,
                                        "projectList"=>$projects,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj pacjenta"]);
    }

    public function store(StorePatientRequest $request, User $user, UserRepository $userRepo)
    {
        $userId = Auth::id();
        $user=$userRepo->find($userId);
        $company=$user->company->id;


        $password_input=$request->input('password');
        $pasword=bcrypt($password_input);
        $data = $request->validated();
        $data['password']=$pasword;
        $user = new User($data);
        $user->company_id=$company;
        $user->save();

        $user->role()->sync('3');
        $user->project()->sync($request->input('projects'));
        return redirect()->route('patients.index');
    }

    public function edit(UserRepository $userRepo, $id)
    {
        $patient=$userRepo->find($id);
        $company=$patient->company;
        $projects=$company->project;
        return view('patients.edit', ["patient"=>$patient,
                                        "projectList"=>$projects,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja danych podopiecznego"]);
    }


    public function update(UpdatePatientRequest $request, User $user, $userId)
    {
        

        $user = User::find($userId);
        $user->update($request->validated());

        $updatedUser = User::find($user->id);
        // Synchronizuj role
        $updatedUser->role()->sync('3');

        $updatedUser->project()->sync($request->input('projects'));
        return redirect()->route('patients.index');
    }




  
}