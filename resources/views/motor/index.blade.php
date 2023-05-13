@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Motor</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tersedia"><i
                                        class="la la-check-circle mr-2"></i>
                                    Tersedia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#terjual"><i
                                        class="la la-cart-arrow-down mr-2"></i>
                                    Terjual</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tersedia" role="tabpanel">
                                <div class="pt-4">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="dataTables" class="display min-w850 text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Polisi</th>
                                                        <th>Merk</th>
                                                        <th>Warna</th>
                                                        <th>Tahun Pembuatan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Polisi</th>
                                                        <th>Merk</th>
                                                        <th>Warna</th>
                                                        <th>Tahun Pembuatan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="terjual">
                                <div class="pt-4">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="dataTables" class="display min-w850 text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Polisi</th>
                                                        <th>Merk</th>
                                                        <th>Warna</th>
                                                        <th>Tahun Pembuatan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No Polisi</th>
                                                        <th>Merk</th>
                                                        <th>Warna</th>
                                                        <th>Tahun Pembuatan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-detail-motor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Motor</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="accordion-two" class="accordion accordion-primary-solid">
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse"
                                            data-target="#bordered_collapseTwo"> <span
                                                class="accordion__header--text text-white">Data Motor</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseTwo" class="collapse accordion__body"
                                            data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                <div class="table-responsive">
                                                    <table class="table header-border table-responsive-sm table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>No Polisi</td>
                                                                <td>:</td>
                                                                <td><span id="no-polisi"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Merk</td>
                                                                <td>:</td>
                                                                <td><span id="merk"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tipe</td>
                                                                <td>:</td>
                                                                <td><span id="tipe"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Warna</td>
                                                                <td>:</td>
                                                                <td><span id="warna"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tahun Pembuatan</td>
                                                                <td>:</td>
                                                                <td><span id="tahun-pembuatan"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Daya</td>
                                                                <td>:</td>
                                                                <td><span id="daya"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>No Rangka</td>
                                                                <td>:</td>
                                                                <td><span id="no-rangka"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bahan Bakar</td>
                                                                <td>:</td>
                                                                <td><span id="bahan-bakar"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>BPKB</td>
                                                                <td>:</td>
                                                                <td><span id="bpkb"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Berlaku Sampai</td>
                                                                <td>:</td>
                                                                <td><span id="berlaku-sampai"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Foto BPKB</td>
                                                                <td>:</td>
                                                                <td><span id="foto-bpkb"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Foto STNK</td>
                                                                <td>:</td>
                                                                <td><span id="foto-stnk"></span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><span
                            class="btn-icon-left text-danger"><i class="fa fa-close color-danger"></i>
                        </span>Tutup</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Gambar --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-image">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header primary">
                    <h5 class="modal-title text-black" id="judul-modal-photo"></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="img-photo" class="d-flex justify-content-center align-items-center"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/page-script/motor.js"></script>
@endsection
