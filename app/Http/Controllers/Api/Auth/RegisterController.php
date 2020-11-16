<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest as Request;
use App\Repositories\Interfaces\UserRepositoryContract;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $user_repo;

    public function __construct(UserRepositoryContract $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function __invoke(Request $request)
    {
        // $data = $request->only(['email', 'password', 'name']);

        // if ($this->user_repo->store($data)) {

        // } else {
        //     return new Response([
        //         'message' => __('Something went wrong'),
        //     ], 500);
        // }
    }
}
