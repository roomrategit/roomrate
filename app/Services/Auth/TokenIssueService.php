<?php

namespace App\Services\Auth;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use function auth;
use function response;

abstract class TokenIssueService {

    private function setTokenTimeToLive() {
        $token_validity = 24*60;
        auth('api')->factory()->setTTL($token_validity);
    }

    public function generateRegistrationTokens(User $user) {
        auth()->login($user);
        $this->setTokenTimeToLive();

        $access = JWTAuth::fromUser($user);
        $refresh = JWTAuth::fromUser($user);

        return $this->issueTokens($access,$refresh);
    }

    public function generateLoginTokens($credentials) {
        $this->setTokenTimeToLive();

        $access = auth('api')->attempt($credentials);
        $refresh = auth('api')->attempt($credentials);

        if (empty($access)) {
            return response()->json(['error' => 'Неверно введены пароль, почта или телефон']);
        }
        return $this->issueTokens($access,$refresh);
    }

    private function issueTokens($access, $refresh) {
        return response()->json([
            'access_token' => $access,
            'refresh_token' => $refresh,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL()
        ]);
    }
}
