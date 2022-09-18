<?php

namespace App\Http\Resources\Mobile\ProductCategory;

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

        $all += [ 'id' =>   $this->id ]  ;
        $all += [ 'title' =>   $this->title ]  ;


        return $all;
    }
}
