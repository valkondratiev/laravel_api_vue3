<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ImageUploadRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'base64Image' => 'required|base64mimetypes:image/jpeg,image/png|base64dimensions:max_width=1280,max_height=1280|base64max:2048',
            'date' =>  'required|date_format:U',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180'

        ];
    }
}
