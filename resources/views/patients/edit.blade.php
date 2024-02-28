@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Edytuj podopiecznego - {{ $patient->name }} {{ $patient->surname }}</h1>

        <form action="{{ route('patients.update',  ['userId' => $patient->id]) }}" method="POST" role="form">
            @csrf
            @method("PUT")
            <input type="hidden" name="id" value="{{ $patient->id }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" />
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="surname">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $patient->surname }}" />
            </div>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pesel">Pesel</label>
                <input type="text" class="form-control" id="pesel" name="pesel" value="{{ $patient->pesel }}" />
            </div>
            @error('pesel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $patient->email }}" />
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="disability">Niepełnosprawność</label>
                <textarea id="w3review" class="form-control" name="disability" rows="4">{{ $patient->disability }}</textarea>
            </div>
            @error('disability')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="phone">Telefon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}" />
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="street">Ulica</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $patient->street }}" />
            </div>
            @error('street')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="post_code">Kod pocztowy</label>
                <input type="text" class="form-control" id="post_code" name="post_code"
                    value="{{ $patient->post_code }}" />
            </div>
            @error('post_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="city">Miejscowość</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $patient->city }}" />
            </div>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="company">Projekty</label>
                @foreach ($projectList as $project)
                    <div class="form-check">
                        @if ($patient->project->contains($project->id))
                            <input class="form-check-input" type="checkbox" value="{{ $project->id }}" name="projects[]"
                                checked/>
                            <label class="form-check-label" for="{{ $project->name }}">
                                {{ $project->name }}
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $project->id }}" name="projects[]"/>
                            <label class="form-check-label" for="{{ $project->name }}">
                                {{ $project->name }}
                            </label>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                @if ($patient->status == 'Active')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Aktywny" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Aktywny</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Nieaktywny" name="status" id="status" />
                        <label class="form-check-label" for="status">Nieaktywny</label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Aktywny" name="status" id="status" />
                        <label class="form-check-label" for="status">Aktywny</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Nieaktywny" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Nieaktywny</label>
                    </div>
                @endif
            </div>
            <input type="submit" class="btn btn-primary" value="Aktualizuj" />
        </form>
    </div>
@endsection
