<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\LoginRequest;
use Session;

class AuthController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * To show login page
     *
     * @return View login form
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * To Login the user
     * 
     * @param \App\Http\Requests\LoginRequest $request
     * @return redirect()
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if ($this->authInterface->login($credentials)) {
            return redirect()
                ->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->with('error', 'Oppes! You have entered invalid credentials');
    }

    /**
     * To logout the user
     *
     * @return redirect()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
