@extends('layouts.app')

@section('content')
    @include('inc.message')
    @if(Auth::user()->maquyen != 2)
        <div class="row mb-4">
            <div class="col card-wrapper">
                <a class="card px-4 py-4 rounded-lg form-border form-hover" href="{{ URL::Route('borrow', ['parent'=>'exchange']) }}">
                    <h5 class="">
                        Danh mục phiếu mượn trả sách
                    </h5>
                </a>
            </div>
            <div class="col card-wrapper">
                <a class="card px-4 py-4 rounded-lg form-border form-hover" href={{ URL::Route('signborrow', ['parent'=>'exchange']) }}>
                    <h5 class="">
                        Phiếu Đăng Ký Mượn Sách
                    </h5>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <h4 class="pb-3 pt-4">Lượt vi phạm trên lượt mượn trả</h4>
                    <canvas id="violate_on_borow" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="400"></canvas> 
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h4 class="pb-3 pt-4">Lượt mượn sách theo tháng</h4>
                    <canvas id="book_in_months" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="400"></canvas> 
                </div>
            </div>
        </div>

        <script>
            var monthCount = Object.values(@json($monthCount));
            var violateCount = Object.values(@json($violateCount));
        </script>
    @else
        
    @endif
@endsection 