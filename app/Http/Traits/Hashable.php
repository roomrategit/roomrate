<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Hash;

trait Hashable {

    public function hashPassword($string) {
        return Hash::make($string);
    }
}
