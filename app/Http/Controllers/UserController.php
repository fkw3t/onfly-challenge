<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use DomainException;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserCollection;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserController extends Controller
{
    public function index(): JsonResource
    {
        return new UserCollection(User::all());
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        // TODO add service layer
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return response()->json([
            'message' => 'Successfully created'
        ], 201);
    }

    public function show(string $id): JsonResource
    {
        // TODO add service layer and filter exceptions
        $user = User::find($id);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        return new UserResource($user);
    }

    public function showByDocument(string $document): JsonResource
    {
        // TODO add service layer and filter exceptions
        $user = User::firstWhere('document_id', $document);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $user = User::find($id);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        $user->update($request->all());

        return response()->json([
            'message' => 'Successfully updated'
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $user = User::find($id);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        return response()->json([
            'message' => 'Successfully deleted'
        ], 200);
    }
}
