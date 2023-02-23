<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $all_reviews = Review::all()->where('advertisement_id', $this->id);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'gallery' => $this->getPhotosArrayAttribute($this->gallery),
            'rating' => $this->rating,
            'reviews' => ReviewsResource::collection($all_reviews),
        ];
    }
}
