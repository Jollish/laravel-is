<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $data = DB::table("products")->get();
        return view('product.indexProduct',['products'=>$data]);
    }

    public function addProduct()
    {
        return view('product.addProduct');
    }

    public function edit($id){
        $data=Product::findOrFail($id);
        return view('product.editProduct', ['product' =>$data]);
    }

    public function saveProduct(Request $req)
    {
        // dd($req);
        $validated=$req->validate([
            "description"=>['required', 'min:15'],
            "quantity"=>['required', 'min:1'],
            "price"=>['required', 'min:0'],
        ]);

        $data = Product::create($validated);
        return redirect("/products")->with('success', 'Product added successfully!');
    }
    
    public function delete($id)
    {
        $delete=DB::table("products")
        ->where("id", "=", $id)
        ->delete();

        return redirect("/products")->with("success", "Product Deleted successfully");
    }

    public function updateProduct(Request $req)
    {
        $req->validate([
            "description"=>['required', 'min:15'],
            "quantity"=>['required', 'min:1'],
            "price"=>['required', 'min:0'],
        ]);

        $data=Product::find($req->id);
        $data->description=$req->description;
        $data->quantity=$req->quantity;
        $data->price=$req->price;

        $data->save();
        return redirect("/products")->with('success', 'Updated successfully!');
    } 
}
