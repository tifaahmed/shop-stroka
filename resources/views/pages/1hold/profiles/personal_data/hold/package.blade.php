    

    <h3 style="margin-bottom:20px;color:#009440;font-size:22px;">{{$val->title}}</h3>
    <ul class="list-group" style="text-align: right;">
      <li class="list-group-item"><strong>عنوان الباقة : </strong><span>{{$val->title}}</span></li>
      <li class="list-group-item">
        <strong>عدد ايام الصلاحية: </strong>
        <span>{!! $val->days !!}</span>
      </li>
      
      <li class="list-group-item">
        <strong>عدد المنتجات المسموح بيها : </strong>
        <span>{{$val->num_products}} منتج</span>
      </li>
      <li class="list-group-item"><strong>بداية الاشتراك :</strong><span>{{$val->date_start}}</span></li>
      <li class="list-group-item"><strong>نهاية الاشتراك : </strong><span>{{$val->date_end}}</span></li>
      <li class="list-group-item">
        <strong>وصف الباقات : </strong>
        <span>{!! $val->des !!}</span>
      </li>
    </ul>

