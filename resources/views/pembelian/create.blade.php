@extends('layout.main')
@section('container')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Pembelian</h4>
                </div>
                <div class="card-body">
                    <div id="smartwizard" class="form-wizard order-create">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link" href="#data_konsumen">
                                    <span>1</span>
                                </a></li>
                            <li><a class="nav-link" href="#data_motor">
                                    <span>2</span>
                                </a></li>
                            <li><a class="nav-link" href="#harga">
                                    <span>3</span>
                                </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="data_konsumen" class="tab-pane" role="tabpanel">
                                <div class="row form-material">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">NIK</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="Masukan NIK" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Nama Lengkap</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Masukan Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label">Tempat Tanggal Lahir</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-location-4"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Tempat Lahir">
                                            </div>
                                            <div class="input-group mb-3 col-sm-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Tanggal Lahir" id="mdate">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Jenis Kelamin</label>
                                            <select class="form-control default-select" id="sel1">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Alamat</label>
                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="data_motor" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Merk</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="Masukan Merk" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Tipe</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Masukan Tipe" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Daya</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="Masukan Daya" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Bahan Bakar</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Masukan Bahan Bakar" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">No Rangka</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="Masukan No Rangka" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">No Polisi</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Masukan No Polisi" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">BPKB</label>
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="Masukan BPKB" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Berlaku Sampai</label>
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Masukan Tahun Berlaku" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label mb-3">Foto STNK</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label mb-3">Foto BPKB</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="harga" class="tab-pane" role="tabpanel">
                                <div class="row form-material">
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label">Harga Beli</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-12">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Harga Beli">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label">Tanggal Pembelian</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-12">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukan Tanggal Pembelian" id="mdate2">

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
    </div>
@endsection
