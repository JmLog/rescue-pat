<?php

namespace Tests\Feature\auth;

use App\Models\User;
use App\Repositories\Eloquent\Auth\AuthRepository;
use App\Services\Auth\AuthService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;

class AuthServiceTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    /**
     * 로그인 성공 로직
     * @test
     * @return void
     */
    public function 로그인_성공(): void
    {
        $user = [
            'email' => 'test@gmail.com',
            'password' => 'Test1234!',
        ];

        $res = $this->app->make('App\Services\Auth\AuthService')->login($user, false);
        $this->assertTrue($res);
    }

    /**
     * 회원가입 성공 로직
     * @test
     * @return void
     */
    public function 회원가입_성공(): void
    {
        $credentials = [
            'email' => 'test2@gmail.com',
            'password' => 'Test1234!',
            'name' => '백지민'
        ];

        $res = $this->app->make('App\Services\Auth\AuthService')->register($credentials);
        $this->assertNotNull($res);
        $this->assertDatabaseHas('users', [
            'email' => 'test2@gmail.com',
        ]);
    }
}
