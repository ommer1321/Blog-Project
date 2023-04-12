<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AltCategoryFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:75|string',
            'category_id' => 'required|integer',
        ];
    }



    public function messages()
    {
      return([
    'name.required'=>'Alt Kategori Adı Gerekli',
    'name.max'=>'Alt KategoriMax 75 karekter içermeli',
    'category_id.integer'=>'Geçerli Kategori Giriniz',
    'category_id.required'=>' Kategori Gerekli',

    ]);
    }
    
}
