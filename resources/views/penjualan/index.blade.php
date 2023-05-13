@extends('layout.main')
@section('container')
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- Simple Money Format --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simpleMoneyFormat/2.1.0/simpleMoneyFormat.js"></script>
    <div id="pesan" data-flash="{{ session('success') }}"></div>
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-rounded btn-primary mb-3" data-toggle="modal"
                data-target=".bd-example-modal-lg"><span class="btn-icon-left text-primary"><i
                        class="fa fa-plus color-primary"></i>
                </span>Tambah Data Penjualan</button>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Penjualan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row form-material">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-row">
                                        <label class="text-label" for="no_polisi">No Polisi</label>
                                        <select id="single-select" name="no_polisi"
                                            class="form-control input-default @error('no_polisi') is-invalid @enderror"
                                            value="{{ old('no_polisi') }}" placeholder="Masukan No Polisi">
                                            <option value="">Pilih No Polisi</option>
                                            @foreach ($no_polisi as $row)
                                                <option value="{{ $row->no_polisi }}">{{ $row->no_polisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('no_polisi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-row">
                                        <label class="text-label" for="merk">Merk</label>
                                        <input type="text" name="merk" id="merk"
                                            class="form-control input-default @error('merk') is-invalid @enderror"
                                            value="{{ old('merk') }}" placeholder="Masukan Merk" disabled>
                                        @error('merk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-row">
                                        <label class="text-label" for="warna">Warna</label>
                                        <input type="text" name="warna" id="warna"
                                            class="form-control input-default @error('warna') is-invalid @enderror"
                                            value="{{ old('warna') }}" placeholder="Masukan Warna" disabled>
                                        @error('warna')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="text-label" for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <div class="form-row">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="flaticon-381-id-card"></i></span>
                                            </div>
                                            <select
                                                class="form-control default-select @error('jenis_pembayaran') is-invalid @enderror"
                                                value="{{ old('jenis_pembayaran') }}" name="jenis_pembayaran"
                                                id="jenis_pembayaran">
                                                <option value="">Pilih Opsi Pembayaran</option>
                                                <option value="CASH">CASH</option>
                                                <option value="KREDIT">KREDIT</option>
                                            </select>
                                            @error('jenis_pembayaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="buys-content-cash" class="row form-material d-none" style="padding-bottom: 92.75px">
                                <div class="col-lg-12 mb-3">
                                    <label class="text-label" for="tahun_pembuatan">Tahun Pembuatan</label>
                                    <div class="form-row">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                        class="flaticon-381-calendar-1"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control input-default @error('tahun_pembuatan') is-invalid @enderror"
                                                value="{{ old('tahun_pembuatan') }}" placeholder="Masukan Tahun Pembuatan"
                                                name="tahun_pembuatan" id="tahun_pembuatan">
                                            @error('tahun_pembuatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="text-label" for="harga_jual">Harga Jual</label>
                                    <div class="form-row">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text"
                                                class="form-control input-default input-default @error('harga_jual') is-invalid @enderror"
                                                value="{{ old('harga_jual') }}" placeholder="Masukan Harga Jual"
                                                name="harga_jual" id="harga_jual">
                                            @error('harga_jual')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <input type="text"
                                                class="form-control input-default @error('harga_beli') is-invalid @enderror"
                                                value="{{ old('harga_beli') }}" placeholder="Masukan Harga Beli"
                                                name="harga_beli" id="harga_beli">
                                            @error('harga_beli')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="buys-content-kredit" class="d-none" style="padding-bottom: 92.75px">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal"><span
                                    class="btn-icon-left text-danger"><i class="fa fa-close color-danger"></i>
                                </span>Tutup</button>
                            <button type="button" class="btn btn-rounded btn-primary"><span
                                    class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
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
                                <td>1</td>
                                <td>sadasd</td>
                                <td>sdadsa</td>
                                <td>sdasad</td>
                                <td>sadsad</td>
                                <td>saddsa</td>
                                <td>
                                    <button class="btn btn-info btn-sm info-button">
                                        <i class="flaticon-381-view-2"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm edit-button">
                                        <i class="flaticon-381-edit-1"></i>
                                    </button>
                                    <button
                                        class="btn
                                            btn-danger btn-sm delete-button">
                                        <i class="flaticon-381-trash-1"></i>
                                    </button>
                                </td>
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
