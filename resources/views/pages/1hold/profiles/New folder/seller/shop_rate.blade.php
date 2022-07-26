<?php 
if( isset($shops) ){
    $rows =$shops;
}
else if(isset($buyers)){
    $rows =$buyers;

}

?>


@foreach($rows as $val)
    <style type="text/css">
        .rating{{$val->id}} span { float:right; position:relative; }
        .rating{{$val->id}} span input {
            position:absolute;
            top:0px;
            left:0px;
            opacity:0;
        }
        .rating{{$val->id}} span label {
            display:inline-block;
            width:30px;
            height:30px;
            text-align:center;
            color:#FFF;
            background:#ccc;
            font-size:30px;
            margin-right:2px;
            line-height:30px;
            border-radius:50%;
            -webkit-border-radius:50%;
        }
        .rating{{$val->id}} span:hover ~ span label,
        .rating{{$val->id}} span:hover label,
        .rating{{$val->id}} span.checked label,
        .rating{{$val->id}} span.checked ~ span label {
            background:#F90;
            color:#FFF;
        }
    </style>
@endforeach                
<?php 
if( isset($shops) ){
    $rows =$shops;
}
else if(isset($buyers)){
    $rows =$buyers;

}

?>


@foreach($rows as $val)
<?php $shop_rating = App\Models\Shop_rating::where('seller_id',$val->id)
            ->where('buyer_id',Auth::guard('seller')->user()->id)->get() ?>
<div id="Modal_rate{{$val->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ba4699;height: 111px;">
                <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                float: right;
                color: #fff;
                border: solid;
                border-radius: 100%;
                border-color: #fff!important;
                ">   &nbsp;  &times;  &nbsp;  </button>
                <p style="     padding: 23px;   color: #fff;font-size: 93px;">
                    التقييم
                </p>
            </div>
                
            <div class="modal-body">

            @foreach($shop_rating as $val2)
            <form id="shop_rating" method="post" action="{{ asset('/shop_rating') }}" enctype="multipart/form-data" >  {{ csrf_field() }} 
                <input type="" name="id" value="{{$val2->id}}" hidden="" >      
                <input type="" name="seller_id" value="{{$val->id}}" hidden="" >      


                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-8 "  >
                        <p style="color: #ba4699;font-size: 23px;">تقييمك لجودة خدمات المتجر</p>
                    </div>
                    <div class=" col-xs-4 "  >
                        <div class="rating{{$val->id}} rating_1{{$val->id}}">
                            <span class="{!! $val2->rate_one >= 5 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_one"  id="str5{{$val->id}}" value="5" 
                                {!! $val2->rate_one <= 5 ? 'checked' : ' '  !!} >
                                <label for="str5{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_one >= 4 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_one" id="str4{{$val->id}}" value="4"
                                {!! $val2->rate_one <= 4 ? 'checked' : ' '  !!} >
                                <label for="str4{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_one >= 3 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_one" id="str3{{$val->id}}" value="3"
                                {!! $val2->rate_one <= 3 ? 'checked' : ' '  !!} >
                                <label for="str3{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label></span>
                                <span class="{!! $val2->rate_one >= 2 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_one" id="str2{{$val->id}}" value="2"
                                {!! $val2->rate_one <= 2 ? 'checked' : ' '  !!} >
                                <label for="str2{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_one >= 1 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_one" id="str1{{$val->id}}" value="1"
                                {!! $val2->rate_one <= 1 ? 'checked' : ' '  !!} >
                                <label for="str1{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>

                            <br>
                        </div> 
                    </div>
                </div>

                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-8 "  >
                        <p style="color: #ba4699;font-size: 23px;">      تقييمك لدقة المواعيد   </p>
                    </div>
                    <div class=" col-xs-4 "  >
                        <div class="rating{{$val->id}} rating_2{{$val->id}}">
                            <span class="{!! $val2->rate_two >= 5 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_two" id="str5_two{{$val->id}}" value="5"
                                {!! $val2->rate_two <= 5 ? 'checked' : ' '  !!} >
                                <label for="str5_two{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_two >= 4 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_two" id="str4_two{{$val->id}}" value="4"
                                {!! $val2->rate_two <= 4 ? 'checked' : ' '  !!} >
                                <label for="str4_two{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_two >= 3 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_two" id="str3_two{{$val->id}}" value="3"
                                {!! $val2->rate_two <= 3 ? 'checked' : ' '  !!} >
                                <label for="str3_two{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label></span>
                                <span class="{!! $val2->rate_two >= 2 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_two" id="str2_two{{$val->id}}" value="2"
                                {!! $val2->rate_two <= 2 ? 'checked' : ' '  !!} >
                                <label for="str2_two{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_two >= 1 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_two" id="str1_two{{$val->id}}" value="1"
                                {!! $val2->rate_two <= 1 ? 'checked' : ' '  !!} >
                                <label for="str1_two{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <br>
                        </div> 
                    </div>
                </div>

                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-8 "  >
                        <p style="color: #ba4699;font-size: 23px;"> تقييمك  لطريقة التعامل</p>
                    </div>
                    <div class=" col-xs-4 "  >
                        <div class="rating{{$val->id}} rating_3{{$val->id}}">
                            <span class="{!! $val2->rate_three >= 5 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_three" id="str5_three{{$val->id}}" value="5"
                                {!! $val2->rate_three <= 5 ? 'checked' : ' '  !!}>
                                <label for="str5_three{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_three >= 4 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_three" id="str4_three{{$val->id}}" value="4"
                                {!! $val2->rate_three <= 4 ? 'checked' : ' '  !!}>
                                <label for="str4_three{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_three >= 3 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_three" id="str3_three{{$val->id}}" value="3"
                                {!! $val2->rate_three <= 3 ? 'checked' : ' '  !!}>
                                <label for="str3_three{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label></span>
                            <span class="{!! $val2->rate_three >= 2 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_three" id="str2_three{{$val->id}}" value="2"
                                {!! $val2->rate_three <= 2 ? 'checked' : ' '  !!}>
                                <label for="str2_three{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_three >= 1 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_three" id="str1_three{{$val->id}}" value="1"
                                {!! $val2->rate_three <= 1 ? 'checked' : ' '  !!}>
                                <label for="str1_three{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <br>
                        </div> 
                    </div>
                </div>
                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-8 "  >
                        <p style="color: #ba4699;font-size: 23px;">مدى رضاك عن  الخدمات المقدمة لك </p>
                    </div>
                    <div class=" col-xs-4 "  >
                        <div class="rating{{$val->id}} rating_4{{$val->id}}">
                            <span class="{!! $val2->rate_four >= 5 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_four" id="str5_four{{$val->id}}" value="5"
                                {!! $val2->rate_four <= 5 ? 'checked' : ' '  !!} >
                                <label for="str5_four{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_four >= 4 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_four" id="str4_four{{$val->id}}" value="4"
                                {!! $val2->rate_four <= 4 ? 'checked' : ' '  !!} >
                                <label for="str4_four{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_four >= 3 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_four" id="str3_four{{$val->id}}" value="3"
                                {!! $val2->rate_four <= 3 ? 'checked' : ' '  !!} >
                                <label for="str3_four{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_four >= 2 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_four" id="str2_four{{$val->id}}" value="2"
                                {!! $val2->rate_four <= 2 ? 'checked' : ' '  !!} >
                                <label for="str2_four{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_four >= 1 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_four" id="str1_four{{$val->id}}" value="1"
                                {!! $val2->rate_four <= 1 ? 'checked' : ' '  !!} >
                                <label for="str1_four{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <br>
                        </div> 
                    </div>
                </div>

                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-8 "  >
                        <p style="color: #ba4699;font-size: 23px;">       تقييمك لنظام منصه هابى </p>
                    </div>
                    <div class=" col-xs-4 "  >
                        <div class="rating{{$val->id}} rating_5{{$val->id}}">
                            <span class="{!! $val2->rate_five >= 5 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_five" id="str5_five{{$val->id}}" value="5"
                                {!! $val2->rate_five <= 5 ? 'checked' : ' '  !!}>
                                <label for="str5_five{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_five >= 4 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_five" id="str4_five{{$val->id}}" value="4"
                                {!! $val2->rate_five <= 4 ? 'checked' : ' '  !!}>
                                <label for="str4_five{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_five >= 3? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_five" id="str3_five{{$val->id}}" value="3"
                                {!! $val2->rate_five <= 3 ? 'checked' : ' '  !!}>
                                <label for="str3_five{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label></span>
                            <span class="{!! $val2->rate_five >= 2 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_five" id="str2_five{{$val->id}}" value="2"
                                {!! $val2->rate_five <= 2 ? 'checked' : ' '  !!}>
                                <label for="str2_five{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <span class="{!! $val2->rate_five >= 1 ? 'checked' : ' '  !!}">
                                <input type="radio" name="rate_five" id="str1_five{{$val->id}}" value="1"
                                {!! $val2->rate_five <= 1 ? 'checked' : ' '  !!}>
                                <label for="str1_five{{$val->id}}">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </label>
                            </span>
                            <br>
                            <br>
                        </div> 
                    </div>
                </div>



                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-12 "  >
                        <button type="submit" style="    font-size: 25px;padding: 5px 10px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="  btn-dark" >
                            ارسال  
                        </button>
                    </div>
                </div>


            </form>
            @endforeach


            </div>
        </div>
    </div>
</div>
@endforeach







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <?php 
if( isset($shops) ){
    $rows =$shops;
}
else if(isset($buyers)){
    $rows =$buyers;

}

?>


    @foreach($rows as $val)
    <script>
        $(document).ready(function(){
            $(".rating_1{{$val->id}} input").click(function () {
                $(".rating_1{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });


            $(".rating_2{{$val->id}} input").click(function () {
                $(".rating_2{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_3{{$val->id}} input").click(function () {
                $(".rating_3{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_4{{$val->id}} input").click(function () {
                $(".rating_4{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_5{{$val->id}} input").click(function () {
                $(".rating_5{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });


        });
    </script>
    @endforeach