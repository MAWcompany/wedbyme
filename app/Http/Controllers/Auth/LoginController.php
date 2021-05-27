<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->response("Unauthorized",false,401);
        }

        return $this->response($token);
    }

    public function me()
    {
        return $this->response(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return $this->response('Successfully logged out');
    }

    public function refresh()
    {
        return $this->response(auth()->refresh());
    }

}
