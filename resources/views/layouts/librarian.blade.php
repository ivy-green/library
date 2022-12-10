<ul class="nav-list list-unstyled components">
    <li class="">
        <a class="txt-primary openSubNav" href={{ URL::route('user') }}>{{ __('Quản lý độc giả') }}</a>
    </li>   
    <li class="">
        <a class="txt-primary openSubNav" href="{{ URL::route('exchange') }}">{{ __('Quản lý mượn-trả sách') }}</a>
    </li>
    <li>
        <a class="txt-primary openSubNav" href="{{ URL::route('books') }}">{{ __('Quản lý sách') }}</a>
    </li>
    <li>
        <a class="txt-primary openSubNav" href="{{ URL::route('violations') }}">{{ __('Quản lý vi phạm') }}</a>
    </li>   
</ul>