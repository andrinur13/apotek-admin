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
    <div class="row">
        <div class="col">
            <div class="ibox mt-4">
                <div class="ibox-title">
                    <span class="label label-primary">Product Detail</span>
                </div>
                <div class="ibox-content">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link show active" id="detail-product-tab" data-toggle="pill" href="#detail-product" role="tab" aria-controls="detail-product" aria-selected="true">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edit-product-tab" data-toggle="pill" href="#edit-product" role="tab" aria-controls="edit-product" aria-selected="false">Edit</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                            <h3>Detail Product</h3>

                            <div class="row">
                                <div class="col">
                                    <!-- product name -->
                                    <div class="mt-4">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Product</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control disabled" disabled readonly value="<?= $data->nama_product ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Berat -->
                                    <div class="mt-4">
                                        <div class="form-group  row">
                                            <label class="col-sm-2 col-form-label">Berat</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="number" class="form-control disabled" disabled readonly value="<?= $data->berat ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-addon">gram</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- category -->
                                    <div class="mt-4">
                                        <div class="form-group  row">
                                            <label class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control disabled" disabled readonly value="<?= $data->category ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- herga beli -->
                                    <div class="mt-4">
                                        <div class="form-group  row">
                                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-addon">Rp. </span>
                                                    </div>
                                                    <input type="number" class="form-control disabled" disabled readonly value="<?= $data->harga_beli ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- harga jual -->
                                    <div class="mt-4">
                                        <div class="form-group  row">
                                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-addon">Rp. </span>
                                                    </div>
                                                    <input type="number" class="form-control disabled" disabled readonly value="<?= $data->harga_jual ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-4">
                                        <img src="/{{$data->product_img->img_path}}" class="img-fluid" style="border-radius: 5px; max-width: 400px" alt="">
                                        <hr>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <!-- EDIT -->
                        <div class="tab-pane fade" id="edit-product" role="tabpanel" aria-labelledby="edit-product-tab">
                            <h3>Edit Product</h3>

                            <form action="/dashboard/product/update/{{$data->id_product}}" method="POST">
                                {{csrf_field()}}
                                <!-- product name -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Product</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_product" value="<?= $data->nama_product ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- Berat -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Berat</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input type="number" class="form-control disabled" name="berat" value="<?= $data->berat ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-addon">gram</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- category -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select name="category" class="form-control">
                                                @foreach($category as $c)
                                                <option selected="{{$c->id_product_category == $data->id_product_category}}" value="{{$c->id_product_category}}">{{$c->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- herga beli -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Harga Beli</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-addon">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control disabled" name="harga_beli" value="<?= $data->harga_beli ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- harga jual -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Harga Jual</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-addon">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control disabled" name="harga_jual" value="<?= $data->harga_jual ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection