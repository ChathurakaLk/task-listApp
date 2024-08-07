<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskListRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'status' => 'required|in:to-do,in-progress,complete',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Please add a task.',
            'title.string' => 'The task must be a string.',
            'title.max' => 'The task may not be greater than 255 characters.',
            'priority.required' => 'Please choose a priority.',
            'priority.in' => 'The selected priority is invalid.',
            'status.required' => 'Please choose a status.',
            'status.in' => 'The selected status is invalid.',
        ];
    }
}
