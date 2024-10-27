<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả các yêu cầu
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
            'image' => 'nullable|image', // Kiểm tra image là tệp tin
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'detail' => 'nullable|string',
            'price' => 'required|numeric',
            'pricesale' => 'nullable|numeric',
            'qty' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự',
            'name.min' => 'Tên sản phẩm phải có ít nhất 6 ký tự',
            'image.nullable' => 'Ảnh sản phẩm có thể để trống',
            'image.image' => 'Ảnh sản phẩm phải là file hình ảnh',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
            'category_id.integer' => 'Danh mục sản phẩm phải là một số nguyên',
            'brand_id.required' => 'Vui lòng chọn thương hiệu',
            'brand_id.integer' => 'Thương hiệu phải là một số nguyên',
            'detail.nullable' => 'Chi tiết sản phẩm có thể để trống',
            'detail.string' => 'Chi tiết sản phẩm phải là chuỗi ký tự',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'pricesale.nullable' => 'Giá khuyến mãi có thể để trống',
            'pricesale.numeric' => 'Giá khuyến mãi phải là số',
            'qty.required' => 'Vui lòng nhập số lượng sản phẩm',
            'qty.integer' => 'Số lượng sản phẩm phải là số nguyên',
            'description.nullable' => 'Mô tả sản phẩm có thể để trống',
            'description.string' => 'Mô tả sản phẩm phải là chuỗi ký tự',
            'status.required' => 'Vui lòng chọn trạng thái sản phẩm',
            'status.integer' => 'Trạng thái sản phẩm phải là số nguyên',
        ];
    }
}
