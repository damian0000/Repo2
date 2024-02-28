@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <a href="{{ URL::to('users/') }}">Powrót</a>
        <div class="card">
            <div class="card-header">{{ $user->name }} {{ $user->surname }}</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Adres zamieszkania</td>
                        <td>{{ $user->street }}, {{ $user->post_code }} {{ $user->city }}</td>
                    </tr>
                    <tr>
                        <td>Organizacja </td>
                        <td>{{ $user->company->name }}</td>
                    </tr>
                    <tr>
                        <td>Rola </td>
                        <td>
                            <ul>
                                @foreach ($user->role as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
