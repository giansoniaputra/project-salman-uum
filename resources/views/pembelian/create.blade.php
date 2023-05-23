@extends('layout.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
<div id="pesan" data-flash="{{ session('error') }}"></div>
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Pembelian</h4>
            </div>
            <div class="card-body">
                <!-- Basic Start -->
                <div class="card mb-5 wizard" id="wizardBasic">
                    <div class="card-header border-0 pb-0">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#data_konsumen" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">Data Konsumen</div>
                                    <div class="text-small description d-none d-md-block">Tambah Data Konsumen</div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#data_motor" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">Data Motor</div>
                                    <div class="text-small description d-none d-md-block">Tambah Data Motor</div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#harga" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">Harga</div>
                                    <div class="text-small description d-none d-md-block">Tambah Harga</div>
                                </a>
                            </li>
                            <li class="nav-item d-none" role="presentation">
                                <a class="nav-link text-center" href="#basicLast" role="tab"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body sh-35">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="data_konsumen" role="tabpanel">
                                {{-- <h5 class="card-title">Pilih Penjual terlebih dahulu</h5>
                                <p class="card-text text-alternate mb-4">With supporting text below as a natural lead-in to additional content.</p> --}}
                                <form action="/pembelian" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row form-material">
                                        <input type="hidden" value="{{ old('oldKTP') }}" name="oldKTP" id="oldKTP">
                                    </div>
                                    <div class="form-floating mb-3 w-100">
                                        <select class="form-control @error('penjual') is-invalid @enderror" value="{{ old('penjual') }}" name="penjual" id="selectFloating">
                                            <option value="">Pilih Penjual</option>
                                            <option value="INDIVIDU">INDIVIDU</option>
                                            <option value="DEALER">DEALER</option>
                                        </select>
                                        @error('penjual')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <label class="text-label" for="penjual">Pilih Penjual<span class="text-danger"> *</label></span>
                                    </div>
                                    <div id="consumer-content-individu" class="d-none" style="padding-bottom: 92.75px">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nik" id="nik" class="form-control input-default @error('nik')is-invalid @enderror" value="{{ old('nik') }}" placeholder="Masukan NIK">
                                            @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <label class="text-label" for="nik">NIK<span class="text-danger"> *</label></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="data_motor" role="tabpanel">
                                <h5 class="card-title">Second Title</h5>
                                <p class="card-text text-alternate mb-4">With supporting text below as a natural lead-in to additional content.</p>
                                <form>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>E-MAIL</span>
                                    </label>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" id="password" type="password" placeholder="" />
                                        <span>PASSWORD</span>
                                    </label>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="harga" role="tabpanel">
                                <h5 class="card-title">Third Title</h5>
                                <p class="card-text text-alternate mb-4">With supporting text below as a natural lead-in to additional content.</p>
                                <form>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>COUNTRY</span>
                                    </label>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>CITY</span>
                                    </label>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="basicLast" role="tabpanel">
                                <div class="text-center mt-5">
                                    <h5 class="card-title">Thank You!</h5>
                                    <p class="card-text text-alternate mb-4">Your registration completed successfully!</p>
                                    <button class="btn btn-icon btn-icon-start btn-primary btn-reset" type="button">
                                        <i data-acorn-icon="rotate-left"></i>
                                        <span>Reset</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center border-0 pt-1">
                        <button class="btn btn-icon btn-icon-start btn-outline-primary btn-prev" type="button">
                            <i data-acorn-icon="chevron-left"></i>
                            <span>Back</span>
                        </button>
                        <button class="btn btn-icon btn-icon-end btn-outline-primary btn-next" type="button">
                            <span>Next</span>
                            <i data-acorn-icon="chevron-right"></i>
                        </button>
                    </div>
                </div>
                <!-- Basic End -->
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
{{-- Simple Money Format --}}
<script src="/page-script/simple.money.format.js"></script>
<script src="/page-script/simple.money.format.init.js"></script>
{{-- !Simple Money Format --}}
<script src="/page-script/pembelian.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const flashData = $("#pesan").data("flash");
    if (flashData) {
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: flashData
        , })
    }

</script>
@endsection
