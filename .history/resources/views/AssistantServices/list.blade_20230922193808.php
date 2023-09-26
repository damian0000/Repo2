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
                {{-- @foreach ($assistantList as $assistant)
                    <tr>
                        <th scope="row">{{ $assistant->id }}</th>
                        <td><a href="{{ URL::to('assistants/' . $assistant->id) }}">{{ $assistant->name }}
                                {{ $assistant->surname }}</a></td>
                        <td>{{ $assistant->phone }}</td>
                        <td>{{ $assistant->email }}</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
