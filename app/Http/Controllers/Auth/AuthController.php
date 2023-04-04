<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Services\Auth\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $res = $this->authService->login($request, false);

        if($res) return redirect()->intended(route('index'));
        return redirect()->back();
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

    public function register(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function register_process(AuthRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only('email', 'password', 'name');
        $res = $this->authService->register($data);

        if($res) return redirect()->route('auth.login');
        return redirect()->route('auth.register');
    }

}
