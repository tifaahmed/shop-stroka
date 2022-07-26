 
<span class="fixed_three_columns_test_{{$rand}}">


</span>
<input type="" name="" hidden="" value="1" class="fixed_three_columns_target_{{$rand}}">


<script type="text/javascript">
   $(function(){
        $(window).scroll(function(){
          var aTop = $('.vedio_slider').height();

          var x = $('.fixed_three_columns_target_{{$rand}}').val();
             var column_one_order            = "{{$column_one_order}}";
             var column_one_limit          = "{{$column_one_limit}}";
             var column_one_title          = "{{$column_one_title}}";

             var column_two_order     = "{{$column_two_order}}";
             var column_two_limit          = "{{$column_two_limit}}";
             var column_two_title          = "{{$column_two_title}}";

             var column_three_order     = "{{$column_three_order}}";
             var column_three_limit          = "{{$column_three_limit}}";
             var column_three_title          = "{{$column_three_title}}";

 

            if($(this).scrollTop()>=aTop){
                if(x == 1){
                    $.ajax({
                          type:'GET',
                          data:{
                            'column_one_order':column_one_order,
                            'column_one_limit':column_one_limit,
                            'column_one_title':column_one_title,

                            'column_two_order':column_two_order,
                            'column_two_limit':column_two_limit,
                            'column_two_title':column_two_title,

                            'column_three_order':column_three_order,
                            'column_three_limit':column_three_limit,
                            'column_three_title':column_three_title,

                          } ,
                          url: "{{asset('here_fixed_three_columns')}}",
                          success: function(data) {
                             $(".fixed_three_columns_test_{{$rand}}").html(data);
                          }
                    });
                    var x = $(".fixed_three_columns_target_{{$rand}}").val(0);
                }

            }
   
        });
    });
</script>
