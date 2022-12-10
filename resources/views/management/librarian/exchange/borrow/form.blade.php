@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/books">Quản lý sách</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin sách</a>
      </li>
    </ol>
  </nav>
    <div id="book-info">
        <div class="d-flex flex-row h-80 mb-12 justify-between">
            <div class="book-image ">
                {{-- <img src="{{ asset($book->anhbia) }}" /> --}}
                <img src="{{ asset('uploads/books/' . $book->anhbia) }}" />
            </div>
            <div class="book-content form-border form-hover ml-12 text-capitalize">
                Tên sách: <h2 class="mb-2">{{$booktitle->tents}}</h2>
                <div class="row">
                    <div class="col">
                        Thể loại: <p class="form-control"> {{$booktitle->theloai}}</p>
                    </div>
                    <div class="col">
                        Tác giả: <p class="form-control"> {{$booktitle->tacgia}}</p>
                    </div>
                </div>
                Nhà Xuất Bản: <p class="form-control">{{$bookhead->nhaxb}}</p>
                Ngày nhập: <p  class="form-control">
                        <?php 
                            use Carbon\Carbon;
                            $currentTime = Carbon::now();

                            if($book->created_at == null){
                                echo $currentTime;
                            } else {
                                echo $book->created_at;
                            }

                        ?>

                </p>
            </div>
        </div>
    </div>
        <h3 class="mt-4 mb-2">
            Danh mục độc giả mượn:
        </h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr class="text-capitalize">
                    <th scope="col">Mã Độc Giả</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Mã phiếu</th>
                    <th scope="col">Ngày mượn</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr>
                                <td> 
                                    <div class="">{{$user[0]->id}}</div>
                                        
                                </td>
                                <td>
                                    <a href="./books/{{$user[0]->masach}}"  class="text-capitalize"> {{ $user[0]->email }}</a>
                                </td>
                                <td>
                                    <a href="./users/{{$user[0]->id}}" class="text-capitalize"> {{ $user[0]->mavp }}</a>
                                </td>
                                <td class=" max-w-sm"> 
                                    <a href="./users/{{$user[0]->id}}" class="text-capitalize"> {{ $user[0]->mavp }}</a>
                                </td>
                                <td>
                                    {{-- @if( $borrow->ngaytra == null )
                                        <div class="alert alert-danger text-center py-2 px-1 mb-0">Chưa cập nhật</div>
                                    @else 
                                        <div class="alert alert-success text-center py-2 px-1 mb-0">{{ $user[0]->tinhtrang }}</div>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="">Không có sách nào</div>
                    @endif
                </tbody>
            </table>
        </div>
    <hr>
    <hr>
    <small>Written on {{$book->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="../books/{{$book->id}}/edit" class="btn btn-default">Chỉnh sửa</a></div>
        <div class="delete">
            <script>
                function confirmDelete(){
                    var x = confirm("Are you sure you want to delete?");
                    // $(.delete).append("@include('layouts.confirmDelete')");

                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
            {{-- Gọi method destroy cho cái nút --}}
            {!!Form::open([
                'action' => ['App\Http\Controllers\BooksController@destroy', $book->id],
                'method' => 'book',
                'class' => 'pull-right',
                'onsubmit' => 'return confirmDelete()'
                ])!!}
                
            {{-- Gọi method DELETE (ẩn) --}}
            {{form::hidden('_method', 'DELETE')}}
            {{-- Tạo button Xóa --}}
            {{form::button('<i class="fa-solid fa-trash mr-2"></i> Xóa',
                 array('type' => 'submit', 'class' => 'btn btn-danger'), )}}
            {{form::close();}}
        </div>
    </div>
@endsection