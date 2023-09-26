@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $assistant->name }} {{ $assistant->surname }}</div>
        </div>
    </div>
@endsection
