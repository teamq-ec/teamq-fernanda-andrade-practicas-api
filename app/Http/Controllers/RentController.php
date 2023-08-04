<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Http\Resources\RentResource;
use App\Models\Rent;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Group;
use Symfony\Component\HttpFoundation\Response;

class RentController extends Controller
{
    #[Group("Rent management")]
    public function index()
    {
        $rent= Rent::all();
        return response()->json($rent);
    }


    #[Group("Rent management")]
    public function store(RentRequest $request)
    {
        $rent = Rent::query()->create($request->validated());
        return new RentResource($rent);
    }

    #[Group("Rent management")]
    public function show(Rent $rent)
    {
        return response()->json($rent);
    }

    #[Group("Rent management")]
    public function update(RentRequest $request, Rent $rent)
    {
        $rent->fill($request->validated());
        $rent->save();
        return new RentResource($rent);
    }

    #[Group("Rent management")]
    public function destroy(Rent $rent)
    {
        $rent->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
