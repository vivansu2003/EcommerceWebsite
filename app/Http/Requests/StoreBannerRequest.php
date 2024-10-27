<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'link.required' => 'Trường link là bắt buộc',
            'link.url' => 'Định dạng liên kết không hợp lệ.',
            'link.max' => 'Liên kết không được vượt quá 255 ký tự.',

            'position.required' => 'Trường vị trí là bắt buộc.',
            'position.string' => 'Vị trí phải là chuỗi.',
            'position.max' => 'Vị trí không được vượt quá 255 ký tự.',

            'description.string' => 'Mô tả phải là chuỗi.',
            'description.required' => 'Mô tả phải là chuỗi.',

            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là tệp có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobyte.',

            'status.required' => 'Trường trạng thái là bắt buộc.',
            'status.integer' => 'Trạng thái phải là số nguyên.',
        ];
    }
}
