<?php

namespace App\Http\Controllers;

use App\Exceptions\HttpModelNotFoundException;
use App\Http\Requests\UserListingRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Exception;

class UserController extends Controller
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
}
