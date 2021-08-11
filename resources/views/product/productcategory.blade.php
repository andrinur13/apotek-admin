@extends('template.default')

@section('custom-css')
<style>
    .dataTables_filter {
        float: right;
        text-align: right;
    }

    .dataTable_length {
        float: left;
    }

    .dataTables_paginate {
        float: right;
    }
</style>
@endsection

@section('content')
<div class="container-fluid" id="app">
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Product Category</div>
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
                                                Jumlah kategori obat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{count($productcategory)}} kategori</div>
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
                            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#addcategory">
                                <i class="fas fa-plus"></i>
                                Tambah Product Category
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
                                    <th>Nama Category</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($productcategory as $ps)
                                <tr>
                                    <!-- <td> {{$i}} </td> -->
                                    <td> {{$ps->category}} </td>
                                    <td>
                                        <div v-on:click="loadData({{$ps->id_product_category}})" data-toggle="modal" data-target="#editcategory" class="btn btn-warning btn-sm btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                        <a href="{{url('productcategory/delete/' . $ps->id_product_category)}}" class="btn btn-danger btn-sm btn-circle">
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

    <!-- modal edit -->
    <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('productcategory/edit')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="number" hidden name="id_product_category" v-model="edited.id_product_category">
                        <!-- nama category -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama_category">Nama Category</label>
                            <input type="text" class="form-control" id="nama_category" name="nama_category" placeholder="Nama Product..." v-model="edited.category">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                    </div>
                </form>
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
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script-custom')
<script src="{{asset('theme/js/vue.js')}}"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!',
            urlSite: '<?= env("APP_URL"); ?>',

            edited: {
                id_product_category: null,
                category: null
            }
        },

        methods: {
            loadData: function(id) {
                fetch(this.urlSite + 'productcategory/get/' + id).then(resp => resp.json()).then(
                    r => {
                        // console.log(r.product.category);
                        this.edited.id_product_category = r.product.id_product_category;
                        this.edited.category = r.product.category;
                    }
                )
            }
        }
    })
</script>
@endsection