@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/exchange">Quản lý mượn trả sách</a></li>
        <li class="breadcrumb-item"><a href="/exchange/borrow">Danh mục phiếu mượn trả sách</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Phiếu mượn trả sách</a>
            
        </li>
        </ol>
    </nav>
    @include('inc.message')
    <div class="form-main form-border form-hover">
        <h3 class="text-center mb-4">Phiếu Mượn Sách</h3>
        {!! Form::open(['action' => 'App\Http\Controllers\BorrowController@store', 'files' => true, 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    {{form::label('matt', 'Mã thủ thư')}}
                    {{form::text('matt', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'Ngày-Tháng-Năm'])}}
                </div>
            </div> 
            <div class="col-3">
                <div class="form-group">
                    {{form::label('madg', 'Mã độc giả')}}
                    {{form::text('madg', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'Ngày-Tháng-Năm'])}}
                </div>
            </div>  
            <div class="col">
                <div class="form-group">
                    {{form::label('ngaynhap', 'Ngày nhập')}}
                    <?php 
                        use Carbon\Carbon;
                        $currentTime = Carbon::now();

                        echo "<div name=\"currtime\" class=\"form-control\">$currentTime</div>";
                        ?>
                </div>  
            </div>    
        </div>
        {{-- <div class="book-add-wrapper table-wrapper my-2">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Tên sách: </label>
                        <input type="text" id="tents" class="rounded-sm w-full" placeholder="Nhập tên sách.."/>
                    </div>
                </div>
            </div>
            <div id="addBook" class="btn btn-default py-2 px-5 rounded-lg">Thêm</d>
        </div> --}}
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