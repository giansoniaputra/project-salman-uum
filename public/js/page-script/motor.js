$(document).ready(function () {
    var table = $("#dataTables").DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass("selected");
        },
        processing: true,
        responsive: true,
        searching: true,
        bLengthChange: true,
        info: false,
        ordering: true,
        serverSide: true,
        ajax: "/dataTablesReady",
        columnDefs: [
            {
                targets: [5], // index kolom atau sel yang ingin diatur
                className: "status-motor", // kelas CSS untuk memposisikan isi ke tengah
            },
        ],
        columns: [
            {
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                data: "no_polisi",
            },
            {
                data: "merek",
            },
            {
                data: "warna",
            },
            {
                data: "tahun_pembuatan",
            },
            {
                data: "status",
                orderable: true,
                searchable: true,
            },
            {
                data: "action",
                orderable: true,
                searchable: true,
            },
        ],
        order: [[0, "desc"]],
    });

    var table2 = $("#dataTables2").DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass("selected");
        },
        processing: true,
        responsive: true,
        searching: true,
        bLengthChange: true,
        info: false,
        ordering: true,
        serverSide: true,
        ajax: "/dataTablesTerjual",
        columnDefs: [
            {
                targets: [5], // index kolom atau sel yang ingin diatur
                className: "status-motor", // kelas CSS untuk memposisikan isi ke tengah
            },
        ],
        columns: [
            {
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                data: "no_polisi",
            },
            {
                data: "merek",
            },
            {
                data: "warna",
            },
            {
                data: "tahun_pembuatan",
            },
            {
                data: "status",
                orderable: true,
                searchable: true,
            },
            {
                data: "action",
                orderable: true,
                searchable: true,
            },
        ],
        order: [[0, "desc"]],
    });

    $("#dataTables").on("click", ".info-motor-button", function () {
        let id = $(this).attr("data-id");
        $.ajax({
            data: {
                id: id,
            },
            url: "/getDataMotor",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#modal-detail-motor").modal("show");
                $("#bordered_collapseTwo").slideDown();
                $("#no-polisi").html(response.success.no_polisi);
                $("#merk").html(response.success.merek);
                $("#tipe").html(response.success.type);
                $("#warna").html(response.success.warna);
                $("#tahun-pembuatan").html(response.success.tahun_pembuatan);
                $("#daya").html(response.success.daya);
                $("#no-rangka").html(response.success.no_rangka);
                $("#bahan-bakar").html(response.success.bahan_bakar);
                $("#bpkb").html(response.success.bpkb);
                $("#berlaku-sampai").html(response.success.berlaku_sampai);
                $("#foto-bpkb").html(
                    '<button data-img="/storage/' +
                        response.success.photo_bpkb +
                        '" class="btn btn-sm btn-primary rounded text-white look-img-bpkb">Lihat Gambar</button>'
                );
                $("#foto-stnk").html(
                    '<button data-img="/storage/' +
                        response.success.photo_stnk +
                        '" class="btn btn-sm btn-primary rounded text-white look-img-stnk">Lihat Gambar</button>'
                );
            },
        });
    });
    $("#dataTables2").on("click", ".info-motor-button", function () {
        let id = $(this).attr("data-id");
        $.ajax({
            data: {
                id: id,
            },
            url: "/getDataMotor",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#modal-detail-motor").modal("show");
                $("#bordered_collapseTwo").slideDown();
                $("#no-polisi").html(response.success.no_polisi);
                $("#merk").html(response.success.merek);
                $("#tipe").html(response.success.type);
                $("#warna").html(response.success.warna);
                $("#tahun-pembuatan").html(response.success.tahun_pembuatan);
                $("#daya").html(response.success.daya);
                $("#no-rangka").html(response.success.no_rangka);
                $("#bahan-bakar").html(response.success.bahan_bakar);
                $("#bpkb").html(response.success.bpkb);
                $("#berlaku-sampai").html(response.success.berlaku_sampai);
                $("#foto-bpkb").html(
                    '<button data-img="/storage/' +
                        response.success.photo_bpkb +
                        '" class="btn btn-sm btn-primary rounded text-white look-img-bpkb">Lihat Gambar</button>'
                );
                $("#foto-stnk").html(
                    '<button data-img="/storage/' +
                        response.success.photo_stnk +
                        '" class="btn btn-sm btn-primary rounded text-white look-img-stnk">Lihat Gambar</button>'
                );
            },
        });
    });

    $(".accordion__header").on("click", function () {
        $("#bordered_collapseTwo").slideToggle();
    });

    $("#modal-detail-motor").on("click", ".look-img-stnk", function () {
        let image = $(this).attr("data-img");
        // alert(image);
        $("#img-photo").html(
            '<img src="' +
                image +
                '" alt="" class="img-fluid" style="width: 800px">'
        );
        $("#judul-modal-photo").html("Photo STNK");
        $("#modal-image").modal("show");
    });

    $("#modal-detail-motor").on("click", ".look-img-bpkb", function () {
        let image = $(this).attr("data-img");
        // alert(image);
        $("#img-photo").html(
            '<img src="' +
                image +
                '" alt="" class="img-fluid" style="width: 800px">'
        );
        $("#judul-modal-photo").html("Photo BPKB");
        $("#modal-image").modal("show");
    });

    $(".tab-terjual").on("click", function () {
        document.getElementById("dataTables2").style.width = "1390px";
    });
});
