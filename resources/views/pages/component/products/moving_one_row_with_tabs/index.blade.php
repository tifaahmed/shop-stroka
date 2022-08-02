<span class="test_{{$rand}}">
        <!-- include('pages.component.products.moving_one_row_with_tabs_items') -->
</span>
<input type="" name="" hidden="" value="1" class="target_{{$rand}}">

<script type="text/javascript">
   $(function(){
        $(window).scroll(function(){
          var aTop = $('.vedio_slider').height();

            var x = $('.target_{{$rand}}').val();
            var order_type     = "{{$order_type}}";
            var product_in_row = "{{$product_in_row}}";
            var limit          = "{{$limit}}";
            var title          = "{{$title}}";
            var cat_id         = "all";

            if($(this).scrollTop()>=aTop){
                if(x == 1){
                    $.ajax({
                        type:'GET',
                        data:{
                            'order_type':order_type,
                            'product_in_row':product_in_row,
                            'limit':limit,
                            'title':title,
                            'cat_id':cat_id
                        } ,
                        url: "{{asset('here_moving_one_row_with_tabs')}}",
                        success: function(data) {
                            $(".test_{{$rand}}").html(data);
                        }
                    });
                    var x = $(".target_{{$rand}}").val(0);
                }
            }
        });
    });
</script>