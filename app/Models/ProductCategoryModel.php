<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    protected $table = 'product_category';
    public $timestamps = true;

    protected $fillable = ['id_product_category', 'category', 'created_at', 'updated_at'];
}
