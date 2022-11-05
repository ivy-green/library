@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin sách</a>
      </li>
    </ol>
  </nav>
    <div id="book-info">
        <div class="d-flex flex-row h-80 mb-12 justify-between">
            <div class="book-image ">
                {{-- <img src="{{ asset($book->anhbia) }}" /> --}}
                <img src="{{ asset('uploads/books/' . $book->anhbia) }}" />
            </div>
            <div class="book-content form-border form-hover ml-12">
                Tên sách: <h2 class="mb-2">{{$book->tensach}}</h2>
                Ngày nhập: <p>{{$book->created_at}}</p>
            </div>
        </div>
    </div>
    <div id="infor" class="form-border form-hover py-4 px-4 rounded-lg">
            <h5 class="py-2">
                Danh sách độc giả mượn:
            </h5>
            <textarea name="">

            </textarea>
    </div>
    <hr>
    <hr>
    <small>Written on {{$book->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../books/{{$book->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
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