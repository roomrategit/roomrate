<?php

namespace App\Services\Auth;

use App\Http\Requests\LoginRequest;

class LoginService extends TokenIssueService
{
    public function login(LoginRequest $request) {
        $data = $request->validated();
        return $this->generateLoginTokens($data);
    }
}
