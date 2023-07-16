<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string',
            'isCompleted' => 'boolean'
        ];

        if($this->getMethod() === 'POST') {
            return $rules;
        }
        if($this->getMethod() === 'PATCH') {
            return ['todo' => 'required|integer'];
        }
        if($this->getMethod() === 'DELETE') {
            return ['todo' => 'required|integer'];
        }
    }

    public function messages(): array
    {
        return [
            'date.title' => 'A title is required'
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        if ($this->getMethod() == 'PATCH') {
            $data['todo'] = $this->route('todo');
        }
        if ($this->getMethod() == 'DELETE') {
            $data['todo'] = $this->route('todo');
        }
        return $data;
    }
}
