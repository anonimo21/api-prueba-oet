<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'placa' => 'required|unique:vehicles',
            'color' => 'required',
            'marca' => 'required',
            'type_id' => 'required',
            'driver_id' => 'required',
            'owner_id' => 'required',
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => ':attribute ya existe en el sistema'
        ];
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
    }
}
