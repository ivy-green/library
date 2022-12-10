@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Danh mục thể loại</a>
          </li>
        </ol>
      </nav>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục thể loại</h1>
        <button class="btn btn-default btn_size">
            <a href="/categories/create">Thêm thể loại mới</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã thể loại</th>
                <th scope="col">Tên thể loại</th>
                <th scope="col">Số lượng sách</th>
                <th scope="col">Ngày nhập</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                    <tr>
                            <td> 
                                <a href="./categories/{{$category->id}} class="text-capitalize""> TL{{$category->id}}</a>
                            </td>
                            <td>
                                <a href="./categories/{{$category->id}}" class="text-capitalize"> {{$category->tentl}}</a>
                            </td>
                            <td>
                                <a href="./categories/{{$category->id}}"> 
                                    {{
                                        $booktitles->where('theloai', $category->id)->count()
                                    }}
                                </a>
                            </td>
                            <td>
                                <a href="./categories/{{$category->id}}"> {{$category->created_at}}</a>
                            </td>
                            {{-- <td>
                                <button class="btn btn-default">
                                    <a class="btn_a" href="./category/{{$category->id}}">Chỉnh sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="btn_a" href="./category/{{$category->id}}">Xóa</a>
                                </button>
                            </td> --}}
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có sách nào</div>
                @endif
            </tbody>
          </table>
    </div>
    
@endsection