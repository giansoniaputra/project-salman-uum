@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="row">
    <div class="col">
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
                    {{-- <div class="btn-group ms-1 check-all-container">
                        <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
                            <span class="form-check float-end">
                                <input type="checkbox" class="form-check-input" id="datatableCheckAll" />
                            </span>
                        </div>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu></button>
                        <div class="dropdown-menu dropdown-menu-end"> --}}
                    {{-- <div class="dropdown dropstart dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle tag-datatable caret-absolute disabled" type="button">Tag</button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item tag-done" type="button">Done</button>
                                    <button class="dropdown-item tag-new" type="button">New</button>
                                    <button class="dropdown-item tag-sale" type="button">Sale</button>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div> --}}
                    {{-- <button class="dropdown-item disabled delete-datatable_Pembelian" type="button">Delete</button>
                        </div>
                    </div> --}}
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
                        <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableBoxed_pembelian" />
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
                        {{-- <!-- Info Button Start -->
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow detail-datatable" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" type="button">
                            <i data-acorn-icon="info-circle"></i>
                        </button>
                        <!-- Info Button End --> --}}

                        {{-- <!-- Add Button Start -->
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable_pembelian" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Data" type="button">
                            <i data-acorn-icon="plus"></i>
                        </button>
                        <!-- Add Button End --> --}}

                        {{-- <!-- Edit Button Start -->
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable_Pembelian disabled" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data" type="button">
                            <i data-acorn-icon="edit"></i>
                        </button>
                        <!-- Edit Button End --> --}}

                        {{-- <!-- Delete Button Start -->
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable_Pembelian" data-bs-delay="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data" type="button">
                            <i data-acorn-icon="bin"></i>
                        </button>
                        <!-- Delete Button End --> --}}
                    </div>
                    <div class="d-inline-block">
                        <!-- Add New Button Start -->
                        <a href="/pembelian/create" class="btn btn-primary btn-icon btn-icon-start w-100 w-md-auto">
                            <i data-acorn-icon="plus"></i>
                            <span>Tambah Data</span>
                        </a>
                        <!-- Add New Button End -->

                        {{-- <!-- Print Button Start -->
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-bs-delay="0" data-datatable="#datatableBoxed" data-bs-toggle="tooltip" data-bs-placement="top" title="Print Data" type="button">
                            <i data-acorn-icon="print"></i>
                        </button>
                        <!-- Print Button End --> --}}

                        {{-- <!-- Export Dropdown Start -->
                        <div class="d-inline-block datatable-export" data-datatable="#datatableBoxed">
                            <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export Data">
                                    <i data-acorn-icon="download"></i>
                                </span>
                            </button>
                            <div class="dropdown-menu shadow dropdown-menu-end">
                                <button class="dropdown-item export-copy" type="button">Copy</button>
                                <button class="dropdown-item export-excel" type="button">Excel</button>
                                <button class="dropdown-item export-cvs" type="button">CSV</button>
                            </div>
                        </div>
                        <!-- Export Dropdown End --> --}}

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
                    </div>
                </div>
            </div>
            <!-- Controls End -->

            <!-- Table Start -->
            <div>
                <table id="datatableBoxed_pembelian" class="data-table nowrap hover" style="font-family: 'Nunito Sans', sans-serif; font-size: 0.9em ">
                    <thead>
                        <tr>
                            <th class="text-muted text-small text-uppercase">No</th>
                            <th class="text-muted text-small text-uppercase">No Transaksi</th>
                            <th class="text-muted text-small text-uppercase">Merk</th>
                            <th class="text-muted text-small text-uppercase">No Polisi</th>
                            <th class="text-muted text-small text-uppercase">Warna</th>
                            <th class="text-muted text-small text-uppercase">Tanggal Beli</th>
                            <th class="text-muted text-small text-uppercase">Harga Beli</th>
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

        {{-- <!-- Add Edit Modal Start -->
        <div class="modal modal-center fade" id="addEditModal_Pembelian" tabindex="-1" role="dialog" aria-labelledby="modalTitle_Pembelian" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle_Pembelian">Tambah Data Pembelian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="addEditConfirmButton_Pembelian" title="Tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Edit Modal End --> --}}
    </div>
</div>
<script src="/page-script/pembelian.js"></script>
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
