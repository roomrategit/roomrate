<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait Findable {

    public function byEmail($email) {
        return User::where('email', $email)->first();
    }

    public function byPhone($phone_number) {
        return User::where('phone_number', $phone_number)->first();
    }
}
