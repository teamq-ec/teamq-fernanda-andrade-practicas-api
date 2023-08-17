<?php

namespace App\Http\Controllers;

use App\Classes\Search\SearchBuilder;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\QueryParam;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{

    public function filter(Request $request)
    {
        $builder = new SearchBuilder('Movie',$request);

        $query = $builder->filter();

        return \response()->json($query->get());

    }
    #[Group("Movie management")]
    #[QueryParam("per_page", "int","perPage")]
    #[QueryParam("page", "int")]
    #[Authenticated]
    public function index()
    {
        return  MovieResource::collection(
            Movie::query()->paginate(
                perPage: \request('perPage'),
                page: \request('page')
            )
        );
    }

    #[Group("Movie management")]
    #[Authenticated]
    public function store(MovieRequest $request)
    {
        $movie = Movie::query()->create($request->validated());
        return new MovieResource($movie);
    }

    #[Group("Movie management")]
    #[Authenticated]
    public function show(Movie $movie)
    {
        return response()->json($movie);
    }


    #[Group("Movie management")]
    #[Authenticated]
    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->fill($request->validated());
        $movie->save();
        return new MovieResource($movie);
    }

    #[Group("Movie management")]
    #[Authenticated]
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
