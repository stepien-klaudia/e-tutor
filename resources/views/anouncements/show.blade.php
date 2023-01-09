@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ogłoszenie</div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength = "500" class="form-control" name="name" value="{{ $anouncements -> name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" maxlength = "1500" class="col-md-4 col-form-label text-md-right">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" disabled>{{ $anouncements -> description }}</textarea>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">Miasto</label>

                            <div class="col-md-6">
                                <input id="place" type="text" maxlength = 100 class="form-control" name="place" value="{{ $anouncements -> place }}" disabled>

                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step ="0.01" min = "0" class="form-control " name="price" value="{{ $anouncements -> price }}" disabled>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
