$(document).ready(function () {

    $('#numero-pedido').on('click', function () {
        var pedido_id = $('#search').val();
        if (pedido_id.length > 0) {
            var url = $(this).parent().attr('action').replace('pedido_id', pedido_id);

            $('.panel.detalhes_pedido').css('display', 'none');
            $('table.pedidos tbody tr').remove();

            $.get(url, function (data) {
                if (data.status) {
                    $(data).each(function (idx, el) {
                        $('table.pedidos tbody').append(
                            '<tr>' +
                            '<td>' + el.info.id + '</td>' +
                            '<td>' + el.info.status + '</td>' +
                            '<td>' + el.info.data + '</td>' +
                            '<td><i id="' + el.info.id + '" class="fa fa-exclamation-circle detalhes_pedido" title="ver detalhes"></i></td>' +
                            '</tr>'
                        );
                    });
                }
            });
        }
    });

    $('html').on('click', 'i.detalhes_pedido', function () {
        var url = base_pedidos_base_url.replace('pedido_id', $(this).attr('id'));

        $.get(url, function (data) {

            $('#numero_pedido').text('Detalhes do Pedido #' + data.info.id);
            $('.panel.detalhes_pedido').css('display', 'block');
            $('table.intens tbody tr').remove();

            if (data.status) {
                $(data.itens).each(function (idx, el) {
                    $('table.intens tbody').append(
                        '<tr>' +
                        '<td>' + el.nome + '</td>' +
                        '<td>' + el.modelo + '</td>' +
                        '<td>' + el.pivot.quantidade + '</td>' +
                        '<td>' + el.pivot.valor_unitario + '</td>' +
                        '</tr>'
                    );
                });
            }

        });
    });

});
