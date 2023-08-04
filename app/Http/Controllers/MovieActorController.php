<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieActorRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieActorController extends Controller
{


    public function actors(Movie $movie,Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return  ActorResource::collection(

            $movie->actors()->paginate(
                perPage: $request->get('perPage'),
                page: $request->get('page')
            )
        );
    }


    public function add(Movie $movie,MovieActorRequest $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $actorIds = $request->get('actors');

        $movie->actors()->syncWithoutDetaching($actorIds);
        return  ActorResource::collection(
            $movie->actors()->whereIn('id',$actorIds)->get()
        );
    }


    public function remove(Movie $movie,MovieActorRequest $request): \Illuminate\Http\JsonResponse
    {
        $actorIds = $request->get('actors');

        $movie->actors()->detach($actorIds);
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }

}
