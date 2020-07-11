<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function saveProduct(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->inventory = $request->inventory;
        $product->save();

        return $product;

    }

    public function getProducts(Request $request){
        $products = Product::all();
        return $products;
    }

    public function deleteProduct(Request $request){
        $product = Product::find($request->id)->delete();
    }

    public function updateProduct(Request $request, $id){
        $product = Product::where('id',$id)->first();

        $product->name = $request->get('val_1');
        $product->sku = $request->get('val_2');
        $product->description = $request->get('val_3');
        $product->inventory = $request->get('val_4');
        $product->save();

        return $product;
    }
}
