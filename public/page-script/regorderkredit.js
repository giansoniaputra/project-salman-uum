$(document).ready(function () {
    let table = $("#datatableBoxed_reg_order_kredit").DataTable({
        processing: true,
        responsive: true,
        searching: true,
        bLengthChange: true,
        info: false,
        ordering: true,
        serverSide: true,
        ajax: "/datatablesRegOrderKredit",
        dom: '<"row"<"col-sm-12"<"table-container"<"card-body half-padding"f><"card"<"card-body half-padding"t>>>>><"row"<"col-12 mt-3"p>>', // Hiding all other dom elements except table and pagination
        // Hiding all other dom elements except table and pagination
        pageLength: 15,
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row, meta) {
                    var pageInfo = $("#datatableBoxed_reg_order_kredit").DataTable().page.info();
                    var index = meta.row + pageInfo.start + 1;
                    return index;
                },
            },
            {
                data: "nama_nasabah",
            },
            {
                data: "merk",
            },
            {
                data: "tipe_motor",
            },
        ],
        columnDefs: [
            {
                targets: [3], // index kolom atau sel yang ingin diatur
                className: "text-center", // kelas CSS untuk memposisikan isi ke tengah
            },
            {
                searchable: false,
                orderable: false,
                targets: 0, // Kolom nomor, dimulai dari 0
            },
        ],
        order: [[0, "asc"]],
        language: {
            paginate: {
                previous: '<i class="cs-chevron-left"></i>',
                next: '<i class="cs-chevron-right"></i>',
            },
        },
    });
});