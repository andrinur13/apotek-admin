<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoice';
    public $timestamps = true;
    public $primaryKey = 'id_invoice';

    protected $fillable = ['id_invoice', 'nomor_invoice', 'total', 'status', 'payment_url', 'created_at', 'updated_at'];

    public function invoiceDetail($id)
    {
        $data = InvoiceModel::where('invoice.id_invoice', $id)->first();

        if($data != null) {
            $queryPemesanan = PemesananModel::where('id_invoice', $id)
                ->leftJoin('product', 'product.id_product', 'pemesanan.id_product')
                ->get();

            $data->pemesanan = $queryPemesanan;
        }


        return $data;
    }
}
