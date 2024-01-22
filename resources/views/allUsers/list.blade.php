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
                    <th scope="col">Status</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Wizyta</th>
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
                        <td>{{ $user->status }}</td>
                        <td>
                            @foreach ($user->role as $object)
                                {{ $object->name }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($user->visit as $object)
                                {{ $object->description_visit }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($visitLList as $visit) 
        <p>{{ $visit->id }}</p>
            <p>{{ $visit->assistant->name }}</p>
        @endforeach
        
        @foreach ($statistics as $stat)
            @if ($stat->status == 'Active')
                Liczba nieaktywnych użytkowników: {{ $stat->user_count }}<br>
            @else
                Liczba aktywnych użytkowników: {{ $stat->user_count }}
            @endif
        @endforeach


    </div>
@endsection
