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
            <div class="cad-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ulica</th>
                            <th scope="col">Miejscowość</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $assistant->id }}</th>
                            <td>{{ $assistant->name }}</td>
                            <td>{{ $assistant->surname }}</td>
                            <td>{{ $assistant->phone }}</td>
                            <td>{{ $assistant->email }}</td>
                            <td>{{ $assistant->street }}</td>
                            <td>{{ $assistant->city }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
