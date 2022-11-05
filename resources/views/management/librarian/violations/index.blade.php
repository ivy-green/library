@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="row mb-4">
        <div class="col-3 card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/categories?parent=violations">
                <h5 class="">
                    Thu tiền vi phạm
                </h5>
            </a>
        </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục vi phạm</h1>
        <button class="btn btn-default btn_size">
            <a href="/violations/create">Thêm sách mới</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã vi phạm</th>
                <th scope="col">Tên vi phạm</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Trị giá</th>
                <th scope="col">Số lượng</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($violations) > 0)
                    @foreach($violations as $violation)
                    <tr>
                            <td> 
                                <a href="./violations/{{$violation->id}}"> {{$violation->id}}</a>
                            </td>
                            <td>
                                <a href="./violations/{{$violation->id}}"> {{$violation->tensach}}</a>
                            </td>
                            <td>
                                <a href="./violations/{{$violation->id}}"> {{$violation->created_at}}</a>
                            </td>
                            <td>
                                <a href="./violations/{{$violation->id}}"> {{$violation->trigia}}</a>
                            </td>
                            <td>
                                <a href="./violations/{{$violation->id}}"> {{$violation->soluong}}</a>
                            </td>
                            {{-- <td>
                                <button class="btn btn-default">
                                    <a class="btn_a" href="./violation/{{$violation->id}}">Chỉnh sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="btn_a" href="./violation/{{$violation->id}}">Xóa</a>
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