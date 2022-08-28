<?php

namespace App\Http\Requests\Api\Dashboard\Slider;

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
        $lang_array = config('app.lang_array') ;
        
        $all=[];

        foreach ($lang_array as $key => $value) {
            $all += [ 'title1.'.$value                 =>  [ 'sometimes' ,'max:255' ] ]  ;
            $all += [ 'subject1.'.$value               =>  [ 'sometimes' ,'max:255' ] ]  ;
    
            $all += [ 'desktop_image.'.$value          =>  [ 'required' ,'max:50000'] ]  ;
            $all += [ 'mobile_image.'.$value           =>  [ 'required' ,'max:50000'] ]  ;
    
            $all += [ 'url1.'.$value                   =>  [ 'sometimes' ,'url' ] ]  ;
            $all += [ 'button1.'.$value                =>  [ 'sometimes' ,'max:255' ] ]  ;

        }
        return $all;
    }
}
