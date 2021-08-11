@extends('template/default')

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

    .thead > tr> th:hover {
        cursor: pointer;
        background-color: #ffffaa;
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Product Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-capsules fa-2x text-gray-800"></i>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{count($product)}} Obat</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-capsules fa-2x text-gray-800"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#addProduct">
                                <i class="fas fa-plus"></i>
                                Tambah Product
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="table p-2" style="font-size: 12px;">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead">
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
                            <tbody>
                                @foreach($product as $p)
                                <tr>
                                    <td> {{$p->nama_product}} </td>
                                    <td> {{$p->category}} </td>
                                    <td> {{$p->berat}} gr </td>
                                    <td> Rp. {{number_format($p->harga_jual)}} </td>
                                    <td> Rp. {{number_format($p->harga_beli)}} </td>
                                    <td>
                                        <a class="btn btn-success btn-sm btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <div class="btn btn-warning btn-sm btn-circle" data-toggle="modal" data-target="#editProduct">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                        <a class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#deleteProduct" v-on:click="handleDeleted({{$p->id_product}})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                    <form method="POST" action="{{$main_url . '/add' }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col">
                                <!-- nama product -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="nama_product">Nama Product</label>
                                    <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama Product..." v-model="filled.product.nama">
                                </div>

                                <!-- Jenis Product -->
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori" v-model="filled.product.category">
                                        <option value="null">Pilih Kategori</option>
                                        @foreach($category as $c)
                                        <option value="{{$c->id_product_category}}"> {{$c->category}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- berat product -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="berat_product">Berat Product</label>
                                    <input type="number" class="form-control" id="berat_product" name="berat_product" placeholder="Berat Product..." v-model="filled.product.berat">
                                </div>

                                <!-- harga beli -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli..." v-model="filled.product.harga_beli">
                                </div>

                                <!-- harga jual -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual..." v-model="filled.product.harga_jual">
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Foto Product</label>
                                        <div>
                                            <div v-for="item in filled.fileProduct">
                                                <img style="height: 100px; width: 120px; object-fit: cover; border-radius: 10px;" :src="item.url" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <label class="font-weight-bold" for="photo_product">
                                                <div class="btn btn-primary btn-sm btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-images"></i>
                                                    </span>
                                                    <span v-if="filled.fileProduct.length < 1" class="text">Tambah Gambar</span>
                                                    <span v-else class="text">Ubah Gambar</span>
                                                </div>
                                            </label>
                                        </div>
                                        <input style="display: none;" type="file" class="form-control" id="photo_product" name="photo_product" v-on:change="handlePhoto">
                                    </div>
                                </div>
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
    </div>

    <!-- modal edit data -->
    <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="product/add" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col">
                                <!-- nama product -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="nama_product">Nama Product</label>
                                    <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama Product..." v-model="filled.nama">
                                </div>

                                <!-- Jenis Product -->
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori" v-model="filled.category">
                                        <option value="null">Pilih Kategori</option>
                                        @foreach($category as $c)
                                        <option value="{{$c->id_product_category}}"> {{$c->category}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- berat product -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="berat_product">Berat Product</label>
                                    <input type="number" class="form-control" id="berat_product" name="berat_product" placeholder="Berat Product..." v-model="filled.berat">
                                </div>

                                <!-- harga beli -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga Beli..." v-model="filled.harga_beli">
                                </div>

                                <!-- harga jual -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual..." v-model="filled.harga_jual">
                                </div>
                            </div>

                            <div class="col">
                                <!-- input foto product -->
                                <div class="form-group">
                                    <label class="font-weight-bold" for="photo_product">Foto Product</label>
                                    <input type="file" class="form-control" id="photo_prduct" name="photo_prduct" v-on:change="handlePhoto">
                                </div>
                                <div>
                                    <div v-for="item in filled.fileProduct">
                                        <div v-html="item.primary">
                                            <!-- <input type="checkbox" v-model="item.primary"> Gambar Utama -->
                                        </div>
                                        <img style="height: 100px; width: 120px; object-fit: cover; border-radius: 10px;" :src="item.url" class="img-fluid" alt="">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- delete confirmation -->
    <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan menghapus product ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="modal-body"> -->
                <form method="POST" id="deleteProductAction" action="" enctype="multipart/form-data">
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
            },

            filled: {
                fileProduct: [],
                filePathProduct: [],
                product: {
                    nama: null,
                    category: null,
                    berat: null,
                    harga_beli: null,
                    harga_jual: null
                }
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
            },

            handlePhoto: function(e) {
                let img = e.target.files[0];

                this.filled.fileProduct = [];

                console.log('handle photo profile');
                this.filled.fileProduct.push({
                    'img': img,
                    'primary': false,
                    'url': URL.createObjectURL(e.target.files[0])
                });
                this.filled.filePathProduct.push(URL.createObjectURL(e.target.files[0]));
            },

            handleDeleted: function(id) {
                document.getElementById('deleteProductAction').action = 'product/delete/' + id;
            },
        }
    })
</script>
@endsection