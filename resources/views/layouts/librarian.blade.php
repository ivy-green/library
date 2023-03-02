<ul class="sub-nav-list list-unstyled">
    <li class="">
        <a class="" href={{ URL::route('user') }}>{{ __('Quản lý độc giả') }}</a>
    </li>   
    <li class="">
        <a class="" href="{{ URL::route('exchange') }}">{{ __('Quản lý mượn-trả sách') }}</a>
    </li>
    <li>
        <a class="" href="{{ URL::route('books') }}">{{ __('Quản lý sách') }}</a>
    </li>
    <li>
        <a class="" href="{{ URL::route('violations') }}">{{ __('Quản lý vi phạm') }}</a>
    </li>   
</ul>