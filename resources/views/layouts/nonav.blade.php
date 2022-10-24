<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- css --}}
    @stack('css')

    {{-- links --}}
    @push('css')
        <link rel="stylesheet" href="path to your css">
    @endpush
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nonav.css') }}">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>
<body>
    <div class="container">
        <div class="row py-5 pr-5 pl-12">
            <div class="col">
                <div class="justify-content-center rule-table">
                    <h3>Nội quy thư viện</h3>
                    <ul class="list-unstyled commponents rule-list">
                        <li class="">
                            Nếu chưa có thẻ độc giả, xin hãy liên hệ trực tiếp với thủ thư của thư viện để được đăng ký.
                        </li>
                        <li class="">
                            Độc giả phải từ độ tuổi từ 18 - 55 tuổi. Thẻ sẽ có giá trị trong 6 tháng,
                             khi hết hạn có thể tiếp tục gia hạn thẻ tại bàn thủ thư hoặc lập phiếu gia hạn thẻ trên hệ thống.     
                        </li>
                        <li class="advance">
                            Quyền lợi khi trở thành độc giả:
                            <ul class="advance-list">
                                <li>
                                    Độc giả có thể mượn sách của thư viện thông qua thẻ độc giả
                                </li>
                                <li class="">
                                    Mỗi Độc giả có thể thể mượn tối đa 5 cuốn sách trong 4 ngày
                                </li>
                            </ul>
                        </li>
                        <li class="warning">
                            Lưu ý:
                            <ul class="warning-list">
                                <li class="">
                                    Độc giả phải trả sách đúng hẹn. Mỗi ngày trễ hẹn sẽ bị phạt 1.000đ. Nếu bị phạt quá 5 lần, tài khoản độc giả sẽ bị khóa và không thể tạo lại. Độc giả vẫn có thể đọc sách tại thư viện nhưng không được mượn.
                                </li>
                                <li class="">
                                    Nếu sách có dấu hiệu hư hỏng, mất trang, bị ướt,.. Độc giả sẽ bồi thường số tiền bằng trị giá của cuốn sách.
                                </li>
                                <li class="">
                                    Chỉ có thẻ còn hạn 7 ngày mới có thể làm thủ tục mượn sách
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="col">
                @yield('nonav-content')
            </main>
        </div>
        
    </div>
    
</body>