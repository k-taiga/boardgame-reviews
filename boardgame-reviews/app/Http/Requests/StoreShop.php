<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShop extends FormRequest
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
            'photo' => 'required|file|mimes:jpg,jpeg,png,gif',
            'shop_name' => 'required|max:255',
            'address' => 'required|max:255',
            // 'bussiness_hours' => 'required|max:255',
            'boardgame_num' => 'integer|max:255',
            'content' => 'string|max:255',
            'home_url' => 'string|max:255',
        ];
    }
}
