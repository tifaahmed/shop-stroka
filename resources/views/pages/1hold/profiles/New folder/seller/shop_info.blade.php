<?php 
if( isset($shops) ){
    $rows =$shops;
}
else if(isset($buyers)){
    $rows =$buyers;

}

?>


@foreach($rows as $val)
 

<?php 

if( isset($shops) ){
$poduct_buy = App\Models\Poduct_buy::where('seller_id',$val->id)
            ->where('buyer_id',Auth::guard('seller')->user()->id)->first() ;

        }
else if(isset($buyers)){
$poduct_buy = App\Models\Poduct_buy::where('buyer_id',$val->id)
            ->where('seller_id',Auth::guard('seller')->user()->id)->first() ;
}




?>
 
<div id="Modal_info{{$val->id}}" class="modal fade" role="dialog">
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
                    المعلومات
                </p>
            </div>
            <div class="modal-body">
                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-3 "  >
                        <p style="color: #ba4699;font-size: 23px;">العنوان  : </p>
                    </div>
                    <div class=" col-xs-9 "  >
                        <p style="color: #ba4699;font-size: 23px;">{!! $poduct_buy->title !!}</p>
                    </div>
                </div>
                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-3 "  >
                        <p style="color: #ba4699;font-size: 23px;">الموضوع   : </p>
                    </div>
                    <div class=" col-xs-9 "  >
                        <p style="color: #ba4699;font-size: 23px;">{!! $poduct_buy->subject !!}</p>
                    </div>
                </div>
                <div class="row " style="padding: 13px;text-align: right;">
                    <div class=" col-xs-3 "  >
                        <p style="color: #ba4699;font-size: 23px;">  الموقع  : </p>
                    </div>
                    <div class=" col-xs-9 "  >
                        <p style="color: #ba4699;font-size: 23px;">{!! $poduct_buy->adress !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

