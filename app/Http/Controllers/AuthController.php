<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'noTelpon' => 'required',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(),401]);
        }

        $user = User::create([
            'noTelpon' => $request->noTelpon,
            'password' => Hash::make($request['password']),
        ]);

        return response(['message' => 'User Registered successfully','user' => $user],200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'noTelpon' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('noTelpon', $request->noTelpon)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'noTelpon' => ['noTelpon incorrect']
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['password incorrect']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(
            [
                'jwt-token' => $token,
                'user' => $user,
            ]
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout successfully',
        ]);
    }


}
