<div class="account-nav flex-grow-1">
    <h4 class="account-nav__title">
        {{-- Navigation --}}
        التوجيهات
    </h4>
    <ul>
        <li class="account-nav__item  {{Request::segment(3) == '' ? 'account-nav__item--active' : ''}}">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/')}}">
                {{-- Dashboard --}}
                لوحه التحكم
            </a>
        </li>
        
        
    </ul>
    
</div>
