<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieActorRequest;
use App\Http\Requests\MovieRentRequest;
use App\Http\Resources\ActorResource;
use App\Http\Resources\RentResource;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MovieRentController extends Controller
{


    public function rent(Movie $movie,Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return  RentResource::collection(
            $movie->rent()->paginate(
                perPage: $request->get('perPage'),
                page: $request->get('page')
            )
        );
    }


    public function add(Movie $movie,MovieRentRequest $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $rentIds = $request->get('rents');

        $movie->rent()->syncWithoutDetaching($rentIds);
        return  ActorResource::collection(
            $movie->rent()->whereIn('id',$rentIds)->get()
        );
    }


    public function remove(Movie $movie,MovieRentRequest $request): \Illuminate\Http\JsonResponse
    {
        $rentIds = $request->get('rents');

        $movie->rent()->detach($rentIds);
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }

}
