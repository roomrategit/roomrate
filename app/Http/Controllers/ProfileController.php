<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Services\Auth\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function get(Request $request) {
        return new ProfileResource($this->profileService->get($request));
    }

    public function changePassword(ChangePasswordRequest $request) {
        return $this->profileService->changePassword($request);
    }

    public function put(ChangeProfileRequest $request) {
        return $this->profileService->put($request);
    }

    public function delete(Request $request) {
        return $this->profileService->delete($request);
    }

    public function logout(Request $request) {
        return $this->profileService->logout($request);
    }
}
