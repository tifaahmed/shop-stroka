        
@extends('layout')


@section('title')
<title>
  {{Auth::guard('trainer')->user()->full_name}}
</title>
@endsection

@section('css')
<style>


    .file-upload input{
        position:absolute;
        height:400px;
        width:400px;
        left:-200px;
        top:-200px;
        background:transparent;
        opacity:0;
        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);  
    }

    
</style>
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/edit_cources.css')}}">

@endsection 
@section('content')
@include('pages.partials.header')
    <br><br><br><br><br>

<div class="container ">

    <div class=" row">
        <div class="col-md-12">
        <br>
            <h2>    اضافه / تعديل الدورات   </h2>
            <hr class="new4">
        </div> 
    </div>     
    <div class=" row">
        <style>
            table td  , table tr, table th {
                font-size:25px;border: solid;border-color: #ba4699;color: #ba4699;text-align: center;
            }

        </style>
        <table class="table" >
            <thead>
                <tr >
                    <th> قائمة الدورات</th>
                    <th>نوع الدورة </th>
                    <th>حالة الدورة</th>
                    <th>عدد المسجلين</th>
                    <th>تكلفة الدورة  </th>
                    <th>التقييم</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#myModal_create"> 
                            <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto; " class="btn-info" >
                                    اضف دورة 
                            </button> 
                        </a>                                   
                    </td>
                    <td> 
                        <select name="" id="type">
                            <option selected=" " disabled="">حدد </option>
                            <option value="1">اونلاين  </option>
                            <option value="2">داخل المركز </option>
                        </select> 
                    </td>
                    <td>
                        <select name=" " id="current_status">
                            <option selected=" " disabled="">حدد </option>
                            <option value="1">قائمة  </option>
                            <option value="2">مؤجلة  </option>
                            <option value="3">منتهية  </option>
                            <option value="4">قريبا  </option>
                        </select> 
                    </td>
                    <td>
                        <a >
                            -
                        </a>                                
                    </td>
                    <td>
                        <select name="" id="cost">
                            <option selected=" " disabled="">حدد </option>
                            <option value="1">مجانية  </option>
                            <option value="2">مدفوعه  </option>
                        </select>                         
                    </td>
                    <td>
                                             
                    </td>
                </tr>
                @foreach($courses as $val)
                <tr>
                    <td>
                        <p> <a href="" data-toggle="modal" data-target="#myModal_show{{$val->id}}" > {{$val->home_title}} </a></p>      
                        <a href="" data-toggle="modal" data-target="#myModal_edit{{$val->id}}" style="    font-size: 18px"> 
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                        <a href="{{asset('course_delete/'.$val->id)}}" style="    font-size: 18px;color: red;">
                        <i class="fa fa-trash" aria-hidden="true"></i>  </a>                                
                    </td>
                    <td> 
                        <select name="" class="type_edit{{$val->id}}">

                            <option value="{{$val->type}}" selected="" disabled=""> 
                                @if($val->type == 1)
                                    اونلاين
                                @elseif($val->type == 2)
                                داخل المركز 
                                @endif
                            </option>
                            <option value="1">   اونلاين </option>
                            <option value="2">    داخل المركز </option>
                        </select> 
                    </td>
                    <td>
                        <select name="" class="current_status_edit{{$val->id}}">

                            <option value="{{$val->current_status}}" selected="" disabled=""> 
                                @if($val->current_status == 1)
                                    قائمة
                                @elseif($val->current_status == 2)
                                    مؤجلة
                                @elseif($val->current_status == 3)
                                    منتهية
                                @elseif($val->current_status == 4)
                                    قريبا
                                @endif
                            </option>
                            <option value="1">قائمة  </option>
                            <option value="2">مؤجلة  </option>
                            <option value="3">منتهية  </option>
                            <option value="4">قريبا  </option>
                        </select> 
                    </td>
                    <td>
                        <a href="{{asset('course_sub/'.$val->id)}}">
                            <?php echo  App\Models\Courses_subs::where('course_id',$val->id)->count() ?>
                        </a>                                
                    </td>
                    <td>
                        <select name="" class="cost_edit{{$val->id}}">

                            <option value="{{$val->cost}}" selected="" disabled=""> 
                                @if($val->cost == 1)
                                    مجانية
                                @elseif($val->cost == 2)
                                    مدفوعه
                                @endif
                            </option>

                            <option value="1">مجانية  </option>
                            <option value="2">مدفوعه  </option>
                        </select>                         
                    </td>
                    <td>
                        @if($val->allow_rating == 0)
                        <a href="{{asset('course_activate/'.$val->url)}}">
                        <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto; " class="btn-info" >
                            تفعيل   
                        </button>  
                        </a> 
                        @else
                        <a href="{{asset('course_deactivate/'.$val->id)}}">
                        <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto; " class="btn-success" >
                           تم  التفعيل   
                        </button>  
                        </a> 
                        @endif                    
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <!-- modal -->
        <!-- *********************************************************** create -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <div id="myModal_create" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <form action="{{asset('course_add')}}" method="post" enctype="multipart/form-data" >  
                    {{ csrf_field() }} 
                    <input type="" name="related_id" value="{{Auth::guard('trainer')->user()->id}}" hidden>

                    <input type="" name="cost" value="" hidden>
                    <input type="" name="current_status" hidden>
                    <input type="" name="type" value="" hidden>

                    <input type="" name="url" value=""  hidden>
                    <input type="" name="home_image_one_alt" value=""  hidden>

                        <div class="modal-header" style="background-color: #ba4699;">


                            <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                            float: right;color: #fff;border: solid;border-radius: 100%;border-color: #fff!important;
                            ">   &nbsp;  &times;  &nbsp;  
                            </button>

                                                       
                                <label for="imgInpp" style ="    width: 100%;">
                                    <img id="blahh" style="cursor: pointer;margin: auto;width: 235px;height: 185px;" src="{{asset('asset_ar/img/26-010.jpg')}}" alt="">
                                </label>
                                <input class="here" id="imgInpp" name="home_image_one" type="file" />
                             

                        </div>
                        <div class="modal-body">
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-3 "  >
                                    <p style="color: #ba4699;font-size: 23px;">اسم الدورة : </p>
                                </div>
                                <div class=" col-xs-9 "  >
                                    <input style="font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="text" name="home_title" id="" placehohder="تصميم مواقع" >
                                </div>
                            </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-2 "  >
                                    <p style="color: #ba4699;font-size: 23px;"> التاريخ   : </p>
                                </div> 
                                <div class=" col-xs-10 "  >
                                    <div class=" row " style="    font-size: 20px;border: solid;border-color: #ba4699;border-radius: 10px;" >
                                        <div class=" col-xs-6 "  >
                                            <span style="    color: #ba4699;" >من /  </span>
                                            <input style="width: 160px; font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="date" name="date_start" id="" >

                                        </div>
                                        <div class=" col-xs-6 "  >
                                            <span  style="    color: #ba4699;" >   الى /</span>
                                            <input style="width: 160px; font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="date" name="date_end" id="" >
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                            <div class="row " style="    font-size: 20px;color: #ba4699;padding-right: 27px;">
                                معلومات عن الدورة
                            </div>
                            <div class="row " style="padding: 19px;padding-right: 33px;" >
                                    <textarea  style="    border: solid;border-color: #ba4699;border-radius: 10px;padding: 3px 19px;" class="form-control" name="home_subject" id="" rows="5"></textarea>
                                </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-4 "  >
                                    <p style="color: #ba4699;font-size: 23px;">عدد المسجلين   : </p>
                                </div>
                                <div class=" col-xs-8 "  >
                                    <span style="    font-size: 20px;color: #000;padding: 7px 40px;border: solid;border-color: #ba4699;border-radius: 10px;">
                                        <span style="    color: red;">0  </span>/ 
                                        <input style="    width: 50px;" type="text" name="max_sub" id="" placeholder="20">  
                                    </span>
                                </div>
                            </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-12 "  >
                                    <button type="submit" style="font-size: 25px;padding: 4px 8px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto; " class="btn-info" >
                                       حفظ    
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!-- *********************************************************** create -->

        <!-- *********************************************************** show -->
        @foreach($courses as $val)
        <div id="myModal_show{{$val->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header" style="background-color: #ba4699;">
                        <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                        float: right;
                        color: #fff;
                        border: solid;
                        border-radius: 100%;
                        border-color: #fff!important;
                        ">   &nbsp;  &times;  &nbsp;  </button>
                        @if($val->home_image_one)
                        <a href="{{asset($val->home_image_one)}}" target="blanck" style="padding: 10px 125px;">
                            <img style="cursor: pointer;margin: auto;width: 235px;height: 185px;" src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                        </a>    
                        @else
                            <img   style="cursor: pointer;margin: auto;width: 235px;height: 185px;" src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                        @endif
                    </div>
                    <div class="modal-body">
                        <div class="row " style="padding: 13px">
                            <div class=" col-xs-3 "  >
                            <p style="color: #ba4699;font-size: 23px;">اسم الدورة : </p>
                            </div>
                            <div class=" col-xs-9 "  >
                            <span style="    font-size: 20px;
                                color: #000;
                                padding: 7px 40px;
                                border: solid;
                                border-color: #ba4699;
                                border-radius: 10px;">  {{$val->home_title}}</span>
                            </div>
                        </div>
                        <div class="row " style="padding: 13px">
                            <div class=" col-xs-2 "  >
                                <p style="color: #ba4699;font-size: 23px;"> التاريخ   : </p>
                            </div> 
                            <div class=" col-xs-10 "  >
                                <div class=" row " style="    font-size: 20px;
                                        border: solid;
                                        border-color: #ba4699;
                                        border-radius: 10px;" >
                                    <div class=" col-xs-6 "  >
                                        <span style="    color: #ba4699;" >من /  </span>
                                        <span >{{$val->date_start}} </span>

                                    </div>
                                    <div class=" col-xs-6 "  >
                                        <span  style="    color: #ba4699;" >   الى /</span>
                                        <span >{{$val->date_end}}  </span>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                        <div class="row " style="    font-size: 20px;
                            color: #ba4699;
                            padding-right: 27px;">
                        معلومات عن الدورة
                        </div>
                        <div class="row " style="padding: 19px;padding-right: 33px;" >
                            <p style="    border: solid;border-color: #ba4699;border-radius: 10px;padding: 3px 19px;">   {!!$val->home_subject!!}
                            </p>
                        </div>
                        <div class="row " style="padding: 13px">
                            <div class=" col-xs-4 "  >
                            <p style="color: #ba4699;font-size: 23px;">عدد المسجلين   : </p>
                            </div>
                            <div class=" col-xs-8 "  >
                            <span style="    font-size: 20px;
                                color: #000;
                                padding: 7px 40px;
                                border: solid;
                                border-color: #ba4699;
                                border-radius: 10px;"><span style="    color: red;">{{$val->current_sub}}  </span>/  {{$val->max_sub}}  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
        <!-- *********************************************************** show -->


        <!-- ***********************************************************  edit -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        @foreach($courses as $val)
        <div id="myModal_edit{{$val->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <form action="{{asset('course_update')}}" method="post" enctype="multipart/form-data" >  
                    {{ csrf_field() }} 
                    <input type="" name="related_id" value="{{Auth::guard('trainer')->user()->id}}" hidden>
                    <input type="" name="id" value="{{$val->id}}"  hidden>
                    <input type="" name="url" value="{{$val->home_title}}-{{rand(0,999)}}"  hidden>
                    <input type="" name="home_image_one_alt" value="{{$val->home_image_one_alt}}"  hidden>

                    <input type="" name="cost" value="{{$val->cost}}" class="cost_past{{$val->id}}" hidden>
                    <input type="" name="current_status" value="{{$val->current_status}}" class="current_status_past{{$val->id}}" hidden>
                    <input type="" name="type" value="{{$val->type}}" class="type_past{{$val->id}}" hidden>

                        <div class="modal-header" style="background-color: #ba4699;">

                            <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                            float: right;color: #fff;border: solid;border-radius: 100%;border-color: #fff!important;
                            ">   &nbsp;  &times;  &nbsp;  
                            </button>

                                 <label for="imgInp{{$val->id}}" style ="    width: 100%;">
                                    @if($val->home_image_one)
                                        <img class="blah{{$val->id}}" id="blah{{$val->id}}" style="cursor: pointer;margin: auto;width: 235px;height: 185px;" src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                    @else
                                        <img class="blah{{$val->id}}" id="blah{{$val->id}}" style="cursor: pointer;margin: auto;width: 235px;height: 185px;" src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                    @endif
                                </label>
                                <input class="imgInp{{$val->id}} here" id="imgInp{{$val->id}}" name="home_image_one" type="file" value="{{$val->home_image_one}}"  />
                             

                        </div>
                        <div class="modal-body">
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-3 "  >
                                    <p style="color: #ba4699;font-size: 23px;">اسم الدورة : </p>
                                </div>
                                <div class=" col-xs-9 "  >
                                    <input style="font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="text" name="home_title" id="" placehohder="تصميم مواقع" value="{{$val->home_title}}" >
                                </div>
                            </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-2 "  >
                                    <p style="color: #ba4699;font-size: 23px;"> التاريخ   : </p>
                                </div> 
                                <div class=" col-xs-10 "  >
                                    <div class=" row " style="    font-size: 20px;border: solid;border-color: #ba4699;border-radius: 10px;" >
                                        <div class=" col-xs-6 "  >
                                            <span style="    color: #ba4699;" >من /  </span>
                                            <input style="width: 160px; font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="date" name="date_start" id="" value="{{$val->date_start}}" >

                                        </div>
                                        <div class=" col-xs-6 "  >
                                            <span  style="    color: #ba4699;" >   الى /</span>
                                            <input style="width: 160px; font-size: 20px;color: #000;border: solid;border-color: #ba4699;border-radius: 10px;" type="date" name="date_end" id="" value="{{$val->date_end}}">
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                            <div class="row " style="    font-size: 20px;color: #ba4699;padding-right: 27px;">
                                معلومات عن الدورة
                            </div>
                            <div class="row " style="padding: 19px;padding-right: 33px;" >
                                    <textarea  style="    border: solid;border-color: #ba4699;border-radius: 10px;padding: 3px 19px;" class="form-control" name="home_subject" id="" rows="5">{!!$val->home_subject!!}</textarea>
                                </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-4 "  >
                                    <p style="color: #ba4699;font-size: 23px;">عدد المسجلين   : </p>
                                </div>
                                <div class=" col-xs-8 "  >
                                    <span style="    font-size: 20px;color: #000;padding: 7px 40px;border: solid;border-color: #ba4699;border-radius: 10px;">
                                        <span style="    color: red;">{{$val->current_sub}}  </span>/ 
                                        <input style="    width: 50px;" type="text" name="max_sub" id="" placeholder="20" value="{{$val->max_sub}}">  
                                    </span>
                                </div>
                            </div>
                            <div class="row " style="padding: 13px">
                                <div class=" col-xs-12 "  >
                                    <button type="submit" style="font-size: 25px;padding: 4px 8px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto; " class="btn-info" >
                                       حفظ    
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        @endforeach
        <!-- ***********************************************************  edit -->

    </div> 
</div> 


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#blahh').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#imgInpp").change(function() {
      readURL(this);
    });
</script>
<script type="text/javascript">
    $("#cost").change(function() {
        var x=  $("#cost").val();
        $('input[name ="cost"]').val(x);
    });
    $("#type").change(function() {
        var y=  $("#type").val();
        $('input[name ="type"]').val(y);
    });
    $("#current_status").change(function() {
        var z=  $("#current_status").val();
        $('input[name ="current_status"]').val(z);
    });
</script>
<!-- ********************************update -->
@foreach($courses as $js_val)
<!-- <script type="text/javascript">
    function readURLwww(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $(".blah{{$js_val->id}}").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $(".imgInp{{$js_val->id}}").change(function() {
      readURLwww(this);
    });
</script> -->
<script>
    function previewFile(input){

    }
    $(".imgInp{{$js_val->id}}").change(function() {
        var file = $(this).get(0).files[0];
        
        if(file){
            var reader = new FileReader();
        
            reader.onload = function(){
                $(".blah{{$js_val->id}}").attr("src", reader.result);
            }
        
            reader.readAsDataURL(file);
        }    
    });
</script>
<script type="text/javascript">
    $(".cost_edit{{$js_val->id}}").change(function() {
        var x=  $(".cost_edit{{$js_val->id}}").val();
        $(".cost_past{{$js_val->id}}").val(x);
    });
    $(".type_edit{{$js_val->id}}").change(function() {
        var y=  $(".type_edit{{$js_val->id}}").val();
        $(".type_past{{$js_val->id}}").val(y);
    });
    $(".current_status_edit{{$js_val->id}}").change(function() {
        var z=  $(".current_status_edit{{$js_val->id}}").val();
        $(".current_status_past{{$js_val->id}}").val(z);
    });
</script>
 @endforeach
<!-- ********************************update -->

@include('pages.partials.footer')
@include('pages.partials.side1')

@endsection