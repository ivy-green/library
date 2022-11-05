@extends('layouts.app')

@section('content')
    <a href="/book">Trở lại</a>
    @include('inc.message')
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Thêm Phiếu Mượn Sách</h3>
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
                {{form::label('tensach', 'Tên sách')}}
                {{form::text('tensach', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('soluong', 'Số lượng')}}
                        <div class="w-22">
                           {{form::text('soluong', '', ['class' => 'form-control', 'placeholder' => '1'])}}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {{form::label('trigia', 'Trị giá')}}
                        {{form::text('trigia', '', ['class' => 'form-control', 'placeholder' => ''])}}
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