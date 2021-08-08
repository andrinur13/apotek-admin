@extends('template/default')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
                    <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#addproduct">
                        <i class="fas fa-plus"></i>
                        Tambah Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Berat</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add data -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label class="font-weight-bold" for="jenis_product">Jenis Product</label>
                        <input type="text" class="form-control" id="jenis_product" name="jenis_product" placeholder="Jenis Product...">
                    </div>

                    <!-- berat product -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="berat_product">Berat Product</label>
                        <input type="number" class="form-control" id="berat_product" name="berat_product" placeholder="Jenis Product...">
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