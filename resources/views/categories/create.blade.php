@extends('layouts.app')

@section('content')
    <a href="/categories">Trở lại</a>
    @include('inc.message')
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Thêm Thể Loại Mới</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\BooksController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thể loại')}}
                    <div class="form-control">
                        <?php 
                            echo count($categories) + 1;
                        ?>
                    </div>
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
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('tentheloai', 'Tên thể loại')}}
                        {{form::text('tentheloai', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên thể loại..'])}}
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                {{form::label('tensach', 'Mô tả')}}
                {{form::textarea('tensach', '', ['class' => 'form-control', 'placeholder' => 'Nhập mô tả..'])}}
            </div>
        </div>
        <div class=" text-center my-3">
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection