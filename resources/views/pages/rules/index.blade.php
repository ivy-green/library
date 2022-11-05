@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục độc giả</h1>
        <button class="btn btn-default btn_size">
            <a href="./user/create">Thêm độc giả</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã độc giả</th>
                <th scope="col">Tên độc giả</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày đăng ký</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                    @foreach($users as $user)
                    <tr>
                        <td> 
                            <a href="./user/{{$user->id}}"> {{$user->id}}</a>
                        </td>
                        <td>
                            <a href="./user/{{$user->id}}"> {{$user->ten}}</a>
                        </td>
                        <td>
                            <a href="./user/{{$user->id}}"> {{$user->email}}</a>
                        </td>
                        <td>
                            <a href="./user/{{$user->id}}"> 
                            <?php 
                                if($user->gioitinh == 1){
                                    echo 'Nữ';
                                }else {
                                    echo 'Nam';
                                }
                                ?>
                            </a>
                            {{-- <small>Written on {{$user->created_at}}</small> --}}
                        </td>
                        <td>
                            <a href="./user/{{$user->id}}"> {{$user->create_at}}</a>
                        </td>
                        {{-- <td>
                            <button class="btn btn-default">
                                <a class="btn_a" href="./user/{{$user->id}}">Chỉnh sửa</a>
                            </button>
                            <button class="btn btn-danger">
                                <a class="btn_a" href="./user/{{$user->id}}">Xóa</a>
                            </button>
                        </td> --}}
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có độc giả nào</div>
                @endif
            </tbody>
          </table>
    </div>
    
@endsection