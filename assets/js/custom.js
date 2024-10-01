$(document).ready(function () {
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var qtyInput = $(this).closest('tr').find('.input-qty');
        var qty = parseInt(qtyInput.val(), 10);
        qty = isNaN(qty) ? 0 : qty;
        qty++;
        qtyInput.val(qty);
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qtyInput = $(this).closest('tr').find('.input-qty');
        var qty = parseInt(qtyInput.val(), 10);
        qty = isNaN(qty) ? 0 : qty;
        if (qty > 1) {
            qty--;
            qtyInput.val(qty);
        }
    });
});
