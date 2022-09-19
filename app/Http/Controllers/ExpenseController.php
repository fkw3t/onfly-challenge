<?php

namespace App\Http\Controllers;

use DomainException;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Expense\ExpenseResource;
use App\Http\Resources\Expense\ExpenseCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    public function index(): JsonResource
    {
        return new ExpenseCollection(Expense::all());
    }

    public function store(StoreExpenseRequest $request): JsonResponse
    {
        // TODO add service layer
        Expense::create($request->all());
        // TODO add notification

        return response()->json([
            'message' => 'Successfully created'
        ], 201);
    }

    public function show(string $id): JsonResource
    {
        // TODO add service layer and filter exceptions
        $expense = Expense::find($id);

        if (!$expense) {
            throw new DomainException('Content not found', 204);
        }

        return new ExpenseResource($expense);
    }

    public function update(UpdateExpenseRequest $request, string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $expense = Expense::find($id);

        if (!$expense) {
            throw new DomainException('Content not found', 204);
        }

        $expense->update($request->all());

        return response()->json([
            'message' => 'Successfully updated'
        ], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $expense = Expense::find($id);

        if (!$expense) {
            throw new DomainException('Content not found', 204);
        }

        return response()->json([
            'message' => 'Successfully deleted'
        ], 200);
    }
}
