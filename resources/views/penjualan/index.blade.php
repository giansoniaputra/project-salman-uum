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
                        <button type="button" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable-penjualanCash">
                            <i data-acorn-icon="plus"></i>
                            <span>Tambah Data Penjualan Cash</span>
                        </button>


                        <!-- Export Dropdown Start -->
                        <div class="d-inline-block datatable-export" data-datatable="#datatableBoxed">

                        </div>
                        <!-- Export Dropdown End -->


                    </div>
                </div>
            </div>
            <!-- Controls End -->

            <!-- Table Start -->
            <div>
                <table id="datatableBoxed_penjualan_cash" class="data-table nowrap hover" style="font-family: 'Nunito Sans', sans-serif; font-size: 0.9em ">
                    <thead>
                        <tr>
                            <th class="text-muted text-small text-uppercase">No</th>
                            <th class="text-muted text-small text-uppercase">Nama Pembeli</th>
                            <th class="text-muted text-small text-uppercase">No Polisi</th>
                            <th class="text-muted text-small text-uppercase">Merk</th>
                            <th class="text-muted text-small text-uppercase">Warna</th>
                            <th class="text-muted text-small text-uppercase">Harga Jual</th>
                            <th class="text-muted text-small text-uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- Table End -->
        </div>
        <!-- Content End -->


        <!-- Add Edit Modal Start -->
        <div class="modal modal-center fade" id="addEditModal_penjualan_cash" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Tambah Data Penjualan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" enctype="multipart/form-data" id="form-penjualan">
                            <div class="current-id"></div>
                            @csrf
                            <div class="form-floating mb-3 w-100">
                                <select id="no_polisi" name="no_polisi" class="form-control no-polisi" placeholder="Masukan No Polisi">
                                    <option label="&nbsp;"></option>
                                    @foreach ($no_polisi as $row)
                                    <option value="{{ $row->id }}">{{ $row->no_polisi }}</option>
                                    @endforeach
                                </select>
                                <label>No Polisi <span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3" id="current-no-polisi">


                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="merk" id="merk" class="form-control" style="background-color: rgba(215, 218, 227, 0.3)" disabled>
                                <label class="text-label" for="merk">Merk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="warna" id="warna" class="form-control" style="background-color: rgba(215, 218, 227, 0.3)" disabled>
                                <label>Warna</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="tahun_pembuatan" id="tahun_pembuatan" disabled style="background-color: rgba(215, 218, 227, 0.3)">
                                <label for="tahun_pembuatan">Tahun Pembuatan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="harga_beli" id="harga_beli" style="background-color: rgba(215, 218, 227, 0.3)" readonly>
                                <label for="harga_beli">Harga Beli</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="date-picker form-control" placeholder="Masukan Tanggal Penjualan" id="tanggal_jual" />
                                <label class="text-label" for="tanggal_jual">Tanggal Penjualan<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" placeholder="Masukan Harga Jual" name="harga_jual" id="harga_jual">
                                <label class="text-label" for="harga_jual">Harga Jual<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" placeholder="Masukan Jumlah Bayar" name="jumlah_bayar" id="jumlah_bayar">
                                <label class="text-label" for="jumlah_bayar">Jumlah Bayar<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="kembali" id="kembali" readonly style="background-color: rgba(215, 218, 227, 0.3)">
                                <label class="text-label" for="kembali">Kembalian</label></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="addEditConfirmButton" title="Tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Edit Modal End -->
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
{{-- Simple Money Format --}}
<script src="/page-script/simple.money.format.js"></script>
<script src="/page-script/simple.money.format.init.js"></script>
{{-- !Simple Money Format --}}
<script src="/page-script/datatables/datatables-penjualan-cash.js"></script>
<script src="/page-script/penjualan.js"></script>
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
