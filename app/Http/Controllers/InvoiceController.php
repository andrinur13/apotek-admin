<?php

namespace App\Http\Controllers;

use App\Models\InvoiceModel;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function __construct()
    {
        $this->invoice_model = new InvoiceModel();
        $this->main_url = url('dashboard/product/');
    }

    public function index()
    {
        $data = [
            'invoice' => $this->invoice_model::get(),
            'main_url' => $this->main_url
        ];

        return view('invoice/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'invoice' => $this->invoice_model->invoiceDetail($id),
            'main_url' => $this->main_url
        ];

        return view('invoice/detail', $data);
    }
}
