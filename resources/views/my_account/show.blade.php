@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Moje konto</div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Imie</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $my_account -> name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" maxlength = "500" class="form-control" name="surname" value="{{ $my_account -> surname}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numer telefonu</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" maxlength = 100 class="form-control" name="phone_number" value="{{ $my_account -> phone_number}}" disabled>

                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ $my_account -> email}}" disabled>

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href = "{{route('my_account.edit',Auth::user())}}">
                                        <button class="btn btn-primary">
                                            Edytuj dane
                                        </button>
                                    </a>                                    
                                </div>
                                <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-danger delete_account" data-id = "{{Auth::user()->id}}">
                                            Usuń konto
                                        </button>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    $(function(){
        $('.delete_account').click(function(){
            if(confirm('Naciśnij OK aby usunąć swoje konto. Usunięcie konta jest nieodwracalne.'))
            {
                $.ajax({
                method:"DELETE",
                url:"http://e-tutor.test/my_account/del/" + $(this).data("id")
                })
                .done(function(){
                    alert("Data Saved");
                });
            };
            document.location.reload();
        });
    });
@endsection