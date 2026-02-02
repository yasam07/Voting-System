<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVoterRequest extends FormRequest
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
        $voterId = $this->voter ? $this->voter->id : null;
        $citizenshipId = $this->voter ? $this->voter->id : null;
       
            
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'nullable|email',
            'gender' => 'required|in:male,female,other',
            'province_id' => 'required|string',
            'district_id' => 'required|string',
            'municipality_id' => 'required|string',
            'ward_id' => 'required|integer',
            'voter_id' => [
                'required',
                'string',
                Rule::unique('voters', 'voter_id')->ignore($voterId)
            ],
            'citizenship' => [
                'required',
                'string',
                Rule::unique('voters', 'citizenship')->ignore($citizenshipId)
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'gender.required' => 'Please select a gender.',
            'citizenship.required' => 'Enter citizenship Id.',
            'voter_id.required' => 'Enter voter Id.',
            'province_id.required' => 'Please select a province.',
            'district_id.required' => 'Please select a district.',
            'municipality_id.required' => 'Please select a municipality.',
            'ward_id.required' => 'Please select a ward No.',
        ];
    }
}