<!-- Modal -->
<div class="modal fade" id="editproduct{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="editproduct{{$val->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editproduct">تعديل المنتج</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_product" method="post" class="signup-form" action="{{ asset('/edit_product') }}" enctype="multipart/form-data" style="padding-top: 0px;" >
        {{ csrf_field() }}
        <div class="modal-body">
          <input  name="user_id" value="{{Auth::guard('profile_users')->user()->id}}" hidden="">
          <input  name="id" value="{{$val->id}}" hidden="">
          <p class="form-input" style="    padding-bottom: 17px;">
            <span class="wpcf7-form-control-wrap" >
              <label for="cat">تحديد القسم</label>
              <select style="width: 100%;" name="product_category_id"  id="cat" class="wpcf7-form-control">
                @foreach($product_categories as $category_val)
                @if($val->product_category_id == $category_val->id)
                <option value=" {{$category_val->id}}" selected=""> {{$category_val->home_title}}</option> 
                @else
                <option value=" {{$category_val->id}}"> {{$category_val->home_title}}</option> 
                @endif
                @endforeach   
              </select>
            </span>
          </p>

          <p class="form-input">
            <label>العنوان</label>
            <input type="text" name="home_title" class="form-control" placeholder="اسم المنتج" value="{{$val->home_title}}" required>
          </p>
                
          <p class="form-input">
            <label>السعر</label>
            <input type="text" class="form-control" name="price" placeholder="السعر" value="{{$val->price}}" required>
          </p>


          <p class="form-input"> 
            <label>الجملة التعريفيه</label>           
            <textarea  id="home_subject" name="home_subject" class="wpcf7-form-control" style="height: 80px;width: 100%" rows="2"  placeholder="جملة تعريفية للمنتج مكونه من 10 ل 15 كلمة">
              {{$val->home_subject}}
            </textarea>
          </p>
          <p>
            <span class="wpcf7-form-control-wrap">
              <label for="subject"> وصف المنتج</label>
              @include('pages.texteditor.summernote', [
                'value'=>$val->home_subject,
                'name' => 'subject',
                'placeholder'=>'جملة تعريفية للمنتج مكونه من 10 ل 15 كلمة  ' 
              ])
            </span>
          </p>

          <?php
            $x1='blah1'.$val->id;
            $x2='blah2'.$val->id;
            $x3='blah3'.$val->id;
            $x4='blah4'.$val->id;
           ?>
          <div class=" col-sm-6">
            <span class="wpcf7-form-control-wrap">
              <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
              <label for="image_one{{$val->id}}" style ="    width: 100%;">
                  <img id="{{$x1}}" class="lozad" data-src="{{ $val->image_one ? asset($val->image_one) : asset('img/upload.jpg') }}"   alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}"  style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
              </label>
              <input style="display: none;" id="image_one{{$val->id}}" type="file" class="form-control here" name="image_one" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('{{$x1}}').src = window.URL.createObjectURL(this.files[0])">
            </span>
          </div>
          <div class="col-sm-6">
            <span class="wpcf7-form-control-wrap">
              <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
              <label for="image_two{{$val->id}}" style ="    width: 100%;">
                  <img id="{{$x2}}"  class="lozad"  data-src="{{ $val->image_two ? asset($val->image_two) : asset('img/upload.jpg') }}"   alt="{{$val->image_two_alt}}" title="{{$val->image_two_alt}}" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
              </label>
              <input style="display: none;" id="image_two{{$val->id}}" type="file" class="form-control here" name="image_two" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('{{$x2}}').src = window.URL.createObjectURL(this.files[0])">
            </span>
          </div>
          <div class=" col-sm-6">
            <span class="wpcf7-form-control-wrap">
              <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
              <label for="image_three{{$val->id}}" style ="    width: 100%;">
                <img id="{{$x3}}"  class="lozad" data-src="{{ $val->image_three ? asset($val->image_three) : asset('img/upload.jpg') }}" alt="{{$val->image_three_alt}}" title="{{$val->image_three_alt}}" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
              </label>
              <input style="display: none;" id="image_three{{$val->id}}" type="file" class="form-control here" name="image_three" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('{{$x3}}').src = window.URL.createObjectURL(this.files[0])">
            </span>
          </div>

          <div class=" col-sm-6">
            <span class="wpcf7-form-control-wrap">
              <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
              <label for="image_four{{$val->id}}" style ="    width: 100%;">
                <img id="{{$x4}}"  class="lozad" data-src="{{ $val->image_four ? asset($val->image_four) : asset('img/upload.jpg') }}" alt="{{$val->image_four_alt}}" title="{{$val->image_four_alt}}" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
              </label>
              <input style="display: none;" id="image_four{{$val->id}}" type="file" class="form-control here" name="image_four" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('{{$x4}}').src = window.URL.createObjectURL(this.files[0])">
            </span>
          </div>


          <p>
            <div class="col-md-6 ">
              <br>
              <span class="wpcf7-form-control-wrap">
                <label for="search">الموضوع البحثى    <br> (لذياده فرص  ظهورك   فى محركات البحث )</label>
                <textarea style="height: 80px;width: 100%;" rows="2"  id="search-word" name="description" class="wpcf7-form-control"placeholder="   متجر  السعاده   طبق يسمى كذا  ضمن نوعيه الحلويات الممتازه">{{$val->description}}</textarea>

              </span>
            </div>

            <div class="col-md-6">
              <br>
              <span class="wpcf7-form-control-wrap">
                <label for="search-word">الكلمات البحثية  <br> (لذياده فرص  ظهورك   فى محركات البحث )</label>
                <textarea style="height: 80px;width: 100%;" rows="2"  id="search-word" name="keywords" class="wpcf7-form-control"  placeholder="   متجر السعادة , طبق حلوى ممتاز , قسم الحلويات , توصيل الطلبات للمنازل ">{{$val->keywords}}</textarea>
              </span>
            </div>
          </p>

        
        </div>
        <div class="modal-footer">            <br>
          <p class="choose-table-form" style="text-align: center;"> 
            <br>
            <button type="submit" class="btn btn-primary" style="    background: #ee7b2a;border-color: #ee7b2a;color: #fff;">تعديل البيانات</button>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
 

  jQuery(function ($) {

    $('#edit_product').validate({
      rules: {
        home_title:    {required: true},
        home_subject:    {required: true},
        image_one:    {required: true},
        price:    {required: true},
      },
    }); 
  });
  

 
</script> 

@if(\Session::get('locale') == 'ar')

  <script type="text/javascript">
    (function( factory ) {
      if ( typeof define === "function" && define.amd ) {
        define( ["jquery", "../jquery.validate"], factory );
      } else if (typeof module === "object" && module.exports) {
        module.exports = factory( require( "jquery" ) );
      } else {
        factory( jQuery );
      }
    }(function( $ ) {

    /*
     * Translated default messages for the jQuery validation plugin.
     * Locale: AR (Arabic; العربية)
     */
    $.extend( $.validator.messages, {
      required: "هذا الحقل إلزامي",
      remote: "موجود بالفعل",
      email: "رجاء إدخال عنوان بريد إلكتروني صحيح",
      url: "رجاء إدخال عنوان موقع إلكتروني صحيح",
      date: "رجاء إدخال تاريخ صحيح",
      dateISO: "رجاء إدخال تاريخ صحيح (ISO)",
      number: "رجاء إدخال عدد بطريقة صحيحة",
      digits: "رجاء إدخال أرقام فقط",
      creditcard: "رجاء إدخال رقم بطاقة ائتمان صحيح",
      equalTo: "رجاء إدخال نفس القيمة",
      extension: "رجاء إدخال ملف بامتداد موافق عليه",
      maxlength: $.validator.format( "الحد الأقصى لعدد الحروف هو {0}" ),
      minlength: $.validator.format( "الحد الأدنى لعدد الحروف هو {0}" ),
      rangelength: $.validator.format( "عدد الحروف يجب أن يكون بين {0} و {1}" ),
      range: $.validator.format( "رجاء إدخال عدد قيمته بين {0} و {1}" ),
      max: $.validator.format( "رجاء إدخال عدد أقل من أو يساوي {0}" ),
      min: $.validator.format( "رجاء إدخال عدد أكبر من أو يساوي {0}" )
    } );
    return $;
    }));
  </script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      nationalMode: false,
      placeholderNumberType:"MOBILE",
      separateDialCode:false,
      initialCountry:"pa",
      formatOnDisplay:true,
      geoIpLookup:'ar',
      localizedCountries: { 'ar': 'Palestine','ar': 'palestine', },
      utilsScript: "{{asset('/uploads/phone/build/js/utils.js')}}",
      onlyCountries: ['eg', 'pa', 'ps', 'uk', 'ly' ,'SD'  , 'IQ' , 'QA', 'SA' ,'PS'],
    });
  </script>
@endif 



