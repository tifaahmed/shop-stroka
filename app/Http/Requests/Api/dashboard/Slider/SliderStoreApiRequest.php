<?php

namespace App\Http\Requests\Api\dashboard\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // 'title1', //nullable
        // 'subject1',//nullable

        // 'desktop_image',//nullable
        // 'mobile_image',//nullable

        // 'url1',//nullable
        // 'button1'//nullable
        
        $lang_array =['ar','en'];
        
        $all=[];

        foreach ($lang_array as $key => $value) {
            $all += [ 'title1_'.$value                 =>  [ 'sometimes' ,'max:255' ] ]  ;
            $all += [ 'subject1_'.$value               =>  [ 'sometimes' ,'max:255' ] ]  ;
    
            $all += [ 'desktop_image_'.$value          =>  [ 'required' ,'max:50000'] ]  ;
            $all += [ 'mobile_image_'.$value           =>  [ 'required' ,'max:50000'] ]  ;
    
            $all += [ 'url1_'.$value                   =>  [ 'sometimes' ,'url' ] ]  ;
            $all += [ 'button1_'.$value                =>  [ 'sometimes' ,'max:255' ] ]  ;
        }


        return $all;
    }
}
