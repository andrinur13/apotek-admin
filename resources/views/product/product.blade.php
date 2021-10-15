@extends('template/default')

@section('content')
<div class="container-fluid" id="aplikasi">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <span class="label label-primary">Jumah Obat</span>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> <?= count($product) ?> buah </h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <!-- <small>Total views</small> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <button class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#addProduct">
                        <i class="fa fa-plus"></i>
                        Tambah Product
                    </button>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-2">Tampilkan Jumlah</div>
                            <select v-on:change="amountShow()" class="form-control" v-model="filled.amount">
                                <option value="null" id="amountData">Tampilkan Jumlah</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1000">1000</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <input type="text" style="padding: 20px;" class="form-control form-control-sm m-b-xs" id="filter" placeholder="Cari">

                    <table ref="myFooTable" id="table-content" class="mt-4 footable table table-hover table-stripped" data-page-size="10" data-filter=#filter>
                        <thead class="table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Berat</th>
                                <th>H. Jual</th>
                                <th>H. Beli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            @foreach($product as $p)
                            <tr>
                                <td> {{$p->nama_product}} </td>
                                <td> {{$p->category}} </td>
                                <td> {{$p->berat}} gr </td>
                                <td> Rp. {{number_format($p->harga_jual)}} </td>
                                <td> Rp. {{number_format($p->harga_beli)}} </td>
                                <td>
                                    <a class="btn btn-primary text-white btn-sm btn-circle" href="<?= 'product/detail/' . $p->id_product; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-danger text-white btn-sm btn-circle" data-toggle="modal" data-target="#deleteProduct" v-on:click="handleDeleted({{$p->id_product}})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
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
        el: '#aplikasi',
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
                },
                amount: null,
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
                document.getElementById('deleteProductAction').action = '/dashboard/product/delete/' + id;
            },

            amountShow: function() {
                $('.footable').data('page-size', this.filled.amount);
                $('.footable').trigger('footable_initialized');
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