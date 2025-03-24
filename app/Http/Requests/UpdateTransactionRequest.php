<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'fleet_id' => 'required|exists:fleets,id',
            'started_at' => 'required|date',
            'ended_at' => [
                'required',
                'date',
                Rule::date()->afterOrEqual('started_at'),
            ],
            'status' => [
                'required',
                Rule::in(['not_started', 'started', 'ended']),
            ]
        ];
    }
}
