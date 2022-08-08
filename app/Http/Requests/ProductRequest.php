<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'img' => 'required|max:10000',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'description' => 'required',
            'height' => 'required|integer',
            'width' => 'required|integer',
            'status' => 'required',
            'sector_id' => 'required',
            'size_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa điền tên sản phẩm',
            'img.required' => 'Bạn chưa tải ảnh sản phẩm',
            'price.required' => 'Bạn chưa điền giá sản phẩm',
            'price.integer' => 'Giá sản phẩm phải là một số',
            'amount.required' => 'Bạn chưa điền số lượng sản phẩm',
            'description.required' => 'Bạn chưa điền mô tả sản phẩm',
            'amount.integer' => 'Số lượng sản phẩm phải là một số',
            'height.required' => 'Bạn chưa điền chiều dài sản phẩm',
            'height.integer' => 'Chiều dài sản phẩm phải là một số',
            'width.required' => 'Bạn chưa điền chiều rộng sản phẩm',
            'width.integer' => 'Chiều rộng sản phẩm phải là một số',
            'status.required' => 'Bạn chưa chọn trạng thái sản phẩm',
            'sector_id.required' => 'Bạn chưa chọn loại hàng cho sản phẩm',
            'size_id.required' => 'Bạn chưa chọn kích cỡ cho sản phẩm',
        ];
    }
}
