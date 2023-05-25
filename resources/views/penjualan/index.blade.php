@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Penjualan Cash</h4>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    {{-- DATATABLE CASH --}}
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
                                <!-- Add New Button Start -->
                                <button type="button" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable-penjualanCash">
                                    <i data-acorn-icon="plus"></i>
                                    <span>Tambah Data Penjualan Cash</span>
                                </button>
                                <!-- Add New Button End -->

                                <!-- Check Button Start -->
                                <div class="btn-group ms-1 check-all-container">
                                    <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
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
                                    </div>
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
                                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableBoxed" />
                                    <span class="search-magnifier-icon">
                                        <i data-acorn-icon="search"></i>
                                    </span>
                                    <span class="search-delete-icon d-none">
                                        <i data-acorn-icon="close"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- Search End -->

                            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                                <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                    {{-- <!-- Add Button Start -->
                                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" type="button">
                                                        <i data-acorn-icon="plus"></i>
                                                    </button>
                                                    <!-- Add Button End --> --}}

                                    <!-- Edit Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button">
                                        <i data-acorn-icon="edit"></i>
                                    </button>
                                    <!-- Edit Button End -->

                                    <!-- Delete Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button">
                                        <i data-acorn-icon="bin"></i>
                                    </button>
                                    <!-- Delete Button End -->
                                </div>
                                <div class="d-inline-block">
                                    <!-- Print Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-bs-delay="0" data-datatable="#datatableBoxed" data-bs-toggle="tooltip" data-bs-placement="top" title="Print" type="button">
                                        <i data-acorn-icon="print"></i>
                                    </button>
                                    <!-- Print Button End -->

                                    <!-- Export Dropdown Start -->
                                    <div class="d-inline-block datatable-export" data-datatable="#datatableBoxed">
                                        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
                                                <i data-acorn-icon="download"></i>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <button class="dropdown-item export-copy" type="button">Copy</button>
                                            <button class="dropdown-item export-excel" type="button">Excel</button>
                                            <button class="dropdown-item export-cvs" type="button">Csv</button>
                                        </div>
                                    </div>
                                    <!-- Export Dropdown End -->

                                    <!-- Length Start -->
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
                                    <!-- Length End -->
                                </div>
                            </div>
                        </div>
                        <!-- Controls End -->

                        <!-- Table Start -->
                        <div>
                            <table id="datatableBoxed_penjualan_cash" class="data-table nowrap hover">
                                <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">No</th>
                                        <th class="text-muted text-small text-uppercase">Nama Pembeli</th>
                                        <th class="text-muted text-small text-uppercase">No Polisi</th>
                                        <th class="text-muted text-small text-uppercase">Merk</th>
                                        <th class="text-muted text-small text-uppercase">Warna</th>
                                        <th class="text-muted text-small text-uppercase">Harga Jual</th>
                                        <th class="empty all">&nbsp;</th>
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
