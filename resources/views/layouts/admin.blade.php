<ul class="nav-list list-unstyled components">
    <li class="">
        <a class="txt-primary openSubNav" href="/user">{{ __('Quản lý người dùng') }}</a>
        
    </li>   
    {{-- <li class="">
        <a class="txt-primary openSubNav" href="/accesses">{{ __('Quản lý quyền truy cập') }}</a>
        
    </li> --}}
    <li>
        <a  class="txt-primary openSubNav" href="{{ URL::route('report') }}">{{ __('Quản lý báo cáo') }}</a>
        
    </li>   
    <li>
        <a class="txt-primary openSubNav" href="/rules">{{ __('Quản lý quy định') }}</a>
        
    </li>   
</ul>