@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj asystenta</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                blad
            </div>
        @endif
        <form action="{{ route('save_assistants') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" title="imię" name="name" />
            </div>
            <div class="form-group">
                <label for="Nazwisko">Nazwisko</label>
                <input type="text" class="form-control" title="Nazwisko" name="surname" />
            </div>
            <div class="form-group">
                <label for="Pesel">Pesel</label>
                <input type="text" class="form-control" title="Pesel" name="pesel" />
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" title="Email" name="email" />
            </div>
            <div class="form-group">
                <label for="Hasło">Hasło</label>
                <input type="password" class="form-control" title="Hasło" name="password" />
            </div>
            <div class="form-group">
                <label for="Telefon">Telefon</label>
                <input type="text" class="form-control" title="Telefon" name="phone" />
            </div>
            <div class="form-group">
                <label for="Ulica">Ulica</label>
                <input type="text" class="form-control" title="Ulica" name="street" />
            </div>
            <div class="form-group">
                <label for="Kod pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" title="Kod pocztowy" name="post_code" />
            </div>
            <div class="form-group">
                <label for="Miejscowość">Miejscowość</label>
                <input type="text" class="form-control" title="Miejscowość" name="city" />
            </div>
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
                <label for="Organizacja">Organizacja</label>
                <select id="company" class="form-select" title="Organizacje" name="company">
                    @foreach ($companiesList as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="status" value="Active" />
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
