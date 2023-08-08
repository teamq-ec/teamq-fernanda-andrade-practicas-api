<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    #[Group("Security management")]
    #[SubGroup("Auth")]
    public function login(AuthRequest $request){
        if(Auth::attempt($request->validated())){//si el usuario y contraseña se pueden autenticar
            $user = \auth()->user();
            return \response([
                'token' => $user->createToken(config('app.name'))->plainTextToken,//metodo de autenticacion y me devuelve un token
            ]);
        }

        return response()->json(['msg'=>'clave incorrecta'], Response::HTTP_UNAUTHORIZED);
    }


    #[SubGroup("Auth")]
    public function register(UserRequest $request)
    {
        $user = User::query()->create($request->validated());
        return new UserResource($user);
    }

    #[SubGroup("Auth")]
    public function user()
    {
        $user= User::all();
        return response()->json($user);
    }

    #[Group("User management")]
    #[SubGroup("User")]
    #[Authenticated]
    public function update(UserRequest $request,User $user)
    {
        $user->fill($request->validated());
        $user->save();
        return new AuthResource($user);
    }


    #[Group("User management")]
    #[SubGroup("User")]
    #[Authenticated]
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
