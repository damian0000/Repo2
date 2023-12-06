@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Edytuj asystenta</h1>

        <form action="{{ route('save_edit_assistants') }}" method="POST" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ $assistant->id }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" title="imię" name="name" value="{{ $assistant->name }}" />
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Nazwisko">Nazwisko</label>
                <input type="text" class="form-control" title="Nazwisko" name="surname"
                    value="{{ $assistant->surname }}" />
            </div>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Pesel">Pesel</label>
                <input type="text" class="form-control" title="Pesel" name="pesel" value="{{ $assistant->pesel }}" />
            </div>
            @error('pesel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" title="Email" name="email" value="{{ $assistant->email }}" />
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Telefon">Telefon</label>
                <input type="text" class="form-control" title="Telefon" name="phone"
                    value="{{ $assistant->phone }}" />
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Ulica">Ulica</label>
                <input type="text" class="form-control" title="Ulica" name="street"
                    value="{{ $assistant->street }}" />
            </div>
            @error('street')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Kod pocztowy">Kod pocztowy</label>
                <input type="text" class="form-control" title="Kod pocztowy" name="post_code"
                    value="{{ $assistant->post_code }}" />
            </div>
            @error('post_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Miejscowość">Miejscowość</label>
                <input type="text" class="form-control" title="Miejscowość" name="city"
                    value="{{ $assistant->city }}" />
            </div>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Rola">Rola</label>
                @foreach ($rolesList as $role)
                    <div class="form-check">
                        @if ($assistant->roles->contains($role->id))
                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]"
                                checked>
                            <label class="form-check-label" for="{{ $role->name }}">
                                {{ $role->name }}
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]">
                            <label class="form-check-label" for="{{ $role->name }}">
                                {{ $role->name }}
                            </label>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                @if ($assistant->status == 'Active')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Active" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Aktywny</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Inactive" name="status"
                            id="status" />
                        <label class="form-check-label" for="status">Niektywny</label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Active" name="status" id="status" />
                        <label class="form-check-label" for="status">Aktywny</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Inactive" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Niektywny</label>
                    </div>
                @endif
            </div>

            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
