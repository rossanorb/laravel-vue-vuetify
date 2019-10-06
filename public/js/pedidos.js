$(document).ready(function () {
    $('#numero-pedido').on('click', function () {
        var pedido_id = $('#search').val();
        if (pedido_id.length > 0) {
            var url = $(this).parent().attr('action').replace('pedido_id', pedido_id);
            $.get(url, function (data) {
                console.log(data.info);
                console.log(data.itens);
            });
        }
    });
});
