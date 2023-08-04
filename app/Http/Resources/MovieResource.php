<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return[
        'id'=>$this->id,
        'title'=>$this->title,
        'description'=>$this->description,
        'genre'=>$this->genre,
        'publishAt'=>$this->publish_at,
        'directorId'=>$this->director_id
        ];
    }
}
