@extends('template')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adres</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assistantList as $assistant)
                    <tr>
                        <th scope="row">{{ $assistant['id'] }}</th>
                        <td>{{ $assistant['name'] }}</td>
                        <td>{{ $assistant['surname'] }}</td>
                        <td>{{ $assistant['phone'] }}</td>
                        <td>{{ $assistant['email'] }}</td>
                        <td>{{ $assistant['address'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection('content')
