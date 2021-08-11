<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    protected $table = 'product';
    public $timestamps = true;
    public $primaryKey = 'id_product';

    protected $fillable = ['id_product', 'id_product_category', 'nama_product', 'berat', 'harga_beli', 'harga_jual', 'created_at', 'updated_at'];

    public function getProduct() {
        $product = DB::table('product')
                    ->join('product_category', 'product.id_product_category', 'product_category.id_product_category')
                    ->select('product.*', 'product_category.category')
                    ->get();

        return $product;
    }
}
