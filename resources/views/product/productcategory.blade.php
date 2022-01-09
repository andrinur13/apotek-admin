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
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-primary">Jumah Kategori</span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> <?= count($productcategory) ?> kategori </h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <!-- <small>Total views</small> -->
                </div>
            </div>
        </div>
    </div>

    <!-- product category -->
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#addcategory">
                        <i class="fa fa-plus"></i>
                        Tambah Product Category
                    </button>
                </div>
                <div class="ibox-content">
                    <input type="text" style="padding: 20px;" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Cari">

                    <table class="mt-4 footable table table-hover table-stripped" data-page-size="10" data-filter=#filter>
                        <thead class="table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            @php($i = 1)
                            @foreach($productcategory as $p)
                            <tr>
                                <td> {{$i}} </td>
                                <td> {{$p->category}} </td>
                                <td>
                                    <div class="btn btn-warning btn-sm btn-circle" data-toggle="modal" data-target="#editcategory" v-on:click="loadData({{$p->id_product_category}})">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                    <a class="btn btn-danger text-white btn-sm btn-circle" data-toggle="modal" data-target="#deleteProduct" v-on:click="handleDeleted({{$p->id_product_category}})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php($i++)
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <ul class="pagination float-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
                <form method="POST" action="{{url('dashboard/productcategory/edit')}}">
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

    <!-- delete confirmation -->
    <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan menghapus category product ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="modal-body"> -->
                <form method="POST" id="deleteCategoryProductAction" action="" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </div>
                </form>
                <!-- </div> -->

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
            <form method="POST" action="{{url('dashboard/productcategory/add')}}">
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
                console.log(id);
                fetch(this.urlSite + 'dashboard/productcategory/get/' + id).then(resp => resp.json()).then(
                    r => {
                        // console.log(r.product.category);
                        this.edited.id_product_category = r.product.id_product_category;
                        this.edited.category = r.product.category;
                    }
                )
            },

            handleDeleted: function(id) {
                console.log(id);
                document.getElementById('deleteCategoryProductAction').action = '/dashboard/productcategory/delete/' + id;
            }
        }
    })
</script>
<script src="{{asset('theme/js/plugins/footable/footable.all.min.js')}}"></script>
<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });
</script>
@endsection