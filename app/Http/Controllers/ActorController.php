<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $actor= Actor::all();
        return response()->json($actor);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ActorResource
     */
    public function store(ActorRequest $request)
    {
        $actor = Actor::query()->create($request->validated());
        return new ActorResource($actor);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Actor $actor)
    {
        return response()->json($actor);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return ActorResource
     */
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->fill($request->validated());
        $actor->save();
        return new ActorResource($actor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\JsonResponse
     */
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
