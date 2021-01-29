<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewNoticiaRequest extends FormRequest
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
           'name' => 'required',
           'desc' => 'required',
           'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Nome é obrigatorio',
            'desc.required' => 'Descrição é obrigatoria',
            'url.required' => 'A imagem da notícia é obrigatoria.',
            'url.image' => 'A imagem deve ser uma imagem.',
            'url.mimes' => 'A imagem deve ser jpeg,png,jpg,gif.',
            'url.max' => 'A imagem nao pode exceder 2MB.',
        ];
    }
}
