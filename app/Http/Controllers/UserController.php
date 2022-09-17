<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json([], 200);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json([], 200);
    }

    public function show($id): JsonResponse
    {
        return response()->json([], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return response()->json([], 200);
    }

    public function destroy($id): JsonResponse
    {
        return response()->json([], 200);
    }
}
