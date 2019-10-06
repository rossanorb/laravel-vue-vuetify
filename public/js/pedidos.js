$(document).ready(function () {

    $('#numero-pedido').on('click', function () {
        var pedido_id = $('#search').val();
        if (pedido_id.length > 0) {
            var url = $(this).parent().attr('action').replace('pedido_id', pedido_id);

            $.get(url, function (data) {

                console.log(base_pedidos_base_url);

                $(data).each(function (idx, el) {
                    if (el.status) {
                        $('table.pedidos tbody tr').remove();
                        $('table.pedidos tbody').append(
                            '<tr>' +
                            '<td>' + el.info.id + '</td>' +
                            '<td>' + el.info.status + '</td>' +
                            '<td>' + el.info.data + '</td>' +
                            '<td><i id="' + el.info.id + '" class="fa fa-exclamation-circle detalhes_pedido"></i></td>' +
                            '</tr>'
                        );
                    }
                });
            });
        }
    });

    $('html').on('click', 'i.detalhes_pedido', function () {
        console.log(this);
    });

});
