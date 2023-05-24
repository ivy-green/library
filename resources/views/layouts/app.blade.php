<!DOCTYPE html>
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

    {{-- bootstrap 5 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- css --}}
    @stack('css')

    {{-- links --}}
    @push('css')
        {{-- <link rel="stylesheet" href="path to your css"> --}}
    @endpush
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" rel="stylesheet">   
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>
<body>
    <div id="app" class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div id="curr-user" class="d-flex flex-row gap-3  px-md-3 py-3">
                <a href={{ URL::route('user.show', Auth::user()->id) }}
                     class="user-img d-inline-block h-25 w-25 rounded-pill bg-white overflow-hidden
                     border border-spacing-2 border-black">
                    <img src="{{ asset('uploads/users/default.jpg') }}" class="w-100 " alt="">
                </a>
                <div class="user-info flex flex-col ml-3 mt-2">
                    <div class="name">Tên: 
                        @if( is_null(auth()->user()->ten))
                            {{ __('Chưa đăng nhập') }}
                        @else
                            {{ auth()->user()->ten }}
                        @endif
                    </div>
                    <div class="id text-xs  ">ID: 
                        @if( is_null(auth()->user()->ten))
                            {{ __('') }}
                        @else
                            {{ auth()->user()->id }}
                        @endif
                    </div>
                </div>
                <a href="/user/{{ Auth::user()->id }}/edit" class="edit-user ml-auto mt-2">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            <div class="">
                {{-- <img src={{ asset('uploads/general/logo_truong.png') }} alt=""> --}}
            </div>
            <div class="sidebar-header">
                <div class="sidebar-header-sub ">
                    <h3>
                        {{-- return Quyen Truy Cap (chuc vu) --}}
                        <?php 
                            use App\Models\Access;

                            $user = auth()->user();
                            $access = Auth::guard('access')->user();
                            // $accesses = $user->accesses->tenquyen;
                            //không hiểu tại sao nhưng mà 1 là độc giả còn 0 là thủ thư (không giống trong database)
                            echo Access::all()[$user->maquyen - 1]->tenquyen;
                            ?>
                    </h3>
                </div>
            </div>
            {{-- side nav tùy vào Role của User --}}
            {{-- @if(auth()->user()->maquyen == 3)
                @include('layouts.admin')
            @elseif(auth()->user()->maquyen == 1)
                @include('layouts.librarian')
            @elseif(auth()->user()->maquyen == 2)
                @include('layouts.reader')
            @endif --}}
            @include('layouts.side-nav')

        </nav>
        <main class="py-4 active" id="content">
            <div class="title d-flex flex-row">
                <h2></h2>
                <div class="logout ms-auto my-auto">
                    <div class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->ten }}
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
                    </div>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    <button type="button" id="sidebarCollapse" 
                    class=" text-white py-2 px-4 rounded-3 form-border btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Danh mục</span>
                    </button>
                </div>
                <div class="col-10">
                    @include('layouts.search')
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
            <div id="yield" class="">
                @yield('content')
            </div>
        </main>
    </div>
    <a href="#" class="float back-to-top hidden">
        <i class="fa-solid fa-arrow-up my-float"></i>
    </a>
    <script type="text/javascript"  src="{{ asset('js/app.js') }}"></script>
    {{-- chart --}}
    <script type="module" src="{{ asset('js/chart.js') }}"></script>
</body>
</html>
