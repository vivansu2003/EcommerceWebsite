<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:brands,id',
            'sort_order' => 'nullable|integer',
            'description' => 'nullable|string',
            'status' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên thương hiệu.',
            'name.string' => 'Tên thương hiệu phải là chuỗi ký tự.',
            'name.max' => 'Tên thương hiệu không được vượt quá 255 ký tự.',
            'parent_id.integer' => 'Mã thương hiệu cha phải là số nguyên.',
            'parent_id.exists' => 'Mã thương hiệu cha không tồn tại.',
            'sort_order.integer' => 'Thứ tự sắp xếp phải là số nguyên.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.integer' => 'Trạng thái phải là số nguyên.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng JPEG, PNG, JPG hoặc GIF.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
