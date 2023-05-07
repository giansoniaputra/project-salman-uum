(function($) {
    "use strict"

    // MAterial Date picker
    $('#tanggal_lahir').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#tanggal_beli').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#berlaku_sampai').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#tahun_pembuatan').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        time: true,
        date: false
    });
    $('#date-format').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm'
    });

    $('#min-date').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm',
        minDate: new Date()
    });

})(jQuery);