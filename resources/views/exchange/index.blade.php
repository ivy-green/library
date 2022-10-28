@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col card-wrapper">
                <a class="card px-4 py-4 rounded-lg form-border form-hover" data-go="signborrow" href="/exchange/signborrow/">
                    <div class="card-title">
                        Đăng ký mượn sách
                    </div>
                </a>
            </div>
            <div class="col card-wrapper">
                <a class="card px-4 py-4 rounded-lg form-border form-hover" data-go="borrow" href="/exchange/borrow/">
                    <div class="card-title">
                        Mượn sách
                    </div>
                </a>
            </div>
            <div class="col card-wrapper">
                <a class="card px-4 py-4 rounded-lg form-border form-hover" data-go="giveback" href="/exchange/giveback/">
                    <div class="card-title">
                        Trả sách
                    </div>
                </a>
            </div>
        </div>
        {{-- <script>
            $(document).ready(function(){
                $('.card').on('click', function() {
                    var href = $(this).attr('data-go');
                    window.location.href = {{ route('exchange.'.href) }};
                }); 
            });
        </script> --}}
    </div>

@endsection