<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class VisitController extends Controller
{
    public function index(VisitRepository $visitRepo)
    {
        $visit=$visitRepo->getAll();

        return view('visits.list', ["visitList"=>$visit,
                                        "footerYear"=>date("Y"),
                                        "title"=>"Usługi u podopiecznych"]);
    }
    public function create(UserRepository $userRepo)
    {
        $assistants=$userRepo->getAllAsistants();
        $patients=$userRepo->getAlPatients();

        return view('visits.create', ["footerYear"=>date("Y"),
                                        "assistantsList"=>$assistants,
                                        "patientsList"=>$patients,
                                        "title"=>"Dodaj usługę"]);
    }

    public function store(Request $request)
    {

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
