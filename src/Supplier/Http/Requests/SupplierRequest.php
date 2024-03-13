<?php

declare(strict_types=1);

namespace Modules\Supplier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'user_name' => 'required|string',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string',
            'street' => 'required|string',
            'house_number' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'country' => 'required|string',
        ];
    }
}


