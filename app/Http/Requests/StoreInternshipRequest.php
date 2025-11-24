<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInternshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vacant' => ["required", "integer", "min:1"],
            'company_id' => ["required", "integer", "exists:companies,id"],
            'career_id' => ["required", "integer", "exists:careers,id"],
            'postulation_limit_date' => [
                "required",
                "date",
                Rule::date()->after(now()->addDays(6)),
            ],
            'start_date' => ["required", "date", "after:postulation_limit_date"],
            'end_date' => ["required", "date", "after:start_date"],
            'entry_time' => ["required", "date_format:H:i"],
            'exit_time' => ["required", "date_format:H:i"],
            'location_id' => ["required", "integer", "exists:locations,id"],
        ];
    }

    public function messages() {
        return [
            'postulation_limit_date.after' => 'La fecha límite de postulación tiene que ser superior o igual a 7 días '];
    }
}
