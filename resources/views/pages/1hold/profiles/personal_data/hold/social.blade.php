<style type="text/css">
  .error{
    color: red;
  }
</style>

<div class="product-social" style="margin-bottom:30px;">

      @if($profile_info->twitter) 
      <a target="_blank" href="{{$profile_info->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a> 
      @endif

      @if($profile_info->linkedin)   
      <a target="_blank" href="{{$profile_info->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a> 
      @endif
                                                      
        @if($profile_info->facebook)
      <a target="_blank" href="{{$profile_info->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a> 
      @endif

      @if($profile_info->instagram)    
      <style type="text/css">
        
      </style> 
      <a target="_blank" href="{{$profile_info->instagram}}" class="insta"><i class="fa fa-instagram instagram"></i></a> 
      @endif

      @if($profile_info->youtube)    
      <a target="_blank" href="{{$profile_info->youtube}}" class="youtube"><i class="fa fa-youtube"></i></a>
      @endif

      @if($profile_info->google)   
      <a target="_blank" href="{{$profile_info->google}}" class="google"><i class="fa fa-google-plus"></i></a> 
      @endif

      @if($profile_info->pinterest) 
      <a target="_blank" href="{{$profile_info->pinterest}}" class="pinterest"><i class="fa fa-pinterest"></i></a> 
      @endif

      @if($profile_info->dribbble) 
      <a target="_blank" href="{{$profile_info->dribbble}}" class="dribbble"><i class="fa fa-dribbble"></i></a> 
      @endif

      @if($profile_users->phone) 
      <a href="https://api.whatsapp.com/send?phone={{$profile_users->phone}}&text=مرحبا اطلب التواصل  معك  " class="whats"><i class="fa fa-whatsapp"></i></a> 
      @endif



</div> 
      <button class="btn" data-toggle="modal" data-target="#user_social" style="margin-bottom:30px;    width: 230px;">تعديل  ايقونات التواصل الاجتماعى</button>



      <!-- Modal -->
      <div class="modal fade" id="user_social" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">   تعديل  ايقونات التواصل الاجتماعى
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </h5>
              
            </div>
            <form id="profile_update_social" class="signup-form" method="post" action="{{ asset('profile_update_social') }}" enctype="multipart/form-data">

              <div class="modal-body">
                  {{ csrf_field() }}                
                  <p class="form-input">
                   <input type="text" class="form-control" name="twitter" value="{{$profile_info->twitter}}" placeholder="لينك تويتر" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="linkedin" value="{{$profile_info->linkedin}}" placeholder="لينك لينكد ان" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="facebook" value="{{$profile_info->facebook}}" placeholder="لينك الفيس بوك" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="instagram" value="{{$profile_info->instagram}}" placeholder="لينك انستجرام" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="youtube" value="{{$profile_info->youtube}}" placeholder="لينك يوتيوب" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="google" value="{{$profile_info->google}}" placeholder="لينك جوجل" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="pinterest" value="{{$profile_info->pinterest}}" placeholder="لينك بينترست" >
                  </p>
                  <p class="form-input">
                    <input type="text" class="form-control" name="dribbble" value="{{$profile_info->dribbble}}" placeholder="لينك دريبل" >
                  </p>
              </div>
              <div class="modal-footer" style="    text-align: center;">
                <button type="submit" class="btn btn-primary">تعديل البيانات</button>
              </div>
            </form>

          </div>
        </div>
      </div>





      