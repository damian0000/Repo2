@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ulica</th>
                    <th scope="col">Miejscowość</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assistantList as $assistant)
                    @if ($assistant->city == 'Wągrowiec')
                        <tr>
                            <th scope="row">{{ $assistant['id'] }}</th>
                            <td>{{ $assistant['name'] }}</td>
                            <td>{{ $assistant['surname'] }}</td>
                            <td>{{ $assistant['phone'] }}</td>
                            <td>{{ $assistant['email'] }}</td>
                            <td>{{ $assistant['street'] }}</td>
                            <td>{{ $assistant['city'] }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
