@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="display: block; min-height: 600px; background:light; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8" style = "position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: all .15s ease;"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-black" style = "font-weight: 300;display: block;">Cześć {{Auth::user()->name}}</h1>
            <p class="text-black mt-0 mb-5">To twoja strona profilowa</p>
            <a href="{{route('announcement_create')}}" class="btn btn-info">Dodaj nowe ogłoszenie</a>
          </div>
        </div>
      </div>
    </div>
@endsection
