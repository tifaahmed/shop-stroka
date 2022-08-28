<?php
if (!function_exists('translated_string')) {

   function resource_translated_string($model,$lang_array,$translated_string_fields)
   {
        $all=[];

        foreach ($translated_string_fields as $translated_string_field) {
            $temp_string_arr = [];
            foreach ($lang_array as $lang) {
                $temp_string_arr += [$lang=>  $model->getTranslation($translated_string_field, $lang)];
            }
            $all += [ $translated_string_field => $temp_string_arr];
        }
        return $all;
    }
    function resource_translated_image($model,$lang_array,$translated_image_fields)
    {
        $all=[];
        foreach ($translated_image_fields as $translated_image_field) {
            $temp_file_arr = [];
            foreach ($lang_array as $lang) {
                $temp_file_arr += [
                    $lang=>  
                        $model->getTranslation($translated_image_field, $lang)
                            &&
                        Storage::disk('public')->exists( $model->getTranslation($translated_image_field, $lang) ) 
                            ? 
                        asset(Storage::url( $model->getTranslation($translated_image_field, $lang)  ) )  
                            : 
                        null
                ];
            }
            $all += [ $translated_image_field => $temp_file_arr];
        }
        return $all;

    }
    function resource_string($model,$string_fields)
    {
        $all=[];
        foreach ($string_fields as $string_field) {
            $all += [   
                $string_field=>  
                     $model->$string_field 
            ];
        }
        return $all;
    }

    function resource_image($model,$image_fields)
    {
        $all=[];
        foreach ($image_fields as $image_field) {
            $all += [   
                $image_field=>  
                    $model->$image_field
                        &&
                    Storage::disk('public')->exists( $model->$image_field) 
                        ? 
                    asset( Storage::url( $model->$image_field ) )  
                        : 
                    null
            ];
        }
        return $all;
    }
    function resource_date($model,$date_fields)
    {
        $all=[];
        foreach ($date_fields as $date_field) {
            $all += [$date_field=>  $model->$date_field ?   $model->$date_field->format('d/m/Y') : null ];
        }
        return $all;
    }
    



}