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
                                <option selected>Pilih Tahun</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                            </select>
                            <button class="btn btn-primary" type="button">
                                <i data-acorn-icon="download" data-acorn-size="18"></i>
                                <span class="label">PDF</span>
                            </button>
                            <button class="btn btn-secondary" type="button">Print</button>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="text-label" for="laporan_pertahun">Laporan Perbulan</label>
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi-calendar2-month-fill icon-16 text-primary"></i></label>
                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
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
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-secondary" type="button">Button</button>
                            <button class="btn btn-tertiary" type="button">Button</button>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="text-label" for="laporan_pertahun">Laporan Pertanggal</label>
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi-calendar-date-fill icon-16 text-primary"></i></label>
                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-secondary" type="button">Button</button>
                            <button class="btn btn-tertiary" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/page-script/pembelian.js"></script>
@endsection
