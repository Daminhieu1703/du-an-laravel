<?php

namespace App\Http\Controllers;
use App\Models\Sector;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getLogin(){
        return view('client.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Bạn chưa điền tên đăng nhập',
            'password.required' => 'Bạn chưa điền mật khẩu',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard.list');
        }
        return redirect()->route('form.getLogin')->with('error_incorrect','Tài khoản mật khẩu không chính xác');
    }
    public function getRegister(){
        return view('client.register');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.home');
    }
    public function index(){
        $products = Product::select('*')->with('sector','size')->orderBy('id','desc')->get();
        $sectors = Sector::select('id', 'name')->orderBy('id','desc')->get();
        $sizes = Size::select('id', 'name')->orderBy('id','desc')->get();
        return view('client.shop', compact('products','sectors','sizes'));
    }
    public function detail_product(Product $product) {
        $updateViewProduct = Product::find($product->id);
        $updateViewProduct->view = $updateViewProduct->view + 1;
        $updateViewProduct->save();
        $product->with('sector')->get();
        $cmt = Comment::select('*')->where('product_id', '=',$product->id)->get();
        $productWithSector = $product->select('*')->where('sector_id','=',$product->sector->id)->where('id','<>',$product->id)->get();
        return view('client.product', compact('product','productWithSector','cmt'));
    }
    public function search(Request $request){
        $products = Product::select('*')->where('name','like','%' . $request->name . '%')->get();
        $sectors = Sector::select('id', 'name')->orderBy('id','desc')->get();
        $sizes = Size::select('id', 'name')->orderBy('id','desc')->get();
        return view('client.shop', compact('products','sectors','sizes'));
    }
    public function postRegister(UserRequest $request){
        $user = new User();
        $user->fill($request->all());
        if($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        }
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->status = 1;
        $user->save();
        return redirect()->route('form.getLogin')->with('error_correct','Đăng ký tài khoản thành công !');
    }
    public function postCart(Request $request){
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                $product = Product::find($request->id);
                $cart = Cart::select('*')->where('product_id','=', $product->id)->get();
                foreach ($cart as $value) {
                    $cartUpdate = Cart::find($value->id);
                }
                if (empty($cartUpdate)) {
                    if ($product->amount >= $request->amount) {
                        Cart::create([
                            'name' => $product->name,
                            'price' => $product->price *= $request->amount,
                            'amount' => $request->amount,
                            'img' => $product->img,
                            'size' => $product->size->name,
                            'sector' => $product->sector->name,
                            'user_id' => Auth::user()->id,
                            'product_id' => $product->id,
                        ]);
                    }else {
                        return redirect()->back()->with('error_incorrect','Số lượng sản phẩm không đủ để bạn thêm vào giỏ hàng');
                    }
                }else {
                    $amountAll = $product->amount + $request->amount;
                    if ($amountAll <= $product->amount) {
                        $cartUpdate->amount = $cartUpdate->amount + $request->amount;
                        $cartUpdate->price = $cartUpdate->price * $cartUpdate->amount;
                        $cartUpdate->save(); 
                    }else {
                        return redirect()->back()->with('error_incorrect','Số lượng sản phẩm không đủ để bạn thêm vào giỏ hàng');
                    }
                }
                return redirect()->back()->with('error_correct','Bạn đã thêm vào giỏ hàng thành công');
            }
            return redirect()->back()->with('error_incorrect','Tài khoản admin không thể đặt hàng');
        }else {
            return redirect()->back()->with('error_incorrect','Bạn chưa đăng nhập vì vậy bạn không thể tiến hành thêm vào giỏ hàng');
        }
    }
    public function getCart(){
        if (Auth::check()) {
            $total_cart = 0;
            $amount_cart = 0;
            $carts = Cart::select('*')->where('user_id','=',Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $total_cart += $cart->price;
                $amount_cart += $cart->amount;
            }
            return view('client.cart', compact('carts','total_cart','amount_cart'));
        }
        return view('client.cart');
    }
    public function deleteCart(Cart $cart){
        if (empty($cart)) {
            return redirect()->back();
        }
        $cart->delete();
        return redirect()->back();
    }
    public function filter(Request $request){
        $sectors = Sector::select('id', 'name')->orderBy('id','desc')->get();
        $sizes = Size::select('id', 'name')->orderBy('id','desc')->get();
        $filter_products = [];
        foreach ($request->size_id as $size_id) {
            $product = Product::select('*')->where('size_id','=',$size_id)->where('sector_id','=',$request->sector_id)->get();
            array_push($filter_products,$product);
        }
        return view('client.shop', compact('filter_products','sectors','sizes'));
    }
    public function postOrder(Request $request){
        if (Auth::check()) {
            $request->status = 1;
            $order = Order::create([
                'name' =>Auth::user()->name,
                'email' =>Auth::user()->email,
                'username' =>Auth::user()->username,
                'phone' =>Auth::user()->phone,
                'address' =>Auth::user()->address,
                'amount' =>$request->amount,
                'total' =>$request->total,
                'note' =>$request->note,
                'user_id' =>Auth::user()->id,
                'status' => $request->status
            ]);
            $carts = Cart::select('*')->where('user_id','=', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'name'=>$cart->name,
                    'price'=>$cart->price,
                    'amount'=>$cart->amount,
                    'img'=>$cart->img,
                    'size'=>$cart->size,
                    'sector'=>$cart->sector,
                    'user_id'=>$cart->user_id,
                    'product_id'=>$cart->product_id,
                    'order_id'=>$order->id,
                ]);
                $updateProduct = Product::find($cart->product_id);
                $updateProduct->amount = $updateProduct->amount - $cart->amount;
                $updateProduct->status = 2;
                $updateProduct->save();
            }
            Cart::where('user_id','=',Auth::user()->id)->delete();
        }
        return redirect()->route('client.getOrder');
    }
    public function getOrder(){
        $orders = Order::select('*')->where('user_id','=', Auth::user()->id)->orderBy('id','desc')->get();
        return view('client.order',compact('orders'));
    }
    public function detailOrder(Order $detail){
        $totals = 0;
        $orderDetail = OrderDetail::select('*')->where('order_id','=', $detail->id)->get();
        foreach ($orderDetail as $value) {
            $totals = $totals + $value->price;
        }
        return view('client.detailOrder',compact('detail','orderDetail','totals'));
    }
    public function postComment(Request $request){
        if (Auth::check()) {
            Comment::create([
                'name'=>Auth::user()->name,
                'content'=>$request->content,
                'avatar'=>Auth::user()->avatar,
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->product_id,
            ]);
            return redirect("/product/$request->product_id#!");
        }
        return redirect()->back()->with('error_incorrect','Bạn chưa đăng nhập vì vậy bạn không thể bình luận');
    }
    public function updateStatusOrder(Order $order){
        if (Auth::check()) {
            $order->select('*')->get();
            if ($order->status == 5) {
                $order->status = 6;
                $order->save();
            }
            $orders = Order::select('*')->where('user_id','=', Auth::user()->id)->orderBy('id','desc')->get();
            return view('client.order',compact('orders'));
        }
    }
    public function cancelOrder(Order $order){
        if (Auth::check()) {
            $orderDetail = OrderDetail::select('*')->where('order_id','=',$order->id)->get();
            foreach ($orderDetail as $value) {
                $updateProduct = Product::find($value->product_id);
                $updateProduct->amount =$updateProduct->amount + $value->amount;
                $updateProduct->status = 1;
                $updateProduct->save();
            }
            OrderDetail::where('order_id','=',$order->id)->delete();
            $order->delete();
            $orders = Order::select('*')->where('user_id','=', Auth::user()->id)->orderBy('id','desc')->get();
            return view('client.order',compact('orders'));
        }
    }
}
