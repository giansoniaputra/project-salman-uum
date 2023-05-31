@extends('layout.main')
@section('container')
<div class="flash-data" data-flashdata="{{ session('success') }}"></div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title data-pelanggan">Detail Setting</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <input type="text" name="nama_toko" id="nama_toko" class="form-control @error('nama_toko')is-invalid @enderror" value="{{ old('nama_toko') }}" placeholder="Masukan Nama Toko">
                            @error('nama_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="nama_toko">Nama Toko<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <textarea class="form-control @error('alamat_toko')is-invalid @enderror" rows="3" name="alamat_toko" id="alamat_toko" placeholder="Masukan Alamat Nasabah">{{ old('alamat_toko') }}</textarea>
                            @error('alamat_toko')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="alamat_toko">Alamat Toko<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <input type="text" name="kontak" id="kontak" class="form-control @error('kontak')is-invalid @enderror" value="{{ old('kontak') }}" placeholder="Masukan Nama Toko">
                            @error('kontak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="kontak">Informasi Kontak<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Edit Data Setting</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cropper -->
<div class="modal fade" id="modal-cropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cropper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <img id="image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary crop-logo-full">Crop</button>
            </div>
        </div>
    </div>
    <script src="/page-script/logo.js"></script>
    @endsection
