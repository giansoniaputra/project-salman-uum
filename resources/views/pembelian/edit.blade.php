@extends('layout.main')
@section('container')
<div id="pesan" data-flash="{{ session('error') }}"></div>
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Pembelian</h4>
            </div>
            <div class="card-body">
                <div id="smartwizard" class="form-wizard order-create">
                    <ul class="nav nav-wizard">
                        <li><a class="nav-link link1" href="#data_konsumen">
                                <span>1</span>
                            </a></li>
                        <li><a class="nav-link link2" href="#data_motor">
                                <span>2</span>
                            </a></li>
                        <li><a class="nav-link link3" href="#harga">
                                <span>3</span>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <form action="/pembelian/{{ $beli->unique }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="oldImageSTNK" value="{{ $motor->photo_stnk }}">
                            <input type="hidden" name="oldImageBPKB" value="{{ $motor->photo_bpkb }}">
                            <div id="data_konsumen" class="tab-pane" role="tabpanel">
                                <div class="row form-material">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="nik">NIK</label>
                                            <input type="text" name="nik" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror"
                                                value="{{ old('nik' , $consumer->nik) }}" placeholder="Masukan NIK">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="nama">Nama Lengkap</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', $consumer->nama) }}"
                                                placeholder="Masukan Nama Lengkap">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label" for="tanggal_lahir">Tempat Tanggal Lahir</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-location-4"></i></span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    value="{{ old('tempat_lahir', $consumer->tempat_lahir) }}"
                                                    placeholder="Masukan Tempat Lahir" name="tempat_lahir"
                                                    id="tempat_lahir">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-3 col-sm-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    value="{{ old('tanggal_lahir', $consumer->tanggal_lahir) }}"
                                                    placeholder="Masukan Tanggal Lahir" name="tanggal_lahir"
                                                    id="tanggal_lahir">
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                value="{{ old('jenis_kelamin', $consumer->jenis_kelamin) }}"
                                                name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div class="form-group">
                                            <label class="text-label" for="no_telepon">Nomor Telepon</label>
                                            <input class="form-control @error('no_telepon') is-invalid @enderror"
                                                name="no_telepon" id="no_telepon"
                                                value="{{ old('no_telepon', $consumer->no_telepon) }}">
                                            @error('no_telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div class="form-group">
                                            <label class="text-label" for="alamat">Alamat</label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                                rows="4" name="alamat"
                                                id="alamat">{{ old('alamat', $consumer->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="data_motor" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="merek">Merk</label>
                                            <input type="text" name="merek" id="merek"
                                                class="form-control @error('merek') is-invalid @enderror"
                                                value="{{ old('merek', $motor->merek) }}" placeholder="Masukan Merk">
                                            @error('merek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="type">Tipe</label>
                                            <input type="text" name="type" id="type"
                                                class="form-control @error('type') is-invalid @enderror"
                                                value="{{ old('type', $motor->type) }}" placeholder="Masukan Tipe">
                                            @error('type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="tahun_pembuatan">Tahun Pembuatan</label>
                                            <input type="year" name="tahun_pembuatan" id="tahun_pembuatan"
                                                class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                                                value="{{ old('tahun_pembuatan',$motor->tahun_pembuatan) }}"
                                                placeholder="Masukan Tahun Pembuatan">
                                            @error('tahun_pembuatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="warna">Warna</label>
                                            <input type="text" name="warna" id="warna"
                                                class="form-control @error('warna') is-invalid @enderror"
                                                value="{{ old('warna', $motor->warna) }}"
                                                placeholder="Masukan Warna">
                                            @error('warna')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="daya">Daya</label>
                                            <input type="text" name="daya" id="daya"
                                                class="form-control @error('daya') is-invalid @enderror"
                                                value="{{ old('daya', $motor->daya) }}" placeholder="Masukan Daya">
                                            @error('daya')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="bahan_bakar">Bahan Bakar</label>
                                            <input type="text" name="bahan_bakar" id="bahan_bakar"
                                                class="form-control @error('bahan_bakar') is-invalid @enderror"
                                                value="{{ old('bahan_bakar', $motor->bahan_bakar) }}"
                                                placeholder="Masukan Bahan Bakar">
                                            @error('bahan_bakar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="no_rangka">No Rangka</label>
                                            <input type="text" name="no_rangka" id="no_rangka"
                                                class="form-control @error('no_rangka') is-invalid @enderror"
                                                value="{{ old('no_rangka', $motor->no_rangka) }}"
                                                placeholder="Masukan No Rangka">
                                            @error('no_rangka')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="no_polisi">No Polisi</label>
                                            <input type="text" name="no_polisi" id="no_polisi"
                                                class="form-control @error('no_polisi') is-invalid @enderror"
                                                value="{{ old('no_polisi', $motor->no_polisi) }}"
                                                placeholder="Masukan No Polisi">
                                            @error('no_polisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label" for="bpkb">BPKB</label>
                                            <input type="text" name="bpkb" id="bpkb"
                                                class="form-control @error('bpkb') is-invalid @enderror"
                                                value="{{ old('bpkb', $motor->bpkb) }}" placeholder="Masukan BPKB">
                                            @error('bpkb')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label" for="berlaku_sampai">Berlaku Sampai</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                        class="flaticon-381-calendar-1"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('berlaku_sampai') is-invalid @enderror"
                                                value="{{ old('berlaku_sampai', $motor->berlaku_sampai) }}"
                                                placeholder="Masukan Masa Berlaku" name="berlaku_sampai"
                                                id="berlaku_sampai">
                                            @error('berlaku_sampai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label mb-3" for="photo_stnk">Foto STNK</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('photo_stnk') is-invalid @enderror"
                                                    value="{{ old('photo_stnk', $motor->photo_stnk) }}" name="photo_stnk"
                                                    id="photo_stnk" onchange="previewImageSTNK()">
                                                <label class="custom-file-label">Choose file</label>
                                                @error('photo_stnk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <img src="/storage/{{ $motor->photo_stnk }}" style="width: 250px" alt="" class="img-thumbnail mt-3 ml-5 image-stnk">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label mb-3" for="photo_bpkb">Foto BPKB</label>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('photo_bpkb') is-invalid @enderror"
                                                    value="{{ old('photo_bpkb', $motor->photo_bpkb) }}" name="photo_bpkb"
                                                    name="photo_bpkb" id="photo_bpkb" onchange="previewImageBPKB()">
                                                <label class="custom-file-label">Choose file</label>
                                                @error('photo_bpkb')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <img src="/storage/{{ $motor->photo_bpkb }}" style="width: 250px" alt="" class="img-thumbnail mt-3 ml-5 image-bpkb">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="harga" class="tab-pane" role="tabpanel">
                                <div class="row form-material">
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label" for="harga_beli">Harga Beli</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-12">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('harga_beli') is-invalid @enderror"
                                                    value="{{ old('harga_beli', $beli->harga_beli) }}"
                                                    placeholder="Masukan Harga Beli" name="harga_beli" id="harga_beli">
                                                @error('harga_beli')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <label class="text-label" for="tanggal_beli">Tanggal Pembelian</label>
                                        <div class="form-row">
                                            <div class="input-group mb-3 col-sm-12">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="flaticon-381-calendar-1"></i></span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('tanggal_beli') is-invalid @enderror"
                                                    value="{{ old('tanggal_beli', $beli->tanggal_beli) }}"
                                                    placeholder="Masukan Tanggal Pembelian" name="tanggal_beli"
                                                    id="tanggal_beli">
                                                @error('tanggal_beli')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success rounded">Tambah
                                            Transaksi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/page-script/pembelian.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const flashData = $('#pesan').data('flash');
    if (flashData) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: flashData,
        })
    }
</script>
@endsection
