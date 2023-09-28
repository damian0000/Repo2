@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj Organizację</h1>

        <form action="{{ action('App\Http\Controllers\CompanyController@store') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="name">Nazwa organizacji</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
