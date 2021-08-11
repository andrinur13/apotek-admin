<?php

namespace App\Http\Controllers;

use App\Models\ProductImageModel;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    //

    public function __construct()
    {
        $this->productImgModel = new ProductImageModel();
    }

    public function addProductImage(Request $request) {
        $file = $request->file('file');
        $id_product = $request->id_product;
        $primary = $request->primary;

        $primary = $primary == true ? 1 : 0;
        
        // move file
        $pathFile = 'img/' . $id_product . '-' . time() . '-' . md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), public_path() . $pathFile);

        $this->productImgModel::insert([
            'id_product' => $id_product,
            'img_path' => $pathFile,
            'is_primary' => $primary
        ]);

        return response([
            'status' => 'success',
            'response' => 'success upload image!'
        ]);
    }
}
