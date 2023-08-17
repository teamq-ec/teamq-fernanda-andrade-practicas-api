<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
        'id'=>$this->id,
        'deadlineAt'=>$this->deadline_at,
        'returnDateAt'=>$this->return_date_at,
        'actualDateAt'=>$this->actual_date_at,
        'userId'=>$this->user_id,
           'createdAt'=>$this->created_at->format('d/M, Y'),
        ];
    }
}
