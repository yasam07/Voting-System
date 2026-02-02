<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use App\Models\Candidate;
use App\Models\Party;
use App\Models\Post;


class StoreCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // allow all authenticated admins
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // For update requests, ignore the current candidate's ID in unique checks
        $candidateId = $this->candidate ? $this->candidate->id : null;

        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'nullable|email',
            'gender' => 'required|in:male,female,other',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'municipality_id' => 'required|exists:municipalities,id',
            'ward_id' => 'required|exists:wards,id',
            'post_id' => 'required|exists:posts,id',
            'party_id' => 'required|exists:parties,id',
            'citizenship' => [
                'required',
                'regex:/^[0-9]+(-[0-9]+)*$/', // only numbers and optional hyphens
                Rule::unique('candidates', 'citizenship')->ignore($candidateId),
            ],
            'is_active' => 'required|boolean',
        ];
    }


    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {

            $candidateId = $this->route('candidate')?->id;
            $partyName = Party::find($this->party_id)?->name ?? 'This party';
            $postName = Post::find($this->post_id)?->name ?? 'this post';

            $exists = Candidate::where('province_id', $this->province_id)
                ->where('district_id', $this->district_id)
                ->where('municipality_id', $this->municipality_id)
                ->where('ward_id', $this->ward_id)
                ->where('post_id', $this->post_id)
                ->where('party_id', $this->party_id)
                ->when($candidateId, fn ($q) => $q->where('id', '!=', $candidateId))
                ->exists();

            if ($exists) {
                $validator->errors()->add(
                    'party_id',
                    "{$partyName} already has a candidate for {$postName} in the selected location."
                );
            }
        });
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Candidate name is required.',
            'name.min' => 'Candidate name must be at least 3 characters.',
            'name.max' => 'Candidate name cannot exceed 100 characters.',

            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Gender must be either male, female, or other.',

            'province_id.required' => 'Please select a province.',
            'province_id.exists' => 'Selected province is invalid.',

            'district_id.required' => 'Please select a district.',
            'district_id.exists' => 'Selected district is invalid.',

            'municipality_id.required' => 'Please select a municipality.',
            'municipality_id.exists' => 'Selected municipality is invalid.',

            'ward_id.required' => 'Please select a ward.',
            'ward_id.exists' => 'Selected ward is invalid.',

            'post_id.required' => 'Please select a post.',
            'post_id.exists' => 'Selected post is invalid.',

            'party_id.required' => 'Please select a party.',
            'party_id.exists' => 'Selected party is invalid.',

            'citizenship.required' => 'Citizenship number is required.',
            'citizenship.regex' => 'Citizenship number format is invalid.',
            'citizenship.unique' => 'This citizenship number is already registered.',
            'is_active.required' => 'Please select a status.',
            'is_active.boolean' => 'Invalid status value.',
        ];
    }
}
