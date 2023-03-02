<div id="search" class="mx-auto container mb-4 ">
    {{-- @if(Auth::user()->maquyen != 2) --}}
    {{-- thủ thư --}}
        {!! Form::open(['action' => 'App\Http\Controllers\UserController@index', 'method' => 'GET']) !!}
        <div class="form-border form-hover rounded-3
        row max-w-4xl">
            {{-- <input type="text" id="search" class=" col-9"> --}}
            {{form::text('search', '', [
                'class' => 'col-9', 
                'id'=> 'search', 
                'placeholder' => 'Nhập tên hoặc email độc giả..'])}}
            <select name="ma" id="search-choice" class=" col my-auto">
                <option value="ma">Mã</option>
                <option value="ten">Tên</option>
            </select>
            {{-- <button type="submit" id="search-btn" onclick="window.location={{ URL::Route('user', ['search'=>'a'])}}"  class=" col py-2.5">Tìm</button> --}}
            {{form::submit('Tìm', [
                'class' => ' btn-primary col py-2 rounded-1'])}}
        </div>
        {!! Form::close() !!}
    {{-- @else --}}

    {{-- @endif --}}
</div>
