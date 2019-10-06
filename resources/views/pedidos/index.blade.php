@component('layouts.default')

@push('scripts')
<script src="{{asset('js/pedidos.js') }}"></script>
@endpush

@push('styles')
<link href="{{ asset('css/pedidos.css') }}" rel="stylesheet">
@endpush

<script>
    var base_pedidos_base_url = "{{route('pedidos.detalhes', 'pedido_id')}}";
</script>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <p>Utilize o campo de busca abaixo informando o número do pedido.</p>
                <form class="form-inline" action="{{route('pedidos.show','pedido_id')}}">
                    <div class="form-group">
                        <label for="search">N&uacute;mero Pedido:</label>
                        <input type="text" class="form-control" id="search">
                    </div>
                    <button type="button" id="numero-pedido" class="btn btn-primary">Busca</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Pedidos</h4>
                <table class="table table-hover pedidos">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Status</th>
                            <th>Data Atualização</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-default detalhes_pedido">
            <div class="panel-body">
                <h4 id="numero_pedido"></h4>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <h4>Itens do Pedido</h4>
                        <table class="table table-hover intens">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Modelo</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitario</th>
                                </tr>
                            </thead>
                            <tbody>                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <h4>Informa&ccedil;&otilde;es</h4>
                        <table class="table table-condensed info">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label>John</label></td>
                                    <td>Doe</td>
                                </tr>
                                <tr>
                                    <td><label>John</label></td>
                                    <td>Moe</td>
                                </tr>
                                <tr>
                                    <td><label>John</label></td>
                                    <td>Dooley</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endcomponent
