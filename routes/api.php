<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiAuthController;


Route::post('/login', [ApiAuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/dashboard', function (Request $request) {
        $user = $request->user();

        if ($user->hasRole('admin')) {
            return response()->json([
                'dashboard' => 'Admin Dashboard'
            ]);
        }

        if ($user->hasRole('teacher')) {
            return response()->json([
                'dashboard' => 'Teacher Dashboard'
            ]);
        }

        if ($user->hasRole('student')) {
            return response()->json([
                'dashboard' => 'Student Dashboard'
            ]);
        }

        return response()->json([
            'message' => 'No role assigned'
        ], 403);
    });
});
