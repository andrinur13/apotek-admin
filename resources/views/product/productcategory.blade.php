@extends('template.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Product Category</h6>
                    <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#addcategory">
                        <i class="fas fa-plus"></i>
                        Tambah Product Category
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Category</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($productcategory as $ps)
                                <tr>
                                    <td> {{$i}} </td>
                                    <td> {{$ps->category}} </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php($i++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add category data -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('productcategory/add')}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <!-- nama category -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama_category">Nama Category</label>
                        <input type="text" class="form-control" id="nama_category" name="nama_category" placeholder="Nama Product...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script-custom')
<script src="{{asset('theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
@endsection