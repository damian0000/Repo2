@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj Organizację</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        @if (isset($community))
            <div class="alert alert-danger">{{ $community }}</div>
        @endif
        <form action="{{ route('companies.store') }}" method="POST" role="form">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Nazwa organizacji</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection
