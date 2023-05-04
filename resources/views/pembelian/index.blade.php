@extends('layout.main')
@section('container')
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <div id="pesan" data-flash="{{ session('success') }}"></div>
    <div class="col-12">
        <a href="/pembelian/create" class="btn btn-rounded btn-primary mb-3"><span class="btn-icon-left text-primary"><i
                    class="fa fa-plus color-primary"></i>
            </span>Tambah Data Pembelian</a>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Transaksi Pembelian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTables" class="display min-w850">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merek</th>
                                <th>No Polisi</th>
                                <th>Warna</th>
                                <th>Tanggal Beli</th>
                                <th>Harga Beli</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Merek</th>
                                <th>No Polisi</th>
                                <th>Warna</th>
                                <th>Tanggal Beli</th>
                                <th>Harga Beli</th>
                                <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="accordion-two" class="accordion accordion-primary-solid">
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseOne"> <span class="accordion__header--text">Data Konsumen</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseOne" class="collapse accordion__body" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseTwo"> <span class="accordion__header--text">Data Motor</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseTwo" class="collapse accordion__body" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#bordered_collapseThree"> <span class="accordion__header--text">Data Pembelian</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="bordered_collapseThree" class="collapse accordion__body" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/page-script/pembelian.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const flashData = $('#pesan').data('flash');
        if (flashData) {
            Swal.fire(
                'Good job!',
                flashData,
                'success'
            )
        }
    </script>
@endsection
