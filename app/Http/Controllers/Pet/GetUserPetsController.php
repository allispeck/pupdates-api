<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetCollection;
use App\Http\Resources\PetResource;
use App\Models\User;
use Illuminate\Http\Request;

class GetUserPetsController extends Controller
{
    public function __invoke(User $user)
    {
        // todo: lock this down to only allow if you are friends with the specified user
        return response()->json(PetResource::collection($user->pets));
    }
}
