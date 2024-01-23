@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <a href="{{ URL::to('assistants/') }}">Powrót</a>
        <div class="card">
            <div class="card-header">{{ $assistant->name }} {{ $assistant->surname }}</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Email</td>
                        <td>{{ $assistant->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{ $assistant->phone }}</td>
                    </tr>
                    <tr>
                        <td>Adres zamieszkania</td>
                        <td>{{ $assistant->street }}, {{ $assistant->post_code }} {{ $assistant->city }}</td>
                    </tr>
                    <tr>
                        <td>Organizacja </td>
                        <td>{{ $assistant->company->name }}</td>
                    </tr>
                    <tr>
                        <td>Rola </td>
                        <td>
                            <ul>
                                @foreach ($assistant->role as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <h1>Usługi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
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
                @foreach($assistant->visit as $visit)
                    @foreach($visit->visitUsers as $user)
                        <tr>
                            <th scope="row">{{ $visit->id }}</th>
                            <td>{{ $user->patient->name }} {{ $user->patient->surname }}</td>
                            <td>{{ $user->fromPatient->name }} {{ $user->fromPatient->surname }}</td>
                            <td>{{ $visit->travel_time }}min.</td>
                            <td>{{ $visit->date_visit }}</td>
                            <td>{{ $visit->start_time_visit }}</td>
                            <td>{{ $visit->end_time_visit }}</td>
                            <td>{{ $visit->time_visit }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>





        <p><a href="{{ URL::to('visits/pdf') }}">Generate PDF</a></p>
    </div>
@endsection
