<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest as Request;
use App\Repositories\Interfaces\UserRepositoryContract;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$token = Auth::attempt($request->only(['email', 'password']))) {
            return new Response([
                'message' => __('Your credential does not match any record'),
            ], 401);
        }

        return new Response([
            'message' => __('You have successfully logged in'),
            'token' => $token,
        ], 200);
    }
}
