<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:entreprises|max:255',
            'telephone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'pays' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'site_web' => 'nullable|url|max:255',
            'statut_approval' => 'boolean',
        ];
    }
}
