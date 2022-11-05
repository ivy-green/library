@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
      <li class="breadcrumb-item"><a href="/authors">Danh mục tác giả</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin tác giả</a>
      </li>
    </ol>
  </nav>
    <div id="info">
        <div class="d-flex flex-row mb-12 justify-between">
            <div class="author-image ">
                {{-- <img src="{{ asset($author->anhbia) }}" /> --}}
                <img src="<?php
                $str = 'uploads/authors/' . $author->anhdaidien;
                if(substr($str, -5) == "authors"){
                    asset('uploads/authors/default.jpg');
                }else {
                    asset($str);
                }
                ?>" />
            </div>
            <div class="content form-border form-hover ml-12">
                Tên tác giả: <h2 class="mb-2">{{$author -> tentacgia}}</h2>
                Ngày tạo: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$author -> create_at}}</div>
                <div class="row">
                    <div class="col">
                        Giới tính: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">
                            <?php 
                                if($author -> gioitinh == 1){
                                    echo "Nữ";
                                }else if($author -> gioitinh == 0){
                                    echo "Nam";
                                }else {
                                    echo "Không xác định";
                                }
                                ?>
                        </div>
                    </div>
                    <div class="col">
                        Ngày sinh: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$author -> ngaysinh}}</div>
                    </div>
                    <div class="col">
                        Số lượng sách: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$author -> soluongsach}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="">Danh mục sách: </div>
                        <textarea></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <small>Written on {{$author->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../authors/{{$author->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\AuthorsController@destroy', $author->id],
                'method' => 'author',
                'class' => 'pull-right'])!!}
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div>  
    </div>
@endsection