<?php

namespace App\Services\Api;

use App\Http\Requests\AdvertisementsStoreRequest;
use App\Http\Requests\AdvertisementsUpdateRequest;
use App\Http\Requests\AdvertisementsIndexRequest;
use App\Http\Traits\Imagable;
use App\Models\Advertisement;
use App\Models\Advertisement_filters;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementsService {

    use Imagable;

    public function index(AdvertisementsIndexRequest $storeRequest) {

        $data = $storeRequest->validated();

        $filtersArray = explode( ',', $data['filters']); 

        return Advertisement::whereHas('filters_value', function ($query) use ($filtersArray) {

                $query->whereIn('advertisement_filters.filter_values_id', $filtersArray);
                
              },  count($filtersArray) )->get();            

    }

    public function show($id) {
        return Advertisement::find($id);
    }

    public function store(AdvertisementsStoreRequest $storeRequest) {
        $organizer = User::find(auth('api')->user()->id);
        $data = $storeRequest->validated();

        $advertisement = Advertisement::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'gallery' => 'null',
            'rating' => $data['rating']
        ]);

        $img_lst = [];
        foreach ($data['gallery'] as $img) {
              $img_lst[] = Storage::disk('public')->putFile('gallery', $img);
        //    $file = $this->fromBase64($img['img']);
        //    Storage::disk('public')->putFileAs('', $file, sprintf('%d.', $advertisement->id).$file->hashName());
        //    $img_lst[] = sprintf('%d.', $advertisement->id).$file->hashName();
        }

        $advertisement->update([
            'gallery' => json_encode($img_lst)
        ]);

        foreach( $data['filters'] as $filter ){

            Advertisement_filters::create([

                'advertisement_id' => $advertisement->id,
                'filter_values_id' => $filter
            ]);
        }

        return response()->json(['message' => 'Объявление создано!']);
    }

    public function update(AdvertisementsUpdateRequest $updateRequest, $id) {
        $organizer = User::find(auth('api')->user()->id);
        $data = $updateRequest->validated();
        $advertisement = Advertisement::find($id);

        $str_id = sprintf('%d.', $id);
        $files = Storage::files('public'); // Replace this with the path to your directory within the public folder

        foreach ($files as $file) {
            if (strpos($file, $str_id) !== false) {
                Storage::delete($file);
            }
        }

        $img_lst = [];
        foreach ($data['gallery'] as $img) {
            $file = $this->fromBase64($img['img']);
            Storage::disk('public')->putFileAs('', $file, sprintf('%d.', $id).$file->hashName());
            $img_lst[] = sprintf('%d.', $id).$file->hashName();
        }

        $advertisement->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'gallery' => json_encode($img_lst),
            'rating' => $data['rating']
        ]);
        return response()->json(['message' => 'Объявление изменено!']);
    }

    public function destroy($id) {
        $user = User::find(auth('api')->user()->id);
        $advertisement = $this->show($id);
        $advertisement->delete();
        return response()->json(['message' => 'Объявление удалено!']);
    }

}
