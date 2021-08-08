<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->productcategory = new ProductCategoryModel();
        $this->product = new ProductModel();
    }
    public function product() {
        $data = [
            'category' => $this->productcategory::orderBy('category')->get(),
            'product' => $this->product::get()
        ];
        return view('product/product', $data);
    }
}
