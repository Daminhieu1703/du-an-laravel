<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                    $email = 'required|min:6|max:32|email|unique:users,email';
                    $username = 'required|min:6|unique:users,username';
                    break;
            case 'PUT':
                    $email = 'required|min:6|max:32|email|unique:users,email,'.$this->user->id;
                    $username = 'required|min:6|unique:users,username,'.$this->user->id;
                     break;
        }
        return [
            'name' => 'required|string',
            'avatar' => 'required|max:10000',
            'email' => $email,
            'username' => $username,
            'password' => 'required|min:6',
            'birthday' => 'required|date',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'role' => 'required',
            'password_confirm' => 'required_with:password|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa điền Họ và tên',
            'avatar.required' => 'Bạn chưa tải ảnh đại diện',
            'email.required' => 'Bạn chưa điền email',
            'email.min' => 'Email của bạn quá ngắn',
            'email.max' => 'Email của bạn quá dài',
            'email.email' => 'Định dạng email không đúng',
            'email.unique' => 'Email này đã có người đăng ký',
            'password.required' => 'Bạn chưa điền mật khẩu',
            'password.min' => 'Mật khẩu của bạn quá ngắn',
            'username.required' => 'Bạn chưa điền Username',
            'username.min' => 'Username của bạn quá ngắn',
            'username.unique' =>'Username đã có người đăng ký',
            'birthday.required' => 'Bạn chưa chọn ngày sinh',
            'birthday.date' => 'Ngày sinh chưa đúng định dạng',
            'phone.required' => 'Bạn chưa điền số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.min' => 'Số điện thoại của bạn chưa đúng',
            'address.required' => 'Bạn chưa điền địa chỉ',
            'status.required' => 'Bạn chưa chọn trạng thái',
            'gender.required' => 'Bạn chưa chọn giới tính',
            'role.required' => 'Bạn chưa chọn chức vụ',
            'password_confirm.same' => 'Xác nhận sai mật khẩu',
        ];
    }
}
