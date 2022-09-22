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


        // $translated_string_fields = [
        // ];
        // $translated_image_fields  = [];

        $string_fields = [
            'first_name',// string
            'last_name', // string / nullable

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

        // $all += resource_translated_string($model,$lang_array,$translated_string_fields);
        // $all += resource_translated_image($model,$lang_array,$translated_image_fields);

        $all += resource_string($model,$string_fields);
        $all += resource_image($model,$image_fields);

        $all += resource_date($model,$date_fields);
        
        return $all;
    }
}
