@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytowanie danych konta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',$user) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Imie</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength = "500" class="form-control" name="name" value="{{ $user -> name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" maxlength = "500" class="form-control" name="surname" value="{{ $user -> surname}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numer telefonu</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" maxlength = 100 class="form-control" name="phone_number" value="{{ $user -> phone_number }}" disabled>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ $user -> email}}" disabled>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rola</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{$role}}" @if(($user->role==$role)) selected @endif>{{$role}}</option>
                                    @endforeach
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Zapisz
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
