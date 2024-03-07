<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\AssistantPatient;
use App\Http\Requests\StoreAssistantRequest;
use App\Http\Requests\UpdateAssistantRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;


class AssistantController extends Controller
{

    /**
     * Undocumented function
     *
     * @param UserRepository $userRepo
     * @return View
     */
    public function index(UserRepository $userRepo)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $company=$user->company;

        $roleId=3;
        // Pobierz listę wszystkich asystentów z firmy
        $assistants = $company->user()->whereHas('role', function ($query) use ($roleId) {
            $query->where('role_id', $roleId);
        })->get();

        
        //$users=$userRepo->getAllAsistants();
        
        $statistics=$userRepo->getStatistics();

        return view('assistants.list', ["assistantList"=>$assistants,
                                        "statistics"=>$statistics,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista asystentów"]);


    }
    public function show(UserRepository $userRepo, $id)
    {

        $assistant=$userRepo->find($id);

        $assistant_id=$assistant->id;
        
        $assistantPatients = AssistantPatient::with(['patient'])
            ->where('assistant_id', $assistant_id)
            ->where('project_id', 1)
            ->get();

        foreach ($assistantPatients as $assistantPatient) {
            echo "Dane podopiecznego: " . $assistantPatient->patient->name . " " . $assistantPatient->patient->surname . "\n";
            // Tutaj możesz wyświetlić inne dane dotyczące asystenta i podopiecznego
        }

        return view('assistants.show', ["assistant"=>$assistant,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Asystent"]);


    }
    public function create(UserRepository $userRepo, RoleRepository $roleRepo)
    {
        $userId = Auth::id();
        $user=$userRepo->find($userId);
        $roles=$roleRepo->getRoleWithoutPatient();
        $company=$user->company;
        $projects=$company->project;
        return view('assistants.create', ["user"=>$user,
                                        "rolesList"=>$roles,
                                        "projectList"=>$projects,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj asystenta"]);
    }


    public function store(StoreAssistantRequest $request, User $user, UserRepository $userRepo)
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

        $user->role()->sync($request->input('roles'));
        $user->project()->sync($request->input('projects'));
    
        return redirect()->route('assistants.index');

    }

    public function edit(UserRepository $userRepo, RoleRepository $roleRepo, $id)
    {
        $assistant=$userRepo->find($id);
        $roles=$roleRepo->getRoleWithoutPatient();
        $company=$assistant->company;
        $projects=$company->project;
        return view('assistants.edit', ["assistant"=>$assistant,
                                        "rolesList"=>$roles,
                                        "projectList"=>$projects,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja asystenta"]);
    }

    public function delete(UserRepository $userRepo, $id)
    {

        // $assistant=$userRepo->delete($id);
        // return redirect()->route('assistants');
    }

    public function update(UpdateAssistantRequest $request, User $user, $userId)
    {
        $user = User::find($userId);
        $user->update($request->validated());

        $updatedUser = User::find($user->id);
        // Synchronizuj role
        $updatedUser->role()->sync($request->input('roles'));
        $updatedUser->project()->sync($request->input('projects'));
        return redirect()->route('assistants.index');
    }

    public function addPatient()
    {
        return view('assistants.addPatient', [
                                        "footerYear"=>date("Y"),
                                        "title"=>"Dodaj asystenta"]);
    
    }
}
