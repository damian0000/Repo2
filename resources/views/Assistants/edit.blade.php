@extends('template')

@section('id')
    @if (isset($id))
        - {{ $id }}
    @endif
@endsection

@section('content')
    <div class="container">
        <h1>Edytuj asystenta</h1>

        <form action="{{ route('assistants.update',  ['userId' => $assistant->id]) }} " method="POST" role="form">
            @csrf
            @method("PUT")
            <input type="hidden" name="id" value="{{ $assistant->id }}" />
            <div class="form-group">
                <label for="name">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $assistant->name }}" />
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="surname">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname"
                    value="{{ $assistant->surname }}" />
            </div>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="pesel">Pesel</label>
                <input type="text" class="form-control" id="pesel" name="pesel" value="{{ $assistant->pesel }}" />
            </div>
            @error('pesel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $assistant->email }}" />
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="phone">Telefon</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ $assistant->phone }}" />
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="street">Ulica</label>
                <input type="text" class="form-control" id="street" name="street"
                    value="{{ $assistant->street }}" />
            </div>
            @error('street')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="post_code">Kod pocztowy</label>
                <input type="text" class="form-control" id="post_code" name="post_code"
                    value="{{ $assistant->post_code }}" />
            </div>
            @error('post_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="city">Miejscowość</label>
                <input type="text" class="form-control" id="city" name="city"
                    value="{{ $assistant->city }}" />
            </div>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="Rola">Rola</label>
                @foreach ($rolesList as $role)
                    <div class="form-check">
                        @if ($assistant->role->contains($role->id))
                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]"
                                checked>
                            <label class="form-check-label" for="{{ $role->name }}">
                                {{ $role->name }}
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]">
                            <label class="form-check-label" for="{{ $role->name }}">
                                {{ $role->name }}
                            </label>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="company">Projekty</label>
                @foreach ($projectList as $project)
                    <div class="form-check">
                        @if ($assistant->project->contains($project->id))
                            <input class="form-check-input" type="checkbox" value="{{ $project->id }}" name="projects[]"
                                checked/>
                            <label class="form-check-label" for="{{ $project->name }}">
                                {{ $project->name }}
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $project->id }}" name="projects[]"/>
                            <label class="form-check-label" for="{{ $project->name }}">
                                {{ $project->name }}
                            </label>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                @if ($assistant->status == 'Pracujący')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Pracujący" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Pracujący</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Urlop" name="status"
                            id="status" />
                        <label class="form-check-label" for="status">Urlop</label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Pracujący" name="status" id="status" />
                        <label class="form-check-label" for="status">Pracujący</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Urlop" name="status" id="status"
                            checked />
                        <label class="form-check-label" for="status">Urlop</label>
                    </div>
                @endif
            </div>

            <input type="submit" class="btn btn-primary" value="Zaktualizuj" />
        </form>
    </div>
@endsection
