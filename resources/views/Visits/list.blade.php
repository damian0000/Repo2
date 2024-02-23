@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Usługi u podopiecznych</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Asystent</th>
                    <th scope="col">Podopieczny</th>
                    <th scope="col">Poprzedni podopieczny</th>
                    <th scope="col">Czas dojazdu</th>
                    <th scope="col">Data Usługi</th>
                    <th scope="col">Od godz.</th>
                    <th scope="col">Do godz</th>
                    <th scope="col">Całk. czas</th>
                    <th scope="col">Operacje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitList as $visit)
                    <tr>
                        <th scope="row">{{ $visit->id }}</th>
                        <td>
                            @foreach($visit->assistant as $assistant)
                                {{ $assistant->name }} {{ $assistant->surname }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($visit->patient as $patient)
                                {{ $patient->name }} {{ $patient->surname }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($visit->prevPatient as $prevPatient)
                                {{ $prevPatient->name }} {{ $prevPatient->surname }}
                            @endforeach
                        </td>
                        <td>{{ $visit->travel_time }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($visit->date_visit)->format('d.m.Y') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $visit->start_time_visit)->format('H:i') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $visit->end_time_visit)->format('H:i') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $visit->time_visit)->format('H:i') }}
                        </td>
                        <td>
                            <a href="{{ route('visits.edit',  $visit->id) }}">Edytuj usługę</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       <!-- <p><a href="{{ URL::to('visits/pdf') }}">Generate PDF</a></p>-->
    </div>
@endsection
