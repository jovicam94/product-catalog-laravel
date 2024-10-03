<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()
                ->json([
                    'message' => 'The provided credentials are incorrect.'],
                    401
                );
        }

        $token = $user->createToken($user->name . 'Auth-Token')->plainTextToken;

        return response()
            ->json([
                'message' => 'Logged in successfully.',
                'token_type' => 'Bearer',
                'token' => $token,
            ]);
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            $token = $user->createToken($user->name . 'Auth-Token')->plainTextToken;

            return response()->json([
                'message' => 'Registered successful.',
                'token_type' => 'Bearer',
                'token' => $token
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Something went wrong.',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $user = User::where('id', $request->user()->id)->firstOrFail();

        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
}
