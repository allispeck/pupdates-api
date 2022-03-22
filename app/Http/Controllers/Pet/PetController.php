<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function index(): JsonResponse
    {
        return response()->json(auth()->user()->pets()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PetRequest $request
     * @return JsonResponse
     */
    public function store(PetRequest $request): JsonResponse
    {
        $pet = Pet::create([
            'name' => $request->get('name'),
            'date_of_birth' => $request->get('date_of_birth'),
            'breed' => $request->get('breed'),
            'user_id' => auth()->user()->id,
        ]);
        return response()->json([
            'data' => PetResource::make($pet)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PetRequest $request
     * @param Pet        $pet
     * @return JsonResponse
     */
    public function update(PetRequest $request, Pet $pet): JsonResponse
    {
        $pet->update($request->validated());

        return response()->json([
            'data' => PetResource::make($pet)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pet $pet
     * @return Response
     * @throws Exception
     */
    public function destroy(Pet $pet): Response
    {
        $pet->delete();

        return response()->noContent();
    }
}
