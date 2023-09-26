@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Usługi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rodzaj</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($serviceList as $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td>{{ $service->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
