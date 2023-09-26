@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Asystenci</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitList as $visit)
                    <tr>
                        <th scope="row">{{ $visit->id }}</th>
                        <td><a href="{{ URL::to('visits/' . $visit->id) }}">{{ $visit->name }}
                                {{ $visit->surname }}</a></td>
                        <td>{{ $visit->phone }}</td>
                        <td>{{ $visit->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
