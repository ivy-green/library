@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Danh mục tác giả</a>
          </li>
        </ol>
      </nav>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục tác giả</h1>
        <button class="btn btn-default btn_size">
            <a href="./authors/create">Thêm tác giả mới</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã tác giả</th>
                <th scope="col">Tên tác giả</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Số lượng sách</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($authors) > 0)
                    @foreach($authors as $author)
                    <tr>
                            <td> 
                                <a href="./authors/{{$author->id}}#book"> {{$author->id}}</a>
                            </td>
                            <td>
                                <a href="./authors/{{$author->id}}#book"> {{$author->tentacgia}}</a>
                            </td>
                            <td>
                                <a href="./authors/{{$author->id}}#book"> {{$author->ngaysinh}}</a>
                            </td>
                            <td>
                                <a href="./user/{{$author->id}}#book"> 
                                    <?php 
                                        if($author->gioitinh == 1){
                                            echo 'Nữ';
                                        }else {
                                            echo 'Nam';
                                        }
                                        ?>
                                    </a>
                            </td>
                            <td>
                                <a href="./authors/{{$author->id}}#book"> {{$author->soluongsach}}</a>
                            </td>
                            {{-- <td>
                                <button class="btn btn-default">
                                    <a class="btn_a" href="./author/{{$author->id}}#book">Chỉnh sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="btn_a" href="./author/{{$author->id}}#book">Xóa</a>
                                </button>
                            </td> --}}
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có tác giả nào</div>
                @endif
            </tbody>
          </table>
    </div>
    
@endsection