<?php
// app/Http/Requests/UpdateTaskListRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,low',
            'status' => 'required|in:to-do,in-progress,complete',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please add a task.',
            'title.string' => 'The task must be a string.',
            'title.max' => 'The task may not be greater than 255 characters.',
            'priority.required' => 'Please choose a priority.',
            'status.required' => 'Please choose a status.',
        ];
    }
}
