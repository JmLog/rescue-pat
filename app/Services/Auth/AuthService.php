<?php

namespace App\Services\Auth;

use App\Repositories\Interfaces\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    private $modelRepository;
    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->modelRepository = $repository;
    }


    public function login($request, $data, $remember): bool
    {
        if (Auth::guard('admin')->attempt($data, $remember)) {
            $request->session()->regenerate();
            return true;
        }

        return false;
    }

}
