<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'topic_id' => 'required|exists:topic,id',
            'description' => 'required|string',
            'detail' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.string' => 'Tiêu đề phải là chuỗi ký tự',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'topic_id.required' => 'Vui lòng chọn chủ đề',
            'topic_id.exists' => 'Chủ đề không tồn tại',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.string' => 'Mô tả phải là chuỗi ký tự',
            'detail.required' => 'Vui lòng nhập chi tiết',
            'detail.string' => 'Chi tiết phải là chuỗi ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
            'image.nullable' => 'Ảnh có thể để trống',
            'image.image' => 'Ảnh phải là file hình ảnh',
            'image.mimes' => 'Ảnh phải có đuôi .jpeg, .png, .jpg hoặc .gif',
            'image.max' => 'Ảnh không được vượt quá 2MB',
        ];
    }
}
