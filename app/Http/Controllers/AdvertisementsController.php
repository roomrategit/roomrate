<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertisementsStoreRequest;
use App\Http\Requests\AdvertisementsUpdateRequest;
use App\Http\Resources\AdvertisementsResource;
use App\Services\Api\AdvertisementsService;
use Illuminate\Http\Client\Request;

class AdvertisementsController extends Controller
{
    private AdvertisementsService $advertisementsService;

    public function __construct(AdvertisementsService $advertisementsService)
    {
        $this->advertisementsService = $advertisementsService;
    }


    public function index()
    {
        return AdvertisementsResource::collection($this->advertisementsService->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdvertisementsStoreRequest $storeRequest)
    {
        return $this->advertisementsService->store($storeRequest);
    }


    public function show($id)
    {
        return new AdvertisementsResource($this->advertisementsService->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdvertisementsUpdateRequest $updateRequest, $id)
    {
        return $this->advertisementsService->update($updateRequest, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->advertisementsService->destroy($id);
    }


}
