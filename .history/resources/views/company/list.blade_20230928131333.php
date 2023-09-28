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
                </tr>
            </thead>
            <tbody>
                @foreach ($companyList as $company)
                    <tr>
                        <th scope="row">{{ $company->id }}</th>
                        <td>{{ $company->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
