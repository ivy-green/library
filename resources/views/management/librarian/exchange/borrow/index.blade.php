@extends('layouts.app')

@section('content')
    @include('inc.message')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/exchange">Quản lý mượn trả sách</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                <a href="#">Danh mục phiếu mượn trả sách</a>
                
                </li>
            </ol>
        </nav>
        <   div class="d-flex flex-row justify-content-between">
            <h1 class="mb-4">Danh mục phiếu mượn trả sách</h1>
            <button class="btn btn-default btn_size">
                <a href="{{ URL::Route('borrow.create') }}">Thêm phiếu mới</a>
            </button>
        </>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Mã Phiếu Mượn Trả</th>
                    <th scope="col">Ngày Lập Phiếu</th>
                    <th scope="col">Mã Thủ Thư</th>
                    <th scope="col">Mail Độc Giả</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($bookforms) > 0)
                        @foreach($bookforms as $bookform)
                        <tr>
                                <td> 
                                    <a href="./borrow/{{$bookform->id}}"> PH{{$bookform->maphieu}}</a>
                                </td>
                                <td>
                                    <a href="./borrow/{{$bookform->id}}"  class="text-capitalize"> {{$bookform->created_at}}</a>
                                </td>
                                <td>
                                    <a href="./users/{{$bookform->matt}}"> {{$bookform->matt}}</a>
                                </td>
                                <td>
                                    <a href="./users/{{$bookform->madg}}"  class="text-capitalize"> 
                                        {{$users[$bookform->madg - 1]->email}}
                                    </a>
                                </td>
                                <td>
                                        @if($bookform->ngaytra != null) 
                                            <div class="alert alert-success text-center py-2 px-1 mb-0">Đã trả</div>
                                        @else <div class="alert alert-danger text-center py-2 px-1 mb-0">Chưa trả</div>
                                        @endif
                                </td>
                        </tr>
                        @endforeach
                    @else
                        <div class="">Không có sách nào</div>
                    @endif
                </tbody>
                </table>
        </div>
    
@endsection