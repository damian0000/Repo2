@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj asystenta</h1>

        <form action="{{ route('assistants.store') }}" method="POST" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="surname">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}" />
            </div>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pesel">Pesel</label>
                <input type="text" class="form-control" id="pesel" name="pesel" value="{{ old('pesel') }}" />
            </div>
            @error('pesel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="phone">Telefon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" />
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="street">Ulica</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ old('street') }}" />
            </div>
            @error('street')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="post_code">Kod pocztowy</label>
                <input type="text" class="form-control" id="post_code" name="post_code" value="{{ old('post_code') }}" />
            </div>
            @error('post_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="city">Miejscowość</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" />
            </div>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Rola">Rola</label>
                @foreach ($rolesList as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]">
                        <label class="form-check-label" for="{{ $role->name }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="company">Projekty</label>
                @foreach ($projectList as $project)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $project->id }}" name="projects[]">
                        <label class="form-check-label" for="{{ $project->name }}">
                            {{ $project->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="company">Organizacja</label>
                
                <select id="company" class="form-select" name="company_id">
                    <option value="{{ $user->company->id }}">{{ $user->company->name }}</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
