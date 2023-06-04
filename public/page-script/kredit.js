$(document).ready(function () {
    let table = $("#datatableBoxed_penjualan_kredit").DataTable({
        processing: true,
        responsive: true,
        searching: true,
        info: false,
        ordering: true,
        serverSide: true,
        ajax: "/dataTablesPenjualanKredit",
        dom: '<"row"<"col-sm-12"<"table-container"<"card-body half-padding"f><"card"<"card-body half-padding"t>>>>><"row"<"col-12 mt-3"p>>', // Hiding all other dom elements except table and pagination
        lengthMenu: [10, 25, 50, 100], // Menampilkan opsi jumlah record yang ingin ditampilkan
        pageLength: 15, // Jumlah record yang ditampilkan secara default,
        columns: [
            {
                data: null,
                orderable: false,
                render: function (data, type, row, meta) {
                    var pageInfo = $("#datatableBoxed_penjualan_kredit")
                        .DataTable()
                        .page.info();
                    var index = meta.row + pageInfo.start + 1;
                    return index;
                },
            },
            {
                data: "nama",
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
                data: "harga_beli",
            },
            {
                data: "action",
                orderable: true,
                searchable: true,
            },
        ],
        columnDefs: [
            {
                targets: [6], // index kolom atau sel yang ingin diatur
                className: "text-center", // kelas CSS untuk memposisikan isi ke tengah
            },
            {
                targets: [0], // index kolom atau sel yang ingin diatur
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
    //Reset ketika modal di tutup
    $(".btn-close").on("click", function () {
        $("input").each(function (index, obj) {
            $("input").removeClass("is-invalid");
        });
        $("textarea").each(function (index, obj) {
            $("textarea").removeClass("is-invalid");
        });
        $(".current-method").html("");
        $("#merk").val("");
        $("#warna").val("");
        $("#type").val("");
        $("#tahun_pembuatan").val("");
        $("#harga_beli").val("");
        $(".no-polisi").val(null).trigger("change");
        $("#current-no-polisi").html("");
        $("#no-polisi").removeClass("d-none");
        $("#harga_jual").val("");
        $("#nik").val("");
        $("#old_ktp").val("");
        $("#photo_ktp").val("");
        $("#nama_pembeli").val("");
        $("#jenis_kelamin").removeClass("is-invalid");
        $("#no_telepon").val("");
        $("#tanggal_jual").val("");
        $("#modal-transaksi #alamat").val("");
        $("#harga_jual").removeClass("is-invalid");
        $(".current-id").html("");
        $("#photo_ktp").html("");
        $("#photo-ktp").val("");
        $("#photo-ktp").next(".custom-file-label").html("Pilih gambar");
        $("#img-ktp img").attr("src", "/storage/ktp/default.png");

        $("#tempat_lahir").val("");
        $("#tanggal_lahir").val("");
        $("#jenis_kelamin").val("");
        $("#otr_leasing").val("");
        $("#dp_po").val("");
        $("#dp_bayar").val("");
        $("#pencairan").val("");
        $("#angsuran").val("");
        $("#tenor").val("");
        $("#komisi").val("");
    });
    //Reset ketika tombol tutup di click
    $(".modal-footer").on("click", ".btn-outline-primary", function () {
        $("input").each(function (index, obj) {
            $("input").removeClass("is-invalid");
        });
        $("textarea").each(function (index, obj) {
            $("textarea").removeClass("is-invalid");
        });
        $("#merk").val("");
        $("#warna").val("");
        $("#type").val("");
        $("#tahun_pembuatan").val("");
        $("#harga_beli").val("");
        $(".no-polisi").val(null).trigger("change");
        $("#current-no-polisi").html("");
        $("#no-polisi").removeClass("d-none");
        $("#harga_jual").val("");
        $("#nik").val("");
        $("#old_ktp").val("");
        $("#no_telepon").val("");
        $("#photo_ktp").val("");
        $("#nama_pembeli").val("");
        $("#tanggal_jual").val("");
        $("#modal-transaksi #alamat").val("");
        $("#jenis_kelamin").removeClass("is-invalid");
        $("#harga_jual").removeClass("is-invalid");
        $(".current-id").html("");
        $("#photo_ktp").html("");
        $("#photo-ktp").val("");
        $("#photo-ktp").next(".custom-file-label").html("Pilih gambar");
        $("#img-ktp img").attr("src", "/storage/ktp/default.png");

        $("#tempat_lahir").val("");
        $("#tanggal_lahir").val("");
        $("#jenis_kelamin").val("");
        $("#otr_leasing").val("");
        $("#dp_po").val("");
        $("#dp_bayar").val("");
        $("#pencairan").val("");
        $("#angsuran").val("");
        $("#tenor").val("");
        $("#komisi").val("");
        $(".current-method").html("");
    });

    $("#btn-add-data").on("click", function () {
        let element =
            ' <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button><button type="button" class="btn btn-primary save-data" id="addEditConfirmButton" title="Tambah">Tambah</button>';
        $("#btn-action").html(element);
        $(".current-id").html("");
        $(".current-method").html("");
    });

    //Ketika no pilisi diilih
    $(".no-polisi").on("change", function () {
        let id = $(this).val();
        $(this).removeClass("is-invalid");
        $.ajax({
            data: {
                id: id,
            },
            url: "/getDataMotor",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#merk").val(response.success.merek);
                $("#warna").val(response.success.warna);
                $("#tahun_pembuatan").val(response.success.tahun_pembuatan);
                $("#harga_beli").val(response.success.harga_beli);
                $("#type").val(response.success.type);
                $("input.money").simpleMoneyFormat({
                    currencySymbol: "Rp",
                    decimalPlaces: 0,
                    thousandsSeparator: ".",
                });
            },
        });
    });

    $("#jenis_kelamin").on("change", function () {
        $(this).removeClass("is-invalid");
    });

    //Ketika NIK terdaftar di table
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
                    NProgress.done();
                } else {
                    $("#nama_pembeli").val("");
                    $("#modal-transaksi #alamat").html("");
                    $("#nama_pembeli").removeAttr("style");
                    $("#alamat").removeAttr("style");
                    $("#tempat_lahir").removeAttr("style");
                    $("#tanggal_lahir").removeAttr("style");
                    $("#no_telepon").removeAttr("style");
                    $("#img-ktp img").attr("src", "/storage/ktp/default.png");
                    NProgress.done();
                }
            },
        });
    });

    //Action Simpan Penjualan Kredit
    $("#modal-transaksi").on("click", ".save-data", function () {
        $("#modal-transaksi .save-data").attr("disabled", "true");
        let formdata = $("#modal-transaksi form").serializeArray();
        let data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        //JIka Pembayaran adalah Cash
        $.ajax({
            data: $("#modal-transaksi form").serialize(),
            url: "/kredit",
            type: "POST",
            dataType: "json",
            success: function (response) {
                // console.log(response);
                //     // console.log(response.image);
                if (
                    response.errors ||
                    response.error ||
                    response.error_ktp ||
                    response.error_ktp_type
                ) {
                    displayErrors(response.errors);
                    if (response.error) {
                        let inputElement = $('input[name="jumlah_bayar"]');
                        inputElement.addClass("is-invalid");
                        let feedbackElement = $(
                            '<div class="invalid-feedback ml-2 jumlah_bayar">' +
                                response.error +
                                "</div>"
                        );
                        inputElement.after(feedbackElement);
                    }
                    if (response.error_ktp) {
                        let inputElement = $('input[name="photo_ktp"]');
                        let inputElement2 = $('input[name="photo-ktp"]');
                        inputElement2.addClass("is-invalid");
                        inputElement.addClass("is-invalid");
                        let feedbackElement = $(
                            '<div class="invalid-feedback ml-2 photo-ktp-error">' +
                                response.error_ktp.photo_ktp +
                                "</div>"
                        );
                        inputElement.after(feedbackElement);
                    }
                    if (response.error_ktp_type) {
                        let inputElement2 = $('input[name="photo-ktp"]');
                        inputElement2.addClass("is-invalid");
                        let inputElement = $('input[name="photo_ktp"]');
                        inputElement.addClass("is-invalid");
                        let feedbackElement = $(
                            '<div class="invalid-feedback ml-2 photo-ktp-error-file">' +
                                response.error_ktp_type +
                                "</div>"
                        );
                        inputElement.after(feedbackElement);
                    }
                    $("#modal-transaksi .save-data").removeAttr("disabled");
                } else if (response.success) {
                    $.ajax({
                        url: "/refresh_no_polisi",
                        type: "GET",
                        success: function (response) {
                            $(".no-polisi").html(response);
                        },
                    });
                    $("#merk").val("");
                    $("#warna").val("");
                    $("#type").val("");
                    $("#tahun_pembuatan").val("");
                    $("#harga_beli").val("");
                    $(".no-polisi").val(null).trigger("change");
                    $("#current-no-polisi").html("");
                    $("#no-polisi").removeClass("d-none");
                    $("#jenis_pembayaran").val("");
                    $("#jenis_pembayaran").removeAttr("disabled style");
                    $("#buys-content-cash").addClass("d-none");
                    $("#harga_jual").val("");
                    $("#jumlah_bayar").val("");
                    $("#nik").val("");
                    $("#kembali").val("");
                    $("#nama_pembeli").val("");
                    $("#tanggal_jual").val("");
                    $("#harga_jual").removeClass("is-invalid");
                    $("#jumlah_bayar").removeClass("is-invalid");
                    $("#photo-ktp").val("");
                    $("#photo-ktp")
                        .next(".custom-file-label")
                        .html("Pilih gambar");
                    $(".current-id").html("");
                    $("#modal-transaksi #alamat").html("");
                    $("#photo_ktp").val("");
                    $("#img-ktp img").attr("src", "/storage/ktp/default.png");
                    $("#tempat_lahir").val("");
                    $("#tanggal_lahir").val("");
                    $("#jenis_kelamin").val("");
                    $("#otr_leasing").val("");
                    $("#dp_po").val("");
                    $("#dp_bayar").val("");
                    $("#pencairan").val("");
                    $("#angsuran").val("");
                    $("#tenor").val("");
                    $("#komisi").val("");
                    $("#modal-transaksi").modal("hide");

                    $("#nama_pembeli").removeAttr("style");
                    $("#alamat").removeAttr("style");
                    $("#tempat_lahir").removeAttr("style");
                    $("#tanggal_lahir").removeAttr("style");
                    $("#no_telepon").removeAttr("style");
                    Swal.fire("Good job!", response.success, "success");
                    table.ajax.reload();
                }
            },
        });
    });

    //Ambil data penjualan yang akan di edit
    $("#datatableBoxed_penjualan_kredit").on(
        "click",
        ".edit-button-kredit",
        function () {
            let unique = $(this).attr("data-unique");
            $(".current-id").html(
                '<input type="hidden" name="current_unique" id="current-unique" value="' +
                    unique +
                    '">'
            );
            $(".current-method").html(
                '<input type="hidden" name="_method" id="current-method" value="PUT">'
            );
            $.ajax({
                data: { unique: unique },
                url: "/getDataKredit",
                type: "GET",
                dataType: "json",
                success: function (response) {
                    let element =
                        ' <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button><button type="button" class="btn btn-primary update-data" id="addEditConfirmButton" title="Tambah">Update</button>';
                    $("#btn-action").html(element);
                    // console.log(response.data);
                    let elementNoPolisi =
                        '<input type="text" name="curent_no_polisi" id="curent_no_polisi" class="form-control" style="background-color: rgba(215, 218, 227, 0.3)" value="' +
                        response.data.no_polisi +
                        '" disabled><label class="text-label" for="curent_no_polisi">No Polisi</label>';
                    $("#current-no-polisi").html(elementNoPolisi);
                    $("#no-polisi-select").addClass("d-none");
                    $("#modal-transaksi").modal("show");
                    $(".no-polisi").val(response.data.bike_id);
                    $("#nama_pembeli").val(response.data.pembeli);
                    $("#merk").val(response.data.merek);
                    $("#warna").val(response.data.warna);
                    $("#type").val(response.data.type);
                    $("#tahun_pembuatan").val(response.data.tahun_pembuatan);
                    $("#harga_beli").val(response.data.harga_beli);
                    $("#tanggal_jual").val(response.data.tanggal_jual);
                    $("#nik").val(response.data.nik);
                    $("#nama_pembeli").val(response.data.nama);
                    $("#alamat").val(response.data.alamat);
                    $("#no_telepon").val(response.data.no_telepon);
                    $("#old_ktp").val("ktp_pembeli/" + response.data.photo_ktp);
                    if (response.data.photo_ktp == null) {
                        $("#img-ktp img").attr(
                            "src",
                            "/storage/ktp/default.png"
                        );
                    } else {
                        $("#img-ktp img").attr(
                            "src",
                            "/storage/ktp_pembeli/" + response.data.photo_ktp
                        );
                    }
                    $("input.money").simpleMoneyFormat({
                        currencySymbol: "Rp",
                        decimalPlaces: 0,
                        thousandsSeparator: ".",
                    });

                    $("#tempat_lahir").val(response.data.tempat_lahir);
                    $("#tanggal_lahir").val(response.data.tanggal_lahir);
                    $("#jenis_kelamin")
                        .val(response.data.jenis_kelamin)
                        .trigger("change");
                    $("#otr_leasing").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.otr_leasing)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#dp_po").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.dp_po)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#dp_bayar").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.dp)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#pencairan").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.pencairan)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#angsuran").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.angsuran)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#tenor").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.tenor)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                    $("#komisi").val(
                        new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        })
                            .format(response.data.komisi)
                            .replace("Rp", "")
                            .replace(/\./g, ",")
                    );
                },
            });
        }
    );

    //Action Update Data
    $("#modal-transaksi").on("click", ".update-data", function () {
        $("#modal-transaksi .update-data").attr("disabled", "true");
        let formdata = $("#modal-transaksi form").serializeArray();
        let data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        $.ajax({
            data: $("#modal-transaksi form").serialize(),
            url: "/kredit/" + $("#current-unique").val(),
            type: "POST",
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.errors) {
                    displayErrors(response.errors);
                } else if (response.success) {
                    $.ajax({
                        url: "/refresh_no_polisi",
                        type: "GET",
                        success: function (response) {
                            $(".no-polisi").html(response);
                        },
                    });
                    $("#modal-transaksi .update-data").removeAttr("disabled");
                    $("#merk").val("");
                    $("#warna").val("");
                    $("#type").val("");
                    $("#tahun_pembuatan").val("");
                    $("#harga_beli").val("");
                    $(".no-polisi").val(null).trigger("change");
                    $("#current-no-polisi").html("");
                    $("#no-polisi").removeClass("d-none");
                    $("#jenis_pembayaran").val("");
                    $("#jenis_pembayaran").removeAttr("disabled style");
                    $("#buys-content-cash").addClass("d-none");
                    $("#harga_jual").val("");
                    $("#jumlah_bayar").val("");
                    $("#nik").val("");
                    $("#kembali").val("");
                    $("#nama_pembeli").val("");
                    $("#tanggal_jual").val("");
                    $("#harga_jual").removeClass("is-invalid");
                    $("#jumlah_bayar").removeClass("is-invalid");
                    $("#photo-ktp").val("");
                    $("#photo-ktp")
                        .next(".custom-file-label")
                        .html("Pilih gambar");
                    $(".current-id").html("");
                    $("#modal-transaksi #alamat").html("");
                    $("#photo_ktp").val("");
                    $("#img-ktp img").attr("src", "/storage/ktp/default.png");
                    $("#tempat_lahir").val("");
                    $("#tanggal_lahir").val("");
                    $("#jenis_kelamin").val("");
                    $("#otr_leasing").val("");
                    $("#dp_po").val("");
                    $("#dp_bayar").val("");
                    $("#pencairan").val("");
                    $("#angsuran").val("");
                    $("#tenor").val("");
                    $("#komisi").val("");
                    $("#modal-transaksi").modal("hide");

                    $("#nama_pembeli").removeAttr("style");
                    $("#alamat").removeAttr("style");
                    $("#tempat_lahir").removeAttr("style");
                    $("#tanggal_lahir").removeAttr("style");
                    $("#no_telepon").removeAttr("style");
                    Swal.fire("Good job!", response.success, "success");
                    table.ajax.reload();
                }
            },
        });
    });

    //CERTAK KWINTASI
    $("#datatableBoxed_penjualan_kredit").on(
        "click",
        ".cetak-button-kwitansi",
        function () {
            $("#nama_leasing").val("");
            let unique = $(this).attr("data-unique");
            $("#unique").val(unique);
            $("#cetak_kwitansi").modal("show");
        }
    );

    $(".btn-kwitansi").on("click", function () {
        if ($("#nama_leasing").val() != "") {
            $("#cetak_kwitansi").modal("hide");
        }
    });

    //Action Retur
    $("#datatableBoxed_penjualan_kredit").on(
        "click",
        ".retur-button",
        function () {
            let unique = $(this).attr("data-unique");
            Swal.fire({
                title: "Yakin ingin meretur penjualan?",
                text: "Anda akan meretur penjualan motor",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Retur!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = "/returMotorKredit/" + unique;
                }
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
            let selectElement = $("select[name=" + field + "]");
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

            if (selectElement.length > 0) {
                selectElement.addClass("is-invalid");
                selectElement.after(feedbackElement);
            }
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
            selectElement.each(function () {
                selectElement.on("click", function () {
                    $(this).removeClass("is-invalid");
                });
            });
        });
    }
});
