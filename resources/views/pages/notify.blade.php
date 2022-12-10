@extends('layouts.app')

@section('content')

<section id="newest">
    <h5>Mới nhất</h5>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="code">Tiêu đề</th>
                <th scope="col">Người gửi</th>
                <th scope="col">Ngày</th>
              </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                    @foreach($users as $user)
                    <tr>
                        <td> 
                            <a href="/user/{{$user->id}}"> {{$user->id}}</a>
                        </td>
                        <td>
                            <a href="/user/{{$user->id}}"> {{ [$user->ten] }}</a>
                        </td>
                        <td>
                            <a href="/user/{{$user->id}}"> {{$user->email}}</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <div class="">Không có độc giả nào</div>
                @endif
            </tbody>
          </table>
    </div>
</section>
<section id="important">
    <h5>Quan trọng</h5>
    
</section>

@endsection