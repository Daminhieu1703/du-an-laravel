<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::select('id', 'name')->orderBy('id','desc')->paginate(5);
        return view('admin.Sizes.list', ['sizes' => $sizes]);
    }
    public function delete_all(Request $request){
        if ($request->id) {
            foreach ($request->id as $id) {
                Size::destroy($id);
            }
            return redirect()->route('sizes.list')->with('error_correct','Đã xóa kích cỡ !');
        }
        return redirect()->route('sizes.list')->with('error_incorrect','Bạn chưa chọn size bạn muốn xóa !');
    }
    public function create(){
        return view('admin.sizes.form');
    }
    public function store(Request $request){
        $size = new Size();
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Bạn chưa điền tên kích cỡ'
        ]);
        $size->fill($request->all());
        $size->save();
        return redirect()->route('sizes.list')->with('error_correct','Thêm mới kích cỡ thành công !');
    }
    public function edit(Size $size){
        return view('admin.sizes.form',compact('size'));
    }
    public function update(Size $size,Request $request){
        $size->fill($request->validate([
                'name' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa điền tên mới cho kích cỡ'
            ]));
        $size->save();
        return redirect()->route('sizes.list')->with('error_correct','Cập nhật kích cỡ thành công !');
    }
}
