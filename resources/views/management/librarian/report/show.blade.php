@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/exchange">Quản lý mượn-trả sách</a></li>
      <li class="breadcrumb-item"><a href="{{ URL::route('borrow') }}">Danh mục vi phạm</a></li>
      <li class="breadcrumb-item active" aria-current="page">
        <a href="#">Thông tin chi tiết phiếu</a>
      </li>
    </ol>
  </nav>
    <div class="h-80 mb-12 container">
        <div class="categorie-content form-border form-hover py-3 px-5 rounded-lg">
            <div class="row">
                <div class="col border-r-2">
                    <div class=" text-capitalize row">
                        <div class="col">
                            Mã vi phạm: <h2 class="mb-2">
                                    {{ $report->id }}
                            </h2>
                        </div>
                        <div class="col">
                            Mã Phiếu mượn trả: 
                                
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            Ngày nhập: <div class="form-control">{{$report->created_at}}</div>
                        </div>
                        <h5 class="col">Mail Thủ Thư: <a href="/users/$bform->madg" class="form-control">{{ $librarian->email }}</a></h5> 
                    </div>
                </div>
                <div class="col">
                    Nội dung:
                    <div class="form-control">
                        {{ $report->noidung }}
                    </div>
                </div>
            </div>
        </div>
        <h3 class="mt-4 mb-2">
            Thống kê:
        </h3>
        <div class="table-wrapper form-border form-hover">
            
        </div>
    </div>
    {{-- <script type="">
        var bookheads = @json($bookheads);
        var booktitles = @json($booktitles);
    </script> --}}
    <hr>
    <hr>
    <small>Written on {{$report->created_at}}</small>
    <div class="operation d-flex flex-row mt-3">
        <div class="update mr-3"><a href="{{ URL::route('report.edit', $report->id ) }}" class="btn btn-default">Chỉnh sửa</a></div>
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