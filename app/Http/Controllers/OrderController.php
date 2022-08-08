<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::select('id', 'name', 'email', 'username', 'phone', 'address', 'total', 'amount', 'note', 'user_id','status')
        ->orderBy('id','desc')
        ->paginate(5);
        return view('admin.orders.list', ['orders' => $orders]);
    }
    public function edit(Order $order) {
        return view('admin.orders.form', compact('order'));
    }
    public function update(Order $order,Request $request) {
        $order->select('*')->where('id','=',$order->id)->get();
        $order->status = $request->status;
        $order->save();
        return redirect()->route('orders.list')->with('error_correct','Cập nhật trạng thái đơn hàng thành công !');
    }
    public function detail(Order $order){
        $totals = 0;
        $orderDetails = OrderDetail::select('*')->where('order_id','=', $order->id)->get();
        $user = Order::find($order->id);
        foreach ($orderDetails as $value) {
            $totals = $totals + $value->price;
        }
        return view('admin.orders.detail',compact('order','orderDetails','totals','user'));
    }
    public function delete_all(Request $request){
        if ($request->id) {
            foreach ($request->id as $id) {
                OrderDetail::where('order_id','=',$id)->delete();
                Order::destroy($id);
            }
            return redirect()->route('orders.list')->with('error_correct','Đã xóa đơn hàng !');
        }
        return redirect()->route('orders.list')->with('error_incorrect','Bạn chưa chọn đơn hàng bạn muốn xóa !');
    }
    public function orderCancel(Request $request){
        if (Auth::check()) {
            foreach ($request->id as $id) {
                $orderDetail = OrderDetail::select('*')->where('order_id','=',$id)->get();
                foreach ($orderDetail as $value) {
                    $updateProduct = Product::find($value->product_id);
                    $updateProduct->amount =$updateProduct->amount + $value->amount;
                    $updateProduct->save();
                }
                OrderDetail::where('order_id','=',$id)->delete();
                Order::destroy($id);
            }
            $orders = Order::select('*')->orderBy('id','desc')->orderBy('id','desc')
            ->paginate(5);
            return view('admin.orders.list', ['orders' => $orders]);
        }
    }
}
