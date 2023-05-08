$(document).ready(function () {
    var table = $('#dataTables').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        },
        "processing": true,
        "responsive": true,
        "searching": true,
        "bLengthChange": true,
        "info": false,
        "ordering": true,
        "serverSide": true,
        "ajax": "/datatablesPembelian",
        "columns": [{
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                "data": "merek"
            },
            {
                "data": "no_polisi"
            },
            {
                "data": "warna"
            },
            {
                "data": "tgl_beli"
            },
            {
                "data": "harga"
            },
            {
                "data": "action",
                "orderable": true,
                "searchable": true
            },
        ],
        "order": [
            [0, 'desc']
        ]
    });
    // RESET
    // $("#nik").on('click', function () {
    //     $("#nik").removeClass("is-invalid")
    // })
    // $("#nama").on('click', function () {
    //     $("#nama").removeClass("is-invalid")
    // })
    // $("#tempat_lahir").on('click', function () {
    //     $("#tempat_lahir").removeClass("is-invalid")
    //     $("#tanggal_lahir").removeClass("is-invalid")
    // })
    // $("#tanggal_lahir").on('click', function () {
    //     $("#tempat_lahir").removeClass("is-invalid")
    //     $("#tanggal_lahir").removeClass("is-invalid")
    // })
    // $("#alamat").on('click', function () {
    //     $("#alamat").removeClass("is-invalid")
    // })
    // $("#merek").on('click', function () {
    //     $("#merek").removeClass("is-invalid")
    // })
    // $("#daya").on('click', function () {
    //     $("#daya").removeClass("is-invalid")
    // })
    // $("#no_rangka").on('click', function () {
    //     $("#no_rangka").removeClass("is-invalid")
    // })
    // $("#bpkb").on('click', function () {
    //     $("#bpkb").removeClass("is-invalid")
    // })
    // $("#type").on('click', function () {
    //     $("#type").removeClass("is-invalid")
    // })
    // $("#bahan_bakar").on('click', function () {
    //     $("#bahan_bakar").removeClass("is-invalid")
    // })
    // $("#no_polisi").on('click', function () {
    //     $("#no_polisi").removeClass("is-invalid")
    // })
    // $("#berlaku_sampai").on('click', function () {
    //     $("#berlaku_sampai").removeClass("is-invalid")
    // })
    // $("#harga_beli").on('click', function () {
    //     $("#harga_beli").removeClass("is-invalid")
    // })
    // $("#tanggal_beli").on('click', function () {
    //     $("#tanggal_beli").removeClass("is-invalid")
    // })

    $("#nik").on("keyup", function () {
        NProgress.start();
        let nik = $("#nik").val()
        $.ajax({
            data: {
                nik: nik
            },
            url: "/cekNIK",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#nama").val(response.success.nama)
                    $("#tempat_lahir").val(response.success.tempat_lahir)
                    $("#tanggal_lahir").val(response.success.tanggal_lahir)
                    $("#jenis_kelamin").val(response.success.jenis_kelamin)
                    $("#no_telepon").val(response.success.no_telepon)
                    $("#alamat").html(response.success.alamat)
                    NProgress.done();
                } else {
                    $("#nama").val('')
                    $("#tempat_lahir").val('')
                    $("#tanggal_lahir").val('')
                    $("#jenis_kelamin").val('Laki-Laki')
                    $("#no_telepon").val('')
                    $("#alamat").html('')
                    NProgress.done();
                }

            }
        })
    })

    // Popup Modal Detail
    $('#dataTables').on('click', '.info-button', function () {
        let id = $(this).attr('data-id')
        $('#modal-detail').modal('show')

        $.ajax({
            data: {
                id: id
            },
            url: "/getDataTransaksi",
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                // console.log(response.success.consumer.nik)
                if(response.success.consumer.penjual == "INDIVIDU"){
                    $("#data-individu").removeClass("d-none")
                    $("#data-dealer").addClass("d-none")
                    $("#nik").html(response.success.consumer.nik);
                    $("#nama").html(response.success.consumer.nama);
                    $("#no-telepon").html(response.success.consumer.no_telepon);
                    $("#alamat").html(response.success.consumer.alamat);
                } else if(response.success.consumer.penjual == "DEALER"){
                    $("#data-dealer").removeClass("d-none")
                    $("#data-individu").addClass("d-none")
                    $("#nama-petugas").html(response.success.consumer.nama);
                    $("#dealer").html(response.success.consumer.dealer);
                }

                $("#no-polisi").html(response.success.motor.no_polisi);
                $("#merk").html(response.success.motor.merek);
                $("#tipe").html(response.success.motor.type);
                $("#warna").html(response.success.motor.warna);
                $("#tahun-pembuatan").html(response.success.motor.tahun_pembuatan);
                $("#daya").html(response.success.motor.daya);
                $("#no-rangka").html(response.success.motor.no_rangka);
                $("#bahan-bakar").html(response.success.motor.bahan_bakar);
                $("#bpkb").html(response.success.motor.bpkb);
                $("#berlaku-sampai").html(response.success.berlaku_sampai);
                $("#foto-bpkb").html('<button data-img="/storage/' + response.success.motor.photo_bpkb + '" class="btn btn-sm btn-primary rounded text-white look-img-bpkb">Lihat Gambar</button>');
                $("#foto-stnk").html('<button data-img="/storage/' + response.success.motor.photo_stnk + '" class="btn btn-sm btn-primary rounded text-white look-img-stnk">Lihat Gambar</button>');

                $("#tanggal-beli").html(response.success.tanggal_beli);
                $("#harga-beli").html(response.success.harga);
            }
        })
    })

    let monthBefore = $('.dtp-select-month-before .material-icons')
    monthBefore.addClass('flaticon-381-back-2 text-white')
    monthBefore.removeClass('material-icons')
    monthBefore.html('')

    let yearBefore = $('.dtp-select-year-before .material-icons')
    yearBefore.addClass('flaticon-381-back-2 text-white')
    yearBefore.removeClass('material-icons')
    yearBefore.html('')

    let monthAfter = $('.dtp-select-month-after .material-icons')
    monthAfter.addClass('flaticon-381-next-1 text-white')
    monthAfter.removeClass('material-icons')
    monthAfter.html('')

    let yearAfter = $('.dtp-select-year-after .material-icons')
    yearAfter.addClass('flaticon-381-next-1 text-white')
    yearAfter.removeClass('material-icons')
    yearAfter.html('')

    let yearRangeBefore = $('.dtp-select-year-range.before .material-icons')
    yearRangeBefore.addClass('flaticon-381-upload-1 text-dark')
    yearRangeBefore.removeClass('material-icons')
    yearRangeBefore.html('')

    let yearRangeAfter = $('.dtp-select-year-range.after .material-icons')
    yearRangeAfter.addClass('flaticon-381-download text-dark')
    yearRangeAfter.removeClass('material-icons')
    yearRangeAfter.html('')


    function displayErrors(errors) {
        // menghapus class 'is-invalid' dan pesan error sebelumnya
        $('input.form-control').removeClass('is-invalid');
        $('div.invalid-feedback').remove();

        // menampilkan pesan error baru
        $.each(errors, function (field, messages) {
            var inputElement = $('input[name=' + field + ']');
            var selectElement = $('select[name=' + field + ']');
            var textAreaElement = $('textarea[name=' + field + ']');
            var feedbackElement = $('<div class="invalid-feedback"></div>');

            $.each(messages, function (index, message) {
                feedbackElement.append($('<p>' + message + '</p>'));
            });

            if (inputElement.length > 0) {
                inputElement.addClass('is-invalid');
                inputElement.after(feedbackElement);
            }

            if (selectElement.length > 0) {
                selectElement.addClass('is-invalid');
                selectElement.after(feedbackElement);
            }

            if (textAreaElement.length > 0) {
                textAreaElement.addClass('is-invalid');
                textAreaElement.after(feedbackElement);
            }
        });
    }

    $("#modal-detail").on("click", '.look-img-stnk', function () {
        let image = $(this).attr("data-img");
        // alert(image);
        $("#img-photo").html('<img src="' + image + '" alt="" class="img-fluid" style="width: 800px">')
        $("#judul-modal-photo").html('Photo STNK')
        $("#modal-image").modal('show');
    })

    $("#modal-detail").on("click", '.look-img-bpkb', function () {
        let image = $(this).attr("data-img");
        // alert(image);
        $("#img-photo").html('<img src="' + image + '" alt="" class="img-fluid" style="width: 800px">')
        $("#judul-modal-photo").html('Photo BPKB')
        $("#modal-image").modal('show');
    })
    
    //LOAD CONTENT CONSUMER
    $("#penjual").on('change', function () {
        $("#penjual").removeClass("is-invalid")
        if ($("#penjual").val() == "INDIVIDU") {
            $(".tab-content").css({
                "height" : "452.75px"
            })
            $("#consumer-content-dealer").addClass("d-none")
            $("#consumer-content-individu").removeClass("d-none")
        } else if($("#penjual").val() == "DEALER") {
            $(".tab-content").css({
                "height" : "210px"
            })
            $("#consumer-content-individu").addClass("d-none")
            $("#consumer-content-dealer").removeClass("d-none")
        } else if($("#penjual").val() == ""){
            $(".tab-content").css({
                "height" : "110px"
            })
            $("#consumer-content-individu").addClass("d-none")
            $("#consumer-content-dealer").addClass("d-none")
        }
    })
})



function previewImageBPKB() {
    const image = document.querySelector('#photo_bpkb');
    const imgPre = document.querySelector('.image-bpkb');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPre.src = oFREvent.target.result;
    }
}

function previewImageSTNK() {
    const image = document.querySelector('#photo_stnk');
    const imgPre = document.querySelector('.image-stnk');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPre.src = oFREvent.target.result;
    }
}
