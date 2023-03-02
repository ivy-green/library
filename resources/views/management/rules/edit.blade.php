@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/rules">Quản lý quy định</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Chỉnh sửa thông tin quy định</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Chỉnh sửa Quy định</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\RulesController@update', $rule->id], 'files' => true, 'method' => 'PUT']) !!}
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
        <div class="rule-add-wrapper">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('', 'Chủ đề:')}}
                        @if($rule->maloai != null)
                            <div class="form-control">{{$rule_types[$rule->maloai]->tenloai}}</div>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('trigia', 'Ngày nhập')}}
                        <div class="form-control">{{$rule->create_at}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {{form::label('noidung', 'Nội dung:')}}
                {{form::textarea('noidung', $rule->noidung, ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
            </div>
        </div>
        <div class=" text-center my-3">
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection