<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Services\Auth\AuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $res = $this->authService->login($data, false);

        if(!$res) {
            return redirect()->back();
        } else {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }
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

    public function register_process(AuthRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validated = $request->validated();
            $data = $request->only('email', 'password', 'name');
            $res = $this->authService->register($data);

            if ($res) return responseData('200', $data, '회원가입에 성공하였습니다.');
            return responseData('400', $data, '회원가입에 실패하였습니다.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return responseData($e->status, $request->all(), $e->getMessage());
        }
    }

}
