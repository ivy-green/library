<ul class="nav-list list-unstyled components">
    <li class="">
        <a class="txt-primary openSubNav" href={{ URL::route('books') }}>{{ __('Danh mục sách') }}</a>
    </li>   
    <li class="">
        <a class="txt-primary openSubNav" href={{ URL::route('signborrow.create', ['parent' => 'exchange']) }}>{{ __('Đăng ký mượn sách') }}</a>
    </li>
    <li>
        <a class="txt-primary openSubNav" href={{ URL::route('borrow') }}>{{ __('Lịch sử mượn sách') }}</a>
    </li>
    {{-- <li>
        <a class="txt-primary openSubNav" href="{{ URL::route('violations') }}">{{ __('Liên hệ') }}</a>
    </li>    --}}
</ul>