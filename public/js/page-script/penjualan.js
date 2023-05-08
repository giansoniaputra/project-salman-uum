$(document).ready(function () {
    //LOAD CONTENT CASH
    $("#jenis_pembayaran").on('change', function () {
        $("#jenis_pembayaran").removeClass("is-invalid")
        if ($("#jenis_pembayaran").val() == "CASH") {
           
            $("#buys-content-kredit").addClass("d-none")
            $("#buys-content-cash").removeClass("d-none")
        } else if($("#jenis_pembayaran").val() == "KREDIT") {
            
            $("#buys-content-cash").addClass("d-none")
            $("#buys-content-kredit").removeClass("d-none")
        } else if($("#jenis_pembayaran").val() == ""){
            
            $("#buys-content-cash").addClass("d-none")
            $("#buys-content-kredit").addClass("d-none")
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