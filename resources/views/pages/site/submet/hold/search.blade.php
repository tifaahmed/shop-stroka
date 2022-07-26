<link rel="stylesheet" href="{{asset('uploads/outo_complet/jquery-typeahead/dist/jquery.typeahead.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('uploads/outo_complet/jquery-typeahead/dist/jquery.typeahead.min.js')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-typeahead/dist/jquery.typeahead.min.css')}}">
<script src="{{asset('/vendor/jquery-typeahead/dist/jquery.typeahead.min.js')}}"></script>

 <style type="text/css">
  .typeahead__result{
    margin-top: 50px!important
  }
  .typeahead__cancel-button{
    display: none;
  }
 </style>


 <form id="searchform" action="{{ asset('search_form') }}" method="post"  >     {{ csrf_field() }}     
 <!-- <div class="typeahead__container  typeahead__field"> -->

   <div class="typeahead__container  ">

     <!-- <input id="name" name="name" class="form-control news_letter z1 name" placeholder="Search" type="{boolean|string}" type="search"  autocomplete="off"> -->

         <input id="filter" name="filter" value=""  placeholder="Search" hidden="" style="display: none;">

          <input id="name" type="text" class="field" type="{boolean|string}" type="search" autocomplete="off"  name="name" id="s" placeholder="  {{trans('static.Enter the search word')}}">

          <input type="submit" class="submit" value=" {{trans('static.search')}}">
     </div>                             
  </form> 

<!-- <form id="{{$action_form}}" method="post" action="{{ asset($action_form) }}" enctype="multipart/form-data" >
         {{ csrf_field() }}      
    <div class="form-group typeahead__container" style="padding: 10px;margin: 0 auto">
        <div class=" col-lg-10  col-xs-9 ">
            <div class="form-group"> 
                <label for="" style="font-size: 30px;color: #fff;">  البحث عن الخدمات  </label>

                <input id="name" type="text" class="field form-control" type="{boolean|string}" type="search" autocomplete="off"  name="name" id="s" placeholder="  {{trans('static.Enter the search word')}}" style="height: 50px;">


                <input id="filter" name="filter" value=" "  placeholder="Search" hidden="" style="display: none;">

            </div>
        </div>
        <div class="col-lg-2   col-xs-3">
            <br> <br>
            <input type="image" class="submit" src="{{asset('asset_ar/img/25-030.png')}}" alt="Submit Form" style="width: 76px;height: 100%;" />

         </div>
    </div>
</form> -->

   
  <br>
 
 <script type="text/javascript">
   $( ".submit" ).on( "click", function() {
       $("#searchform").submit();
   });
   $(document).ready(function() {
      var actionURL = "{{ url($action_autocomplete) }}";
     $.typeahead({
       input: '#name',
       hint: true,
       display: ["{{ $field }}"],  
       source: {
         url: actionURL  
       },
       callback: {
         onClickAfter:  function (name, process) {
           return $.get(route, { name: name  }, function (data) {
             return process(data);
           });
         }
       }
     });
   });
 </script> 

                          <!-- include('pages.submet.search', ['action_autocomplete' => 'service_search_autocomplete' , 'field'=> 'home_title' ,'filter'=> 'service'  ]) -->
