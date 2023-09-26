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
                @foreach ($assserviceList as $list)
                    <tr>
                        <th scope="row">{{ $list->id }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
