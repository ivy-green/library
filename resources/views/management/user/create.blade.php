@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/user">Quản lý độc giả</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            @if(Auth::user()->maquyen == 1)
                <a href="/user/create">Thêm độc giả</a>
            @else
                <a href="/user/create">Thêm người dùng</a>
            @endif
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover my-3">
        @if(Auth::user()->maquyen == 1)
            <h3 class="text-center mb-4">Thêm Độc Giả Mới</h3>
        @else
            <h3 class="text-center mb-4">Thêm Người Dùng Mới</h3>
        @endif
        {!! Form::open(['action' => 'App\Http\Controllers\UserController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thủ thư')}}
                    {{form::text('', '', ['class' => 'form-control', 'placeholder' => 'Mã thủ thư lập phiếu..'])}}
                </div>
            </div>  
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Ngày đăng ký')}}
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
                <div class="col">
                    <div class="form-group">
                        @if(Auth::user()->maquyen == 1)
                            {{form::label('ten', 'Tên độc giả')}}
                        @else
                            {{form::label('ten', 'Tên người dùng')}}
                        @endif
                        {{form::text('ten', '', ['class' => 'form-control', 'placeholder' => 'Nhập họ và tên..'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('email', 'Email')}}
                        {{form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Nhập email..'])}}
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('gioitinh', 'Giới tính')}}
                        <div class="w-22">
                           {{form::text('gioitinh', '', ['class' => 'form-control', 'placeholder' => '0: Nam 1: Nữ'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('ngaysinh', 'Ngày sinh')}}
                        {{form::date('ngaysinh', '', ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {{form::label('dienthoai', 'Điện thoại')}}
                        {{form::text('dienthoai', '', ['class' => 'form-control', 'placeholder' => '+84'])}}
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('diachi', 'Địa chỉ')}}
                        {{form::text('diachi', '', ['class' => 'form-control', 'placeholder' => 'Số nhà, Đường, Phường, Quận, Tỉnh/ Thành Phố'])}}
                    </div>
                </div>
                {{-- admin --}}
                @if(Auth::user()->maquyen == 3)
                <div class="col">
                    <div class="form-group">
                        {{form::label('dienthoai', 'Quyền truy cập')}}
                        <select class="form-select form-select-sm mt-1" name="accessid">
                                @if(count($accesses) > 0)
                                    @foreach ($accesses as $access)
                                        <option value="{{ $access->id }}"> {{ $access->tenquyen }}</option>
                                    @endforeach
                                @else
                                    <option>Không có dữ liệu</option>
                                @endif
                        </select>
                    </div>
                </div>
                @endif
            </div>
            
        </div>
        <div class=" text-center my-3">
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="form-main form-border form-horver">
        {!! Form::open(['action' => 'App\Http\Controllers\UserController@import', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group  {{ $errors->has('xlsfile') ? 'has-error' : '' }}">
                    {{form::label('xlsfile', 'Import Excel File')}}
                    {{form::file('xlsfile', $attrs = [])}}    
                </div>
                <!-- Error -->
               @if ($errors->has('xlsfile'))
               <div class="error">
                   {{ $errors->first('xlsfile') }}
               </div>
               @endif
            </div>
            <div class="col">
                {{form::submit('Import', ['class' => 'btn btn-default submit'])}}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection