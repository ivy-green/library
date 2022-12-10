@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="row mb-4">
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/categories?parent=books">
                <h5 class="">
                    Thể Loại
                </h5>
            </a>
        </div>
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/authors?parent=book">
                <h5 class="">
                    Tác Giả
                </h5>
            </a>
        </div>
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/new?parent=book">
                <h5 class="">
                    Mới Nhập
                </h5>
            </a>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục sách</h1>
        <button class="btn btn-default btn_size">
            <a href="/books/create">Thêm sách mới</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã tựa sách</th>
                <th scope="col">Tựa sách</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Tên tác giả</th>
                <th scope="col">Thể loại</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($booktitles) > 0)
                    @foreach($booktitles as $booktitle)
                    <tr>
                            <td> 
                                <a href="./books/{{$booktitle->id}}"> {{$booktitle->id}}</a>
                            </td>
                            <td>
                                <a href="./books/{{$booktitle->id}}"  class="text-capitalize"> {{$booktitle->tents}}</a>
                            </td>
                            <td>
                                <a href="./books/{{$booktitle->id}}"> {{$booktitle->created_at}}</a>
                            </td>
                            <td>
                                <a href="./authors/{{$booktitle->tacgia}}"  class="text-capitalize"> 
                                    {{$authors[$booktitle->tacgia - 1]->tentg}}
                                </a>
                            </td>
                            <td>
                                <a href="./categories/{{$booktitle->theloai}}"  class="text-capitalize"> 
                                    {{$categories[$booktitle->theloai - 1]->tentl}}
                                </a>
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