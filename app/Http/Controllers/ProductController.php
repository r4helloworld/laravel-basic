<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Vendor;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    //
    public function index(){
        //productsテーブルからすべてのデータを取得し、変数$productsに代入する
        $products = DB::table("products")->get();

        //変数$productsをproducts/index.blade.phpにわたす
        return view ("products.index",compact("products"));
    }

    public function show($id){
        //URL"/products/{id}の{id}部分と主キーの値が一致するデータを$productsテーブルから取得し$productに
        $product = Product::find($id);

        //変数$productをproducts/show.blade.phpに
        return view ("products.show",compact("product"));
    }

    public function create() {
        $vendor_codes = Vendor::pluck('vendor_code');

        return view('products.create', compact('vendor_codes'));
    }

    public function store(ProductStoreRequest $request) {
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->vendor_code = $request->input('vendor_code');
        $product->save();

        // リダイレクトさせる
        return redirect("/products/{$product->id}");
    }
}