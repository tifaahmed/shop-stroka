<?php

namespace App\Http\Resources\Mobile\ProductItem;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
class ProductItemResource extends JsonResource
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
        $all += [ 'status' =>   $this->status ]  ;
        $all += [ 'price' =>   $this->price ]  ;
        $all += [ 'discount' =>   $this->discount ]  ;
        $all += [ 'description' =>   $this->description ]  ;
        $all += [ 'image' =>   check_image($this->image)]  ;
   

        // $all += [ 'store' =>   new StoreResource ($this->store) ]  ;
        // $all += [ 'product_category' => new  ProductCategoryResource($this->product_category) ]  ;

        return $all;
    }
}
