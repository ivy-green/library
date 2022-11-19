@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-2/3">
        <div class="col card-wrapper">
            <a class="card d-flex flex-row justify-between px-4 py-3 rounded-lg form-border form-hover" data-go="giveback" href="/user/">
                
                <div class="mt-3 align-content-center
                ">
                    <h4 class="">
                        Độc giả
                    </h4>
                    <div class="users-total">
                        22
                    </div>
                    
                </div>
                <div class="">
                    <i class="fa-solid fa-users"></i>
                </div>
            </a>
        </div>
        <div class="col card-wrapper">
            <a class="card d-flex flex-row justify-between px-4 py-3 rounded-lg form-border form-hover" data-go="giveback" href="/book/">
                
                <div class="mt-3 align-content-center
                ">
                    <h4 class="">
                        Sách
                    </h4>
                    <div class="users-total">
                        22
                    </div>
                    
                </div>
                <div class="ic ic_book">
                        
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h4 class="pb-3 pt-4">Độ tuổi trung bình của độc giả</h4>
            <canvas id="user_average_age" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="400"></canvas> 
        </div>
        <div class="col">
            <h4 class="pb-3 pt-4">Lượt mượn sách theo tháng</h4>
            <canvas id="book_in_months" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="400"></canvas> 
        </div>
    </div>
    
    <script>
        // var monthCount = {!! json_encode($monthCount) !!};
        var monthCount = Object.values(@json($monthCount));

        var age_data = @json($ageAverage);
        var gender_data = @json($genderChart);

        // var age_data = {!! json_encode($ageAverage) !!};
        // var gender_data = {!! json_encode($genderChart) !!};
    </script>
</div>
@endsection
