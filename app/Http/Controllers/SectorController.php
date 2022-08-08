<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index(){
        $sectors = Sector::select('id', 'name')->orderBy('id','desc')->paginate(5);
        return view('admin.sectors.list', ['sectors' => $sectors]);
    }
    public function delete_all(Request $request){
        if ($request->id) {
            foreach ($request->id as $id) {
                Sector::destroy($id);
            }
            return redirect()->route('sectors.list')->with('error_correct','Đã xóa loại hàng !');
        }
        return redirect()->route('sectors.list')->with('error_incorrect','Bạn chưa chọn loại hàng bạn muốn xóa !');
    }
    public function create(){
        return view('admin.sectors.form');
    }
    public function store(Request $request){
        $sector = new Sector();
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Bạn chưa điền tên loại hàng'
        ]);
        $sector->fill($request->all());
        $sector->save();
        return redirect()->route('sectors.list')->with('error_correct','Thêm mới loại hàng thành công !');
    }
    public function edit(Sector $sector){
        return view('admin.sectors.form',compact('sector'));
    }
    public function update(Sector $sector,Request $request){
        $sector->fill($request->validate([
                'name' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa điền tên mới cho loại hàng'
            ]));
        $sector->save();
        return redirect()->route('sectors.list')->with('error_correct','Cập nhật loại hàng thành công !');
    }
}
