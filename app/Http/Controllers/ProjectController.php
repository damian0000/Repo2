<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\CompanyProject;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;
class ProjectController extends Controller
{
    public function index(ProjectRepository $projectRepo)
    {
       $project=$projectRepo->getAll();
       
        return view('projects.list', ["projectList"=>$project,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista projektów"]);
    }

    public function create()
    {
        return view('projects.create', ["footerYear"=>date("Y"),
                                        "title"=>"Dodaj projekt"]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:50'
        ],
        [
            'name.required' => 'Wymagana nazwa projektu',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków',
            'name.unique' => 'Podana organizacja już istnieje'
        ]);

        $userId = Auth::id();
        $user = User::find($userId);
        $company_id=$user->company_id;
        

        //dd($project);
        $query=Project::where([
            ['company_id', '=', $company_id],
            ['name', '=', $request->input('name')]
        ]);
        if(!$query->exists())
        {
            $project=new Project;
            $project->name=$request->input('name');
            $project->company_id=$company_id;
            $project->save();
            return redirect()->route('projects.index');
        }
        else{
            return redirect()->route('projects.create')->withErrors(['name' => $request->input('name').' już istnieje w organizacji']);
        }
        //$project=Project::create($request->all());
        
    }


    public function edit(ProjectRepository $projectRepo, $id)
    {
        $project=$projectRepo->find($id);
        return view('projects.edit', ["project"=>$project,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Edycja projektu"]);
    }

    public function update(Request $request, $projectId)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:50|unique:projects,name'
        ],
        [
            'name.required' => 'Wymagana nazwa projektu',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków',
            'name.unique' => 'Podana organizacja już istnieje'
        ]);

        $project = Project::find($projectId);
        $project->update($request->all());
    
        return redirect()->route('projects.index');
    }
}
