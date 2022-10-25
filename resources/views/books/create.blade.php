@extends('layouts.app')

@section('content')
    <a href="/book">Trở lại</a>
    @include('inc.message')
    <div class="form-main">
        <h3 class="text-center mb-4">Thêm Sách Mới</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\BooksController@store', 'files' => true, 'method' => 'POST']) !!}
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
                    {{form::date('', '', ['class' => 'form-control', 'placeholder' => 'Nhập mã thủ thư..'])}}
                </div>  
            </div>    
        </div>
        <div class="book-add-wrapper">
            <div class="form-group">
                {{form::label('tensach', 'Tên sách')}}
                {{form::text('tensach', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
            </div>
            <div class="form-group">
                {{form::label('ngaynhap', 'Ngày nhập')}}
                {{form::date('ngaynhap', '', ['class' => 'form-control', 'placeholder' => 'Ngày-Tháng-Năm'])}}
            </div>
            <div class="form-group">
                {{form::label('trigia', 'Trị giá')}}
                {{form::text('trigia', '', ['class' => 'form-control', 'placeholder' => ''])}}
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