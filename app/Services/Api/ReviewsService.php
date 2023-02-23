<?php

namespace App\Services\Api;

use App\Http\Requests\AdvertisementsStoreRequest;
use App\Http\Requests\AdvertisementsUpdateRequest;
use App\Http\Requests\ReviewsStoreRequest;
use App\Http\Requests\ReviewsUpdateRequest;
use App\Models\Advertisement;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class ReviewsService {

    public function show($id) {
        return Review::find($id);
    }

    public function store(ReviewsStoreRequest $storeRequest) {
        $user = User::find(auth('api')->user()->id);
        $data = $storeRequest->validated();

        Review::create([
            'advertisement_id' => $data['id'],
            'user_id' => $user->id,
            'description' => $data['description'],
            'rating' => $data['rating']
        ]);

        $review_count = Review::all()->where('advertisement_id', $data['id'])
                ->count();
        $total_rating_sum = Review::all()->where('advertisement_id', $data['id'])
            ->sum('rating');
        $ad = Advertisement::find($data['id']);
        $ad->rating = $total_rating_sum / $review_count;
        $ad->save();

        return response()->json(['message' => 'Отзыв создан!']);
    }

    public function update(ReviewsUpdateRequest $updateRequest, $id) {
        $user = User::find(auth('api')->user()->id);
        $data = $updateRequest->validated();
        $review = Review::find($id);

        $review->update([
            'description' => $data['description'],
            'rating' => $data['rating']
        ]);
        return response()->json(['message' => 'Отзыв изменен!']);
    }

    public function destroy($id) {
        $user = User::find(auth('api')->user()->id);
        $review = $this->show($id);
        $review->delete();
        return response()->json(['message' => 'Отзыв удален!']);
    }
}
