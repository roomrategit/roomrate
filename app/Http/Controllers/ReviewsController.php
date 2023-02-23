<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsStoreRequest;
use App\Http\Requests\ReviewsUpdateRequest;
use App\Http\Resources\ReviewsResource;
use App\Models\Review;
use App\Services\Api\ReviewsService;
use Illuminate\Http\Client\Request;

class ReviewsController extends Controller
{
    private ReviewsService $reviewsService;

    public function __construct(ReviewsService $reviewsService)
    {
        $this->reviewsService = $reviewsService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReviewsStoreRequest $storeRequest)
    {
        return $this->reviewsService->store($storeRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReviewsUpdateRequest $updateRequest, $id)
    {
        return $this->reviewsService->update($updateRequest, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->reviewsService->destroy($id);
    }


}
