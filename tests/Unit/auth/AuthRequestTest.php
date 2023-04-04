<?php

namespace Tests\Unit\auth;

use App\Http\Requests\auth\AuthRequest;
use App\Models\User;
use App\Repositories\Eloquent\Auth\AuthRepository;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Validator;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class AuthRequestTest extends TestCase
{
    /** @test */
    public function 이메일_모든조건_충족()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'Test1234!'
        ];
        $res = $this->getValidate($data);
        $this->assertFalse($res);
    }

    /** @test */
    public function 이메일_없음()
    {
        $data = [
            'email' => '',
            'password' => 'Test1234!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 이메일_골뱅이_없음()
    {
        $data = [
            'email' => 'test.com',
            'password' => 'Test1234!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 이메일_점_없음()
    {
        $data = [
            'email' => 'test@gmail',
            'password' => 'Test1234!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 이메일_com_없음()
    {
        $data = [
            'email' => 'test@gmail.',
            'password' => 'Test1234!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_모든조건_충족()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => ''
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_없음()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => ''
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리미만_소문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'abcdefg'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리미만_대문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'ABCDEFG'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리미만_숫자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => '1234567'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리미만_특수문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => '!@#$%^&'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리이상_소문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'abcdefgh'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리이상_대문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'ABCDEFGH'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리이상_숫자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => '12345678'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_8자리이상_특수문자만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => '!@#$%^&*'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_다른조건충족_8자리미만()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'Test12!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_다른조건충족_소문자없음()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'TEST1234!'
        ];

        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_다른조건충족_대문자없음()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'test123!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_다른조건충족_숫자없음()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'Testtest!'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }

    /** @test */
    public function 비밀번호_다른조건충족_특수문자없음()
    {
        $data = [
            'email' => 'test@gmail.com',
            'password' => 'Test1234'
        ];
        $res = $this->getValidate($data);
        $this->assertTrue($res);
    }


    public function authService(): AuthService
    {
        $model = new User();
        $repository = new AuthRepository($model);
        $service = new AuthService($repository);

        return $service;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function getValidate(array $data): bool
    {
        $request = new AuthRequest();
        $rules = $request->rules();
        $validator = Validator::make($data, $rules);
        return $validator->fails();
    }

}
