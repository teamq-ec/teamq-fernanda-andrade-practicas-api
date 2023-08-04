<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Http\Resources\RentResource;
use App\Models\Rent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $rent= Rent::all();
        return response()->json($rent);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RentResource
     */
    public function store(RentRequest $request)
    {
        $rent = Rent::query()->create($request->validated());
        return new RentResource($rent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Rent $rent)
    {
        return response()->json($rent);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return RentResource
     */
    public function update(RentRequest $request, Rent $rent)
    {
        $rent->fill($request->validated());
        $rent->save();
        return new RentResource($rent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();
        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
