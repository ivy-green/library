@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý độc giả</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin độc giả</a>
      </li>
    </ol>
  </nav>
    <div id="user-info">
        <div class="d-flex flex-row h-80 mb-12 justify-between">
            <div class="user-image ">
                {{-- <img src="{{ asset($user->anhbia) }}" /> --}}
                <img src="<?php
                $str = 'uploads/users/' . $user->anhdaidien;
                if(substr($str, -5) == "users"){
                    asset('uploads/users/default.jpg');
                }else {
                    asset($str);
                }
                ?>" />
            </div>
            <div class="user-content form-border form-hover ml-12">
                Tên độc giả: <h2 class="mb-2">{{$user -> ten}}</h2>
                Ngày tạo: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$user -> create_at}}</div>
                <div class="row">
                    <div class="col">
                        Giới tính: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">
                            <?php 
                                if($user -> gioitinh == 1){
                                    echo "Nữ";
                                }else if($user -> gioitinh == 0){
                                    echo "Nam";
                                }else {
                                    echo "Không xác định";
                                }
                                ?>
                        </div>
                    </div>
                    <div class="col">
                        Ngày sinh: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$user -> ngaysinh}}</div>
                    </div>
                    <div class="col">
                        Điện thoai: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$user -> dienthoai}}</div>
                    </div>
                </div>
                
                Địa chỉ: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$user -> diachi}}</div>


            </div>
        </div>
    </div>
    <hr>
    <hr>
    <small>Written on {{$user->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../user/{{$user->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\UserController@destroy', $user->id],
                'method' => 'user',
                'class' => 'pull-right'])!!}
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div>  
    </div>
@endsection