<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use http\Env\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Movie::all();
    }

    public function show($id)
    {
        return Movie::find($id);
    }

    public function store(Request $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return Movie::create($request->all());
    }

    public function update(Request $request, $id){
        $movie = Movie::findOrFail($id);
        $movie ->update ($request->all());

        return $movie;
    }

    public function delete(Request $request, $id): int
    {
        $movie = Movie::findOrFail($id);
        $movie ->delete();

        return 204;
    }

}
