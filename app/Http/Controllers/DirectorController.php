<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Http\Requests\DirectorRequest;
use App\Http\Resources\DirectorResource;
use App\Models\Director;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $director= Director::all();
        return response()->json($director);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DirectorResource
     */
    public function store(ActorRequest $request)
    {
        $director = Director::query()->create($request->validated());
        return new DirectorResource($director);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Director $director)
    {
        return response()->json($director);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return DirectorResource
     */
    public function update(DirectorRequest $request, Director $director)
    {
        $director->fill($request->validated());
        $director->save();
        return new DirectorResource($director);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
