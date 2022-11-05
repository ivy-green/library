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
            <div id="curr-user" class="flex flex-row mx-3 my-3">
                <div class="user-img h-14 w-14 rounded-full bg-white overflow-hidden
                 border border-spacing-2 border-black">
                    <img src="{{ asset('uploads/users/default.jpg') }}" class="" alt="">
                </div>
                <div class="user-info flex flex-col ml-3 mt-2">
                    <div class="name">Tên: 
                        @if( is_null(Auth::user()->ten))
                            {{ __('Chưa đăng nhập') }}
                        @else
                            {{ Auth::user()->ten }}
                        @endif
                    </div>
                    <div class="id text-xs  ">ID: 
                        @if( is_null(Auth::user()->ten))
                            {{ __('') }}
                        @else
                            {{ Auth::user()->id }}
                        @endif
                    </div>
                </div>
                <div class="edit-user ml-auto mt-2">
                    <i class="fa-solid fa-pen"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="sidebar-header-sub ">
                    <h3>
                        {{-- return Quyen Truy Cap (chuc vu) --}}
                        <?php 
                            $user = auth()->user();
                            $accesses = $user->accesses->tenquyen;
                            
                            echo $accesses;
                            ?>
                    </h3>
                </div>
            </div>
            {{-- side nav tùy vào Role của User --}}
            @if(Auth::user()->maquyen == 1)
                @include('layouts.admin');
            @elseif(Auth::user()->maquyen == 2)
                @include('layouts.librarian');
            @elseif(Auth::user()->maquyen == 3)
                @include('layouts.reader');
            @endif
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
                          <a class=" active" href="/home">Trang chủ</a>
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
                                            {{ __('Đăng xuất') }}
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
            @include('layouts.search')
            <div>
                @yield('content')
            </div>
        </main>
    </div>
    <script type="text/javascript"  src="{{ asset('js/app.js') }}"></script>
    {{-- chart --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
