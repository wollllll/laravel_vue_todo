<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'integer', 'exists:todos,id'],
            'top' => ['required', 'integer'],
            'left' => ['required', 'integer']
        ];
    }

    /**
     * 成形
     */
    public function prepareForValidation()
    {
        $this->merge([
            'top' => castForInt(str_replace('px', '', $this->top)),
            'left' => castForInt(str_replace('px', '', $this->left))
        ]);
    }
}
