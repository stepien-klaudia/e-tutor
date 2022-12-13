@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj swój adres E-Mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Na podany przez ciebie adres E-Mail został wysłany link aktywacyjny.') }}
                        </div>
                    @endif

                    {{ __('Przed kontynuacją, sprawdź swojego maila, na który powinien przyjść link aktywacyjny.') }}
                    {{ __('Jeżeli nie dostałeś maila') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('naciśnij żeby wysłać ponownie') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
