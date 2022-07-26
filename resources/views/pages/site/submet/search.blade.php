<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


 <div class="site-header__search">
     <div class="search search--location--header ">
         <div class="search__body">
             <form class="search__form" method="get" action=" {{ route('products_search', app()->getLocale() ) }}" enctype="multipart/form-data" >      {{ csrf_field() }}       
   
                 <select class="search__categories" aria-label="Category" name="search__categories">
                     <option value="all">{{trans('static.all categories')}}</option>
                     @foreach($product_categories as $val_cat)
                         <option value="{{$val_cat->id}}">{{$val_cat->home_title}}</option>
                     @endforeach   
                 </select>
                 <input class="search__input typeahead" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                 <button class="search__button search__button--type--submit" type="submit">
                     <svg width="20px" height="20px">
                         <use xlink:href="{{asset('images/sprite.svg#search-20')}}"></use>
                     </svg>
                 </button>
                 <div class="search__border"></div>
             </form>
             <div class="search__suggestions suggestions suggestions--location--header"></div>
         </div>
     </div>
 </div>

 
    
 

 
  @include('pages.submet.search_script')
