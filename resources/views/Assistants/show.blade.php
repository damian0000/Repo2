@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('assistants.index') }}">Powrót</a>
        <div class="card">
            <h1 class="card-header">{{ $assistant->name }} {{ $assistant->surname }}</h1>
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
        
        
    </div>
@endsection
