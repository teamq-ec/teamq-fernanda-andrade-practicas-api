<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Group;

class UserController extends Controller
{
    #[Group("User management")]
    #[Authenticated]
    public function index()
    {
        $user= User::all();
        return response()->json($user);
    }

    #[Group("User management")]
    #[Authenticated]
    public function show(User $user)
    {
        return response()->json($user);
    }

}
