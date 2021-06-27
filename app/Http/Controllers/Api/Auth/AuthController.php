<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Resources\Api\UserResource;
use App\Models\User;

class AuthController extends AuthBaseClass
{
    //
    public function guard()
    {
        return 'web';
    }

    public function Model()
    {
        return User::class;
    }

    public function registrationRules(): array
    {

        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|string',
        ];
    }


    public function loginRules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|string',
        ];
    }

    public function resource()
    {
        return UserResource::class;
    }
}
