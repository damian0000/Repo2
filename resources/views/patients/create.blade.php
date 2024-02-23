@extends('template')

@section('id')
    @if (isset($id))
        - {{ $id }}
    @endif
@endsection

@section('content')
    <div class="container">
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif --}}
        <h1>Dodaj podopiecznego</h1>
        <form action="{{ route('patients.store') }}" method="POST" role="form">

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
                <label for="disability">Niepełnosprawność</label>
                <textarea type="text" class="form-control" id="disability" name="disability" rows="4" >{{ old('disability') }}</textarea>
            </div>
            @error('disability')
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
                <input type="text" class="form-control" id="email" name="email"  value="{{ old('email') }}"/>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" id="password" name="password"  value="{{ old('password') }}"/>
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
                <label for="company">Organizacja</label>
                
                <select id="company" class="form-select" name="company_id">
                    <option value="{{ $user->company->id }}">{{ $user->company->name }}</option>
                </select>
            </div>
            <input type="hidden" name="status" value="Aktywny" />
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
