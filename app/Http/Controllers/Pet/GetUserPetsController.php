<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUserPetsController extends Controller
{
    public function __invoke($user)
    {
        return response()->json($user->pets);
    }
}
