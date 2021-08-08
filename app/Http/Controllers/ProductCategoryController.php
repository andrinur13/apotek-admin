<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModel;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //
    public function productCategory() {
        $productcategorymodel = new ProductCategoryModel();
        $productcategory = $productcategorymodel::get();
        
        return view('product.productcategory', ['productcategory' => $productcategory]);
    }

    public function addProductCategory(Request $request) {
        $nama_category = $request->nama_category;

        $productcategorymodel = new ProductCategoryModel();

        $productcategorymodel::create([
            'category' => $nama_category
        ]);

        return redirect('productcategory');
    }

}
