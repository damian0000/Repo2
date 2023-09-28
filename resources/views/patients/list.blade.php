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
                </tr>
            </thead>
            <tbody>
                @foreach ($patientsList as $patients)
                    <tr>
                        <th scope="row">{{ $patients->id }}</th>
                        <td><a href="{{ URL::to('patients/' . $patients->id) }}">{{ $patients->name }}
                                {{ $patients->surname }}</a></td>
                        <td>{{ $patients->phone }}</td>
                        <td>{{ $patients->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
