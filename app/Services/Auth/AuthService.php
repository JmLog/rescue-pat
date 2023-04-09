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

    public function login($data, $remember): bool
    {
        if (!Auth::guard('admin')->attempt($data, $remember)) return false;
        return true;
    }


    public function register($credentials): \Illuminate\Database\Eloquent\Model
    {
        $credentials['password'] = bcrypt($credentials['password']);
        return $this->authRepository->create($credentials);
    }

}
