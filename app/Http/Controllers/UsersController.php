<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class UsersController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'blocked' => 'boolean',
            'role' => [new Enum(UserRoleEnum::class)]
        ]);

        $values = $request->only(['blocked','role']);

        if(empty($values)) {
            abort('422', 'Not fields present to update');
        }
        $user->update($values);

        return response()->noContent();

    }
}
