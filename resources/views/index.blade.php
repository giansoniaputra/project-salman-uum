@extends('layout.main')
@section('container')
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<div id="pesan" data-flash="{{ session('success') }}"></div>
<div class="row g-2">
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
            <div class="h-100 row g-0 card-body align-items-center py-3">
                <div class="col-auto pe-3">
                    <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                        <i class="bi-bicycle icon-24 text-white"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="row gx-2 d-flex align-content-center">
                        <div class="col-12 col-xl d-flex">
                            <div class="d-flex align-items-center lh-1-25">Jumlah Asset</div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="cta-2 text-primary">null</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
            <div class="h-100 row g-0 card-body align-items-center py-3">
                <div class="col-auto pe-3">
                    <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                        <i class="bi-calendar-check-fill icon-20 text-white"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="row gx-2 d-flex align-content-center">
                        <div class="col-12 col-xl d-flex">
                            <div class="d-flex align-items-center lh-1-25">Penjualan Tahun Ini</div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="cta-2 text-primary">null</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
            <div class="h-100 row g-0 card-body align-items-center py-3">
                <div class="col-auto pe-3">
                    <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                        <i class="bi-calendar2-month-fill icon-20 text-white"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="row gx-2 d-flex align-content-center">
                        <div class="col-12 col-xl d-flex">
                            <div class="d-flex align-items-center lh-1-25">Penjualan Bulan Ini</div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="cta-2 text-primary">null</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
            <div class="h-100 row g-0 card-body align-items-center py-3">
                <div class="col-auto pe-3">
                    <div class="bg-gradient-light sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                        <i class="bi-calendar-date-fill icon-20 text-white"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="row gx-2 d-flex align-content-center">
                        <div class="col-12 col-xl d-flex">
                            <div class="d-flex align-items-center lh-1-25">Penjualan Hari Ini</div>
                        </div>
                        <div class="col-12 col-xl-auto">
                            <div class="cta-2 text-primary">null</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const flashData = $('#pesan').data('flash');
    if (flashData) {
        Swal.fire(
            'Good job!', flashData, 'success'
        )
    }

</script>
@endsection
