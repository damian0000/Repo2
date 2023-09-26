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
                    <th scope="col">Rozpoczęcie usługi</th>
                    <th scope="col">Zakończenie uslugi</th>
                    <th scope="col">Rodzaj usługi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitList as $visit)
                    <tr>
                        <th scope="row">{{ $visit->id }}</th>
                        <td>{{ $visit->assistant->name }} {{ $visit->assistant->surname }}</td>
                        <td>{{ $visit->patient->name }} {{ $visit->patient->surname }}</td>

                        @if ($visit->fromPatient)
                            <td>
                                {{ $visit->fromPatient->name }} {{ $visit->fromPatient->surname }}
                            </td>
                            <td>{{ $visit->tavel_time }}min</td>
                        @else
                            <td>--</td>
                            <td>--</td>
                        @endif
                        <td>
                            {{ \Carbon\Carbon::parse($visit->service_date)->format('d.m.Y') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $visit->service_start_time)->format('H:i') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $visit->service_end_time)->format('H:i') }}
                        </td>
                        <td>{{ $visit->service->name }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
