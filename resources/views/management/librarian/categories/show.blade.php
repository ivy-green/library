@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
      <li class="breadcrumb-item"><a href="/categories">Danh mục tác giả</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin tác giả</a>
      </li>
    </ol>
  </nav>
    <div id="info">
        <div class="d-flex flex-row mb-12 justify-between">
            <div class="content form-border form-hover ml-12">
                Tên thể loại: <h2 class="mb-2">{{$category -> tentl}}</h2>
                Ngày tạo: <div class="py-2 px-3 rounded-lg border border-dark my-2 bg-white">
                    <?php 
                            use Carbon\Carbon;
                            $currentTime = Carbon::now();

                            if($category->created_at == null){
                                echo $currentTime;
                            } else {
                                echo $booktitle->created_at;
                            }

                        ?>
                </div>
            </div>
        </div>
        <h3>Danh mục tựa sách</h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Mã Tựa Sách</th>
                    <th scope="col">Tên Tựa Sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Tóm tắt</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($booktitles) > 0)
                        @foreach($booktitles as $booktitle)
                            @if($booktitle->theloai == $category->id)
                                <tr>
                                        <td> 
                                            <a href="/books/{{$booktitle->mats}}"  class="text-uppercase"> TS{{$booktitle->id}}</a>
                                        </td>
                                        <td>
                                            <a href="/books/{{$booktitle->tents}}"  class="text-capitalize"> {{$booktitle->tents}}</a>
                                        </td>
                                        <td>
                                            <a href="/users/{{$booktitle->tacgia-1}}" class="text-capitalize"> {{ $authors[$booktitle->tacgia - 1]->tentg }}</a>
                                        </td>
                                        <td class=" max-w-sm"> 
                                            {{$booktitle->tomtat}}
                                        </td>
                                        <td>
                                                {{-- @if ($bookheads[$booktitle->id - 1]->tinhtrang == 1) 
                                                    <div class="alert alert-success py-1 px-2 text-center">Còn</div>
                                                    @else <div class="alert alert-danger py-1 px-2 text-center">Đã hết</div>
                                                    @endif --}}
                                        </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <div class="">Không có sách nào</div>
                    @endif
                </tbody>
                </table>
    </div>
    <hr>
    <hr>
    <small>Written on {{$category->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../categories/{{$category->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\CategoriesController@destroy', $category->id],
                'method' => 'category',
                'class' => 'pull-right'])!!}
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div>  
    </div>
@endsection