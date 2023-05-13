@extends('layout.main')
@section('container')
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <div id="pesan" data-flash="{{ session('success') }}"></div>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-rounded btn-primary mb-3" data-toggle="modal"
                data-target=".bd-example-modal-lg"><span class="btn-icon-left text-primary"><i
                        class="fa fa-plus color-primary"></i>
                </span>Tambah Data Penjualan</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
                id="modal-transaksi">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Penjualan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;">
                                @csrf
                                <div class="row form-material">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-row">
                                            <label class="text-label" for="nama_pembeli">Nama Pembeli</label>
                                            <input type="text" name="nama_pembeli" id="nama_pembeli"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-row">
                                            <label class="text-label" for="no_polisi">No Polisi</label>
                                            <select id="single-select" name="no_polisi" class="form-control no-polisi"
                                                placeholder="Masukan No Polisi">
                                                <option value="">Pilih No Polisi</option>
                                                @foreach ($no_polisi as $row)
                                                    <option value="{{ $row->id }}">{{ $row->no_polisi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-row">
                                            <label class="text-label" for="merk">Merk</label>
                                            <input type="text" name="merk" id="merk" class="form-control"
                                                style="background-color: rgba(215, 218, 227, 0.3)" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-row">
                                            <label class="text-label" for="warna">Warna</label>
                                            <input type="text" name="warna" id="warna" class="form-control"
                                                style="background-color: rgba(215, 218, 227, 0.3)" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="tahun_pembuatan">Tahun Pembuatan</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="tahun_pembuatan"
                                                    id="tahun_pembuatan" disabled
                                                    style="background-color: rgba(215, 218, 227, 0.3)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="harga_beli">Harga Beli</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" name="harga_beli" id="harga_beli"
                                                    style="background-color: rgba(215, 218, 227, 0.3)" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="tanggal_jual">Tanggal Penjualan</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-12">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Tanggal Penjualan" name="tanggal_jual"
                                                    id="tanggal_jual">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="jenis_pembayaran">Jenis Pembayaran</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-id-card"></i></span>
                                                </div>
                                                <select class="form-control" name="jenis_pembayaran"
                                                    id="jenis_pembayaran">
                                                    <option value="">Pilih Opsi Pembayaran</option>
                                                    <option value="CASH">CASH</option>
                                                    <option value="KREDIT">KREDIT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="buys-content-cash" class="row form-material d-none"
                                    style="padding-bottom: 92.75px">
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="harga_jual">Harga Jual</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Harga Jual" name="harga_jual" id="harga_jual">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="jumlah_bayar">Jumlah Bayar</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control money"
                                                    placeholder="Masukan Jumlah Bayar" name="jumlah_bayar"
                                                    id="jumlah_bayar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="text-label" for="kembali">Kembalian</label>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" name="kembali" id="kembali"
                                                    style="background-color: rgba(215, 218, 227, 0.3)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="buys-content-kredit" class="d-none" style="padding-bottom: 92.75px">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><span
                                    class="btn-icon-left text-danger"><i class="fa fa-close color-danger"></i>
                                </span>Tutup</button>
                            <button type="button" class="btn btn-rounded btn-primary"><span
                                    class="btn-icon-left text-primary" id="save-data"><i
                                        class="fa fa-plus color-primary"></i>
                                </span>Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Transaksi Penjualan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850 text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi</th>
                                    <th>Merk</th>
                                    <th>Warna</th>
                                    <th>Harga Jual</th>
                                    <th>Jenis Pembayaran</th>
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
                                    <th>Harga Jual</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/page-script/pembelian.js"></script>
    <script src="/js/page-script/penjualan.js"></script>

    {{-- Simple Money Format --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simpleMoneyFormat/2.1.0/simpleMoneyFormat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const flashData = $('#pesan').data('flash');
        if (flashData) {
            Swal.fire(
                'Good job!', flashData, 'success'
            )
        }
    </script>
    {{-- Simple Money Format --}}
    <script>
        var harga_beliInput = document.getElementById("harga_beli");
        harga_beliInput.addEventListener("keyup", function(event) {
            // Call simpleMoneyFormat function
            var formattedharga_beli = simpleMoneyFormat.format(harga_beliInput.value);
            harga_beliInput.value = formattedharga_beli;
        });
    </script>
@endsection
