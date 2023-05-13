$(document).ready(function () {
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
            data: { id: id },
            url: "/getDataMotor",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#merk").val(response.success.merek);
                $("#warna").val(response.success.warna);
                $("#tahun_pembuatan").val(response.success.tahun_pembuatan);
                $("#harga_beli").val(response.success.harga_beli);
            },
        });
    });

    $(".close").on("click", function () {
        $("#merk").val("");
        $("#warna").val("");
        $("#tahun_pembuatan").val("");
        $("#harga_beli").val("");
        $(".no-polisi").val(null).trigger("change");
    });
    $(".modal-footer").on("click", ".btn-danger", function () {
        $("#merk").val("");
        $("#warna").val("");
        $("#tahun_pembuatan").val("");
        $("#harga_beli").val("");
        $(".no-polisi").val(null).trigger("change");
    });

    //Action Simpan
    $("#save-data").on("click", function () {
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
                    Swal.fire("Good job!", response.success, "success");
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
        });
    }

    //Kembalian
    $("#jumlah_bayar").on("keyup", function () {
        let jual = $("#harga_jual").val();
        let bayar = $(this).val();
        if (bayar - jual < "0") {
            $("#kembali").val("");
        } else if (bayar - jual == "0") {
            $("#kembali").val("0");
        } else {
            $("#kembali").val(bayar - jual);
        }
    });
    $("#harga_jual").on("keyup", function () {
        let jual = $("#harga_jual").val();
        let bayar = $(this).val();
        if (bayar - jual < "0") {
            $("#kembali").val("");
        } else if (bayar - jual == "0") {
            $("#kembali").val("0");
        } else {
            $("#kembali").val(bayar - jual);
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
});

let monthBefore = $(".dtp-select-month-before .material-icons");
monthBefore.addClass("flaticon-381-back-2 text-white");
monthBefore.removeClass("material-icons");
monthBefore.html("");

let yearBefore = $(".dtp-select-year-before .material-icons");
yearBefore.addClass("flaticon-381-back-2 text-white");
yearBefore.removeClass("material-icons");
yearBefore.html("");

let monthAfter = $(".dtp-select-month-after .material-icons");
monthAfter.addClass("flaticon-381-next-1 text-white");
monthAfter.removeClass("material-icons");
monthAfter.html("");

let yearAfter = $(".dtp-select-year-after .material-icons");
yearAfter.addClass("flaticon-381-next-1 text-white");
yearAfter.removeClass("material-icons");
yearAfter.html("");

let yearRangeBefore = $(".dtp-select-year-range.before .material-icons");
yearRangeBefore.addClass("flaticon-381-upload-1 text-dark");
yearRangeBefore.removeClass("material-icons");
yearRangeBefore.html("");

let yearRangeAfter = $(".dtp-select-year-range.after .material-icons");
yearRangeAfter.addClass("flaticon-381-download text-dark");
yearRangeAfter.removeClass("material-icons");
yearRangeAfter.html("");
