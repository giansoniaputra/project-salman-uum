@extends('layout.main')
@section('container')
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <div id="pesan" data-flash="{{ session('success') }}"></div>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-rounded btn-primary mb-3" data-toggle="modal"
                data-target=".bd-example-modal-lg"><span class="btn-icon-left text-primary"><i
                        class="fa fa-money color-primary"></i>
                </span>Set Modal Awal</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
                id="modal-halaman-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Set Modal Awal</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="basic-form">
                                <form>
                                    <label class="text-label" for="masukan_modal">Masukan Modal Awal</label>
                                    <div class="form-row">
                                        <div class="input-group">
                                            <div class="input-group-append input-primary">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control input-default money" placeholder="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><span
                                    class="btn-icon-left text-danger"><i class="fa fa-close color-danger"></i>
                                </span>Tutup</button>
                            <button type="button" class="btn btn-rounded btn-primary" id="save-data"><span
                                    class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                                </span>Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Halaman Modal</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 font-w600 text-white">76</h2>
                                            <span class="text-white">Modal Awal</span>
                                        </div>
                                        <h1 class="la la-money-bill-wave text-white"></h1>
                                    </div>
                                </div>
                                <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-red progress-animated"
                                        style="width: 50%; height:4px;" role="progressbar">
                                        <span class="sr-only">50% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-sm-6">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 text-white font-w600">124,551</h2>
                                            <span class="text-white">Jumlah Asset</span>
                                        </div>
                                        <h1 class="la la-archive text-white"></h1>
                                    </div>
                                </div>
                                <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-red progress-animated"
                                        style="width: 90%; height:4px;" role="progressbar">
                                        <span class="sr-only">90% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-sm-6">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 text-white font-w600">442</h2>
                                            <span class="text-white">Sisa Modal</span>
                                        </div>
                                        <h1 class="la la-money-bill-wave-alt text-white"></h1>
                                    </div>
                                </div>
                                <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-red progress-animated"
                                        style="width: 30%; height:4px;" role="progressbar">
                                        <span class="sr-only">30% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-sm-6">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body mr-3">
                                            <h2 class="fs-34 text-white font-w600">$5,034</h2>
                                            <span class="text-white">Laba</span>
                                        </div>
                                        <h1 class="text-white">$</h1>
                                    </div>
                                </div>
                                <div class="progress  rounded-0" style="height:4px;">
                                    <div class="progress-bar rounded-0 bg-red progress-animated"
                                        style="width: 94%; height:4px;" role="progressbar">
                                        <span class="sr-only">94% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Simple Money Format --}}
    <script src="/js/simple.money.format.js"></script>
    <script src="/js/simple.money.format.init.js"></script>
    {{-- !Simple Money Format --}}
    <script src="/js/page-script/modal.js"></script>
    <script src="/js/page-script/pembelian.js"></script>
    <script src="/js/page-script/penjualan.js"></script>
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
