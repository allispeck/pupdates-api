<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Pet::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(auth()->user()->pets()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'breed' => 'required|string',
            'date_of_birth' => 'required|date'
        ]);

        $pet = Pet::create([
            'name' => $request->get('name'),
            'date_of_birth' => $request->get('date_of_birth'),
            'breed' => $request->get('breed'),
            'user_id' => auth()->user()->id,
        ]);
        return response()->json(PetResource::make($pet));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Pet  $pet
     * @return JsonResponse
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'string',
            'breed' => 'string',
            'date_of_birth' => 'date'
        ]);

        $pet->Update($request->all());
        return response()->json($pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pet $pet
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return response()->json('success');
    }
}
