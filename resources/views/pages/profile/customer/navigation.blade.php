<div class="account-nav flex-grow-1">
    <h4 class="account-nav__title">
        {{-- Navigation --}}
        التوجيهات
    </h4>
    <ul>
        <li class="account-nav__item  {{Request::segment(4) == '' ? 'account-nav__item--active' : ''}}">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/')}}">
                {{-- Dashboard --}}
                لوحه التحكم
            </a>
        </li>
        <li class="account-nav__item {{Request::segment(4) == 'edit' ? 'account-nav__item--active' : ''}}">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/edit')}}">
                {{-- Edit Profile --}}
                تعديل معلومات الحساب 
            </a>
        </li>
        <li class="account-nav__item {{Request::segment(4) == 'recieve-orders' ? 'account-nav__item--active' : ''}}">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/received-order')}}">  
                {{-- Order History --}}
                سجلات الطلبات
            </a>
        </li>
        <li class="account-nav__item {{Request::segment(4) == 'address' ? 'account-nav__item--active' : ''}} ">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/address')}}">  
                {{-- Addresses --}}
                العناوين
            </a>
        </li>

        <li class="account-nav__item {{Request::segment(4) == 'edit-password' ? 'account-nav__item--active' : ''}}">
            <a href="{{asset(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3).'/edit-password')}}">  
                {{-- Password --}}
                تعديل الرقم السري
            </a>
        </li>
        
    </ul>
    
</div>
