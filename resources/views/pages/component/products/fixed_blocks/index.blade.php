<span class="test_{{$rand}}">
 
</span>
<input type="" name="" hidden="" value="1" class="target_{{$rand}}">


<script type="text/javascript">
   $(function(){
        $(window).scroll(function(){
          var aTop = $('.vedio_slider').height();

          var x = $('.target_{{$rand}}').val();
             var order_type     = "{{$order_type}}";
             var limit          = "{{$limit}}";
             var title          = "{{$title}}";
             var items          = "{{$items}}";

            if($(this).scrollTop()>=aTop){
                if(x == 1){
                    $.ajax({
                          type:'GET',
                          data:{'order_type':order_type,'limit':limit,'title':title,'items':items} ,
                          url: "{{asset('here_fixed_blocks')}}",
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

<!--                'categories_count' => $categories_count,
              'products_count' => $products_count, -->