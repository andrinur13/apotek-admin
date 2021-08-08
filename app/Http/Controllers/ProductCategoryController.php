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

    public function deleteProductCategory($id) {
        $productcategorymodel = new ProductCategoryModel();

        $productcategorymodel->where('id_product_category', $id)->delete();

        return redirect('productcategory');
    }

    public function getProductCategory($id) {
        $productcategorymodel = new ProductCategoryModel();
        $productcategory = $productcategorymodel->where('id_product_category', $id)->first();

        return response([
            'product' => $productcategory
        ]);
    }

    public function editProductCategory(Request $request) {
        $id_product_category = $request->id_product_category;
        $category = $request->nama_category;

        $productcategorymodel = new ProductCategoryModel();
        $productcategory = $productcategorymodel::where('id_product_category', $id_product_category)->first();
        $productcategory->category = $category;
        $productcategory->save();

        return redirect('productcategory');
    }

}
