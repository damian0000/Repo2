@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Wszyscy użytkownicy</h1>
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
                @foreach ($userList as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td><a href="{{ URL::to('users/' . $user->id) }}">{{ $user->name }}
                                {{ $user->surname }}</a></td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @foreach ($statistics as $stat)
            @if ($stat->status == 'Active')
                Liczba nieaktywnych użytkowników: {{ $stat->user_count }}<br>
            @else
                Liczba aktywnych użytkowników: {{ $stat->user_count }}
            @endif
        @endforeach


    </div>
@endsection
