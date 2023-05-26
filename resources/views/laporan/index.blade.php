@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title data-pelanggan">Cetak Laporan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label class="text-label" for="laporan_pertahun">Laporan Pertahun</label>
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi-calendar-check-fill icon-16 text-primary"></i></label>
                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button">Button</button>
                            <button class="btn btn-outline-secondary" type="button">Button</button>
                            <button class="btn btn-outline-secondary" type="button">Button</button>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="text-label text-black" for="laporan_perbulan">Laporan Perbulan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append input-primary">
                                <span class="input-group-text"><i class="flaticon-381-calendar-7"></i></span>
                            </div>
                            <select class="form-control default-select" name="" id="">
                                <option value="">Januari</option>
                                <option value="">Februari</option>
                                <option value="">Maret</option>
                                <option value="">April</option>
                                <option value="">Mei</option>
                                <option value="">Juni</option>
                                <option value="">Juli</option>
                                <option value="">Agustus</option>
                                <option value="">September</option>
                                <option value="">Oktober</option>
                                <option value="">Desember</option>
                            </select>
                            <div class="input-group-prepend ml-3 mr-3">
                                <button type="button" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-download color-success"></i>
                                    </span>Excel</button>
                            </div>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-download color-danger"></i>
                                    </span>PDF</button>
                            </div>
                            <div class="input-group-prepend ml-3 mr-3">
                                <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-print color-danger"></i>
                                    </span>Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="text-label text-black" for="laporan_pertanggal">Laporan Pertanggal</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append input-primary">
                                <span class="input-group-text"><i class="flaticon-381-calendar-3"></i></span>
                            </div>
                            <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015">
                            <div class="input-group-prepend ml-3 mr-3">
                                <button type="button" class="btn btn-rounded btn-success"><span class="btn-icon-left text-success"><i class="fa fa-download color-success"></i>
                                    </span>Excel</button>
                            </div>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-rounded btn-danger"><span class="btn-icon-left text-danger"><i class="fa fa-download color-danger"></i>
                                    </span>PDF</button>
                            </div>
                            <div class="input-group-prepend ml-3 mr-3">
                                <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-print color-danger"></i>
                                    </span>Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/page-script/pembelian.js"></script>
@endsection
