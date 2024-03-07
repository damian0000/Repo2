<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\UpsertProjectRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;
class ProjectController extends Controller
{
    public function index(ProjectRepository $projectRepo)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $company=$user->company;
        $project=$company->project;
       
        return view('projects.list', ["projectList"=>$project,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Lista projektów"]);
    }

    public function create()
    {
        return view('projects.create', ["footerYear"=>date("Y"),
                                        "title"=>"Dodaj projekt"]);
    }

    public function store(UpsertProjectRequest $request)
    {

        $userId = Auth::id();
        $user = User::find($userId);
        $company_id=$user->company_id;
        

        //dd($project);
        $query=Project::where([
            ['company_id', '=', $company_id],
            ['name', '=', $request->validated()]
        ]);
        if(!$query->exists())
        {
            $data=$request->validated();
            $project=new Project($data);
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

    public function update(UpsertProjectRequest $request, $projectId)
    {
        $project = Project::find($projectId);
        $project->update($request->validated());
    
        return redirect()->route('projects.index');
    }
}
