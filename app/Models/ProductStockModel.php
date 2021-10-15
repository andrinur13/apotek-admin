<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStockModel extends Model
{
    protected $table = 'product_stok';
    public $timestamps = true;
    public $primaryKey = 'id_product_stock';

    protected $fillable = ['id_product', 'id_product', 'stok', 'created_at', 'updated_at'];


    public function getProductStock() {
        $product_model = new ProductModel();
        $data = $product_model::leftJoin('product_category', 'product_category.id_product_category', 'product.id_product_category')
            ->leftJoin('product_stok', 'product.id_product', 'product_stok.id_product')
            ->select('product.*', 'product_stok.stok', 'product_stok.id_product_stok', 'product_category.category')
            ->get();

        return $data;
    }
}
