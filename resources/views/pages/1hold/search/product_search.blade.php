 
<link rel="stylesheet" href="{{asset('uploads/outo_complet/jquery-typeahead/dist/jquery.typeahead.min.css')}}">

<link rel="stylesheet" href="{{asset('uploads/outo_complet/jquery-typeahead/dist/jquery.typeahead.min.js')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-typeahead/dist/jquery.typeahead.min.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="{{asset('/vendor/jquery-typeahead/dist/jquery.typeahead.min.js')}}"></script>

 <style type="text/css">
  .typeahead__result{
    margin-top: 50px!important
  }
  .typeahead__cancel-button{
    display: none;
  }
 </style>


<form id="{{$action_form}}" method="post" action="{{ asset($action_form) }}" enctype="multipart/form-data" >
         {{ csrf_field() }}      
    <div class="form-group typeahead__container" style="padding: 10px;margin: 0 auto">
        <div class=" col-lg-10  col-xs-9 ">
            <div class="form-group"> 
                <label for="" style="font-size: 30px;color: #fff;">  البحث عن الخدمات  </label>


                <input id="filter" name="filter" value=" "  placeholder="Search" hidden="" style="display: none;">
                <input id="name" type="text" class="field form-control" type="{boolean|string}" type="search" autocomplete="off"  name="name" id="s" placeholder="  {{trans('static.Enter the search word')}}" style="height: 50px;" required="">


            </div>
        </div>
        <div class="col-lg-2   col-xs-3">
            <br> <br>
            <input type="image" class="submit" src="{{asset('asset_ar/img/25-030.png')}}" alt="Submit Form" style="width: 76px;height: 100%;" />

         </div>
    </div>
</form>





 
 <script type="text/javascript">
   $( ".submit" ).on( "click", function() {
       $("{{$action_form}}").submit();
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