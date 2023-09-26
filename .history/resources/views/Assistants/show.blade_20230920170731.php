@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $assistant->name }} {{ $assistant->surname }}</div>
            <div class="card-body">
                <div class="table">
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
                </div>

            </div>
        </div>
    </div>
@endsection
