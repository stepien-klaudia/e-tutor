@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytowanie ogłoszenia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('announcement_update',$anouncements->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength = "500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $anouncements -> name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" maxlength = "1500" class="col-md-4 col-form-label text-md-right">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autofocus>{{ $anouncements -> description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Miasto</label>

                            <div class="col-md-6">
                                <input id="place" type="text" maxlength = 100 class="form-control @error('place') is-invalid @enderror" name="place" value="{{ $anouncements -> place }}" required autocomplete="place" autofocus>

                                @error('place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step ="0.01" min = "0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $anouncements -> price }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Przedmiot</label>

                            <div class="col-md-6">
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value = ''>Brak</option>
                                @foreach($categories as $category)    
                                    <option value="{{$category->id}}" @if(!is_null($anouncements->category)&&($anouncements->category->id==$category->id)) selected @endif>{{$category -> name}}</option>
                                @endforeach
                                </select>

                                @error('category_id')
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
