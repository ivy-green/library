@extends('layouts.app')

@section('content')
@if(Auth::user()->id != $user->id)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/user">Quản lý độc giả</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Thông tin độc giả</a>
        </li>
        </ol>
    </nav>
    @else
    <h3>Thông tin cá nhân</h3>
@endif
    @include('inc.message')
    <div id="user-info">
        <div class="row h-80 mb-12 justify-between">
            <div class="user-image col">
                {{-- <img src="{{ asset($user->anhbia) }}" /> --}}
                <img class="py-auto" src="
                <?php
                    // $str = 'uploads/users/' . $user->anhdaidien;
                    // if(substr($str, -5) == "users"){
                    //     asset('uploads/users/default.jpg');
                    // }else {
                    //     asset($str);
                    // }
                ?>
                {{ asset('uploads/users/default.jpg') }}
                " />
            </div>
            <div class="user-content form-border form-hover ml-12 col-3">
                Tên độc giả: <h2 class="mb-2">{{$user -> ten}}</h2>
                Ngày tạo: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">
                    @if($user -> created_at != null)
                        {{ $user -> created_at }}
                    @else
                        @php
                            $currentTime = Carbon::now();
                            echo $currentTime;
                        @endphp
                    @endif
                </div>
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
                <div class="row">
                    <div class="col">
                        Địa chỉ: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">{{$user -> diachi}}</div>
                    </div>
                    @if(Auth::user()->maquyen == 3)
                        <div class="col">
                            Quyền truy cập: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">
                                @if($user -> maquyen == 1)
                                    {{ __('Thủ thư')}}
                                @elseif ($user -> maquyen == 2)
                                    {{ __('Độc giả')}}
                                @else
                                    {{ __('Admin')}}
                                @endif
                            </div>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
    <h3>Lịch sử mượn trả sách</h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Mã Phiếu</th>
                    <th scope="col">Ngày Lập Phiếu</th>
                    <th scope="col">Ngày Trả Dự Kiến</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Vi Phạm</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($borrows) > 0)
                        @foreach($borrows as $borrow)
                            @if($borrow->madg == $user->id)
                                <tr>
                                    <td> 
                                        <a href="/exchange/borrow/{{$borrow->id}}"  class="text-uppercase"> {{$borrow->maphieu}}</a>
                                    </td>
                                    <td>
                                        <a href="/exchange/borrow/{{$borrow->id}}"  class="text-capitalize"> {{$borrow->ngaylapphieu}}</a>
                                    </td>
                                    <td>
                                        <a href="/users/{{$borrow->matt}}" class="text-capitalize"> {{ $borrow->ngaytradukien }}</a>
                                    </td>
                                    <td>
                                        @if ($borrow->ngaytra != null) 
                                            <div class="alert alert-success py-1 px-2 text-center">Đã Trả</div>
                                        @else <div class="alert alert-danger py-1 px-2 text-center">Chưa Trả</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($borrow->mavp != null) 
                                        <div class="alert alert-success py-1 px-2 text-center">Có</div>
                                        @else <div class="alert alert-danger py-1 px-2 text-center">Không</div>
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