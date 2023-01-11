@extends('layouts.app')

@section('content')
Strona profilowa użytkownika {{Auth::user()->name}}
@endsection
