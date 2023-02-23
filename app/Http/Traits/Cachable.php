<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait Cachable {

    public function putCachedData($data) {
        $key = Str::random(15);
        Cache::put($key,$data);
        return $key;
    }

    public function getCachedData($key) {
        return Cache::get($key);
    }

    public function deleteCachedData($key) {
        Cache::forget($key);
    }
}
