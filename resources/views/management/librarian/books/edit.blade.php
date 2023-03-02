@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Chỉnh sửa thông tin sách</a>
          </li>
        </ol>
      </nav>
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Chỉnh sửa Sách</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\BooksController@update', $book->id], 'files' => true, 'method' => 'PUT']) !!}
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
        <div class="book-add-wrapper">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('tensach', 'Tên sách')}}
                        {{form::text('tensach', $booktitle->tensach, ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('trigia', 'Ngày nhập')}}
                        {{-- {{form::text('trigia', $book->trigia, ['class' => 'form-control', 'placeholder' => ''])}} --}}
                        <div class="form-control">{{$book->create_at}}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{form::label('matheloai', 'Thể loại')}}</br>
                        <select class="form-select form-select-sm mt-1" name="categoryid">
                            @if(count($categories) > 0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->tentheloai }}</option>
                                @endforeach
                            @else
                                <option>Không có dữ liệu</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{form::label('matacgia', 'Tác giả')}}</br>
                        <select class="form-select form-select-sm mt-1" name="authorid">
                            @if(count($authors) > 0)
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"> {{ $author->tentacgia }}</option>
                                @endforeach
                            @else
                                <option>Không có dữ liệu</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{form::label('soluong', 'Số lượng')}}
                                <div class="w-22">
                                   {{form::text('soluong', '', ['class' => 'form-control', 'placeholder' => '1'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{form::label('trigia', 'Trị giá')}}
                                {{form::text('trigia', '', ['class' => 'form-control', 'placeholder' => ''])}}
                            </div>
                        </div>
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
            {{form::submit('Thêm', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection