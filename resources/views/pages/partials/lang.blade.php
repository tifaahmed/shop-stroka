
               <li class="nav-item con_hed " style="">
                 <div>
                  @if( Session::get('locale') == 'ar')
                  <a   class=" nav-link nav-item lang_icon" href="{{asset('home_lang_en')}}" role="button"> {{$secound_languages->lang_full_name}}</a>
                  @else
                 <a   class=" nav-link nav-item lang_icon" href="{{asset('home_lang_ar')}}" role="button">{{$fiest_languages->lang_full_name}}</a>
                  @endif
                 </div>
               </li>
