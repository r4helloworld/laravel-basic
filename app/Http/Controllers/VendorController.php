<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    public function show($id){
        $vendor = Vendor::find($id);

        $products=$vendor->products;

        return view ("vendors.show",compact("vendor","products"));
    }
    public function create() {
        return view('vendors.create');
    }

    public function store(Request $request) {
        // バリデーションを設定する
        $request->validate([
            'vendor_code' => 'required|integer|min:0|unique:vendors,vendor_code',
            'vendor_name' => 'required|max:255'
        ]);

        // フォームの入力内容をもとに、テーブルにデータを追加する
        $vendor = new Vendor();
        $vendor->vendor_code = $request->input('vendor_code');
        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->save();

        // リダイレクトさせる
        return redirect("/vendors/{$vendor->id}");
    }      
}
