@extends('layouts.app')

@section('content')
<div class = "container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Numer Telefonu</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname}}</td>
            <td>{{ $user->phone_number}}</td>
            <td>
                <button class = "btn btn-danger btn-sm delete_user" data-id = "{{$user->id}}" >
                    Usuń
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection

@section('javascript')
    $(function(){
        $('.delete_user').click(function(){
            if(confirm('Naciśnij OK aby usunąć użytkownika'))
            {
                $.ajax({
                method:"DELETE",
                url:"http://e-tutor.test/users/" + $(this).data("id")
                })
                .done(function(){
                    alert("Data Saved");
                })
                .fail(function(){
                    alert("ERROR");
                });
            }
        });
    });
@endsection