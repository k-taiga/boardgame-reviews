<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png,gif',
        ];
    }

    // public function withValidator(\Illuminate\Contracts\Validation\Validator $validator)
    // {
    //     $validator->sometimes('photo', 'nullable|file|mimes:jpg,jpeg,png,gif', function ($input) {
    //         return $input;
    //     });
    // }
}
