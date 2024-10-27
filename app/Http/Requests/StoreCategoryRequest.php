<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            // 'slug' => 'required|string',
            // 'image' => 'string',
            'parent_id' => 'required|integer',
            'sort_order' => 'required|integer',
            'description' => 'string',

            'status' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'name.min' => 'Tên phải có ít nhất 6 ký tự',
            // 'slug.required' => 'Vui lòng nhập slug',
            // 'slug.string' => 'Slug phải là chuỗi ký tự',
            // 'image.string' => 'Hình ảnh phải là chuỗi ký tự',
            'parent_id.required' => 'Vui lòng chọn thương hiệu cha',
            'parent_id.integer' => 'Mã thương hiệu cha phải là số nguyên',
            'sort_order.required' => 'Vui lòng nhập thứ tự sắp xếp',
            'sort_order.integer' => 'Thứ tự sắp xếp phải là số nguyên',
            'description.string' => 'Mô tả phải là chuỗi ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.integer' => 'Trạng thái phải là số nguyên',
        ];
    }
}
