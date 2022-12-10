@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thêm sách mới</a>
      </li>
    </ol>
  </nav>
    @include('inc.message')
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Thêm Sách Mới</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\BooksController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{form::label('mathuthu', 'Mã thủ thư')}}
                    <div class="form-control">
                        {{Auth::user()->id}}
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
            <div class="form-group">
                {{form::label('tensach', 'Tên sách')}}
                {{form::text('tensach', '', ['class' => 'form-control', 'placeholder' => 'Nhập tên sách..'])}}
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
            <div class="form-group  {{ $errors->has('anhbia') ? 'has-error' : '' }}">
                {{form::label('anhbia', 'Ảnh')}}
                {{form::file('anhbia', $attrs = [])}}    
            </div>
            <button class="btn btn-default">Thêm</button>
        </div>
        <div class="book-add-list my-3">
            <div class="d-flex flex-row justify-between align-middle">
                Danh sách thêm
                <div id="addBook" class="btn btn-default py-2 px-5 rounded-lg">Thêm</div>
            </div>
            <div class="table-wrapper mt-2">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Tên tựa sách</th>
                        <th scope="col">Bìa</th>
                        <th scope="col">Ngôn ngữ</th>
                        <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="bookBody">
                    </tbody>
                    </table>
            </div>
        </div>
        <script type="text/javascript">
            let bookheads = {!! json_encode($bookheads) !!};
            let lang = {!! json_encode($langs) !!};
        </script>
        <div class=" text-center my-3">
            {{form::submit('Nhập', ['class' => 'btn btn-primary submit'])}}
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/addBookToList.js') }}"></script>

@endsection