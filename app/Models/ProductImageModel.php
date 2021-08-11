<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    // use HasFactory;
    protected $table = 'product_img';
    public $timestamps = true;
    public $primaryKey = 'id_img_product';

    protected $fillable = ['id_img_product', 'id_product', 'img_path', 'is_primary'];

    public function storeImage($data) {
        ProductImageModel::insert([
            'id_product' => $data->id_product,
            'img_path' => $data->img_path,
            'is_primary' => 1
        ]);
    }

}
