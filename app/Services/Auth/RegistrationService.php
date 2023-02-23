<?php

namespace App\Services\Auth;

use App\Http\Requests\RegistrationRequest;
use App\Http\Traits\Hashable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class RegistrationService extends TokenIssueService
{
    use Hashable;

    public function createUser($data) {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => $this->hashPassword($data['password'])
        ]);
    }

    public function register(RegistrationRequest $request) {
        $data = $request->validated();
        $user = $this->createUser($data);
        return $this->generateRegistrationTokens($user);
    }
}
