@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
          <li class="breadcrumb-item"><a href="/authors">Danh mục tác giả</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Thêm tác giả mới</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Thêm Tác Giả Mới</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\AuthorsController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thủ thư')}}
                    {{form::text('', '', ['class' => 'form-control', 'placeholder' => 'Ngày-Tháng-Năm'])}}
                </div>
            </div>  
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Ngày nhập')}}
                    <?php 
                        use Carbon\Carbon;
                        $currentTime = Carbon::now();

                        echo "<div class=\"form-control\">$currentTime</div>";
                        ?>
                </div>  
            </div>    
        </div>
        <div class="book-add-wrapper">
            <div class="form-group">
                {{form::label('tentacgia', 'Tên tác giả')}}
                {{form::text('tentacgia', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('ngaysinh', 'Ngày sinh')}}
                        <div class="w-22">
                           {{form::date('ngaysinh', '', ['class' => 'form-control', 'placeholder' => '1'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('gioitinh', 'Giới tính')}}
                        {{form::text('gioitinh', '', ['class' => 'form-control', 'placeholder' => '0: Nam, 1: Nữ'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('soluongsach', 'Số lượng sách')}}
                        {{form::text('soluongsach', '', ['class' => 'form-control', 'placeholder' => '1'])}}
                    </div>
                </div>
            </div>
            <div class="form-group  {{ $errors->has('anhbia') ? 'has-error' : '' }}">
                {{form::label('anhbia', 'Ảnh')}}
                {{form::file('anhbia', $attrs = [])}}    
            </div>
            <button class="btn btn-default">Thêm</button>
        </div>
        <div class="book-add-list">
            Danh sách thêm
            <textarea class="w-100">

            </textarea>
        </div>
        <div class=" text-center my-3">
            {{form::submit('Nhập', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection