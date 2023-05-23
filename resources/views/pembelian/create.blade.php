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
                <!-- Last Step End Start -->
                <h2 class="small-title">Last Step End</h2>
                <div class="card mb-5 wizard" id="wizardLastStepEnd">
                    <div class="card-header border-0 pb-0">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#lastStepEndFirst" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">First</div>
                                    <div class="text-small description d-none d-md-block">First description</div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#lastStepEndSecond" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">Second</div>
                                    <div class="text-small description d-none d-md-block">Second description</div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center" href="#lastStepEndThird" role="tab">
                                    <div class="mb-1 title d-none d-sm-block">Third</div>
                                    <div class="text-small description d-none d-md-block">Third description</div>
                                </a>
                            </li>
                            <li class="nav-item d-none" role="presentation">
                                <a class="nav-link text-center" href="#lastStepEndLast" role="tab"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body sh-35">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="lastStepEndFirst" role="tabpanel">
                                <h5 class="card-title">First Title</h5>
                                <p class="card-text text-alternate mb-4">With supporting text below as a natural lead-in to additional content.</p>
                                <form>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>FIRST NAME</span>
                                    </label>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>LAST NAME</span>
                                    </label>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="lastStepEndSecond" role="tabpanel">
                                <h5 class="card-title">Second Title</h5>
                                <p class="card-text text-alternate mb-4">With supporting text below as a natural lead-in to additional content.</p>
                                <form>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>E-MAIL</span>
                                    </label>
                                    <label class="mb-3 top-label">
                                        <input class="form-control" />
                                        <span>PASSWORD</span>
                                    </label>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="lastStepEndThird" role="tabpanel">
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
                            <div class="tab-pane fade" id="lastStepEndLast" role="tabpanel">
                                <div class="text-center mt-5">
                                    <h5 class="card-title">Thank You!</h5>
                                    <p class="card-text text-alternate mb-4">Your registration completed successfully!</p>
                                    <button class="btn btn-icon btn-icon-start btn-primary" type="button">
                                        <i data-acorn-icon="login"></i>
                                        <span>Login</span>
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
                <!-- Last Step End End -->
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
{{-- Simple Money Format --}}
<script src="/js/simple.money.format.js"></script>
<script src="/js/simple.money.format.init.js"></script>
{{-- !Simple Money Format --}}
<script src="/js/page-script/pembelian.js"></script>
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
