<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSignUpRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function signup(AccountSignUpRequest $request) {

        $user = User::create([
           'login' => $request->login,
           'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'userId' => $user->id,
            'login' => $user->login,
            'token' => $user->createToken('myAppSequreToken')->plainTextToken,
        ]);
    }

    public function signin(Request $request) {

        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login', $request->login)->firstOrFail();
        if (Hash::check($request->password, $user->password)) {
            if($user->blocked === 1 ) {
                throw new AuthorizationException('Your account is banned');
            }

            $user->tokens()->delete();

            return response()->json([
                'userId' => $user->id,
                'login' => $user->login,
                'token' => $user->createToken('myAppSequreToken')->plainTextToken,
            ]);
        } else {
            throw new AuthorizationException('Authorization failed. Wrong password!');
        }

    }
}
