<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\ProiectTip;

class ProiectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Return true if the user is allowed to make this request
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
            'proiecte_tipuri_id' => 'required|integer',
            'stare' => 'nullable|in:activ,inchis',
            'denumire_contract' => 'nullable|string|max:1000',
            'nr_contract' => 'nullable|string|max:255',
            'data_contract' => 'nullable|date',
            'data_limita_predare' => 'nullable|string|max:1000',
            'nr_proces_verbal_predare_primire' => 'nullable|string|max:255',
            'data_proces_verbal_predare_primire' => 'nullable|date',
            'stare_contract' => 'nullable|string|max:255',
            'pret' => 'nullable|numeric|between:0,999999.99',
            'pret_observatii' => 'nullable|string|max:5000',
            'cu' => 'nullable|string|max:5000',
            'nr_proiect' => 'nullable|string|max:5000',
            'studii_teren' => 'nullable|string|max:5000',
            'avize' => 'nullable|string|max:5000',
            'faza' => 'nullable|string|max:5000',
            'arhitectura' => 'nullable|string|max:5000',
            'rezistenta' => 'nullable|string|max:5000',
            'instalatii' => 'nullable|string|max:5000',
            'tratare' => 'nullable|string|max:5000',
            'retele' => 'nullable|string|max:5000',
            'partea_desenata' => 'nullable|string|max:5000',
            'partea_scrisa' => 'nullable|string|max:5000',
            'partea_economica' => 'nullable|string|max:5000',
            'autorizatie_de_construire' => 'nullable|string|max:5000',
            'documentatie_eligibilitate' => 'nullable|string|max:5000',
            'personal' => 'nullable|string|max:5000',
            'formulare' => 'nullable|string|max:5000',
            'propunere_tehnica' => 'nullable|string|max:5000',
            'propunere_financiara' => 'nullable|string|max:5000',
            'stadiu_incarcare' => 'nullable|string|max:5000',
            'comentarii' => 'nullable|string|max:5000',
            'observatii' => 'nullable|string|max:5000',

            // Add this rule for membri
            'membri' => 'nullable|array',
            'membri.*.id' => 'required|exists:membri,id', // ensure each ID exists in 'membri' table
            'membri.*.observatii' => 'nullable|string|max:5000',

            // Add this rule for subcontractanti
            'subcontractanti' => 'nullable|array',
            'subcontractanti.*.id' => 'required|exists:subcontractanti,id', // ensure each ID exists in 'subcontractanti' table
            'subcontractanti.*.observatii' => 'nullable|string|max:5000',
        ];
    }

    protected function prepareForValidation()
    {
        $proiectTip = $this->route('proiectTip');
        $this->merge([
            'proiecte_tipuri_id' => $proiectTip->id ?? null,
        ]);
    }
}
