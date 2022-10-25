@extends('layouts.app')

@section('content')
    <a href="/book">Back</a>
    <div id="book-info">
        <div class="d-flex flex-row h-80 mb-12 justify-between">
            <div class="book-image ">
                {{-- <img src="{{ asset($book->anhbia) }}" /> --}}
                <img src="{{ asset('uploads/books/' . $book->anhbia) }}" />
            </div>
            <div class="book-content ml-12">
                Tên sách: <h2 class="mb-2">{{$book -> tensach}}</h2>
                Ngày nhập: <p>{{$book -> ngaynhap}}</p>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <small>Written on {{$book->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../book/{{$book->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\BooksController@destroy', $book->id],
                'method' => 'book',
                'class' => 'pull-right'])!!}
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div>
    </div>
@endsection