<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Group;

class UserController extends Controller
{
    #[Group("User management")]
    public function store(UserRequest $request)
    {
        $user = User::query()->create($request->validated());
        return new UserResource($user);
    }
}
