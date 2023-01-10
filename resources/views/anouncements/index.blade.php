@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-12">
            @if (session('status'))
            <div class="aletr alert-success">
                {{session('status')}}
            </div>
            @endif
        </div>
    </div>
    <div class = "row">
        <div class = "col-6">
            <h1>Lista ogłoszeń</h1>
        </div>
    </div>
    <div class = "row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Miejsce</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Przedmiot</th>
                    <th scope="col">Poziom nauczania</th>
                    <th scope="col">Użytkownik</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
            @foreach($anouncements as $anouncement)
            <tr>
                <th scope="row">{{ $anouncement->id }}</th>
                <td>{{ $anouncement->name }}</td>
                <td>{{ $anouncement->description }}</td>
                <td>{{ $anouncement -> place}}</td>
                <td>{{ $anouncement -> price}}</td>
                <td>@if(!is_null($anouncement -> category)){{ $anouncement -> category->name}}@endif</td>
                <td>@if(!is_null($anouncement -> level)){{ $anouncement -> level->name}}@endif</td>
                <td>{{ $anouncement -> user -> email}}</td>
                <td>
                    <a href = "{{route('announcement_show',$anouncement->id)}}">
                        <button class = "btn btn-success btn-sm">
                            Pokaż
                        </button>
                    </a>
                    <a href = "{{route('announcement_edit',$anouncement->id)}}">
                        <button class = "btn btn-warning btn-sm">
                            Edytuj
                        </button>
                    </a>
                    <button class = "btn btn-danger btn-sm delete_a" data-id = "{{$anouncement->id}}" >
                        Usuń
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $anouncements->links() }}
    </div>
</div>
@endsection

@section('javascript')
    $(function(){
        $('.delete_a').click(function(){
            if(confirm('Naciśnij OK aby usunąć użytkownika'))
            {
                $.ajax({
                method:"DELETE",
                url:"http://e-tutor.test/announcements/del/" + $(this).data("id")
                })
                .done(function(){
                    alert("Data Saved");
                });
            }
        });
    });
@endsection