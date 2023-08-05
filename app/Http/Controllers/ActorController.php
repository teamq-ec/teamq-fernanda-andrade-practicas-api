<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;
use Symfony\Component\HttpFoundation\Response;

class ActorController extends Controller
{
    #[Group("Actor management")]
    public function index()
    {
        $actor= Actor::all();
        return response()->json($actor);
    }

    #[Group("Actor management")]
    public function store(ActorRequest $request)
    {
        $actor = Actor::query()->create($request->validated());
        return new ActorResource($actor);

    }

    #[Group("Actor management")]
    public function show(Actor $actor)
    {
        return response()->json($actor);
    }


    #[Group("Actor management")]
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->fill($request->validated());
        $actor->save();
        return new ActorResource($actor);
    }

    #[Group("Actor management")]
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }

    public function attach(ActorRequest $request)
    {
        $actor=Actor::find($request->actor_id);
        $actor->movie()->attach($request->movie_id);
        $data = [
            'message'=>'Service attached successfully',
            'client'=>$actor
        ];
        return response()->json($data);

    }
}
