<?php

namespace App\Http\Resources\Mobile\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
class UserResource extends JsonResource
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
        $all += [ 'description' =>   $this->description ]  ;
        $all += [ 'status' =>   $this->status ]  ;
        $all += [ 'phone' =>   $this->phone ]  ;
        $all += [ 'latitude' =>   $this->latitude ]  ;
        $all += [ 'longitude' =>   $this->longitude ]  ;

        $all += [ 'image' =>  
        $this->image && Storage::disk('public')->exists( $this->image)
        ? 
        asset(Storage::url( $this->image ) )  
        : 
        null
        ]  ;
        



        return $all;
    }
}
