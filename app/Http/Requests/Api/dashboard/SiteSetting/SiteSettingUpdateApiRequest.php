<?php

namespace App\Http\Requests\Api\Dashboard\SiteSetting;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingUpdateApiRequest extends FormRequest
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
        $all=[];
        if ($this->id == 1) {
            $all += [ 'item'                  =>  [ 'required' ,'file','max:50000'] ]  ;
        }else{
            $all += [ 'item'                 =>  [ 'required' ,'string' ] ]  ;
        }


        return $all;
    }
}
