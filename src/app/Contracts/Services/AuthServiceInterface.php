<?php

namespace App\Contracts\Services;

/**
 * Interface for authentication service.
 */
interface AuthServiceInterface
{
    /**
     * To Login the user
     * 
     * @param array $user input value
     * @return bool loggedin or not
     */
    public function login($user);
}
