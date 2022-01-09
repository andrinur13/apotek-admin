<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use stdClass;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->productcategory = new ProductCategoryModel();
        $this->product = new ProductModel();
        $this->main_url = url('dashboard/product/');
    }

    public function product()
    {
        $data = [
            'category' => $this->productcategory::orderBy('category')->get(),
            'product' => $this->product->getProduct(),
            'main_url' => $this->main_url
        ];

        // dd($data);

        return view('product/product', $data);
    }

    public function addProduct(Request $request)
    {
        $nama_product = $request->nama_product;
        $kategori = $request->kategori;
        $berat_product = $request->berat_product;
        $harga_beli = $request->harga_beli;
        $harga_jual = $request->harga_jual;
        $photo_product = $request->file('photo_product');

        $data = [
            'nama_product' => $nama_product,
            'berat' => $berat_product,
            'id_product_category' => $kategori,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
        ];

        // dd($photo_product);

        $dataInsert = $this->product::create($data);

        // add image
        $productImage = new ProductImageModel();

        $nama_product = str_replace(" ", "", $nama_product);
        $nama_file = 'uploads/product/' . $nama_product . '-' . time() . '.' . $photo_product->getClientOriginalExtension();

        $photo_product->move(public_path('uploads/product/'),  $nama_file);
        $file_name = $nama_file;

        // data images
        $dataImage = new stdClass();
        $dataImage->id_product = $dataInsert->id_product;
        $dataImage->img_path = $file_name;

        $productImage->storeImage($dataImage);

        return redirect($this->main_url)->with('status', 'Product berhasil ditambahkan');
    }

    public function detailProduct($id)
    {
        $data = [
            'data' => $this->product->getProductDetail($id),
            'category' => $this->productcategory::get()
        ];

        // dd($data);

        return view('product/detail', $data);
    }

    public function updateProduct($id, Request $request)
    {
        $data = [
            'nama_product' => $request->nama_product,
            'berat' => $request->berat,
            'id_product_category' => $request->category,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ];

        // dd($data);

        $this->product->where('id_product', $id)->update($data);

        return redirect('/dashboard/product');
    }

    public function deleteProduct($id)
    {
        $this->product::where('id_product', $id)->delete();

        return redirect($this->main_url)->with('status', 'Product berhasil dihapus');
    }
}
