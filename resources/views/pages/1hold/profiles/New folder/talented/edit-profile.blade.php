        
@extends('layout')


@section('title')
<title>
  {{Auth::guard('talented')->user()->full_name}}
</title>
@endsection
@section('meta')

    <meta name="keywords" content="{{Auth::guard('talented')->user()->full_name}}">

    <meta property="title"  content="{{Auth::guard('talented')->user()->full_name}}"/>
    <meta property="og:title"  content="{{Auth::guard('talented')->user()->full_name}}"/>
    <meta name="twitter:title" content="{{Auth::guard('talented')->user()->full_name}}" />

    <meta name="description" content="{{Auth::guard('talented')->user()->description}}" />
    <meta property="og:description" content="{{Auth::guard('talented')->user()->description}}" />
    <meta name="twitter:description" content="{{Auth::guard('talented')->user()->description}}" />

    <meta name="twitter:image" content="{{asset(Auth::guard('talented')->user()->avatar)}}" />
    <meta property="og:image"     content="{{asset(Auth::guard('talented')->user()->avatar)}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection 

@section('css')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/talanted-edit-profile.css')}}">
@endsection 

@section('content')
@include('pages.partials.header')

    <br><br><br><br><br>

    <div class="container container2">
        <div class="">
            <div class="row">

                <div class="col-lg-4 col-md-12"  >
                    <br><br><br><br><br><br><br>
                    <div class="new4 row">
                        <div class="module col-lg-12 col-md-12"  >

                            @if(Auth::guard('talented')->user()->avatar)
                            <img class="img_profile  margin_img radios_image lozad" title="{{Auth::guard('talented')->user()->full_name}}"  data-src="{{asset(Auth::guard('talented')->user()->avatar)}}" alt="{{Auth::guard('talented')->user()->full_name}}">
                            @else
                            <img class="img_profile  margin_img radios_image lozad"    data-src="{{asset('asset_ar/img/17-06.jpg')}}" >
                            @endif

                            <div  class="image-upload puls_link margin_img">

                           

                            <form action="{{asset('profile_talented_update_avatar')}}" method="post" enctype="multipart/form-data" >  
                                {{ csrf_field() }}      
                                <label for="avatar" style ="    width: 100%;">
                                    <img style ="cursor: pointer;" class="  puls w30 radios_image  w30 lozad" data-src="{{asset('asset_ar/img/21-08.png')}}" alt="">  
                                </label>
                                <input id="avatar" type="file" class="form-control here" name="avatar" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg">
                            </form>    





                            </div>

                            @if(Auth::guard('talented')->user()->handicap)
                            <br>
                            <img class="handy w50  margin_img radios_image lozad"  data-src="{{asset('asset_ar/img/17-04.jpg')}}" alt="">
                            @endif

                            <br>
                           <div class="new4">
                               <div class="module"> {{Auth::guard('talented')->user()->full_name}} </div>
                            </div> 
                            <br>
                            <div class="new4">
                               <div class="module"> {{Auth::guard('talented')->user()->birth}} </div>
                            </div> 
                            <br>
                            <div class="new4">
                               <div class="module"> {{Auth::guard('talented')->user()->address}}  </div>
                            </div> 
                            <br>
                            <div class="new4">
                               <div class="module">  
                                <?php       
                                    $selected_talent = App\Models\Talent::find(Auth::guard('talented')->user()->talent);
                                ?> 
                                    {{ $selected_talent->home_title }}   
                                </div>
                            </div> 
                            <br>                         
                        </div> 
                    </div>  

                </div> 
                <form  method="post" action="{{ asset('profile_talented_update_description') }}" enctype="multipart/form-data" >  
                {{ csrf_field() }}  
                    <div class="col-lg-8 col-md-12"  >
                        <br><br><br><br>
                        <h2>   ‏  أكمل بياناتك الشخصية‏    </h2>
                        <hr class='new4'>   
                        <p class="fild_title">نبذة عن المشترك</p> <br>

                        <div class="new4  ">
                             <textarea class="module  h_about " name="description" id="" cols="" rows="3">
                            {!! Auth::guard('talented')->user()->description !!}

                             </textarea>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12" style="direction: ltr;" >
                            <button class=" btn-info btn-lg" style="padding: 4px 16px;">حفظ</button>
                    </div> 
                </form>    



            </div> 


            <br> 
                    
            <div class="row " >
                
                <div class="  col-xs-2"   style=" z-index: 2;">
                    <img class="side_image lozad" data-src="{{asset('asset_ar/img/17-022.png')}}" alt="">
                </div> 

                <div class="side_text  col-xs-10"  >
                    <h3>
                        <b>للمشاركة في المنافسة</b> : 
                    </h3> 
                 </div> 
            </div> 


            <div class="row new4">
                <div class="module col-lg-12 col-md-12 col-sm-12"  >

                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:center;" >
                        <a href="{{asset('test/'.$test)}}" class="">
                            <img class="talent margin_img radios_image lozad" data-src="{{asset('asset_ar/img/17-02.jpg')}}" alt="">
                            <h4>تقدم لاختبار الموهوبين</h4> 
                        </a>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:center;" >
                        <a href="{{asset('learn/'.$learn->url)}}" class="">
                            <img class="talent margin_img radios_image lozad" data-src="{{asset('asset_ar/img/17-03.jpg')}}" alt="">
                            <h4>     تعلم كيف تبدأ معنا </h4> 
                        </a>
                    </div>
                                            <?php
                        $competition = App\Models\Competition::where('running',1)->first();
                        $star = Auth::guard('talented')->user()->star;
                        $talented_videos = App\Models\Talented_videos::
                        where( 'uploader_id',Auth::guard('talented')->user()->id )
                        ->whereDate('updated_at','>',$competition->competition_start)
                        ->whereDate('updated_at','<',$competition->competition_end)
                        ->count();
                        

                         ?>
                         @if(
                             $star == ' ' && $talented_videos <=0 || 
                             $star == 1   && $talented_videos <=1 ||
                             $star == 2   && $talented_videos <=3 ||
                             $star == 3 && $talented_videos <=10  
                         )

                    <form id="talent_video_url" action="{{ asset('talent_video_url') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}                        
                        <div class="  col-xs-10"  >
                        <br><br><br>
                            <fieldset>
                                <div class="form-group">
                                    <label>أرفق نموذج موهبتك ( فيديو ) لتحصل على تقييم اللجنة</label> <br>
                                    <input type="url" name="url" type="text"  placeholder="رابط للفديو من google drive "  required="">
                                </div>
                            </fieldset>
                        </div> 
                        <div class="  col-xs-2">
                        <br><br><br><br>
                            <button type="submit" class=" btn-info btn-lg">ارسال</button>
                        </div>
                    </form>
                    @endif

                        <!-- *********************************** -->
                    @if(
                        $star == ' ' && $talented_videos <=0 || 
                        $star == 1   && $talented_videos <=1 ||
                        $star == 2   && $talented_videos <=3 ||
                        $star == 3 && $talented_videos <=10  
                    )
                    <div class="col-lg-12 col-xs-12"  >
                                    أرفق نموذج موهبتك ( فيديو ) لتحصل على تقييم اللجنة   <br>
                    </div> 
                    <div class="col-lg-12 col-xs-12 ">
                        
                        <button class=" btn-info btn-lg btn-block"  data-toggle="modal" data-target="#myModal">   ارفاق الفديو الى اليوتيوب  مباشرتاً</button>
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تحمل  الفديو  للوتيوب</h4>
                              </div>
                              <div class="modal-body">
                                <p>لكل موهوب محاوله    رفع ملف واحد  يوميا</p>

                                <form id="video" action="{{ asset('video') }}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                    <input type="text" name="title" placeholder="عنوان الفديو" />
                                    <br><br> 
                                    <textarea style="width: 100%" name="description" rows="2" placeholder="المواصفات"></textarea>
                                    <br><br> 
                                    <input type="file" name="video" />
                                    <br><br> 

                                   
                                    <button type="submit" class="btn-info btn-lg btn-block">بدء رفع الفديو</button>
                                    <span>
                                        يجب ان تنتظر  حتى يتم   ارفاق الملف   ويظهر اشعار باكتمال التحميل 
                                    </span><br>
                                    <span>لكل موهوب محاوله واحده فى اليوم</span><br>
                                    <span>يسمح بمساحه محدده للفديو  ويفضل  تقليل الجودة</span><br>
                                    <span>  هناك عدد محدد لمرات التحميل للموقع اذا لم تنجح حاول اليوم التالى  </span><br>
                                    <span>  عندما يتم التحميل بنجاح لليوتيوب الامر يستغرق على الاقل ساعتين ليتم التهيئه للعرض</span><br>


                                </form>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>


            <br><br>

            
            <div class="row " >
                
                <div class="  col-xs-2"   style=" z-index: 2;">
                    <img class="side_image radios_image" src="{{asset('asset_ar/img/17-044.jpg')}}" alt="">
                </div> 

                <div class="side_text  col-xs-10" style="    margin-top: 38px;"  >
                    <h3>
                        <b>  للاستفادة من مركز تدريب ‏ Habby  </b> : 
                    </h3> 
                 </div> 
            </div> 

            <div class="row new4">
                <div class="module col-lg-12 col-md-12 col-sm-12"  >


                    <form id="talented_trainer_talent" action="{{ asset('talented_trainer_talent') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}                        
                        <div class="col-lg-10 col-md-10"  >
                        <br><br><br>
                            <fieldset>
                                <div class="form-group">
                                    <label> اختر مجال التدريب الذي ترغب فى الحصول عليه </label> <br>
                                    <select name="trainer_talent" id="">
                                        <?php       
                                            $selected_talent = App\Models\Talent::find(Auth::guard('talented')->user()->trainer_talent);
                                        ?> 
                                        @if($selected_talent)
                                            <option value="{{Auth::guard('talented')->user()->trainer_talent}}" selected="" disabled=""> 
                                             {{ $selected_talent->home_title }}
                                            </option>
                                         @endif 
                                        @foreach($talent as $key => $val)
                                            <option value="{{$val->id}}">  {{ $val->home_title }}</option>
                                        @endforeach
                                       
                                    </select>                                
                                </div>
                            </fieldset>
                        </div> 
                        <div class="col-lg-2 col-md-2">
                        <br><br><br><br>
                            <button class=" btn-info btn-lg">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>

            <br><br>

<!--             <div class="row " >
                
                <div class="  col-xs-2"   style=" z-index: 2;">
                    <img class="side_image radios_image" src="{{asset('asset_ar/img/21-14.png')}}" alt="">
                </div> 

                <div class="side_text  col-xs-10"  >
                    <h3>
                        <b>  للاشتراك في متجر ‏Habby   </b> : 
                    </h3> 
                 </div> 
            </div>  -->

            <!-- <div class="row new4"> -->
                <div class="module col-lg-12 col-md-12 col-sm-12"  >
                    <div class=" col-xs-12" style="text-align: center;" >
                        <a href="{{asset('out_and_register')}}">
                            <img  style="    margin: auto;width: 100px;" src="{{asset('asset_ar/img/21-14.png')}}" alt="">
                             <h3 style="text-align: center;">
                                <b>  للاشتراك في متجر ‏  Habby   </b>  
                            </h3> 
                        </a>
                     </div> 
                </div>
            <!-- </div> -->


<!-- color: #fff;
    background-color: black;
    width: 10%;

 -->

 
             
        </div>  
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@include('pages.partials.footer')
@include('pages.partials.side1')
@include('vendor.flashy.message')

<script type="text/javascript">
    $("#avatar").change(function() {
         this.form.submit();
    });
</script>

@endsection

