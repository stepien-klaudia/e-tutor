@extends('layouts.app')

@section('content')
<div class="container">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom border-width" style = "border: 2px solid grey;">
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">Korepetytor</h4>
                    <p class="sm-width-95 sm-margin-auto">Skontaktuj się z korepetytorem korzystając z następujących danych.</p>
                    <div class="margin-20px-top">
                            <h4 style = "color:#00c2e4"><i>{{$anouncements -> user -> name}} &nbsp; {{$anouncements -> user -> surname}} </i></h4>
                            <h5>Numer telefonu : &nbsp; {{$anouncements -> user -> phone_number}}</h5>
                            <h5>Email : &nbsp; {{$anouncements -> user -> email}} </h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7 text-left">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <div class = "row">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30" style = "font-weight:bold;">{{$anouncements -> name}} &emsp;</h4>
                    <h4 class="font-size38 sm-font-size32 xs-font-size30" style = "color:#00c2e4">{{$anouncements -> price}}zł/godz.</h4>
                    </div>
                    <h5 class="font-size32 sm-font-size26 xs-font-size24">Opis korepetycji</h5>
                    <p class="no-margin-bottom">{{$anouncements -> description}}</p>
                    <div class="contact-info-section margin-40px-tb">
                        <div class="no-margin">
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <strong class="margin-8px-left">Przedmiot:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$anouncements -> category -> name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <strong class="margin-8px-left">Poziom zaawansowania:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$anouncements -> level -> name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <strong class="margin-8px-left">Miejsce:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{$anouncements -> place}}</p>
                                    </div>
                                </div>

                            
                    </div>

                </div>
            </div>

            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
@endsection
