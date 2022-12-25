<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\AuthServiceInterface;

/**
 * Service class for authentication.
 */
class AuthService implements AuthServiceInterface
{
    /**
     * To Login the user
     * 
     * @param array $user input value
     * @return bool loggedin or not
     */
    public function login($user)
    {
        return Auth::attempt($user);
    }
}
