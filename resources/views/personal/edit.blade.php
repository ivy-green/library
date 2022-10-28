@extends ('layouts.app2')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/edit.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('js/edit.js') }}" >

<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Chỉnh sửa thông tin cá nhân</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
            class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section">
            <b>Ảnh đại diện</b>
            <p>Chấp nhận file .png. nhỏ hơn 1MB</p>
            <button class="btn button border"><b>Tải lên</b></button>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="firstname">First Name</label>
                <input type="text" class="bg-light form-control" placeholder="Huỳnh"  >
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname">Last Name</label>
                <input type="text" class="bg-light form-control" placeholder="Tú" name="name" value="">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="text" class="bg-light form-control" placeholder="thien.tu241@gmail.com" id="email" name="email" value="" >
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">Số điện thoại</label>
                <input type="tel" class="bg-light form-control" placeholder="(+84)" name="phone" value="">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="country">Quốc gia</label>
                <select name="country" id="country" class="bg-light">
                    <option value="vietnam" selected>Việt Nam</option>
                    <option value="usa">Mỹ</option>
                </select>
            </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang">
                <label for="language">Ngôn ngữ</label>
                <div class="arrow">
                    <select name="language" id="language" class="bg-light">
                        <option value="vietnam" selected>Tiếng Việt</option>
                        <option value="english">English</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <button class="btn btn-primary mr-3" type="button" >Lưu</button>
            <a href="/infor" class="btn danger" type="submit" >Hủy</a>
        </div>
    </div>

</div>

@endsection