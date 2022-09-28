<?php

namespace App\Http\Resources\dashboard\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $model = $this;
        $lang_array = config('app.lang_array') ;

        $string_fields = [
            'first_name',// string
            'last_name', // string / nullable
            'login_type',  // enum / 'google','facebook','normal; / default: normal
            'email', // string / unique
            'password', // string
            'gender',   // enum / 'girl','boy' / default: boy
            'phone',    // string  / nullable
            'birthdate', //  date  / nullable
            'email_verified_at',  // date   / nullable
            'pin_code', // integer / nullable / unique

            'fcm_token', // string / nullable 
            'latitude', // string / nullable
            'longitude', // string / nullable
        ];
        

 

        $image_fields  = [
            'avatar'
        ];

        $date_fields   = ['created_at','updated_at','deleted_at'];


        $all=[];

        $all += [ 'id' =>   $this->id ]  ;
        // $all += [ 'product_sub_categories' =>   ProductSubCategoryResource::collection($this->product_sub_categories) ]  ;

        $all += resource_string($model,$string_fields);
        $all += resource_image($model,$image_fields);

        $all += resource_date($model,$date_fields);
        
        return $all;
    }
}
