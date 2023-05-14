$(document).ready(function () {
    $("#modal").on("keyup", function () {
        $("input.money").simpleMoneyFormat({
            currencySymbol: "Rp",
            decimalPlaces: 0,
            thousandsSeparator: ".",
        });
    })
})
