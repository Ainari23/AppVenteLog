<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'nom' => ['required'],
            'description' => 'nullable',
            'prix_unitaire' => ['required','numeric'],
            'quantite_en_stock' => ['required','numeric'],
            'code_categorie' => ['required'],
            'fournisseur_id' => 'nullable|exists:fournisseurs,id',
        ];
    }
}
