@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục báo cáo</h1>
        <button class="btn btn-default btn_size">
            <a href="/exchange/borrow/create">Thêm</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã phiếu</th>
                <th scope="col">Mã thủ thư</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">File</th>
              </tr>
            </thead>    
            <tbody>
                @if(count($reports) > 0)
                    @foreach($reports as $report)
                    <tr>
                            <td> 
                                <a href="{{ URL::route('report.show', $report->id) }}"> PH{{$report->id}}</a>
                            </td>
                            <td>
                                <a href="{{ URL::route('user', $report->matt) }}"> {{$report->matt}}</a>
                            </td>
                            <td>
                                <a href="{{ URL::route('report.show', $report->id) }}"> {{$report->tieude}}</a>
                            </td>
                            <td>
                                <a href="{{ URL::route('report.show', $report->id) }}"> {{$report->created_at}}</a>
                            </td>
                            <td>
                                <a href="./book/{{$report->id}}"> {{$report->updated_at}}</a>
                            </td>
                            <td>
                                    @if ($report->_file == null)
                                        <div class="alert alert-danger py-2 text-center">{{ __('Chưa có') }}</div>
                                    @else
                                        <div class="alert alert-success py-2 text-center">{{ __('Đã có') }}</div>
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