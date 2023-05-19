@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title data-pelanggan">Ubah Setting</h4>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-lg-12">
                        <div class="basic-form mt-3">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label mt-3">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-default" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-3 col-form-label mt-3">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control input-default" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-3 col-form-label mt-3 mb-5">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control input-default" placeholder="********">
                                    </div>
                                </div>
                                <div class="basic-form custom_file_input mb-5">
                                    <form action="#">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Ubah Foto Profile</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
