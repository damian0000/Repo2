@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj usługę</h1>
        <form action="{{ route('save_visits') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <div class="form-group">
                    <label for="assistant">Asystent</label>
                    <select id="assistant" class="form-select" name="assistant">
                        @foreach ($assistantsList as $assistant)
                            <option value="{{ $assistant->id }}">{{ $assistant->name }} {{ $assistant->surname }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="form-group">
                    <p>Czy asystent był na usłudze przed przyjazdem do podopiecznego?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chb_prev_visit"
                            name="chb_prev_visit">
                        <label class="form-check-label" for="chb_prev_visit">
                            Poprzednia usługa?
                        </label>
                    </div>
                    <label for="prev_visit">Poprzednia usługa u podopiecznego</label>
                    <select id="prev_visit" class="form-select" name="prev_visit">
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
                <br>
                <div class="form-group">
                    <label for="patient">Podopieczny</label>
                    <select id="patient" class="form-select" name="patient">
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
                <input type="hidden" name="isDelete" value="0" />
                <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
