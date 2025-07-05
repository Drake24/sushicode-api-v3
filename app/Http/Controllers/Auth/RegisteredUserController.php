<?php

namespace App\Http\Controllers\Auth;

use App\Classes\ApiResponse;
use App\Exceptions\HttpModelNotFoundException;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\UserListingRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Exception;

class RegisteredUserController extends Controller
{
    public function index(UserListingRequest $request)
    {
        $builder = $request->applyFilters(User::listing());

        // return new UserCollection(User::paginate());
        return apiResponse()->success($builder->get());
    }

    public function show(string $id): JsonResponse|Exception
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new HttpModelNotFoundException('User not found');
        }

        return apiResponse()->success(new UserResource($user));
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' =>  $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Passport
        $token = $user->createToken('authToken');

        // Sanctum
        //$token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
