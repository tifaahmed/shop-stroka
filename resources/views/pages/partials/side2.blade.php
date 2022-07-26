<!-- <div class="icon-bar-social">
 <?php $social   = App\Models\Social::find(1);
?>
                            

    @if($social->twitter) 
    <a href="{{$social->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a> 
    @endif
               
	@if($social->linkedin)   
	<a href="{{$social->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a> 
	@endif
                                                  
    @if($social->facebook)
	<a href="{{$social->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a> 
	@endif

	@if($social->instagram)     
	<a href="{{$social->instagram}}" class="insta"><i class="fa fa-instagram"></i></a> 
	@endif

	@if($social->youtube)    
	<a href="{{$social->youtube}}" class="youtube"><i class="fa fa-youtube"></i></a>
	@endif

	@if($social->google)   
	<a href="{{$social->google}}" class="google"><i class="fa fa-google-plus"></i></a> 
	@endif

	@if($social->pinterest) 
	<a href="{{$social->pinterest}}" class="pinterest"><i class="fa fa-pinterest"></i></a> 
	@endif




<form id="product_search" method="post" action="{{ asset('product_search') }}" enctype="multipart/form-data" >
         {{ csrf_field() }}  

	<span class="searchicon">
		<i class="fa fa-search search"></i>
		<input type="text" name="name" class="in-search" placeholder="البحث ...">
	</span>
 
</form>
</div>
 -->