@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="row">
    <div class="col-xl-12">
        {{-- DATATABLE KREDIT --}}
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    {{-- <h1 class="mb-0 pb-0 display-4" id="title">Editable Boxed Datatables</h1>
                                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                                    <ul class="breadcrumb pt-0">
                                                        <li class="breadcrumb-item"><a href="Dashboards.Default.html">Home</a></li>
                                                        <li class="breadcrumb-item"><a href="Interface.html">Interface</a></li>
                                                        <li class="breadcrumb-item"><a href="Interface.Plugins.html">Plugins</a></li>
                                                        <li class="breadcrumb-item"><a href="Interface.Plugins.Datatables.html">Datatables</a></li>
                                                    </ul>
                                                </nav> --}}
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                    {{-- <!-- Length Start -->
                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableBoxed" data-childSelector="span">
                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Item Count">
                                15 Items
                            </span>
                        </button>
                        <div class="dropdown-menu shadow dropdown-menu-end">
                            <a class="dropdown-item" href="#">10 Items</a>
                            <a class="dropdown-item active" href="#">15 Items</a>
                            <a class="dropdown-item" href="#">20 Items</a>
                        </div>
                    </div>
                    <!-- Length End --> --}}

                    <!-- Check Button Start -->
                    <div class="btn-group ms-1 check-all-container">
                        {{-- <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
                                        <span class="form-check float-end">
                                            <input type="checkbox" class="form-check-input" id="datatableCheckAll" />
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="dropdown dropstart dropdown-submenu">
                                            <button class="dropdown-item dropdown-toggle tag-datatable caret-absolute disabled" type="button">Tag</button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item tag-done" type="button">Done</button>
                                                <button class="dropdown-item tag-new" type="button">New</button>
                                                <button class="dropdown-item tag-sale" type="button">Sale</button>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item disabled delete-datatable" type="button">Delete</button>
                                    </div> --}}
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
                    {{-- <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                        <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableBoxed" />
                        <span class="search-magnifier-icon">
                            <i data-acorn-icon="search"></i>
                        </span>
                        <span class="search-delete-icon d-none">
                            <i data-acorn-icon="close"></i>
                        </span>
                    </div> --}}
                </div>
                <!-- Search End -->

                <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">

                        {{-- <!-- Add Button Start -->
                                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" type="button">
                                                        <i data-acorn-icon="plus"></i>
                                                    </button>
                                                    <!-- Add Button End --> --}}

                        {{-- <!-- Edit Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button">
                                        <i data-acorn-icon="edit"></i>
                                    </button>
                                    <!-- Edit Button End --> --}}

                        {{-- <!-- Delete Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button">
                                        <i data-acorn-icon="bin"></i>
                                    </button>
                                    <!-- Delete Button End --> --}}
                    </div>
                    <div class="d-inline-block">
                        <!-- Add New Button Start -->
                        <button type="button" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable-penjualanKredit">
                            <i data-acorn-icon="plus"></i>
                            <span>Tambah Data Penjualan Kredit</span>
                        </button>
                        <!-- Add New Button End -->
                        {{-- <!-- Print Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-bs-delay="0" data-datatable="#datatableBoxed" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" type="button">
                                        <i data-acorn-icon="print"></i>
                                    </button>
                                    <!-- Print Button End --> --}}

                        <!-- Export Dropdown Start -->
                        <div class="d-inline-block datatable-export" data-datatable="#datatableBoxed">
                            {{-- <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
                                                <i data-acorn-icon="download"></i>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <button class="dropdown-item export-copy" type="button">Copy</button>
                                            <button class="dropdown-item export-excel" type="button">Excel</button>
                                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                        </div> --}}
                        </div>
                        <!-- Export Dropdown End -->


                    </div>
                </div>
            </div>
            <!-- Controls End -->

            <!-- Table Start -->
            <div>
                <table id="datatableBoxed_penjualan_kredit" class="data-table nowrap hover" style="font-family: 'Nunito Sans', sans-serif; font-size: 0.9em ">
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
        <div class="modal modal-center fade" id="addEditModal_penjualan_kredit" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add New</h5>
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
                                <input type="text" class="form-control " placeholder="Masukan No NIK KTP" name="nik" id="nik">
                                <label class="text-label" for="nik">NIK<span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" placeholder="Masukan Nama Pembeli">
                                <label class="text-label" for="nama_pembeli">Nama Pembeli<span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control " rows="2" name="alamat" id="alamat" placeholder="Masukan Alamat"></textarea>
                                <label class="text-label" for="alamat">Alamat<span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" placeholder="Masukan Nama Pembeli">
                                <label class="text-label" for="nama_pembeli">No HP<span class="text-danger"> *</span></label>
                            </div>
                            <div class="form-floating mb-3">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="photo-ktp" id="photo-ktp" onchange="previewImageKTP()">
                                    <label class="input-group-text" for="photo-ktp">Upload Foto KTP</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="date-picker form-control" placeholder="Masukan Tanggal Penjualan" id="tanggal_jual" />
                                <label class="text-label" for="tanggal_jual">Tanggal Penjualan<span class="text-danger"> *</label></span>
                            </div>
                            {{-- <div class="form-floating mb-3 w-100">
                                            <select id="jenis_pembayaran" name="jenis_pembayaran">
                                                <option label="&nbsp;"></option>
                                                <option value="CASH">CASH</option>
                                                <option value="KREDIT">KREDIT</option>
                                            </select>
                                            <label class="text-label" for="jenis_pembayaran">Jenis Pembayaran<span class="text-danger"> *</label></span>
                                        </div> --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" id="tempat_lahir">
                                <label class="text-label" for="tempat_lahir">Tempat Lahir<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="date-picker form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir">
                                <label class="text-label" for="tanggal_lahir">Tanggal Lahir<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3 w-100">
                                <select id="jenis_kelamin" name="jenis_kelamin">
                                    <option label="&nbsp;"></option>
                                    <option value="COWO">Laki - Laki</option>
                                    <option value="CEWE">Perempuan</option>
                                </select>
                                <label class="text-label" for="jenis_kelamin">Jenis Kelamin<span class="text-danger"> *</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="otr_leasing" id="otr_leasing" readonly style="">
                                <label class="text-label" for="otr_leasing">OTR Leasing</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="dp_po" id="dp_po" readonly style="">
                                <label class="text-label" for="dp_po">DP PO Leasing</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="dp_bayar" id="dp_bayar" readonly style="">
                                <label class="text-label" for="dp_bayar">DP Bayar Konsumen</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="pencairan" id="pencairan" readonly style="">
                                <label class="text-label" for="pencairan">Pencairan</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="angsuran" id="angsuran" readonly style="">
                                <label class="text-label" for="angsuran">Angsuran</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="tenor" id="tenor" readonly style="">
                                <label class="text-label" for="tenor">Tenor</label></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control money" name="komisi" id="komisi" readonly style="">
                                <label class="text-label" for="komisi">Komisi TAC</label></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="addEditConfirmButton">Add</button>
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
<script src="/page-script/datatables/datatables-penjualan-kredit.js"></script>
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
