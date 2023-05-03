$(document).ready(function () {
    var table = $('#dataTables').DataTable({
        createdRow: function ( row, data, index ) {
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
        let nik = $("#nik").val()

        $.ajax({
            data: {
                nik: nik
            },
            url : "/cekNIK",
            type : "GET",
            dataType : "json",
            success : function(response) {
                if(response.success) {
                    $("#nama").val(response.success.nama)
                    $("#tempat_lahir").val(response.success.tempat_lahir)
                    $("#tanggal_lahir").val(response.success.tanggal_lahir)
                    $("#jenis_kelamin").val(response.success.jenis_kelamin)
                    $("#alamat").html(response.success.alamat)
                } else {
                    $("#nama").val('')
                    $("#tempat_lahir").val('')
                    $("#tanggal_lahir").val('')
                    $("#jenis_kelamin").val('Laki-Laki')
                    $("#alamat").html('')
                }
                
            }
        })
    })



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
})
