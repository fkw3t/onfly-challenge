<?php

namespace App\Http\Requests\Expense;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => ['required', 'string', 'max:191'],
            'occurred_in' => ['required', 'datetime', 'before:today'],
            'user_id' => ['required', 'UUID', 'exists:App\Models\User,id'],
            'amount' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'Invalid amount, please send positive amount',
            'occurred_in.before' => 'Invalid date, please send a date before the current date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new Response(['error' => $validator->errors()->all()], 422);
        throw new ValidationException($validator, $response);
    }
}
