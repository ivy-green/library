@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Quản lý độc giả</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Chỉnh sửa thông tin độc giả</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Chỉnh Sửa Thông Tin Độc Giả</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\UserController@update', $user->id], 'files' => true, 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thủ thư')}}
                    {{form::text('', '', ['class' => 'form-control', 'placeholder' => 'Mã thủ thư lập phiếu..'])}}
                </div>
                
            </div>  
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã độc giả')}}
                    <div class="form-control">{{$user->id}}</div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Ngày chỉnh sửa')}}
                    <?php 
                        use Carbon\Carbon;
                        $currentTime = Carbon::now();

                        echo "<div class=\"form-control\">$currentTime</div>";
                        ?>
                </div>  
            </div>    
        </div>
        <div class="user-add-wrapper">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {{form::label('ten', 'Tên độc giả')}}
                        {{form::text('ten', $user->ten, ['class' => 'form-control', 'placeholder' => 'Nhập tên..'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('gioitinh', 'Giới tính')}}
                        {{form::text('gioitinh', $user->gioitinh, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('ngaysinh', 'Ngày sinh')}}
                        {{form::date('ngaysinh', $user->ngaysinh, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('email', 'Email')}}
                        {{form::date('email', $user->email, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('diachi', 'Địa chỉ')}}
                        {{form::text('diachi', $user->diachi, ['class' => 'form-control', 'placeholder' => 'Nhập tên tác giả..'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('dienthoai', 'Điện thoại')}}
                        {{form::text('dienthoai', $user->dienthoai, ['class' => 'form-control', 'placeholder' => 'Nhập thể loại..'])}}
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('anhdaidien', 'Ảnh')}}
                        <div class="w-22">
                           {{form::file('anhdaidien', $attrs = [])}}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group picture">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class=" text-center my-3">
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection