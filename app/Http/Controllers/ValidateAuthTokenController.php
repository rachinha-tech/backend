<?php

namespace App\Http\Controllers;

use App\Actions\User\ShowProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ValidateAuthTokenController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        $profile = (new ShowProfile())->handle($user);
        return response()->json([...$profile, 'token' => $request->bearerToken()]);
    }
}
