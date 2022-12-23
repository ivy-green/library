@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/exchange">Quản lý mượn-trả sách</a></li>
      <li class="breadcrumb-item"><a href={{ URL::route('signborrow') }}>Danh mục phiếu đăng ký mượn</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin chi tiết phiếu</a>
      </li>
    </ol>
  </nav>
    <div class="h-80 mb-12 container">
        <div class="categorie-content form-border form-hover py-3 px-5 rounded-lg">
            <div class=" d-flex flex-row">
                <div class="">
                    Mã Phiếu: <h2 class="mb-2">{{ $signform->id }}</h2>
                </div>
                <div class="ml-10">
                    Ngày nhập: <p class="form-control">{{$signform->created_at}}</p>
                </div>
            </div>
            <div class="">
                <h5 class="my-2">Mail Độc Giả: <a href="/user/{{$signform->madg}}" class="form-control">{{ $users[$signform->madg]->email }}</a></h5> 
            </div>
        </div>
        <h3 class="mt-4 mb-2">
            Danh mục sách mượn:
        </h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr class="text-capitalize">
                        <th scope="col">Mã Tựa Sách</th>
                        <th scope="col">Ngôn ngữ</th>
                        {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($signformdetails) > 0)
                        @foreach($signformdetails as $detail)
                            <tr class="text-capitalize">
                                <td> 
                                    <a href="/books" class="">
                                        {{ $btitle[$bhead[$detail->mads]->mats]->tents }}
                                    </a>
                                        
                                </td>
                                <td>
                                    <a href="/books/{{$detail->masach}}"  class="text-capitalize"> 
                                        {{ $lang[$bhead[$detail->mads]->ngonngu]->tennn }}
                                    </a>
                                </td>
                                {{-- <td>
                                    <a href="/books/{{$detail->madg}}" class="text-capitalize"> {{ $detail->mads }}</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    @else
                        <div class="">Không có sách nào</div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    

    <hr>
    <hr>
    <small>Written on {{$signform->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        {{-- <div class="update mr-3"><a href="../borrow/{{ $detail->id }}/edit" class="btn btn-default">Chỉnh sửa</a></div> --}}
        {{-- <div class="delete">
            {!!Form::open([
                'action' => ['App\Http\Controllers\BorrowController@destroy', $detail->maphieu],
                'method' => 'categorie',
                'class' => 'pull-right'])!!}
            {{form::hidden('_method', 'DELETE')}}
            {{form::submit('Xóa', ['class' => 'btn btn-danger'])}}
            {{form::close();}}
        </div> --}}
    </div>
@endsection