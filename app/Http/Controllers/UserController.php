<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use DomainException;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(User::all(), 200);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        // TODO add service layer
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        // TODO add api resource(?)
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

        // TODO add user resource
        return new UserResource($user);
    }

    public function showByDocument(string $document): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $user = User::firstWhere('document_id', $document);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        // TODO add user resource
        return response()->json($user, 200);
    }

    public function update(UpdateUserRequest $request, string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $user = User::find($id);

        if (!$user) {
            throw new DomainException('Content not found', 204);
        }

        // TODO add user resource
        return response()->json($user, 200);
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
