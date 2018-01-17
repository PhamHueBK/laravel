<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
    	$data = array();
    	$data = Product::get();
    	return view('products.index', ['data'=>$data]);
    }
    public function create(){
    	return view('products/create');
    }
    public function store(ProductRequest $request){


    	$data = $request->all();
    	

    	$product = Product::create($data);//Save to db

    	return $product;
    	//return redirect('products')->with('alert', "Thêm mới thành công");
    }
    public function detail($id)
    {
    	$product = Product::find($id);
        return view('products.detail', compact('product','id'));
    }
    public function edit($id)
    {
    	$product = Product::find($id);
        return view('products.edit', compact('product','id'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'price' => 'required|numeric',
          'quantity' =>'required|numeric'
        ]);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->save();
        return redirect('products')->with('alert','Cập nhật sản phẩm thành công');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $data = $product->delete();
        //dd($request);
        return $data;
        //return redirect('products')->with('delete','Đã xóa sản phẩm');
    }
}
