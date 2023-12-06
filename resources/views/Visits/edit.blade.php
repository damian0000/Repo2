@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Aktualizuj usługę</h1>
        <form action="{{ route('save_edit_visits') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $visit->id }}" />
            <div class="form-group">
                <div class="form-group">
                    <label for="assistant">Asystent</label>
                    <select id="assistant" class="form-select" name="assistant">
                        @foreach ($assistantsList as $assistant)
                            @if ($visit->assistant->id == $assistant->id)
                                <option value="{{ $assistant->id }}" selected>{{ $assistant->name }}
                                    {{ $assistant->surname }}</option>
                            @else
                                <option value="{{ $assistant->id }}">{{ $assistant->name }} {{ $assistant->surname }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="prev_visit">Poprzednia usługa u podopiecznego</label>
                    <select id="prev_visit" class="form-select" name="prev_visit">
                        @if ($visit->prevPatient == null)
                            <option value="" selected>---</option>
                            @foreach ($patientsList as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }} {{ $patient->surname }}</option>
                            @endforeach
                        @else
                            <option value="" selected>---</option>
                            @foreach ($patientsList as $patient)
                                @if ($visit->prevPatient->id == $patient->id)
                                    <option value="{{ $patient->id }}" selected>{{ $patient->name }}
                                        {{ $patient->surname }}
                                    </option>
                                @else
                                    <option value="{{ $patient->id }}">{{ $patient->name }} {{ $patient->surname }}
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="travel_time">Czas dojazdu od poprzedniego podopiecznego (min)</label>
                    @if ($visit->travel_time)
                        <input type="number" id="travel_time" class="form-control" value="{{ $visit->travel_time }}"
                            name="travel_time" />
                    @else
                        <input type="number" id="travel_time" class="form-control" value="" name="travel_time" />
                    @endif

                </div>
                <br>
                <div class="form-group">
                    <label for="patient">Podopieczny</label>
                    <select id="patient" class="form-select" name="patient">
                        @foreach ($patientsList as $patient)
                            @if ($visit->patient->id == $patient->id)
                                <option value="{{ $patient->id }}" selected>{{ $patient->name }} {{ $patient->surname }}
                                </option>
                            @else
                                <option value="{{ $patient->id }}">{{ $patient->name }} {{ $patient->surname }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="date" id="date" class="form-control" name="date"
                        value="{{ $visit->date_visit }}" />
                </div>
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="start_hour_visit">Godzina rozpoczęcia usługi</label>
                    <input type="time" id="start_hour_visit" class="form-control" name="start_hour_visit"
                        value="{{ $visit->start_time_visit }}" />
                </div>
                @error('start_hour_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="end_hour_visit">Godzina Zakończenia usługi</label>
                    <input type="time" id="end_hour_visit" class="form-control" name="end_hour_visit"
                        value="{{ $visit->end_time_visit }}" />
                </div>
                @error('end_hour_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="description_visit">Opis usługi</label>
                    <textarea class="form-control" id="description_visit" rows="3" name="description_visit">{{ $visit->description_visit }}</textarea>
                </div>
                @error('description_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="additional_notes_visit">Uwagi dodatkowe</label>
                    <textarea class="form-control" id="additional_notes_visit" rows="3" name="additional_notes_visit">{{ $visit->additional_notes }}</textarea>
                </div>
                @error('additional_notes_visit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="isDelete" value="0" />
                <input type="submit" class="btn btn-primary" value="Aktualizuj" />
        </form>
    </div>
@endsection
