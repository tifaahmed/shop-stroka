<?php

namespace App\Http\Resources\dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class sliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $translated_string_fields = ['title1','subject1','url1','button1'];
        $translated_image_fields  = ['desktop_image','mobile_image'];
        $date_fields              = ['created_at','updated_at'];

        $lang_array = config('app.lang_array') ;

        $all=[];
        $all += [ 'id' => $this->id ]  ;

        foreach ($translated_string_fields as $translated_string_field) {
            $temp_string_arr = [];
            foreach ($lang_array as $lang) {
                $temp_string_arr += [$lang=>  $this->getTranslation($translated_string_field, $lang)];
            }
            $all += [ $translated_string_field => $temp_string_arr];
        }

        foreach ($translated_image_fields as $translated_image_field) {
            $temp_file_arr = [];
            foreach ($lang_array as $lang) {
                $temp_file_arr += [
                    $lang=>  
                        Storage::disk('public')->exists( $this->getTranslation($translated_image_field, $lang) ) 
                            ? 
                        asset(Storage::url( $this->getTranslation($translated_image_field, $lang)  ) )  
                            : 
                        null
                ];
            }
            $all += [ $translated_image_field => $temp_file_arr];
        }

        foreach ($date_fields as $date_field) {
            $all += [$date_field=>  $this->$date_field ?   $this->$date_field->format('d/m/Y') : null ];
        }

        return $all;

    }
}
