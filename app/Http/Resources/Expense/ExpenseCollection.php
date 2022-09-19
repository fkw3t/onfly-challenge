<?php

namespace App\Http\Resources\Expense;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExpenseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'list all expenses' => '/api/auth/expense',
                'search for specific expense' => '/api/auth/expense/{id}',
                'create expense' => '/api/auth/expense/store',
            ],
        ];
    }
}
