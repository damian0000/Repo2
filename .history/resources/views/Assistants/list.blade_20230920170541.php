@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assistantList as $assistant)
                    <tr>
                        <th scope="row">{{ $assistant->id }}</th>
                        <td><a href="{{ URL::to('assistant/' . $assistant->id) }}">{{ $assistant->name }}</a></td>
                        <td>{{ $assistant->surname }}</td>
                        <td>{{ $assistant->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
