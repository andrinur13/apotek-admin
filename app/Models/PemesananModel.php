<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    public $timestamps = true;
    public $primaryKey = 'id_pemesanan';

    protected $fillable = ['id_pemesanan', 'id_invoice', 'id_product', 'total_pemesanan', 'created_at', 'updated_at'];

}
