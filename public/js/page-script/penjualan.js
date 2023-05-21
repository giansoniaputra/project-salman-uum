$(document).ready(function () {
    var table = $("#dataTablesPenjualan").DataTable({
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
        ajax: "/dataTablesPenjualan",
        columns: [{
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
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
                data: "harga_jual",
            },
            {
                data: "action",
                orderable: true,
                searchable: true,
            },
        ],
        order: [
            [0, "desc"]
        ],
    });
    //LOAD CONTENT CASH
    $("#jenis_pembayaran").on("change", function () {
        $("#jenis_pembayaran").removeClass("is-invalid");
        if ($("#jenis_pembayaran").val() == "CASH") {
            $("#buys-content-kredit").addClass("d-none");
            $("#buys-content-cash").removeClass("d-none");
        } else if ($("#jenis_pembayaran").val() == "KREDIT") {
            $("#buys-content-cash").addClass("d-none");
            $("#buys-content-kredit").removeClass("d-none");
        } else if ($("#jenis_pembayaran").val() == "") {
            $("#buys-content-cash").addClass("d-none");
            $("#buys-content-kredit").addClass("d-none");
        }
    });

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
                $("input.money").simpleMoneyFormat({
                    currencySymbol: "Rp",
                    decimalPlaces: 0,
                    thousandsSeparator: ".",
                });
            },
        });
    });

    $(".tutup").on("click", function () {
        $("#merk").val("");
        $("#warna").val("");
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
        $("#nama_pembeli").val("");
        $("#tanggal_jual").val("");
        $("#harga_jual").removeClass("is-invalid");
        $("#jumlah_bayar").removeClass("is-invalid");
        $(".current-id").html("");
    });
    $(".modal-footer").on("click", ".btn-danger", function () {
        $("#merk").val("");
        $("#warna").val("");
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
        $("#harga_jual").removeClass("is-invalid");
        $("#jumlah_bayar").removeClass("is-invalid");
        $("#nama_pembeli").val("");
        $("#tanggal_jual").val("");
        $(".current-id").html("");
    });
    $("#btn-add-data").on("click", function () {
        let element =
            '<button type="button" class="btn btn-rounded btn-primary" id="save-data"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i></span>Tambah</button>';
        $("#btn-action").html(element);
        $(".current-id").html("");
    });
    //Action Simpan
    $("#modal-transaksi").on("click", "#save-data", function () {
        let formdata = $("#modal-transaksi form").serializeArray();
        let data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        $.ajax({
            data: $("#modal-transaksi form").serialize(),
            url: "/tambahPenjualan",
            type: "POST",
            dataType: "json",
            success: function (response) {
                if (response.errors) {
                    displayErrors(response.errors);
                } else if (response.error) {
                    // console.log(response.error);
                    let inputElement = $('input[name="jumlah_bayar"]');
                    inputElement.addClass("is-invalid");
                    let feedbackElement = $(
                        '<div class="invalid-feedback ml-2 jumlah_bayar">' +
                        response.error +
                        "</div>"
                    );
                    inputElement.after(feedbackElement);
                } else if (response.success) {
                    $("#modal-transaksi").modal("hide");
                    Swal.fire("Good job!", response.success, "success");
                    table.ajax.reload();
                }
            },
        });
    });
    //Ambil data penjualan yanag ingin di edit
    $("#dataTablesPenjualan").on("click", ".edit-button", function () {
        let id = $(this).attr("data-id");
        $(".current-id").html(
            '<input type="hidden" name="current_id" value="' + id + '">'
        );
        $.ajax({
            data: {
                id: id
            },
            url: "/ambilDataPenjualan",
            type: "GET",
            dataType: "json",
            success: function (response) {
                let elementNoPolisi =
                    '<div class="form-row"><label class="text-label" for="curent_no_polisi">No Polisi</label><input type="text" id="curent_no_polisi" value="' +
                    response.data.no_polisi +
                    '" class="form-control" style="background-color: rgba(215, 218, 227, 0.3)" disabled> </div>';
                $("#current-no-polisi").html(elementNoPolisi);
                $("#no-polisi").addClass("d-none");
                $("#modal-transaksi").modal("show");
                $(".no-polisi").val(response.data.bike_id);
                $("#nama_pembeli").val(response.data.pembeli);
                $("#merk").val(response.data.merek);
                $("#warna").val(response.data.warna);
                $("#tahun_pembuatan").val(response.data.tahun_pembuatan);
                $("#harga_beli").val(response.data.harga_beli);
                $("#tanggal_jual").val(response.data.tanggal_jual);
                $("#jenis_pembayaran").val("CASH");
                $("#jenis_pembayaran").attr("disabled", "disabled");
                $("#jenis_pembayaran").css({
                    "background-color": "rgba(215, 218, 227, 0.3",
                });
                $("#buys-content-cash").removeClass("d-none");
                $("#harga_jual").val(response.data.harga_jual);
                $("input.money").simpleMoneyFormat({
                    currencySymbol: "Rp",
                    decimalPlaces: 0,
                    thousandsSeparator: ".",
                });

                //Menganti Button Action
                let element =
                    '<button type="button" class="btn btn-rounded btn-primary" id="update-data"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i></span>Update</button>';
                $("#btn-action").html(element);
            },
        });
    });

    //Action Update
    $("#modal-transaksi").on("click", "#update-data", function () {
        let formdata = $("#modal-transaksi form").serializeArray();
        let data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
        });
        $.ajax({
            data: $("#modal-transaksi form").serialize(),
            url: "/updatePenjualan",
            type: "POST",
            dataType: "json",
            success: function (response) {
                if (response.errors) {
                    displayErrors(response.errors);
                } else if (response.error) {
                    // console.log(response.error);
                    let inputElement = $('input[name="jumlah_bayar"]');
                    inputElement.addClass("is-invalid");
                    let feedbackElement = $(
                        '<div class="invalid-feedback ml-2 jumlah_bayar">' +
                        response.error +
                        "</div>"
                    );
                    inputElement.after(feedbackElement);
                } else if (response.success) {
                    $("#modal-transaksi").modal("hide");
                    Swal.fire("Good job!", response.success, "success");
                    table.ajax.reload();
                    $("#harga_jual").val("");
                    $("#jumlah_bayar").val("");
                    $("#nama_pembeli").val("");
                    $("#tanggal_jual").val("");
                    $("#kembali").val("");
                }
            },
        });
    });
    //Hendler Error
    function displayErrors(errors) {
        // menghapus class 'is-invalid' dan pesan error sebelumnya
        $("input.form-control").removeClass("is-invalid");
        $("select.form-control").removeClass("is-invalid");
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
                    $('<p class="p-0 m-0">' + message + "</p>")
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
        });
    }

    //Kembalian
    $("#jumlah_bayar").on("keyup", function () {
        let jual = $("#harga_jual").val();
        let bayar = $(this).val();
        jual = jual.replace(/,/g, "");
        bayar = bayar.replace(/,/g, "");
        if (bayar - jual < "0") {
            $("#kembali").val("");
        } else if (bayar - jual == "0") {
            $("#kembali").val("0");
        } else {
            $("#kembali").val(bayar - jual);
            $("input.money").simpleMoneyFormat({
                currencySymbol: "Rp",
                decimalPlaces: 0,
                thousandsSeparator: ".",
            });
        }
    });
    $("#harga_jual").on("keyup", function () {
        let jual = $("#harga_jual").val();
        let bayar = $(this).val();
        jual = jual.replace(/,/g, "");
        bayar = bayar.replace(/,/g, "");
        if (bayar - jual < "0") {
            $("#kembali").val("");
        } else if (bayar - jual == "0") {
            $("#kembali").val("0");
        } else {
            $("#kembali").val(bayar - jual);
            $("input.money").simpleMoneyFormat({
                currencySymbol: "Rp",
                decimalPlaces: 0,
                thousandsSeparator: ".",
            });
        }
    });
    //Reset
    $("#harga_jual").on("click", function () {
        $(this).removeClass("is-invalid");
    });
    $("#tanggal_jual").on("change", function () {
        $("#tanggal_jual").removeClass("is-invalid");
    });
    $("#jumlah_bayar").on("click", function () {
        $(this).removeClass("is-invalid");
        $(".jumlah_bayar").remove();
    });

    let monthBefore = $(".dtp-select-month-before .material-icons");
    monthBefore.addClass("fa fa-arrow-left fa-lg text-white");
    monthBefore.removeClass("material-icons");
    monthBefore.html("");

    let yearBefore = $(".dtp-select-year-before .material-icons");
    yearBefore.addClass("fa fa-arrow-left fa-lg text-white");
    yearBefore.removeClass("material-icons");
    yearBefore.html("");

    let monthAfter = $(".dtp-select-month-after .material-icons");
    monthAfter.addClass("fa fa-arrow-right fa-lg text-white");
    monthAfter.removeClass("material-icons");
    monthAfter.html("");

    let yearAfter = $(".dtp-select-year-after .material-icons");
    yearAfter.addClass("fa fa-arrow-right fa-lg text-white");
    yearAfter.removeClass("material-icons");
    yearAfter.html("");

    let yearRangeBefore = $(".dtp-select-year-range.before .material-icons");
    yearRangeBefore.addClass("fa fa-arrow-up fa-lg text-dark");
    yearRangeBefore.removeClass("material-icons");
    yearRangeBefore.html("");

    let yearRangeAfter = $(".dtp-select-year-range.after .material-icons");
    yearRangeAfter.addClass("fa fa-arrow-down fa-lg text-dark");
    yearRangeAfter.removeClass("material-icons");
    yearRangeAfter.html("");
});
