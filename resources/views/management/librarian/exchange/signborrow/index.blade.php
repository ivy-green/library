@extends('layouts.app')

@section('content')
    @include('inc.message')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href={{ URL::route('books') }}>Quản lý sách</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="#">Danh mục đăng ký mượn sách</a>
          </li>
        </ol>
      </nav>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục đăng ký mượn sách</h1>
        <button class="btn btn-default btn_size">
            <a href={{ URL::route('signborrow.create', ['parent' => 'exchange']) }}>Thêm</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã phiếu</th>
                <th scope="col">Email độc giả</th>
                <th scope="col">Ngày đăng ký</th>
                <th scope="col">Trạng thái</th>
              </tr>
            </thead>
            <tbody>
                @if(count($signforms) > 0)
                    @foreach($signforms as $signform)
                    <tr>
                            <td> 
                                <a href={{ URL::route('signborrow.show', $signform->id) }}> {{$signform->id}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('user.show', $signform->madg) }}> {{$users[$signform->madg]->email}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('signborrow.show', $signform->id) }}> {{$signform->created_at}}</a>
                            </td>
                            <td>
                                <a href={{ URL::route('signborrow.show', $signform->id) }}> 
                                    @if($signform->trangthai == 0) 
                                        <div class="alert alert-danger text-center py-2 px-1 my-auto">{{ __('Đang chờ') }}</div>
                                    @else
                                        <div class="alert alert-danger text-center py-2 px-1 my-auto">{{ __('Đã duyệt') }}</
                                    @endif
                                </a>
                            </td>
                            {{-- <td>
                                <button class="btn btn-default">
                                    <a class="btn_a" href="./book/{{$book->id}}">Chỉnh sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="btn_a" href="./book/{{$book->id}}">Xóa</a>
                                </button>
                            </td> --}}
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có sách nào</div>
                @endif
            </tbody>
          </table>
    </div>
    
@endsection