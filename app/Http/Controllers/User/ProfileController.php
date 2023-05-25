<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ShowProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        $profile = (new ShowProfile())->handle($user);
        return response()->json([...$profile, 'token' => $request->bearerToken()]);
    }
}
