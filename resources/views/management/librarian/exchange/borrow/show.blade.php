@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/exchange">Quản lý mượn-trả sách</a></li>
      <li class="breadcrumb-item"><a href="{{ URL::route('borrow') }}">Danh mục phiếu mượn trả sách</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin chi tiết phiếu</a>
      </li>
    </ol>
  </nav>
    <div class="h-80 mb-12 container">
        <div class="categorie-content form-border form-hover py-3 px-5 rounded-lg">
            <div class=" d-flex flex-row">
                <div class="">
                    Mã Phiếu: <h2 class="mb-2">{{ $borrow->id }}</h2>
                </div>
                <div class="ml-10">
                    Ngày nhập: <p>{{$borrow->created_at}}</p>
                </div>
            </div>
            <div class="">
                <h5 class="my-2">Thủ Thư Lập Phiếu: {{ $users[$borrow->matt - 1]->ten }}</h5> 
                <h5 class="my-2">Mail Độc Giả: <a href="/users/$borrow->madg">{{ $users[$borrow->madg]->email }}</a></h5> 
            </div>
        </div>
        <h3 class="mt-4 mb-2">
            Danh mục sách mượn:
        </h3>
        <div class="table-wrapper form-border form-hover">
            <table class="table">
                <thead>
                    <tr class="text-capitalize">
                    <th scope="col">Tên sách</th>
                    <th scope="col">Mã sách</th>
                    <th scope="col">Mã vi phạm</th>
                    <th scope="col">Ngày trả</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if(count($details) > 0)
                        @foreach($details as $detail)
                            @if($borrow->id == $detail->maphieu)
                                <tr class="text-capitalize">
                                    <td> 
                                        <a href={{ URL::route('books.show', $detail->maphieu) }} class="">
                                            {{$btitles[$bheads[$detail->masach]->mats]->tents}}
                                        </a>
                                         
                                    </td>
                                    <td>
                                        <a href="/books/{{$detail->masach}}"  class="text-capitalize"> {{ $detail->masach }}</a>
                                    </td>
                                    <td>
                                        <div class="text-capitalize"> 
                                            @if( $detail->mavp == null )
                                                <div class="alert alert-danger text-center py-2 px-1 mb-0">Chưa trả</div>
                                            @else 
                                                <a href={{ URL::route('violations.show', $detail->mavp) }} class="alert alert-success text-center py-2 px-1 mb-0">{{ $detail->mavp }}</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class=" max-w-sm"> 
                                        @if( $borrow->ngaytra == null )
                                            <div class="alert alert-danger text-center py-2 px-1 mb-0">Chưa trả</div>
                                        @else 
                                            <div class="alert alert-success text-center py-2 px-1 mb-0">{{ $detail->ngaytra }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $borrow->ngaytra == null )
                                            <div class="alert alert-danger text-center py-2 px-1 mb-0">Chưa cập nhật</div>
                                        @else 
                                            <div class="alert alert-success text-center py-2 px-1 mb-0">{{ $detail->tinhtrang }}</div>
                                        @endif
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
    </div>
    {{-- <script type="">
        var bookheads = @json($bookheads);
        var booktitles = @json($booktitles);
    </script> --}}
    <hr>
    <hr>
    <small>Written on {{$borrow->created_at}}</small>
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