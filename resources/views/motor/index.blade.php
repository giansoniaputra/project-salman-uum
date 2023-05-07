@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Motor</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTables" class="display min-w850">
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
<script src="/js/page-script/motor.js"></script>
@endsection