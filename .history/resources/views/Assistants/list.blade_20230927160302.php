@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Asystenci</h1>
        @foreach ($assistant->roles as $role)
            <li>
                {{ $role->name }}
            </li>
        @endforeach
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
                @foreach ($assistantList as $assistant)
                    <tr>
                        <th scope="row">{{ $assistant->id }}</th>
                        <td><a href="{{ URL::to('assistants/' . $assistant->id) }}">{{ $assistant->name }}
                                {{ $assistant->surname }}</a></td>
                        <td>{{ $assistant->phone }}</td>
                        <td>{{ $assistant->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
