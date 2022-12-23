@extends('layouts.app')

@section('content')
    @include('inc.message')
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục quy định</h1>
        <button class="btn btn-default btn_size">
            <a href="./rules/create">Thêm quy định</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="code"><a href="#">Mã quy định</a></th>
                <th scope="col"><a id="type" href="#">Chủ đề <i class="fa-solid fa-filter"></i></a></th>
                <th scope="col" class="content">Nội dung</th>
                <th scope="col">Ngày nhập</th>
                @if(Auth::user()->maquyen == 3)
                    <th scope="col">Chỉnh sửa</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @if(count($rules) > 0)
                    @foreach($rules as $rule)
                    <tr>
                        <td> 
                            <a> {{$rule->id}}</a>
                        </td>
                        <td class="text-capitalize">
                            <a> 
                                {{ $rule->tenqd }}
                            </a>
                        </td>
                        <td class="content text-capitalize">
                            <a> {{$rule->noidung}}</a>
                        </td>
                        <td>
                            <a> {{$rule->created_at}}</a>
                        </td>
                        @if(Auth::user()->maquyen == 3)
                        <td>
                            <button class="btn btn-default">
                                <a class="btn_a" href="./rules/{{$rule->id}}/edit">Chỉnh sửa</a>
                            </button>
                        </td>
                        @endif 
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có độc giả nào</div>
                @endif
            </tbody>
          </table>
    </div>
    
@endsection