@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj usługę</h1>
        <form action="{{ route('visits.store') }}" method="POST" role="form">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="project">Projekt</label>
                <select id="project" class="form-select" name="project">
                    @foreach ($projectList as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label for="assistant">Asystent</label>
                <select id="assistant" class="form-select" name="assistant_id">
                    @foreach ($assistantsList as $assistant)
                        <option value="{{ $assistant->id }}">{{ $assistant->name }} {{ $assistant->surname }}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <p>Czy asystent był na usłudze przed przyjazdem do podopiecznego?</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="chb_prev_visit_true" name="chb_prev_visit_true">
                    <label class="form-check-label" for="chb_prev_visit_true">TAK</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="chb_prev_visit_false" name="chb_prev_visit_false">
                    <label class="form-check-label" for="chb_prev_visit_false">NIE</label>
                </div>
            </div>
            <div id="create_visit_prev_field">
                <div class="form-group">
                    <label for="prev_visit">Poprzednia usługa u podopiecznego</label>
                    <select id="prev_visit" class="form-select" name="from_patient_id">
                        <option value="---">---</option>
                        @foreach ($patientsList as $patients)
                            <option value="{{ $patients->id }}">{{ $patients->name }} {{ $patients->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel_time">Czas dojazdu od poprzedniego podopiecznego (min)</label>
                    <input type="number" id="travel_time" class="form-control" name="travel_time" />
                </div>
                @error('travel_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div id="create_visit_field">
                <div class="form-group">
                    <label for="patient">Podopieczny</label>
                    <select id="patient" class="form-select" name="patient_id">
                        @foreach ($patientsList as $patients)
                            <option value="{{ $patients->id }}">{{ $patients->name }} {{ $patients->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" id="date" class="form-control" name="date" />
                </div>
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="start_hour_visit">Godzina rozpoczęcia usługi</label>
                    <input type="time" id="start_hour_visit" class="form-control" name="start_hour_visit" />
                </div>
                @error('start_hour_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="end_hour_visit">Godzina Zakończenia usługi</label>
                    <input type="time" id="end_hour_visit" class="form-control" name="end_hour_visit" />
                </div>
                @error('end_hour_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="description_visit">Opis usługi</label>
                    <textarea class="form-control" id="description_visit" rows="3" name="description_visit"></textarea>
                </div>
                @error('description_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="additional_notes_visit">Uwagi dodatkowe</label>
                    <textarea class="form-control" id="additional_notes_visit" rows="3" name="additional_notes_visit"></textarea>
                </div>
                @error('additional_notes_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror    
                <input type="submit" class="btn btn-primary" value="Dodaj" />
            </div>
        </form>
        <script type="text/javascript">
            let visit_prev_fields = document.querySelectorAll("#create_visit_prev_field input, #create_visit_prev_field select");
            let visit_fields = document.querySelectorAll("#create_visit_field input, #create_visit_field textarea, #create_visit_field select");
            
            disabled_fields(visit_prev_fields, true);
            disabled_fields(visit_fields, true);


            
            function disabled_fields(fields, bool)
            {
                fields.forEach((field) => {
                    field.disabled=bool;
                });
            }
            

            let chb_prev_visit_true=document.getElementById("chb_prev_visit_true");
            let chb_prev_visit_false=document.getElementById("chb_prev_visit_false");
            
            chb_prev_visit_true.addEventListener("click", () => {
                if(chb_prev_visit_true.checked==true)
                {
                    chb_prev_visit_false.checked=false;
                    disabled_fields(visit_prev_fields, false);
                    disabled_fields(visit_fields, false);
                    
                }else{
                    chb_prev_visit_false.checked=true;
                    chb_prev_visit_true.checked=false;
                    disabled_fields(visit_prev_fields, true);
                    disabled_fields(visit_fields, false);
                }

            });
            chb_prev_visit_false.addEventListener("click", () => {
                if(chb_prev_visit_false.checked==true)
                {
                    chb_prev_visit_true.checked=false;
                    
                    disabled_fields(visit_prev_fields, true);
                    disabled_fields(visit_fields, false);
                }else{
                    chb_prev_visit_true.checked=true;
                    chb_prev_visit_false.checked=false;
                    
                    disabled_fields(visit_prev_fields, false);
                    disabled_fields(visit_fields, false);
                }

            });
            
        </script>

    </div>
@endsection
