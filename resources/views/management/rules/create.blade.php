@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/rules">Danh mục quy định</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thêm quy định</a>
      </li>
    </ol>
  </nav>
    @include('inc.message')
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Thêm Quy Định Mới</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\RulesController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã quy định')}}
                    @if(count($rules) > 0)
                            <div class="form-control"> {{ count($rules) + 1}}</div>
                    @else
                        <option>Không có dữ liệu</option>
                    @endif
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
        <div class="form-group">
            {{form::label('tenqd', 'Quy Định Về: ')}}
            {{form::text('tenqd', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên quy định..'])}}
        </div>
        <div class="form-group">
            {{form::label('noidung', 'Nội dung:')}}
            {{form::textarea('noidung', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        
        <div class=" text-center my-3">
            {{form::submit('Nhập', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection