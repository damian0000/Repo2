@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj asystenta</h1>

        <form action="{{ route('save_assistants') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" title="imię" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Nazwisko</label>
                <input type="text" class="form-control" title="Nazwisko" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Pesel</label>
                <input type="text" class="form-control" title="Pesel" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Telefon</label>
                <input type="text" class="form-control" title="Telefon" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Ulica</label>
                <input type="text" class="form-control" title="Ulica" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Kod pocztowy</label>
                <input type="text" class="form-control" title="Kod pocztowy" name="name" />
            </div>
            <div class="form-group">
                <label for="name">Miejscowość</label>
                <input type="text" class="form-control" title="Miejscowość" name="name" />
            </div>
            <div class="form-group">
                <label for="Organizacja">Organizacja</label>
                <select id="company" title="Organizacje">
                    @foreach ($companyList as $company)
                        <option value="{{ $company->name }}">{{ $company->name }}</option>
                    @endforeach

                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
