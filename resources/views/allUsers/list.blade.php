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
                    <th scope="col">Projekt</th>
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
                            @foreach ($user->project as $object)
                                {{ $object->name }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Wizyty</h2>
        @foreach ($visitLList as $visit) 
            @foreach($visit->visitUsers as $item)
                <p>Id wizyty: {{ $visit->id }}</p>
                <p>Data wizyty: {{ $visit->date_visit }}</p>
                <p>Asystent {{$item->assistant->name}} {{$item->assistant->surname}}</p>
                <p>Pacjent {{$item->patient->name}} {{$item->patient->surname}}</p>
            @endforeach    
        @endforeach
        <br><br><br>
        <h2>Projekty</h2>
        @foreach ($projectList as $project) 
            <p>Id projektu: {{ $project->id }}</p>
            <p>nazwa projektu: {{ $project->name }}</p>
            <p>nazwa firmy: {{ $project->company->name }}</p>
            @foreach($project->projectUsers as $item)
                <p> {{$item->user->name}} {{$item->user->surname}}</p>
            @endforeach   
        @endforeach

        <br><br><br>
        <h2>Godziny</h2>
        @foreach ($hoursList as $hours) 
            <p>Id w tabeli: {{ $hours->id }}</p>
            <p>Miesiąc: {{ $hours->month }}</p>
            <p>Ilość godziń: {{ $hours->hours }}</p>
            <p>Projekt: {{ $hours->project->name }}</p>
            <p>Firma: {{ $hours->project->company->name }}</p>
            <p>Asystent: {{ $hours->assistant->name }} {{ $hours->assistant->surname }}</p>
            <p>podopieczny: {{ $hours->patient->name }} {{ $hours->patient->surname }}</p>

        @endforeach

        <br><br><br>
        @foreach ($statistics as $stat)
            @if ($stat->status == 'Active')
                Liczba nieaktywnych użytkowników: {{ $stat->user_count }}<br>
            @else
                Liczba aktywnych użytkowników: {{ $stat->user_count }}
            @endif
        @endforeach


    </div>
@endsection
