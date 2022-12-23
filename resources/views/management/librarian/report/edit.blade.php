@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/violations">Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Chỉnh sửa thông tin sách</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover text-capitalize">
        <h3 class="text-center mb-4">Trả phí vi phạm</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\ViolationsController@update', $report->id], 'files' => true, 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('', 'Mã thủ thư')}}
                    <div class="form-control">
                        {{Auth::user()->id}}
                    </div>
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
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('tensach', 'Mail Thủ Thư')}}
                    <a href={{ URL::route('user.show', $report->id) }} class="form-control text-lowercase">
                        {{ $librarian->email }}
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{form::label('trigia', 'Ngày nhập')}}
                    {{-- {{form::text('trigia', $report->trigia, ['class' => 'form-control', 'placeholder' => ''])}} --}}
                    <div class="form-control">{{$report->created_at}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{form::label('soluong', 'Nội dung')}}
                            @if(Auth::user()->maquyen == 1)
                                {{form::text('noidung', '', ['class' => 'form-control', 'placeholder' => 'Nhập nội dung..'])}}
                            @else
                                <div class="form-control">{{$report->noidung}}</div>
                            @endif
                        </div>
                    </div>
            
        </div>
        <div class=" text-center my-3">
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection