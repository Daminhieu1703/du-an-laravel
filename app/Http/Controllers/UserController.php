<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::select('id', 'name', 'username', 'birthday', 'phone', 'address', 'status', 'gender', 'role', 'avatar')
        // ->where('role', '=', 2)
        ->orderBy('id','desc')
        ->paginate(5);
        // dd($users);
        return view('admin.users.list', ['users' => $users]);
    }
    public function create(){
        return view('admin.users.form');
    }
    public function store(UserRequest $request){
        $user = new User();
        $user->fill($request->all());
        if($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.list')->with('error_correct','Thêm mới tài khoản thành công !');
    }
    // public function delete(User $User){
    //     $User->delete();
    //     return redirect()->back();
    // }
    public function delete_all(Request $request){
        if ($request->id) {
            foreach ($request->id as $id) {
                Cart::where('user_id','=',$id)->delete();
                OrderDetail::where('user_id','=',$id)->delete();
                Order::where('user_id','=',$id)->delete();
                Comment::where('user_id','=',$id)->delete();
                User::destroy($id);
            }
            return redirect()->route('users.list')->with('error_correct','Đã xóa tài khoản !');
        }
        return redirect()->route('users.list')->with('error_incorrect','Bạn chưa chọn tài khoản bạn muốn xóa !');
    }
    public function edit(User $user) {
        $user->birthday = date('Y-m-d', strtotime($user->birthday));
        return view('admin.users.form', compact('user'));
    }
    public function update(User $user,UserRequest $request){
        $user->fill($request->all());
        if($request->hasFile('avatar_new')) {
            $avatar = $request->avatar_new;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        }
        $user->save();
        return redirect()->route('users.list')->with('error_correct','Cập nhật tài khoản thành công !');
    }
    public function changeStatus(User $user){
        if ($user->status == 1) {
            $user->status = 2;
        }elseif($user->status == 2) {
            $user->status = 1;
        }
        $user->save();
        return redirect()->back()->with('error_correct','Cập nhật trạng thái tài khoản thành công !');
    }
    public function editAdmin(){
        $user = User::find(Auth::user()->id);
        $user->birthday = date('Y-m-d', strtotime($user->birthday));
        return view('admin.editAdmin',compact('user'));
    }
    public function updateAdmin(User $user,UserRequest $request){
        $user->fill($request->all());
        if($request->hasFile('avatar_new')) {
            $avatar = $request->avatar_new;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        }
        $user->save();
        return redirect()->route('users.editAdmin')->with('error_correct','Cập nhật tài khoản thành công !');
    }
}
