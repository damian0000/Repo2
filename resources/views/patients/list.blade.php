@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Podopieczni</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operacje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patientsList as $patients)
                    <tr>
                        <th scope="row">{{ $patients->id }}</th>
                        <td><a href="{{ route('patients.show', $patients->id) }}">{{ $patients->name }}
                                {{ $patients->surname }}</a></td>
                        <td>{{ $patients->phone }}</td>
                        <td>{{ $patients->email }}</td>
                        <td>{{ $patients->status }}</td>
                        <td>
                            <!--<a href="{{ URL::to('patients/delete/' . $patients->id) }}"
                                onclick="return confirm('Czy na pewno usunąć?')">Usun podopiecznego</a><br>-->
                            <a href="{{ route('patients.edit',  $patients->id) }}">Edytuj podopiecznego</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
