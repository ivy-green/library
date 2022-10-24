@extends('layouts.app')

@section('content')
    <h1>Danh mục sách</h1>
    <a href="./post/create" class="btn btn-default">Thêm sách mới</a>
    @if(count($books) > 1)
        <div class="card">
            <ul class="list-group list-group-flush">
            @foreach($books as $book)
                <li class="list-group-item">
                    <h4><a href="./post/{{$book->id}}"> {{$book->tensach}}</a></h4>
                    <small>Written on {{$book->created_at}}</small>
                </li>
            @endforeach
            </ul> 
        </div>
    @else

    @endif
@endsection