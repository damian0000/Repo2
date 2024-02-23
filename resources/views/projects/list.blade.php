@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Projekty</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa projektu</th>
                    <th scope="col">Operacje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectList as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->name }}</td>
                        <td><a href="{{ route('projects.edit', $project->id) }}">Edytuj projekt</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
