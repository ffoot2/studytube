<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateForm extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'category'  => 'nullable|exists:search_words,id',
            'file'      => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
        ];
    }

    public function attributes()
    {
        return [
            'category'  => 'カテゴリ',
            'file'      => 'プロフィール画像',
        ];;
    }
}
