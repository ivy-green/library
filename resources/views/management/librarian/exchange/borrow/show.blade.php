@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/categories">Quản lý mượn-trả sách</a></li>
      <li class="breadcrumb-item"><a href="/categories">Danh mục mượn sách</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin chi tiết mượn sách</a>
      </li>
    </ol>
  </nav>
    <div id="categorie-info">
        <div class="d-flex flex-row h-80 mb-12 justify-between">
            <div class="categorie-content form-border form-hover ml-12">
                Tên thể loại: <h2 class="mb-2">{{$category->tensach}}</h2>
                Ngày nhập: <p>{{$category->created_at}}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            Danh sách độc giả mượn:
            <div class="">
                
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <small>Written on {{$category->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../categories/{{$category->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\categoriesController@destroy', $category->id],
                'method' => 'categorie',
                'class' => 'pull-right'])!!}
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div>
    </div>
@endsection