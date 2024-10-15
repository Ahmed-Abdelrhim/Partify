<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {

    }


    public function login(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();

            return response()->json([
                'status' => 200,
                'message' => 'Logged in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'data' => $user,
            ]);
        }

        return response()->json(['status' => 422, 'message' => 'Invalid credentials'], 422);
    }
}
