@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">
            @if (Auth::user()->maquyen === 3)
                Danh mục người dùng
            @else
                Danh mục độc giả
            @endif
        </h1>
        <button class="btn btn-default btn_size">
            @if(Auth::user()->maquyen == 3)
                <a href={{ URL::route('user.create') }}>Thêm người dùng</a>
            @else
                <a href={{ URL::route('user.create') }}>Thêm độc giả</a>
            @endif
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="code">Mã độc giả</th>
                <th scope="col">Tên độc giả</th>
                <th scope="col">Email</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày đăng ký</th>
                @if(Auth::user()->maquyen == 3)
                    <th scope="col">Quyền</th>
                @endif
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                     {{--thủ thư  --}}
                    @if(Auth::user()->maquyen == 1)
                        @foreach($users as $user)
                        {{-- chỉ in tên độc giả --}}
                            @if($user->maquyen == 2 )
                                <tr>
                                    <td> 
                                        <a href={{ URL::route('user.show', $user->id) }}> {{$user->id}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('user.show', $user->id) }}> {{$user->ten}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('user.show', $user->id) }}> {{$user->email}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('user.show', $user->id) }}> 
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
                                        <a href={{ URL::route('user.show', $user->id) }}> {{$user->created_at}}</a>
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-default">
                                            <a class="btn_a" href={{ URL::route('user.show', $user->id) }}>Chỉnh sửa</a>
                                        </button>
                                        <button class="btn btn-danger">
                                            <a class="btn_a" href={{ URL::route('user.show', $user->id) }}>Xóa</a>
                                        </button>
                                    </td> --}}
                                </tr>
                            @endif
                        @endforeach
                    @else
                     {{--admin  --}}
                        @foreach($users as $user)
                        <tr>
                            <td> 
                                <a href={{ URL::route('user.show', $user->id) }}> {{$user->id}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('user.show', $user->id) }}> {{$user->ten}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('user.show', $user->id) }}> {{$user->email}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('user.show', $user->id) }}> 
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
                                <a href={{ URL::route('user.show', $user->id) }}> {{$user->created_at}}</a>
                            </td>
                            @if(Auth::user()->maquyen == 3)
                                <td>
                                    <div class="">
                                        {{ $roles[$user->maquyen - 1]->tenquyen }}
                                        </div>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                @else
                    <div class="">Không có độc giả nào</div>
                @endif
            </tbody>
          </table>
    </div>

    
@endsection