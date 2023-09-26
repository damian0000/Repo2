@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">

            </div>
        </div>
    </div>
@endsection
