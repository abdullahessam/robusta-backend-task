<?php


namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class AuthBaseClass extends Controller implements iAuth
{

    public function __construct()
    {

      auth()->shouldUse($this->guard());
    }

    public function loginCredentials()
    {
        return [
            'email','password'
        ];
    }
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate($this->registrationRules());
        \DB::beginTransaction();
        $user = $this->Model()::create($validated);
//        $user->logout = $user->devices()->create($validated)->refresh()->id;
        $user->token = $user->createToken('auth_token')->plainTextToken;
        \DB::commit();
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

    public function login(Request $request)
    {
        $validated = $request->validate($this->loginRules());
        $attemp = auth()->guard()->attempt($request->only($this->loginCredentials()));
        if (!$attemp) {
            return \responder::error("wrong credentials");
        }
        $user =  auth()->user();

        $user->token = $user->createToken('')->plainTextToken;
        $resource= $this->resource();
        return \responder::success(new $resource($user));
    }

}
