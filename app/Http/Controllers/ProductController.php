<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product; 
use App\Models\Sector;
use App\Models\Size;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index(){
        $products = Product::select('*')
        ->orderBy('id','desc')->with('sector', 'size')->paginate(5);
        // dd($products);
        return view('admin.products.list', ['products' => $products]);
    }
    public function create(){
        $sectors = Sector::select('id','name')->get();
        $sizes = Size::select('id','name')->get();
        return view('admin.products.form', compact('sectors','sizes'));
    }
    public function store(Request $request,ProductRequest $validate){
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('img')) {
            $img = $request->img;
            $imgName = $img->hashName();
            $imgName = $request->name . '_' . $imgName;
            $product->img = $img->storeAs('images/products', $imgName);
        }
        $product->save();
        return redirect()->route('products.list')->with('error_correct','Thêm mới sản phẩm thành công !');
    }
    // public function delete(Product $product){
    //     $product->delete();
    //     return redirect()->back();
    // }
    public function delete_all(Request $request){
        if ($request->id) {
            foreach ($request->id as $id) {
                // $detailOrder = OrderDetail::where('product_id','=',$id)->get();
                // $order = Order::where('id','=',$detailOrder[0]->order_id)->get();
                // $order[0]->total = $order[0]->total - $detailOrder[0]->price;
                // $order[0]->amount = $order[0]->amount - $detailOrder[0]->amount;
                // $order[0]->save();
                // $order = Order::find($detailOrder[0]->order_id);
                // dd()
                // if ($order->total <= 0) {
                //     $order->delete();
                // }
                // Comment::where('product_id','=',$id)->delete();
                // OrderDetail::where('product_id','=',$id)->delete();
                Product::destroy($id);
            }
            return redirect()->route('products.list')->with('error_correct','Đã xóa sản phẩm !');
        }
        return redirect()->route('products.list')->with('error_incorrect','Bạn chưa chọn sản phẩm bạn muốn xóa !');
    }
    public function edit(Product $product) {
        $sectors = Sector::select('id','name')->get();
        $sizes = Size::select('id','name')->get();
        return view('admin.products.form', compact('sectors','product','sizes'));
    }
    public function update(Product $product,ProductRequest $request){
        $product->fill($request->all());
        if($request->hasFile('img_new')) {
            $img = $request->img_new;
            $imgName = $img->hashName();
            $imgName = $request->name . '_' . $imgName;
            $product->img = $img->storeAs('images/products', $imgName);
        }
        $product->save();
        return redirect()->route('products.list')->with('error_correct','Cập nhật sản phẩm thành công !');
    }
    public function changeStatus(Product $product){
        if ($product->status == 1) {
            $product->status = 2;
        }elseif($product->status == 2) {
            $product->status = 1;
        }
        $product->save();
        return redirect()->back()->with('error_correct','Cập nhật trạng thái sản phẩm thành công !');
    }
}
