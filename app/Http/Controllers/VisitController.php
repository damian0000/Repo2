<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visit;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class VisitController extends Controller
{
    public function index(VisitRepository $visitRepo)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $company=$user->company;
        //$projects = $company->project;
        // Pobierz identyfikator firmy
        $companyId = $company->id;
        // Pobierz wszystkie projekty przypisane do danej firmy
        $projects = Company::find($companyId)->project;
        // Zainicjuj pustą kolekcję na wizyty
        $visits = collect();
        // Iteruj przez każdy projekt i pobierz jego wizyty
        foreach ($projects as $project) {
            $visits = $visits->merge(Visit::where('project_id', $project->id)->get());
        }
        return view('visits.list', ["visitList"=>$visits,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Usługi u podopiecznych"]);
    }
    public function create(UserRepository $userRepo)
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $company=$user->company;

        $project=$company->project;

        $assistantsRoleID=2;
        // Pobierz listę wszystkich asystentów z firmy
        $assistants = $company->user()->whereHas('role', function ($query) use ($assistantsRoleID) {
            $query->where('role_id', $assistantsRoleID);
        })->get();

        $patientsRoleID=3;
        // Pobierz listę wszystkich pacjentów z firmy
        $patients = $company->user()->whereHas('role', function ($query) use ($patientsRoleID) {
            $query->where('role_id', $patientsRoleID);
        })->get();

        return view('visits.create', ["footerYear"=>date("Y"),
                                        "projectList"=>$project,
                                        "assistantsList"=>$assistants,
                                        "patientsList"=>$patients,
                                        "title"=>"Dodaj usługę"]);
        
        //$assistants=$userRepo->getAllAsistants();
        //$patients=$userRepo->getAlPatients();
    }

    public function store(Request $request)
    {
        // if ($request->has('chb_prev_visit_true')) {
        //     dd("zaznaczony");
        // }else{
        //     dd("odznaczony");
        // }
        $this->validate($request, [
            'travel_time' => 'required|numeric',
            'date' => 'required',
            'start_hour_visit' => 'required',
            'end_hour_visit' => 'required',
            'description_visit' => 'required|max:250'
        ],
        [
            'travel_time.required' => 'Wymagana czas dojazdu',
            'travel_time.numeric' => 'Wymagana liczba całkowita',
            'date.required' => 'Wymagane data',
            'start_hour_visit.required' => 'Wymagane godzina rozpoczęcia usługi',
            'end_hour_visit.required' => 'Wymagane godzina zakończenia usługi',
            'description_visit.required' => 'Wymagany opis usługi'
        ]);

        $startTime= Carbon::parse($request->input('start_hour_visit'));
        $stime = ($startTime->hour * 60) + $startTime->minute;
        $finishTime=Carbon::parse($request->input('end_hour_visit'));
        $estime = ($finishTime->hour * 60) + $finishTime->minute;
        $time_minute=$estime-$stime;
        $hours = intdiv($time_minute, 60).':'. ($time_minute % 60);

        $visit=new Visit;
        $visit->travel_time=$request->input('travel_time');
        $visit->date_visit=$request->input('date');
        $visit->start_time_visit=$request->input('start_hour_visit');
        $visit->end_time_visit=$request->input('end_hour_visit');
        $visit->time_visit=$hours;
        $visit->description_visit=$request->input('description_visit');
        $visit->additional_notes=$request->input('additional_notes_visit');
        $visit->isDelete=0;
        $visit->save();

        $visit->visitUsers()->sync([
            
        ]);

        return redirect()->route('visits');
    }

    public function edit(VisitRepository $visitRepo, UserRepository $userRepo, $id)
    {
        $visit=$visitRepo->find($id);
        $assistants=$userRepo->getAllAsistants();
        $patients=$userRepo->getAlPatients();

        return view('visits.edit', ["footerYear"=>date("Y"),
                                        "visit"=>$visit,
                                        "assistantsList"=>$assistants,
                                        "patientsList"=>$patients,
                                        "title"=>"Edytuj usługę"]);
    }
    public function update(Request $request, $visitId)
    {
        $this->validate($request, [
            'date' => 'required',
            'start_hour_visit' => 'required',
            'end_hour_visit' => 'required',
            'description_visit' => 'required|max:250'
        ],
        [
            'date.required' => 'Wymagane data',
            'start_hour_visit.required' => 'Wymagane godzina rozpoczęcia usługi',
            'end_hour_visit.required' => 'Wymagane godzina zakończenia usługi',
            'description_visit.required' => 'Wymagany opis usługi'
        ]);

        $startTime= Carbon::parse($request->input('start_hour_visit'));
        $stime = ($startTime->hour * 60) + $startTime->minute;
        $finishTime=Carbon::parse($request->input('end_hour_visit'));
        $estime = ($finishTime->hour * 60) + $finishTime->minute;
        $time_minute=$estime-$stime;
        $hours = intdiv($time_minute, 60).':'. ($time_minute % 60);

        $visit=Visit::find($request->input('id'));
        $visit->assistant_id=$request->input('assistant');
        $visit->from_patient_id=$request->input('prev_visit');
        $visit->travel_time=$request->input('travel_time');
        $visit->patient_id=$request->input('patient');
        $visit->date_visit=$request->input('date');
        $visit->start_time_visit=$request->input('start_hour_visit');
        $visit->end_time_visit=$request->input('end_hour_visit');
        $visit->time_visit=$hours;
        $visit->description_visit=$request->input('description_visit');
        $visit->additional_notes=$request->input('additional_notes_visit');
        $visit->isDelete=$request->input('isDelete');
        $visit->save();

        return redirect()->route('visits');

    }
}
