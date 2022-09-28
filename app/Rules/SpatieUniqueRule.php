<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SpatieUniqueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $model;
    public $column;
    public $lang;
    public $id;
    
    public function __construct($model,$column,$lang,$id = null)
    {
        $this->model = $model;
        $this->column = $column;
        $this->lang = $lang;  
        $this->id = $id;  
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $model_all = $this->model->whereNot('id',$this->id)->get();
        foreach ($model_all as $key => $model_val) {
            if ($model_val->getTranslation( $this->column, $this->lang ) == $value ) {
                return  0 ;
            }
        }
        return  1 ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'The :attribute must be Unique.';
        return trans('validation.unique');

    }
}
