<?php

namespace App\Services\Auth;

use App\Repositories\Eloquent\Auth\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    private $authRepository;
    public function __construct(AuthRepository $repository)
    {
        $this->authRepository = $repository;
    }

    public function login($request, $remember): bool
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($data, $remember)) {
            $request->session()->regenerate();
            return true;
        }

        return false;
    }

    public function register($credentials)
    {
//        $credentials['password'] = bcrypt($credentials['password']);
        return $this->authRepository->create($credentials);
    }

}
