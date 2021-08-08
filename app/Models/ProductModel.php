<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    public $timestamps = true;

    protected $fillable = ['id_product', 'id_product_category', 'nama_product', 'jenis_product', 'berat', 'harga_beli', 'harga_jual', 'created_at', 'updated_at'];
}
