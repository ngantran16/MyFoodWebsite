<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateRequest;
use App\Product;
use App\Detail;
use App\Category;
use App\User;
use App\Order;
use App\Cart;
use App\Discount;
use App\Comment;

use function GuzzleHttp\json_decode;

class DashboardController extends Controller
{
    function index(){
        $users = User::all();
        return view("admin.dashboard",['users'=>$users]);
    }
    function showProducts(){
        $products = Product::all();
        return view('admin.product.index',['products' => $products]);
    }
    function showCategories(){
        $categories = Category::all();
        return view('admin.category.index',['categories' => $categories]);
    }
    function showUsers(){
        $users = User::all();
        return view('admin.user.index',['users' => $users]);
    }
    function showOrders(){
        $orders = Order::all();
        return view('admin.product.orders',['orders' => $orders]);
    }

    function destroyUser($id){
        Cart::where('id_user',$id)->delete();
        Order::where('id_user',$id)->delete();
        Comment::where('id_user',$id)->delete();
        User::find($id)->delete();
        return redirect('/admin/users');
    }
    function destroyProduct($id){
        Detail::where('product_id',$id)->delete();
        Cart::where('product_id',$id)->delete();
        Product::find($id)->delete();
        return redirect('/admin/products');
    }

    function destroyCategory($id){
        Category::find($id)->delete();
        return redirect('/admin/categories');
    }

    function editProduct($id){
        $categories = Category::all();
        $product = Product::find($id);
        $product->detail;

        foreach($categories as $category){
            $category->products;
        }
        return view('admin.product.edit',['categories' => $categories, 'product' => $product]);
    }

    function updateProduct($id,Request $request){
        $nameEdit = $request->nameEdit;
        $imageEdit = $request->file("imageEdit")->store("public");
        $priceEdit = $request->priceEdit;
        $quantityEdit = $request->quantityEdit;
        $detailEdit = $request->detailEdit;
        $categoryEdit = $request->get('categoryEdit');

        $product = Product::find($id);
        $product->name = $nameEdit;
        $product->image = $imageEdit;
        $product->price = $priceEdit;
        $product->quantity = $quantityEdit;
        $product->star = 4;
        $product->category_id = $categoryEdit;
        $product->save();

        $idProduct = $product->id;
        DB::table('details')->where('product_id', $idProduct)->update(
            ['product_id'=>$idProduct,'content'=>$detailEdit]);

        return redirect('/admin/products');
    }

    function createProduct(){
        $categories = Category::all();
        foreach($categories as $category){
            $category->products;
        }
        return view('admin.product.create',['categories' => $categories]);
    }

    function storeProduct(CreateRequest $request){
        $name = $request->name;
        $image = $request->file("image")->store("public");
        $content = $request->detail;
        $price = $request->price;
        $quantity = $request->quantity;
        $sale = $request->sale;
        $request->validated();
        $category = $request->get('category');

        $product = new Product;
        $product->name = $name;
        $product->image = $image;
        $product->price = $price;
        $product->quantity = $quantity;
        $product->star = 4;
        $product->sale = $sale;
        $product->category_id = $category;
        $product->save();

        $detail = new Detail;
        $detail->product_id = $product->id;
        $detail->content = $content;
        $detail->save();
        return redirect('/admin/products');
    }
    function orderHistory($id){
        $order = Order::find($id);
        $order = json_decode($order);
        $pro = json_decode($order->product);
        $order->product = $pro;
        return view('admin.product.orderview',['order' => $order]);
    }

    function showDiscount(){
        $discounts = Discount::all();
        return view('admin.discount.index',['discounts' => $discounts]);
    }
    function destroyDiscount($id){
        Discount::find($id)->delete();
        return redirect('/admin/discounts');
    }
    function confirm($id){
        $order = Order::find($id);
        $order->status = 'Shipping';
        $order->save();
        return redirect('/admin/orders');
    }

}
