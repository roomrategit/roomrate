<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService) {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request) {
        return $this->loginService->login($request);
    }
}
