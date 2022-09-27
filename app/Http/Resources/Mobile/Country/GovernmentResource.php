<?php

namespace App\Http\Resources\Mobile\Country;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use App\Http\Resources\Mobile\Country\CityResource;

class GovernmentResource extends JsonResource
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
        $all += [ 'name' =>   $this->name ]  ;

        $all += [ 'cities' =>  CityResource::collection($this->cities) ]  ;

        return $all;
    }
}
