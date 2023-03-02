@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::user()->maquyen != 2)
        <div class="row w-2/3">
            <div class="col card-wrapper">
                <a class="card d-flex flex-row justify-content-sm-between
                 px-4 py-3 rounded-lg
                form-border form-hover"
                 data-go="giveback" href="/user/">
                    
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
                <a class="card d-flex flex-row justify-content-sm-between
                 px-4 py-3 rounded-lg
                  form-border form-hover"
                  data-go="giveback" href="/book/">
                    
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
                <div class="card">
                    <h4 class="pb-3 pt-4">Độ tuổi trung bình của độc giả</h4>
                    <canvas id="user_average_age" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="250"></canvas> 
                </div>
                </div>
            <div class="col">
                <div class="card">
                    <h4 class="pb-3 pt-4">Lượt mượn sách theo tháng</h4>
                    <canvas id="book_in_months" class="form-border form-hover rounded-lg py-3 px-2" width="300" height="250"></canvas> 
                </div>
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
    @else
        <h3>Sách được mượn nhiều trong tháng</h3>
        <div class="table-wrapper form-border form-hover mt-2">
            <table class="table">
                <thead>
                  <tr>
                      <th scope="col">Tên sách</th>
                      <th scope="col">Thể loại</th>
                      <th scope="col">Tác giả</th>
                      <th scope="col">Lượt mượn</th>
                      <th scope="col" class="code">Số lượng còn lại</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                        @foreach($data as $data)
                        <tr class="text-capitalize">
                            <td> 
                                <a href="/book/"> {{$data->tents}}</a>
                            </td>
                            <td>
                                <a href="/book/"> {{$data->theloai}}</a>
                            </td>
                            <td>
                                <a href="/book/"> {{$data->tacgia}}</a>
                            </td>
                            <td>
                                <div> 
                                    {{$data->luotmuon}}
                                </div>
                            </td>
                            <td>
                                <div> 
                                    {{$data->conlai}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
        </div>
    @endif

</div>
@endsection
