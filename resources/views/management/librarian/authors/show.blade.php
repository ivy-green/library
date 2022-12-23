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
                Tên tác giả: <h2 class="mb-2">{{$author -> tentg}}</h2>
                Ngày tạo: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$author -> created_at}}</div>
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
            </div>
        </div>
        <h3>Danh mục tựa sách</h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Mã Tựa Sách</th>
                    <th scope="col">Tên Tựa Sách</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Tóm tắt</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($booktitles) > 0)
                        @foreach($booktitles as $booktitle)
                            @if($booktitle->tacgia == $author->id)
                                <tr>
                                        <td> 
                                            <a href="{{ URL::route('books.show', $booktitle->id) }}"  class="text-uppercase"> {{$booktitle->mats}}</a>
                                        </td>
                                        <td>
                                            <a href="{{ URL::route('books.show', $booktitle->id) }}"  class="text-capitalize"> {{$booktitle->tents}}</a>
                                        </td>
                                        <td>
                                            <a href="./users/{{$booktitle->matt}}" class="text-capitalize"> {{ $categories[$booktitle->theloai - 1]->tentl }}</a>
                                        </td>
                                        <td class=" max-w-sm"> 
                                            {{$booktitle->tomtat}}
                                        </td>
                                        <td>
                                                @if ($bookheads[$booktitle->id - 1]->tinhtrang == 1) 
                                                    <div class="alert alert-success py-1 px-2 text-center">Còn</div>
                                                    @else <div class="alert alert-danger py-1 px-2 text-center">Đã hết</div>
                                                    @endif
                                        </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <div class="">Không có sách nào</div>
                    @endif
                </tbody>
                </table>
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