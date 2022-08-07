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
        
        $all=[];
        $string_fields = ['title1','subject1','url1','button1'];
        $image_fields  = ['desktop_image','mobile_image'];
        $date_fields   = ['created_at','updated_at'];

        $lang_array = config('app.lang_array') ;

        $all += [ 'id' => $this->id ]  ;

        foreach ($string_fields as $key1 => $value1) {
            $fake = [];
            foreach ($lang_array as $key2 => $value2) {
                $fake += [$value2=>  $this->getTranslation($value1, $value2)];
            }
            $all += [ $value1 => $fake];
        }

        foreach ($image_fields as $key1 => $value1) {
            $fake = [];
            foreach ($lang_array as $key2 => $value2) {
                $fake += [
                    $value2=>  
                        Storage::disk('public')->exists( $this->getTranslation($value1, $value2) ) 
                            ? 
                        asset(Storage::url( $this->getTranslation($value1, $value2)  ) )  
                            : 
                        null
                ];
            }
            $all += [ $value1 => $fake];
        }

        foreach ($date_fields as $key1 => $value1) {
            $all += [$value1=>  $this->$value1 ?   $this->$value1->format('d/m/Y') : null ];
        }

        return $all;

    }
}
