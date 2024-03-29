@extends('template')

@section('title')
    @if (isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Organizacje</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa organizacji</th>
                    <th scope="col">Projekty</th>
                    <th scope="col">Operacje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companyList as $company)
                    <tr>
                        <th scope="row">{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>
                        <td>
                            @foreach ($company->project as $object)
                                {{ $object->name }},
                            @endforeach
                          
                        </td>
                        <td><a href="{{ route('companies.edit', $company->id) }}">Edytuj organizację</a>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
