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
        "ajax": "/datatablesMotor",
        "columnDefs": [{
            "targets": [5], // index kolom atau sel yang ingin diatur
            "className": 'status-motor' // kelas CSS untuk memposisikan isi ke tengah
        }],
        "columns": [{
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                "data": "no_polisi"
            },
            {
                "data": "merek"
            },
            {
                "data": "warna"
            },
            {
                "data": "tahun_pembuatan"
            },
            {
                "data": "status",
                "orderable": true,
                "searchable": true
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
});
