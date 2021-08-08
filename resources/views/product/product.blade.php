@extends('template/default')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Product Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Obat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 20 Obat</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#addProduct">
                                <i class="fas fa-plus"></i>
                                Tambah Product
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table p-2">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Berat</th>
                                    <th>H. Jual</th>
                                    <th>H. Beli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add data -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <!-- nama product -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_product">Nama Product</label>
                        <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama Product...">
                    </div>

                    <!-- Jenis Product -->
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="null">Pilih Kategori</option>
                            @foreach($category as $c)
                            <option value="{{$c->id_category}}"> {{$c->category}} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- berat product -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="berat_product">Berat Product</label>
                        <input type="number" class="form-control" id="berat_product" name="berat_product" placeholder="Jenis Product...">
                    </div>

                    <!-- harga beli -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Jenis Product...">
                    </div>

                    <!-- harga jual -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Jenis Product...">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection