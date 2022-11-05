@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row w-2/3">
        <div class="col card-wrapper">
            <a class="card d-flex flex-row justify-between px-4 py-3 rounded-lg form-border form-hover" data-go="giveback" href="/exchange/giveback/">
                
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
            <a class="card d-flex flex-row justify-between px-4 py-3 rounded-lg form-border form-hover" data-go="giveback" href="/exchange/giveback/">
                
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
    <div id="userChart">
    </div>
      
</div>
@endsection
