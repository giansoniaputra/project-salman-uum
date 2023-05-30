@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="row">
    <div class="col-xl-12">
        {{-- DATATABLE CASH --}}
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">

                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">


                    <!-- Check Button Start -->
                    <div class="btn-group ms-1 check-all-container">

                    </div>
                    <!-- Check Button End -->
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
    </div>
</div>
<!-- Title and Top Buttons End -->

<!-- Content Start -->
<div class="data-table-boxed">
    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">

        </div>
        <!-- Search End -->

        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
            <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">

            </div>
            <div class="d-inline-block">
                <!-- Add New Button Start -->
                <button type="button" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable-regorderkredit" data-bs-toggle="modal" data-bs-target="#modal-regorderkredit" id="btn-add-data">
                    <i data-acorn-icon="plus" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Data Penjualan Cash"></i>
                </button>
                <button type="button" class="btn btn-icon btn-icon-only btn-outline-primary" data-bs-toggle="modal" data-bs-target="#summary_regorderkredit"><i data-acorn-icon="notebook-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Summary Register Order Kredit"></i></button>
                <button class="btn btn-icon btn-icon-only btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF" type="button">
                    <i data-acorn-icon="download"></i>
                </button>
                <!-- Export Dropdown Start -->
                <div class="d-inline-block datatable-export" data-datatable="#datatableBoxed">

                </div>
                <!-- Export Dropdown End -->


            </div>
        </div>
    </div>
</div>
<!-- Controls End -->

<!-- Table Start -->
<table id="datatableBoxed_reg_order_kredit" class="data-table nowrap hover" style="font-family: 'Nunito Sans', sans-serif; font-size: 0.9em ">
    <thead>
        <tr>
            <th class="text-muted text-small text-uppercase">No</th>
            <th class="text-muted text-small text-uppercase">Nama Nasabah</th>
            <th class="text-muted text-small text-uppercase">Merk</th>
            <th class="text-muted text-small text-uppercase">Tipe Motor</th>
            <th class="text-muted text-small text-uppercase">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<!-- Add Edit Modal Start -->
<div class="modal modal-center fade" id="modal-regorderkredit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Register Order Kredit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3 form-floating">
                            <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control @error('nama_nasabah')is-invalid @enderror" value="{{ old('nama_nasabah') }}" placeholder="Masukan Nama Nasabah">
                            @error('nama_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="nama_nasabah">Nama Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-floating">
                            <input type="text" name="no_telepon_nasabah" id="no_telepon_nasabah" class="form-control @error('no_telepon_nasabah')is-invalid @enderror" value="{{ old('no_telepon_nasabah') }}" placeholder="Masukan No Telepon Nasabah">
                            @error('no_telepon_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="no_telepon_nasabah">No Telepon Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <textarea class="form-control @error('alamat_nasabah')is-invalid @enderror" rows="3" name="alamat_nasabah" id="alamat_nasabah" placeholder="Masukan Alamat Nasabah">{{ old('alamat_nasabah') }}</textarea>
                            @error('alamat_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="alamat_nasabah">&nbsp;&nbsp;Alamat Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="dealer" id="dealer" class="form-control @error('dealer')is-invalid @enderror" value="{{ old('dealer') }}" placeholder="Masukan Nama Dealer">
                            @error('dealer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dealer">Nama Dealer<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="CMO Leasing" id="CMO Leasing" class="form-control @error('CMO Leasing')is-invalid @enderror" value="{{ old('CMO Leasing') }}" placeholder="Masukan CMO Leasing">
                            @error('CMO Leasing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="CMO Leasing">CMO Leasing<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="pic_showroom" id="pic_showroom" class="form-control @error('pic_showroom')is-invalid @enderror" value="{{ old('pic_showroom') }}" placeholder="Masukan Sales/PIC Showroom">
                            @error('pic_showroom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="pic_showroom">Sales/PIC Showroom<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3 form-floating w-100">
                            <select id="jenis_transaksi" name="jenis_transaksi">
                                <option label="&nbsp;"></option>
                                <option value="CASH">Cash</option>
                                <option value="KREDIT">Kredit</option>
                            </select>
                            <label class="text-label" for="jenis_transaksi">Jenis Transaksi<span class="text-danger"> *</label></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-floating w-100">
                            <select id="kredit_via_leasing" name="kredit_via_leasing">
                                <option label="&nbsp;"></option>
                                <option value="MUF">MUF</option>
                                <option value="ADIRA">Adira</option>
                                <option value="CASH">Cash</option>
                            </select>
                            <label class="text-label" for="kredit_via_leasing">Kredit Via Leasing<span class="text-danger"> *</label></span>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="merk_motor" id="merk_motor" class="form-control @error('merk_motor')is-invalid @enderror" value="{{ old('merk_motor') }}" placeholder="Masukan Merk Motor">
                            @error('merk_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="merk_motor">Merk Motor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tipe_motor" id="tipe_motor" class="form-control @error('tipe_motor')is-invalid @enderror" value="{{ old('tipe_motor') }}" placeholder="Masukan Tipe Motor">
                            @error('tipe_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tipe_motor">Tipe Motor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tahun_kendaraan" id="tahun_kendaraan" class="form-control @error('tahun_kendaraan')is-invalid @enderror" value="{{ old('tahun_kendaraan') }}" placeholder="Masukan Tahun Kendaraan">
                            @error('tahun_kendaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tahun_kendaraan">Tahun Kendaraan<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="otr" id="otr" class="form-control @error('otr')is-invalid @enderror" value="{{ old('otr') }}" placeholder="Masukan OTR">
                            @error('otr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="otr">OTR<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="dp_po" id="dp_po" class="form-control @error('dp_po')is-invalid @enderror" value="{{ old('dp_po') }}" placeholder="Masukan DP PO">
                            @error('dp_po')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dp_po">DP PO<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="pencairan" id="pencairan" class="form-control @error('pencairan')is-invalid @enderror" value="{{ old('pencairan') }}" placeholder="Masukan Pencairan">
                            @error('pencairan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="pencairan">Pencairan<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="dp_bayar" id="dp_bayar" class="form-control @error('dp_bayar')is-invalid @enderror" value="{{ old('dp_bayar') }}" placeholder="Masukan DP Bayar">
                            @error('dp_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dp_bayar">DP Bayar<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="angsuran" id="angsuran" class="form-control @error('angsuran')is-invalid @enderror" value="{{ old('angsuran') }}" placeholder="Masukan Angsuran">
                            @error('angsuran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="angsuran">Angsuran<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tenor" id="tenor" class="form-control @error('tenor')is-invalid @enderror" value="{{ old('tenor') }}" placeholder="Masukan Tenor">
                            @error('tenor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tenor">Tenor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="btn-action">
                <div>
                    <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                        <span>Tambah</span>
                        {{-- <i data-acorn-icon="chevron-right"></i> --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Edit Modal End -->
<div class="modal fade" id="summary_regorderkredit" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Summary Penjualan Kredit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
{{-- Simple Money Format --}}
<script src="/page-script/simple.money.format.js"></script>
<script src="/page-script/simple.money.format.init.js"></script>
{{-- !Simple Money Format --}}
<script src="/page-script/regorderkredit.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const flashData = $('#pesan').data('flash');
    if (flashData) {
        Swal.fire(
            'Good job!', flashData, 'success'
        )
    }

</script>
@endsection