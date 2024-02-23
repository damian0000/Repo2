@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Aktualizuj usługę</h1>
        <form action="{{ route('visits.update',  ['visitId' => $visit->id]) }}" method="POST" role="form">
            @csrf
            @method("PUT")</form>
    </div>
@endsection
