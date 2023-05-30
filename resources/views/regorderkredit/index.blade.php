@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card mb-5">
            <div class="card-header">
                <h4 class="card-title">Register Order Kredit</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3 form-floating">
                            <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control @error('nama_nasabah')is-invalid @enderror" value="{{ old('nama_nasabah') }}" placeholder="Masukan Nama Nasabah">
                            @error('nama_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="nama_nasabah">Nama Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-floating">
                            <input type="text" name="no_telepon_nasabah" id="no_telepon_nasabah" class="form-control @error('no_telepon_nasabah')is-invalid @enderror" value="{{ old('no_telepon_nasabah') }}" placeholder="Masukan No Telepon Nasabah">
                            @error('no_telepon_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="no_telepon_nasabah">No Telepon Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <textarea class="form-control @error('alamat_nasabah')is-invalid @enderror" rows="3" name="alamat_nasabah" id="alamat_nasabah" placeholder="Masukan Alamat Nasabah">{{ old('alamat_nasabah') }}</textarea>
                            @error('alamat_nasabah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="alamat_nasabah">&nbsp;&nbsp;Alamat Nasabah<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="dealer" id="dealer" class="form-control @error('dealer')is-invalid @enderror" value="{{ old('dealer') }}" placeholder="Masukan Nama Dealer">
                            @error('dealer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dealer">Nama Dealer<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="CMO Leasing" id="CMO Leasing" class="form-control @error('CMO Leasing')is-invalid @enderror" value="{{ old('CMO Leasing') }}" placeholder="Masukan CMO Leasing">
                            @error('CMO Leasing')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="CMO Leasing">CMO Leasing<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating">
                            <input type="text" name="pic_showroom" id="pic_showroom" class="form-control @error('pic_showroom')is-invalid @enderror" value="{{ old('pic_showroom') }}" placeholder="Masukan Sales/PIC Showroom">
                            @error('pic_showroom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="pic_showroom">Sales/PIC Showroom<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3 form-floating w-100">
                            <select id="jenis_transaksi" name="jenis_transaksi">
                                <option label="&nbsp;"></option>
                                <option value="CASH">Cash</option>
                                <option value="KREDIT">Kredit</option>
                            </select>
                            <label class="text-label" for="jenis_transaksi">Jenis Transaksi<span class="text-danger"> *</label></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-floating w-100">
                            <select id="kredit_via_leasing" name="kredit_via_leasing">
                                <option label="&nbsp;"></option>
                                <option value="MUF">MUF</option>
                                <option value="ADIRA">Adira</option>
                                <option value="CASH">Cash</option>
                            </select>
                            <label class="text-label" for="kredit_via_leasing">Kredit Via Leasing<span class="text-danger"> *</label></span>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="merk_motor" id="merk_motor" class="form-control @error('merk_motor')is-invalid @enderror" value="{{ old('merk_motor') }}" placeholder="Masukan Merk Motor">
                            @error('merk_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="merk_motor">Merk Motor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tipe_motor" id="tipe_motor" class="form-control @error('tipe_motor')is-invalid @enderror" value="{{ old('tipe_motor') }}" placeholder="Masukan Tipe Motor">
                            @error('tipe_motor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tipe_motor">Tipe Motor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tahun_kendaraan" id="tahun_kendaraan" class="form-control @error('tahun_kendaraan')is-invalid @enderror" value="{{ old('tahun_kendaraan') }}" placeholder="Masukan Tahun Kendaraan">
                            @error('tahun_kendaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tahun_kendaraan">Tahun Kendaraan<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="otr" id="otr" class="form-control @error('otr')is-invalid @enderror" value="{{ old('otr') }}" placeholder="Masukan OTR">
                            @error('otr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="otr">OTR<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="dp_po" id="dp_po" class="form-control @error('dp_po')is-invalid @enderror" value="{{ old('dp_po') }}" placeholder="Masukan DP PO">
                            @error('dp_po')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dp_po">DP PO<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="pencairan" id="pencairan" class="form-control @error('pencairan')is-invalid @enderror" value="{{ old('pencairan') }}" placeholder="Masukan Pencairan">
                            @error('pencairan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="pencairan">Pencairan<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="dp_bayar" id="dp_bayar" class="form-control @error('dp_bayar')is-invalid @enderror" value="{{ old('dp_bayar') }}" placeholder="Masukan DP Bayar">
                            @error('dp_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="dp_bayar">DP Bayar<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="angsuran" id="angsuran" class="form-control @error('angsuran')is-invalid @enderror" value="{{ old('angsuran') }}" placeholder="Masukan Angsuran">
                            @error('angsuran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="angsuran">Angsuran<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 form-floating w-100">
                            <input type="text" name="tenor" id="tenor" class="form-control @error('tenor')is-invalid @enderror" value="{{ old('tenor') }}" placeholder="Masukan Tenor">
                            @error('tenor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="tenor">Tenor<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                <div>
                    <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                        <span>Tambah</span>
                        {{-- <i data-acorn-icon="chevron-right"></i> --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
