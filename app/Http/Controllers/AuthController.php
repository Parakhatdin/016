<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request): JsonResponse
    {
        $message = "login error";
        if (Auth::attempt($request->all())) {
            $message = "login success";
        }
        return response()->json([
            'message' => $message,
        ]);
    }
}
