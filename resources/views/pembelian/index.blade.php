@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="col-12">
    <a href="/pembelian/create" class="btn btn-rounded btn-primary mb-3"><span
        class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
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
                            <th>Merek</th>
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
                            <th>Merek</th>
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