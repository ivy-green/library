<div id="search" class="mx-auto container mb-5 ">
    @if(Auth::user()->maquyen != 2)
    {{-- thủ thư --}}
        {!! Form::open(['action' => 'App\Http\Controllers\UserController@index', 'method' => 'GET']) !!}
        <div class="form-border form-hover rounded-lg row max-w-4xl">
            {{-- <input type="text" id="search" class=" col-9"> --}}
            {{form::text('search', '', ['class' => 'col-9', 'id'=> 'search', 'placeholder' => 'Nhập tên hoặc email độc giả..'])}}
            <select name="ma" id="search-choice" class=" col">
                <option value="ma">Mã</option>
                <option value="ten">Tên</option>
            </select>
            {{-- <button type="submit" id="search-btn" onclick="window.location={{ URL::Route('user', ['search'=>'a'])}}"  class=" col py-2.5">Tìm</button> --}}
            {{form::submit('Tìm', ['class' => 'btn btn-primary col py-2.5'])}}
        </div>
        {!! Form::close() !!}
    @else
        {!! Form::open(['action' => 'App\Http\Controllers\BooksController@index', 'method' => 'GET']) !!}
        <div class="form-border form-hover rounded-lg row max-w-4xl">
            {{-- <input type="text" id="search" class=" col-9"> --}}
            {{form::text('search', '', ['class' => 'col-9', 'id'=> 'search', 'placeholder' => 'Nhập tên tựa sách..'])}}
            <select name="ma" id="search-choice" class=" col">
                <option value="ma">Mã</option>
                <option value="ten">Tên</option>
            </select>
            {{-- <button type="submit" id="search-btn" onclick="window.location={{ URL::Route('user', ['search'=>'a'])}}"  class=" col py-2.5">Tìm</button> --}}
            {{form::submit('Tìm', ['class' => 'btn btn-primary col py-2.5'])}}
        </div>
        {!! Form::close() !!}
    @endif
</div>
