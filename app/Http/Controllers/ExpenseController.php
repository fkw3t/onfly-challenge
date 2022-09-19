<?php

declare(strict_types=1);

namespace App\Http\Controllers;

date_default_timezone_set('America/Sao_Paulo');

use DateTime;
use DomainException;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Expense\ExpenseResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Expense\ExpenseCollection;
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
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['occurred_in'] = DateTime::createFromFormat(
            'd-m-Y H:i',
            $data['occurred_in']
        )->format('Y-m-d H:i:s');
        
        Expense::create($data);
        
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

        if ($request->user()->cannot('update', $expense)) {
            return response()->json([
                'message' => 'You can\'t update this expense because you do not own it'
            ], 403);
        }

        $data = $request->only([
            'description',
            'occurred_in',
            'amount'
        ]);
        $data['occurred_in'] = DateTime::createFromFormat(
            'd-m-Y H:i',
            $data['occurred_in']
        )->format('Y-m-d H:i:s');

        $expense->update($data);

        return response()->json([
            'message' => 'Successfully updated'
        ], 200);
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        // TODO add service layer and filter exceptions
        $expense = Expense::find($id);

        if (!$expense) {
            throw new DomainException('Content not found', 204);
        }

        if ($request->user()->cannot('destroy', $expense)) {
            return response()->json([
                'message' => 'You can\'t remove this expense because you do not own it'
            ], 403);
        }

        return response()->json([
            'message' => 'Successfully deleted'
        ], 200);
    }
}
