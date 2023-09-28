@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <a href="{{ URL::to('patients/') }}">Powrót</a>
        <div class="card">
            <div class="card-header">{{ $patient->name }} {{ $patient->surname }}</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Email</td>
                        <td>{{ $patient->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{ $patient->phone }}</td>
                    </tr>
                    <tr>
                        <td>Adres zamieszkania</td>
                        <td>{{ $patient->street }}, {{ $patient->post_code }} {{ $patient->city }}</td>
                    </tr>
                    <tr>
                        <td>Organizacja </td>
                        <td>{{ $patient->company->name }}</td>
                    </tr>
                    <tr>
                        <td>Rola </td>
                        <td>
                            <ul>
                                @foreach ($patient->roles as $role)
                                    <li>
                                        {{ $role->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
