<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Thư viện - Thủ thư') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">   
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>
<body>
    <div id="app" class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-header-sub">
                    <h3>Thư viện</h3>
                </div>
            </div>
    
            <ul class="nav-list list-unstyled components">
                <li class="">
                    {{-- <a class="txt-primary openSubNav" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ __('Quản lý tài khoản') }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu" aria-labelledby="openSubNav">
                        <li>
                            <a class="subMenuItem" href="#">Thêm tài khoản</a>
                        </li>
                    </ul> --}}
                    <a class="txt-primary openSubNav" href="/user" class="dropdown-toggle">{{ __('Quản lý độc giả') }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="subMenuItem" href="/user/create">Thêm tài khoản</a>
                        </li>
                    </ul>
                </li>   
                <li class="">
                    <a class="txt-primary openSubNav" href="/exchange">{{ __('Quản lý mượn-trả sách') }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="subMenuItem" href="#">Đăng ký mượn sách</a>
                        </li>
                        <li>
                            <a class="subMenuItem" href="#">Mượn sách</a>
                        </li>
                        <li>
                            <a class="subMenuItem" href="#">Trả sách</a>
                        </li>
                        <li>
                            <a class="subMenuItem" href="#">Báo cáo</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a  class="txt-primary openSubNav" href="/books">{{ __('Quản lý sách') }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a class="subMenuItem" href="/books/create">Thêm sách mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="txt-primary openSubNav" href="/violations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ __('Quản lý vi phạm') }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="subMenuItem" href="#">Page 1</a>
                        </li>
                        <li>
                            <a class="subMenuItem" href="#">Page 2</a>
                        </li>
                        <li>
                            <a class="subMenuItem" href="#">Page 3</a>
                        </li>
                    </ul>`
                </li>
            </ul>
    
        </nav>

        <main class="py-4 active" id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-1">
                <div class="container-fluid " >
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Danh mục</span>
                    </button>

                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                          <a class=" active" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                          <a class="" href="#">Quy định thư viện</a>
                        </li>
                        <li class="nav-item">
                          <a class="" href="#">Thông báo</a>
                        </li>
                        <li class="nav-item">
                          <a class="" href="#">Liên hệ</a>
                        </li>
                      </ul>
                    
                    <button
                    id="btn_navbarSupportedContent"
                    class="btn btn-dark d-inline-block d-lg-none ml-auto" 
                    type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                        <i class="fa-solid fa-bars" style="color: white;"></i>
                    </button>
                    <div class=" navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                    </li>
                                @endif
    
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->ten }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    
                </div>
            </nav>
            <div>
                @yield('content')
            </div>
        </main>
    </div>
    <script type="text/javascript"  src="{{ asset('js/app.js') }}"></script>

</body>
</html>
