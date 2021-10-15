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
                    <span class="label label-primary">User Detail</span>
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
                            <h3>Detail User</h3>

                            <!-- user name -->
                            <div class="mt-4">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control disabled" disabled readonly value="<?= $userdata->name ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- email -->
                            <div class="mt-4">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control disabled" disabled readonly value="<?= $userdata->email ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- gender -->
                            <div class="mt-4">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Jenis-Kelamin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control disabled" readonly disabled value="{{$userdata->gender == 1 ? 'Laki-laki' : 'Perempuan'}}">
                                    </div>
                                </div>
                            </div>

                            <!-- roles -->
                            <div class="mt-4">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">User Roles</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="gender" class="form-control disabled" readonly disabled>
                                            <option value="null">Pilih Roles</option>
                                            @foreach($roles as $r)
                                            <option value="{{$r->id}}" selected="{{$r->id == $userdata->role_id}}">{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- EDIT -->
                        <div class="tab-pane fade" id="edit-product" role="tabpanel" aria-labelledby="edit-product-tab">
                            <h3>Edit Product</h3>

                            <form action="{{$main_url . '/update/' . $userdata->id_user}}" method="POST">
                                {{csrf_field()}}
                                <!-- product name -->
                                <!-- user name -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control disabled" name="name" value="<?= $userdata->name ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control disabled" name="email" value="<?= $userdata->email ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- gender -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select name="gender" id="gender" class="form-control disabled">
                                                <option value="null">Pilih Gender</option>
                                                <option <?= $userdata->gender == 1 ? 'selected' : '' ?> value="1">Laki-laki</option>
                                                <option <?= $userdata->gender == 2 ? 'selected' : '' ?> value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- ganti password -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Ganti Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password_new" placeholder="Password Baru">
                                            <div class="mt-2 ml-2 text-danger">Apabila password tidak diganti, silahkan kosongkan saja</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- role -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10">
                                            <select name="role" id="role" class="form-control disabled">
                                                <option value="null">Pilih Role</option>
                                                @foreach($roles as $r)
                                                <option <?= $r->id == $userdata->role_id ? 'selected' : '' ?> value="{{$r->id}}">{{$r->name}}</option>
                                                @endforeach
                                            </select>
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