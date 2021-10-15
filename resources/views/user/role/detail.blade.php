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
                    <span class="label label-primary">Role Detail</span>
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
                            <h3>Detail Role</h3>

                            <!-- product name -->
                            <div class="mt-4">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Role Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control disabled" disabled readonly value="<?= $userrole->name ?>">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- EDIT -->
                        <div class="tab-pane fade" id="edit-product" role="tabpanel" aria-labelledby="edit-product-tab">
                            <h3>Edit Product</h3>

                            <form action="{{$main_url . '/update/' . $userrole->id}}" method="POST">
                                {{csrf_field()}}
                                <!-- product name -->
                                <div class="mt-4">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Role Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?= $userrole->name ?>">
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