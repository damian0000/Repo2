@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <a href="{{ URL::to('assistant/') }}">Powrót</a>
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
                        <td>Rola </td>
                        <td>{{ $assistant->role }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
