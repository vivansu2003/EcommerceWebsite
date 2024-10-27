<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'link' => 'required|string|max:255',
            'parent_id' => 'nullable|integer',
            'table_id' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'status' => 'required|string|in:active,inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'name.max' => 'Tên không được vượt quá 255 ký tự',
            'link.required' => 'Vui lòng nhập liên kết',
            'link.string' => 'Liên kết phải là chuỗi ký tự',
            'link.max' => 'Liên kết không được vượt quá 255 ký tự',
            'parent_id.nullable' => 'Mã danh mục cha có thể để trống',
            'parent_id.integer' => 'Mã danh mục cha phải là số nguyên',
            'table_id.required' => 'Vui lòng nhập mã bảng',
            'table_id.string' => 'Mã bảng phải là chuỗi ký tự',
            'table_id.max' => 'Mã bảng không được vượt quá 255 ký tự',
            'type.required' => 'Vui lòng chọn loại',
            'type.string' => 'Loại phải là chuỗi ký tự',
            'type.max' => 'Loại không được vượt quá 255 ký tự',
            'position.required' => 'Vui lòng nhập vị trí',
            'position.string' => 'Vị trí phải là chuỗi ký tự',
            'position.max' => 'Vị trí không được vượt quá 255 ký tự',
            'sort_order.required' => 'Vui lòng nhập thứ tự sắp xếp',
            'sort_order.integer' => 'Thứ tự sắp xếp phải là số nguyên',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.string' => 'Trạng thái phải là chuỗi ký tự',
            'status.in' => 'Trạng thái phải là "active" hoặc "inactive"',
        ];
    }
}
