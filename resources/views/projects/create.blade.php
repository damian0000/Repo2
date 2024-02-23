@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Dodaj projekt</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        
        <form action="{{ route('projects.store') }}" method="POST" role="form">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Nazwa projektu</label>
                <input type="text" class="form-control" name="name"  />
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Dodaj" />
        </form>
    </div>
@endsection