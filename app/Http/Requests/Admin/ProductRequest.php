<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    switch ($this->method()) {
        case 'POST':
        {
            return [
                'type' => 'required',
                'price' => 'numeric',
                'final_price' => 'nullable|numeric|min:0', // Tambahkan validasi untuk final_price
                'qty' => 'numeric',
                'weight' => 'numeric',
                'status' => 'nullable',
                'name' => ['required', 'max:255', 'unique:products,name'],
                'sku' => ['required', 'max:255', 'unique:products,sku'],
                'discount' => 'nullable|numeric|min:0|max:100', // Persentase diskon (0-100)
                'discount_type' => 'nullable|in:percentage,fixed', // Jenis diskon
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            if ($this->get('type') == 'simple') {
                return [
                    'type' => 'required',
                    'price' => ['required', 'numeric'],
                    'final_price' => 'nullable|numeric|min:0', // Tambahkan validasi untuk final_price
                    'qty' => ['required', 'numeric'],
                    'weight' => ['required', 'numeric'],
                    'height' => 'nullable|numeric',
                    'width' => 'nullable|numeric',
                    'length' => 'nullable|numeric',
                    'status' => 'required',
                    'short_description' => 'required',
                    'description' => 'required',
                    'name' => ['required', 'max:255', 'unique:products,name,'.$this->route()->product->id],
                    'sku' => ['required', 'max:255', 'unique:products,sku,'. $this->route()->product->id],
                    'discount' => 'nullable|numeric|min:0|max:100', // Persentase diskon (0-100)
                    'discount_type' => 'nullable|in:percentage,fixed', // Jenis diskon   
                ];
            } else {
                return [
                    'type' => 'required',
                    'price' => 'numeric',
                    'final_price' => 'nullable|numeric|min:0', // Tambahkan validasi untuk final_price
                    'qty' => 'numeric',
                    'weight' => 'numeric',
                    'status' => 'required',
                    'short_description' => 'required',
                    'description' => 'required',
                    'name' => ['required', 'max:255', 'unique:products,name,'. $this->route()->product->id],
                    'sku' => ['required', 'max:255', 'unique:products,sku,'. $this->route()->product->id],
                    'discount' => 'nullable|numeric|min:0|max:100', // Persentase diskon (0-100)
                    'discount_type' => 'nullable|in:percentage,fixed', // Jenis diskon   
                ];
            }
        }
        default: 
            break;
    }
}
}