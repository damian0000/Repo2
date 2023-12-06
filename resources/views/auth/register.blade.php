@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card py-3" style="padding: 15px">
                    <div class="card-header">Rejestracja</div>

                    <form action="{{ route('quest_patients') }}" method="POST" role="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="name">Imię</label>
                            <input type="text" class="form-control" title="imię" name="name" />
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Nazwisko">Nazwisko</label>
                            <input type="text" class="form-control" title="Nazwisko" name="surname" />
                        </div>
                        @error('surname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Pesel">Pesel</label>
                            <input type="text" class="form-control" title="Pesel" name="pesel" />
                        </div>
                        @error('pesel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" title="Email" name="email" />
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Hasło">Hasło</label>
                            <input type="password" class="form-control" title="Hasło" name="password" />
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Telefon">Telefon</label>
                            <input type="text" class="form-control" title="Telefon" name="phone" />
                        </div>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Ulica">Ulica</label>
                            <input type="text" class="form-control" title="Ulica" name="street" />
                        </div>
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Kod pocztowy">Kod pocztowy</label>
                            <input type="text" class="form-control" title="Kod pocztowy" name="post_code" />
                        </div>
                        @error('post_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="Miejscowość">Miejscowość</label>
                            <input type="text" class="form-control" title="Miejscowość" name="city" />
                        </div>
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <select id="company" class="form-select" title="Organizacje" name="company">
                            <option value="1">Więcej z życia</option>
                        </select>
                        <input type="hidden" value="3" name="role">
                        <input type="hidden" name="status" value="Active" />
                        <input type="submit" class="btn btn-primary" value="Dodaj" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
