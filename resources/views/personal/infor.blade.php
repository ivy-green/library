@extends ('layouts.app2')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/infor.css') }}" >

<div class="container">
    <div class="row">
        
                       
            <div class="col-sm-3" id="img-section">
             <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
             class="img" alt="">
            </div>
            
            <div class="col-sm-6">
                <h6 > Thien Tu </h6>
                <p>Số điện thoại: 039.......</p>
                <p>Việt Nam</p>

             <a href="/personal/edit" data-toggle="tooltip" title="Thay đổi thông tin">Chỉnh sửa ></a>
            </div>

        

    </div>


</div>

@endsection
