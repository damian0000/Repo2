@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj Organizację</h1>

        <form action="{{ action('CompanyController@store') }}" method="POST" role="form">
            <div class="form-group">
                <label for="name">Nazwa organizacji</label>
                <input type="text" class="form-control" name="name">
            </div>
        </form>
    </div>
@endsection
