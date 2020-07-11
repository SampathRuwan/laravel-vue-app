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
        $product = Product::all();
        return $product;
    }
}
