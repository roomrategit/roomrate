<?php

namespace App\Http\Resources;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsResource extends JsonResource
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
            'id' => $this->id,
            'user' => new ProfileResource(User::find($this->user_id)),
            'description' => $this->description,
            'rating' => $this->rating
        ];
    }
}
