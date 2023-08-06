<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class TeamsControllerPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'subtitle' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ad soyad alanının doldurulması zorunludur.',
            'subtitle.required' => 'Ünvan alanının doldurulması zorunludur.',
        ];
    }
}
