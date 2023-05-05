@extends('layout.main')
@section('container')
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <div id="pesan" data-flash="{{ session('success') }}"></div>
    <div class="col-12">
        <a href="/pembelian/create" class="btn btn-rounded btn-primary mb-3"><span class="btn-icon-left text-primary"><i
                    class="fa fa-plus color-primary"></i>
            </span>Tambah Data Pembelian</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Transaksi Pembelian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTables" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merk</th>
                                <th>No Polisi</th>
                                <th>Warna</th>
                                <th>Tanggal Beli</th>
                                <th>Harga Beli</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Merk</th>
                                <th>No Polisi</th>
                                <th>Warna</th>
                                <th>Tanggal Beli</th>
                                <th>Harga Beli</th>
                                <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="accordion-two" class="accordion accordion-primary-solid">
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseOne"> <span class="accordion__header--text text-white">Data Penjual</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseOne" class="collapse accordion__body" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                <div class="table-responsive">
                                                    <table class="table header-border table-responsive-sm table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>NIK</td>
                                                                <td>:</td>
                                                                <td><span id="nik"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>:</td>
                                                                <td><span id="nama"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Tempat Lahir</td>
                                                                <td>:</td>
                                                                <td><span id="tempat-lahir"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Lahir</td>
                                                                <td>:</td>
                                                                <td><span id="tanggal-lahir"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin</td>
                                                                <td>:</td>
                                                                <td><span id="jenis-kelamin"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat</td>
                                                                <td>:</td>
                                                                <td><span id="alamat"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Foto KTP</td>
                                                                <td>:</td>
                                                                <td><span id="foto-ktp"></span></td>    
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseTwo"> <span class="accordion__header--text text-white">Data Motor</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseTwo" class="collapse accordion__body" data-parent="#accordion-two">
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
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseThree"> <span class="accordion__header--text text-white">Data Pembelian</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseThree" class="collapse accordion__body" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                <div class="table-responsive">
                                                    <table class="table header-border table-responsive-sm table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>Tanggal Beli</td>
                                                                <td>:</td>
                                                                <td><span id="tanggal-beli"></span></td>    
                                                            </tr>
                                                            <tr>
                                                                <td>Harga Beli</td>
                                                                <td>:</td>
                                                                <td><span id="harga-beli"></span></td>    
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
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/page-script/pembelian.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const flashData = $('#pesan').data('flash');
        if (flashData) {
            Swal.fire(
                'Good job!',
                flashData,
                'success'
            )
        }
    </script>
@endsection
