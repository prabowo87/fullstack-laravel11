<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProfileDetailUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'photo' => ['required', 'mimes:jpg,png'],
            'phone' => ['required', 'string'],
            'birth_date' => ['required', 'string'],
            'address' => ['required', 'string'],
            'profession' => ['required', 'string'],
        ];
    }
}
