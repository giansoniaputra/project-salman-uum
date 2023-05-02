@extends('layout.main')
@section('container')


<div class="col-12">
    <a href="/pembelian/create" class="btn btn-rounded btn-primary mb-3"><span
        class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
    </span>Tambah Data Motor</a>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Motor</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display min-w850">
                    <thead>
                        <tr>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Daya</th>
                            <th>Bahan Bakar</th>
                            <th>No Rangka</th>
                            <th>No Polisi</th>
                            <th>BPKB</th>
                            <th>Berlaku Sampai</th>
                            <th>Foto STNK</th>
                            <th>Foto BPKB</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Daya</th>
                            <th>Bahan Bakar</th>
                            <th>No Rangka</th>
                            <th>No Polisi</th>
                            <th>BPKB</th>
                            <th>Berlaku Sampai</th>
                            <th>Foto STNK</th>
                            <th>Foto BPKB</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection