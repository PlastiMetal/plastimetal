<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoFormRequest extends FormRequest
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
            'proveedor_id' => 'required',
            'tipo_comprobante' => 'required|max:20',
            'num_comprobante' => 'max:75',
            'producto_id' => 'required|max:10',
            'cantidad' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
        ];
    }
}
