<?php

namespace App\Http\Resources\dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $all=[];
        $translated_string_fields = [
            'title', 
            'page_url','page_tab_title','page_title','page_description','page_keywords'
        ];
        $image_fields  = ['image'];
        $date_fields   = ['created_at','updated_at','deleted_at'];

        $lang_array = config('app.lang_array') ;

        $all += [ 'id' => $this->id ]  ;

        foreach ($translated_string_fields as $translated_string_field) {
            $temp_string_arr = [];
            foreach ($lang_array as $lang) {
                $temp_string_arr += [$lang=>  $this->getTranslation($translated_string_field, $lang)];
            }
            $all += [ $translated_string_field => $temp_string_arr];
        }

        foreach ($image_fields as $image_field) {
            $all += [   
                $image_field=>  
                    Storage::disk('public')->exists( $this->$image_field) 
                        ? 
                    asset( Storage::url( $this->$image_field ) )  
                        : 
                    null
            ];
        }

        foreach ($date_fields as $date_field) {
            $all += [$date_field=>  $this->$date_field ?   $this->$date_field->format('d/m/Y') : null ];
        }

        return $all;

    }
}
