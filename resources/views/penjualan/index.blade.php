@extends('layout.main')
@section('container')
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
                        <div class="modal-body">Modal body text goes here.</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
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
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi</th>
                                    <th>Merk</th>
                                    <th>Warna</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>dsa</td>
                                <td>ads</td>
                                <td>dsa</td>
                                <td>ads</td>
                                <td>sad</td>
                                <td>sad</td>
                                <td>sad</td>
                                <td>tasd</td>
                                <td>asdas</td>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi</th>
                                    <th>Merk</th>
                                    <th>Warna</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
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
@endsection
