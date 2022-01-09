<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductStockModel;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    //
    public function __construct()
    {
        $this->productstock_model = new ProductStockModel();
        $this->productcategory = new ProductCategoryModel();
        $this->product = new ProductModel();
        $this->main_url = url('dashboard/productstock/');
    }
    public function index()
    {
        $data = [
            'main_url' => $this->main_url,
            'product' => $this->productstock_model->getProductStock(),
            'category' => $this->productcategory::get()
        ];

        // dd($data);

        return view('product/productstock', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'id_product' => $request->id_product,
            'stok' => $request->stock_product
        ];


        $dataquery = $this->productstock_model::where('id_product', $request->id_product)->first();

        // dd($dataquery);

        if ($dataquery == null) {
            $this->productstock_model::create($data);
        } else {
            $this->productstock_model::where('id_product', $request->id_product)->increment('stok', $request->stock_product);
        }


        return redirect($this->main_url)->with('status', 'Berhasil Menambahkan Stok');
    }

    public function minus(Request $request)
    {
        $data = [
            'id_product' => $request->id_product,
            'stok' => $request->stock_product
        ];


        $dataquery = $this->productstock_model::where('id_product', $request->id_product)->first();

        // dd($dataquery);

        if ($dataquery == null) {
            $this->productstock_model::create($data);
        } else {
            $this->productstock_model::where('id_product', $request->id_product)->decrement('stok', $request->stock_product);
        }


        return redirect($this->main_url)->with('status', 'Berhasil Mengurangi Stok');
    }

    public function delete($id, Request $request)
    {
        $this->productstock_model::where('id_product_stok', $id)->delete();
        return redirect($this->main_url)->with('status', 'Berhasil Menghapus Stok');
    }
}
