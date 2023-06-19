<!-- Modal Tambah Roles-->
<div class="modal fade" id="modal-access" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hak Access</h5>
                <button type="button" class="btn-close btn-close-access" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="unique" id="unique_access" value="0">
                <table class="table table-striped" id="table-access">
                    <thead>
                        <tr>
                            <td class="text-center">No</td>
                            <td>Access</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($menus as $menu)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $menu->menu }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-icon btn-icon-only btn-outline-secondary mb-1" data-menu="{{ $menu->menu }}" id="tambah-access" type="button">
                                    <i class="mb-3 d-inline-block text-primary icon-20 bi-plus-circle"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-icon-only btn-outline-danger mb-1" data-menu="{{ $menu->menu }}" id="hapus-access" type="button">
                                    <i class="mb-3 d-inline-block text-primary icon-20 bi-dash-circle"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="alert alert-primary" role="alert" id="list-access">
                </div>
            </div>
        </div>
    </div>
</div>
