@extends('layouts.app')

@section('content')
    @include('inc.message')
    {{-- <div class="row mb-4">
        <div class="col-3 card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/categories?parent=violations">
                <h5 class="">
                    Thu tiền vi phạm
                </h5>
            </a>
        </div>
        </div>
    </div> --}}
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục vi phạm</h1>
        <button class="btn btn-default btn_size">
            <a href="/violations/create">Thêm sách mới</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr class=" text-capitalize">
                <th scope="col">Mã phiếu</th>
                <th scope="col">Mail độc giả</th>
                <th scope="col">Tiền vi phạm</th>
                <th scope="col">Đã trả</th>
                <th scope="col">Còn nợ</th>
                <th scope="col">Thao tác</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                @if(count($violations) > 0)
                    @foreach($violations as $violation)
                    <tr>
                        <td> 
                            <a href="/exchange/borrow/{{$violation->maphieu}}"> {{$violation->maphieu}}</a>
                        </td>
                        <td>
                            <a href="/violations/{{$violation->id}}">
                                {{ $users[$borrows[$violation->maphieu-1]->madg-1]->email}}
                            </a>
                        </td>
                        
                        <td>
                            <a href="/violations/{{$violation->id}}"> {{$violation->tienvipham}}</a>
                        </td>
                        <td>
                            @if($violation->dathanhtoan == $violation->tienvipham)
                                <div class="alert alert-success text-center py-2 px-1 my-auto">{{$violation->dathanhtoan}}</div>
                            @else <div class="alert alert-danger text-center py-2 px-1 my-auto">{{$violation->dathanhtoan}}</div>
                            @endif
                        </td>
                        <td>
                            <a href="/violations/{{$violation->id}}"> {{
                                $violation->tienvipham - $violation->dathanhtoan
                            }}</a>
                        </td>
                        <td>
                            @if($violation->dathanhtoan < $violation->tienvipham)
                                <a href="/violations/{{$violation->id}}" class="btn btn-default"> 
                                    Trả nợ
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có sách nào</div>
                @endif
                <tr class="font-weight-bold">
                    <td></td>
                    <td>Tổng</td>
                    <td>
                        <div class="col">
                            {{ $violations->sum('tienvipham') }}
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            {{ $violations->sum('dathanhtoan') }}
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            {{ $violations->sum('tienvipham') - $violations->sum('dathanhtoan') }}
                        </div>
                    </td>
                </tr>
            </tbody>
          </table>
    </div>
    
    
@endsection