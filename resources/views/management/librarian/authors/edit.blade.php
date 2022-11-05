@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/authors">Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Chỉnh sửa thông tin sách</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Chỉnh sửa thông tin tác giả</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\AuthorsController@update', $author->id], 'files' => true, 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thủ thư')}}
                    {{form::text('', '', ['class' => 'form-control', 'placeholder' => 'Mã thủ thư lập phiếu..'])}}
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
        <div class="author-add-wrapper">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('tentacgia', 'Tên tác giả')}}
                        {{form::text('tentacgia', $author->tentacgia, ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('ngaysinh', 'Ngày sinh')}}
                        {{form::text('ngaysinh', $author->ngaysinh, ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('gioitinh', 'Giới tính')}}
                        {{form::text('gioitinh', $author->gioitinh, ['class' => 'form-control', 'placeholder' => '0: Nam, 1: Nữ'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('anhbia', 'Ảnh')}}
                        <div class="w-22">
                           {{form::file('anhbia', $attrs = [])}}
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
            {{form::hidden('__method', 'PUT')}}
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection