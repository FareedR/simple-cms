<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->hasRole('admin')){
            return true;
        }else{
            abort(403);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'image' => 'required_if:flag,0|image|mimes:png|dimensions:width=1900,height=1076',
            'description' => 'required|min:6',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Image must be .png',
            'image.dimensions' => 'Image must be 1900x1076',
        ];
    }
}
