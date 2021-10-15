@extends('template/default')

@section('custom-css')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #1ab394;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="container-fluid" id="aplikasi">
    <div class="row mt-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-primary">Invoice Detail</span>
                </div>
                <div class="ibox-content">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                            <h3>Detail Product</h3>

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="h4 font-weight-bold">INVOICE #ORD0000001</div>
                                                    <div class="mt-3">Andri Nur Hidayatulloh</div>
                                                    <div>Diro Pendowoharjo Sewon Bantul</div>
                                                </div>
                                                <div class="col">
                                                    <div class="h4 font-weight-bold">Rp. 129.000</div>
                                                    <div class="btn btn-danger">
                                                        Belum Terbayar
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <h2 class="font-weight-bold">Detail Pesanan</h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="row font-weight-bold" style="font-size: 18px">
                                        <div class="col">Product</div>
                                        <div class="col">Jumlah</div>
                                        <div class="col">Harga Per Item</div>
                                        <div class="col">Subtotal</div>
                                    </div>
                                    @foreach($invoice->pemesanan as $ps)
                                    <div class="row mt-3">
                                        <div class="col"> {{$ps->nama_product}} </div>
                                        <div class="col"> {{$ps->total_pemesanan}} </div>
                                        <div class="col"> {{$ps->harga_jual}} </div>
                                        <div class="col"> {{$ps->harga_jual * $ps->total_pemesanan}} </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
