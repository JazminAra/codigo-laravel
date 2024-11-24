<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'descripcion' => 'required|string',
            // 'image' => 'required|string',
            'image' => [ 
            // 'required', 'mimes:jpeg,png', //Restringe solo a jpeg y png
            // 'dimensions:width=600,height=400', //Dimensiones exactas
            // 'dimensions:min_width=400, min_height=200', //Dimensiones minimas de 400 x 200
            // 'dimensions:ratio=16/9', //Definir el ratio de la imagen
            // 'max: 2000'
                $this->route('servicio') ? 'nullable': 'required', 'mimes:jpeg,png',
            ],
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El título es requerido',
            'category_id.required' => 'La categoria es requerido',
            'descripcion.required' => 'La descripción es requerida',
            'image.required' => 'Debes seleccionar una imagen'
            ];
    }
}
