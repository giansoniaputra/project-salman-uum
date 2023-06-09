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
                    var pageInfo = $("#datatableBoxed_reg_order_kredit")
                        .DataTable()
                        .page.info();
                    var index = meta.row + pageInfo.start + 1;
                    return index;
                },
            },
            {
                data: "no_reg",
            },
            {
                data: "nama",
            },
            {
                data: "alamat",
            },
            {
                data: "no_telepon",
            },
            {
                data: "action",
            },
        ],
        columnDefs: [
            {
                targets: [5], // index kolom atau sel yang ingin diatur
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

    let table2 = $("#datatableBoxed_reg_order_list").DataTable({
        processing: true,
        responsive: true,
        searching: true,
        bLengthChange: true,
        info: false,
        ordering: true,
        serverSide: true,
        ajax: {
            url: "/listPengajualOrder",
            type: "GET",
            data: function (d) {
                d.id = $("#unique_no_reg").val();
            },
        },
        dom: '<"row"<"col-sm-12"<"table-container"<"card-body half-padding"f><"card"<"card-body half-padding"t>>>>><"row"<"col-12 mt-3"p>>', // Hiding all other dom elements except table and pagination
        // Hiding all other dom elements except table and pagination
        pageLength: 15,
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row, meta) {
                    var pageInfo = $("#datatableBoxed_reg_order_kredit")
                        .DataTable()
                        .page.info();
                    var index = meta.row + pageInfo.start + 1;
                    return index;
                },
            },
            {
                data: "nama_dealer",
            },
            {
                data: "via",
            },
            {
                data: "merk",
            },
            {
                data: "type",
            },
            {
                data: "action",
            },
        ],
        columnDefs: [
            {
                targets: [5], // index kolom atau sel yang ingin diatur
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

    //RESET MODAL
    $(".btn-close").on("click", function () {
        $("#nik").val("");
        $("#nama_pembeli").val("");
        $("#alamat").val("");
        $("#nama_pembeli").removeAttr("style");
        $("#alamat").removeAttr("style");
        $("#tempat_lahir").removeAttr("style");
        $("#tanggal_lahir").removeAttr("style");
        $("#no_telepon").removeAttr("style");
        $("#img-ktp img").attr("src", "/storage/ktp/default.png");
        $("#jenis_kelamin").val(null).trigger("change");
        $("#no_telepon").val("");
        $("#tempat_lahir").val("");
        $("#tanggal_lahir").val("");
        $("#photo_ktp").val("");
        $("#photo-ktp").val("");

        $("#nik").removeClass("is-invalid");
        $("#no_telepon").removeClass("is-invalid");
        $("#tempat_lahir").removeClass("is-invalid");
        $("#tanggal_lahir").removeClass("is-invalid");
        $("#photo_ktp").removeClass("is-invalid");
        $("#photo-ktp").removeClass("is-invalid");
        $("#nama_pembeli").removeClass("is-invalid");
        $("#alamat").removeClass("is-invalid");

        $("#modal-pemohon .select2").css({
            border: "0px",
            "border-radius": "10px",
        });
        $(".invalid-jk").html("");
        $("#old_ktp").val("");
    });

    $("#btn-add-data").on("click", function () {
        let element =
            '<button class="btn btn-icon btn-icon-end btn-primary btn-add-data" type="button"><span>Tambah</span></button>';
        $("#btn-action").html(element);
    });

    // JIKA NIK SUDAH ADA
    $("#nik").on("keyup", function () {
        NProgress.start();
        let nik = $(this).val();
        $.ajax({
            data: {
                nik: nik,
            },
            url: "/cekNikPembeli",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#nama_pembeli").val(response.success.nama);
                    $("#alamat").val(response.success.alamat);
                    $("#no_telepon").val(response.success.no_telepon);
                    if (
                        response.success.tempat_lahir &&
                        response.success.tanggal_lahir
                    ) {
                        $("#tempat_lahir").val(response.success.tempat_lahir);
                        $("#jenis_kelamin")
                            .val(response.success.jenis_kelamin)
                            .trigger("change");
                        $("#tanggal_lahir").val(response.success.tanggal_lahir);
                        $("#tempat_lahir").css({
                            "background-color": "rgba(215, 218, 227, 0.3)",
                        });
                        $("#tanggal_lahir").css({
                            "background-color": "rgba(215, 218, 227, 0.3)",
                        });
                        $("#jenis_kelamin").css({
                            "background-color": "rgba(215, 218, 227, 0.3)",
                        });
                    }
                    $("#nama_pembeli").css({
                        "background-color": "rgba(215, 218, 227, 0.3)",
                    });
                    $("#alamat").css({
                        "background-color": "rgba(215, 218, 227, 0.3)",
                    });
                    $("#no_telepon").css({
                        "background-color": "rgba(215, 218, 227, 0.3)",
                    });
                    $("#nama_pembeli").removeClass("is-invalid");
                    $("#alamat").removeClass("is-invalid");
                    $("#no_telepon").removeClass("is-invalid");
                    $("#tanggal_lahir").removeClass("is-invalid");
                    $("#tempat_lahir").removeClass("is-invalid");
                    if (response.success.photo_ktp == null) {
                        $("#img-ktp img").attr(
                            "src",
                            "/storage/ktp/default.png"
                        );
                    } else {
                        $("#img-ktp img").attr(
                            "src",
                            "/storage/ktp_pembeli/" + response.success.photo_ktp
                        );
                    }
                    $("#old_ktp").val(response.success.photo_ktp);
                    NProgress.done();
                } else {
                    $("#nama_pembeli").val("");
                    $("#alamat").val("");
                    $("#jenis_kelamin").val(null).trigger("change");
                    $("#no_telepon").val("");
                    $("#tempat_lahir").val("");
                    $("#tanggal_lahir").val("");
                    $("#nama_pembeli").removeAttr("style");
                    $("#alamat").removeAttr("style");
                    $("#tempat_lahir").removeAttr("style");
                    $("#tanggal_lahir").removeAttr("style");
                    $("#no_telepon").removeAttr("style");
                    $("#img-ktp img").attr("src", "/storage/ktp/default.png");
                    $("#old_ktp").val("");
                    NProgress.done();
                }
            },
        });
    });

    // ACTION SIMPAN
    $("#btn-action").on("click", ".btn-add-data", function () {
        $("#modal-pemohon .invalid-jk").remove();
        $("#btn-action .btn-add-data").attr("disabled", "true");
        let formdata = $("#modal-pemohon form").serializeArray();
        let data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        $.ajax({
            data: $("#modal-pemohon form").serialize(),
            url: "/regorderkredit",
            type: "POST",
            dataType: "json",
            success: function (response) {
                $("#btn-action .btn-add-data").removeAttr("disabled");
                if (response.errors) {
                    if (response.errors.jenis_kelamin) {
                        $("#modal-pemohon .select2").css({
                            border: "1px solid red",
                            "border-radius": "10px",
                        });
                        $("#modal-pemohon .select2").after(
                            '<small class="text-center text-danger invalid-jk">Jenis kelamin tidak boleh kosong</small>'
                        );
                    }
                    displayErrors(response.errors);
                } else {
                    $("#modal-pemohon").modal("hide");
                    $("#nik").val("");
                    $("#nama_pembeli").val("");
                    $("#alamat").val("");
                    $("#nama_pembeli").removeAttr("style");
                    $("#alamat").removeAttr("style");
                    $("#tempat_lahir").removeAttr("style");
                    $("#tanggal_lahir").removeAttr("style");
                    $("#no_telepon").removeAttr("style");
                    $("#img-ktp img").attr("src", "/storage/ktp/default.png");
                    $("#jenis_kelamin").val(null).trigger("change");
                    $("#no_telepon").val("");
                    $("#tempat_lahir").val("");
                    $("#tanggal_lahir").val("");
                    $("#photo_ktp").val("");
                    $("#photo-ktp").val("");
                    Swal.fire("Good job!", response.success, "success");
                    table.ajax.reload();
                }
            },
        });
    });
    $("#jenis_kelamin").on("change", function () {
        $("#modal-pemohon .select2").css({
            border: "0px",
            "border-radius": "10px",
        });
        $(".invalid-jk").html("");
    });

    //KETIKA INGIN MENAMBAHKAN REGISTER ORDER
    $("#datatableBoxed_reg_order_kredit").on(
        "click",
        ".register-button",
        function () {
            table2.ajax.reload();
            let unique = $(this).attr("data-unique");
            $("#modal-regorderkredit").modal("show");
            $("#unique_no_reg").val(unique);
            $.ajax({
                data: { unique: unique },
                url: "/getDataBuyerRegOrder",
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response.data);
                    $("#nama_nasabah")
                        .val(response.data.nama)
                        .trigger("change");
                    $("#no_telepon_nasabah").val(response.data.no_telepon);
                    $("#alamat_nasabah").val(response.data.alamat);
                    $("#buyer_id").val(response.data.buyer_id);
                },
            });
        }
    );

    //Hendler Error
    function displayErrors(errors) {
        // menghapus class 'is-invalid' dan pesan error sebelumnya
        $("input.form-control").removeClass("is-invalid");
        $("select.form-control").removeClass("is-invalid");
        $("textarea.form-control").removeClass("is-invalid");
        $("div.invalid-feedback").remove();

        // menampilkan pesan error baru
        $.each(errors, function (field, messages) {
            let inputElement = $("input[name=" + field + "]");
            // let selectElement = $("select[name=" + field + "]");
            let textAreaElement = $("textarea[name=" + field + "]");
            let feedbackElement = $(
                '<div class="invalid-feedback ml-2"></div>'
            );

            $.each(messages, function (index, message) {
                feedbackElement.append(
                    $('<p class="p-0 m-0 text-center">' + message + "</p>")
                );
            });

            if (inputElement.length > 0) {
                inputElement.addClass("is-invalid");
                inputElement.after(feedbackElement);
            }

            // if (selectElement.length > 0) {
            //     selectElement.addClass("is-invalid");
            //     selectElement.after(feedbackElement);
            // }

            if (textAreaElement.length > 0) {
                textAreaElement.addClass("is-invalid");
                textAreaElement.after(feedbackElement);
            }
            inputElement.each(function () {
                if (inputElement.attr("type") == "text") {
                    inputElement.on("click", function () {
                        $(this).removeClass("is-invalid");
                    });
                    inputElement.on("change", function () {
                        $(this).removeClass("is-invalid");
                    });
                } else if (inputElement.attr("type") == "date") {
                    inputElement.on("change", function () {
                        $(this).removeClass("is-invalid");
                    });
                }
            });
            textAreaElement.each(function () {
                textAreaElement.on("click", function () {
                    $(this).removeClass("is-invalid");
                });
            });
            // selectElement.each(function () {
            //     selectElement.on("click", function () {
            //         $(this).removeClass("is-invalid");
            //     });
            // });
        });
    }
});

//Show Gambar KTP
function previewImageKTP() {
    document.getElementById("photo_ktp").classList.remove("is-invalid");
    document.getElementById("photo-ktp").classList.remove("is-invalid");
    const image = document.querySelector("#photo-ktp");
    const imgPre = document.querySelector("#img-ktp img");
    const photo_ktp = document.querySelector("#photo_ktp");

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPre.src = oFREvent.target.result;
        photo_ktp.value = oFREvent.target.result;
    };
}
