@component('layouts.default')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <p>Utilize o campo de busca abaixo informando o número do pedido.</p>
                <form class="form-inline" action="/action_page.php">
                    <div class="form-group">
                        <label for="search">N&uacute;mero Pedido:</label>
                        <input type="text" class="form-control" id="search">
                    </div>
                    <button type="button" class="btn btn-primary">Busca</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Detalhes do Pedido 897165867</h4>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <h4>Itens do Pedido</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Modelo</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitario</th>
                                    <th>ver datlhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>2</td>
                                    <td>100,00</td>
                                    <td>icon</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>2</td>
                                    <td>100,00</td>
                                    <td>icon</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>2</td>
                                    <td>100,00</td>
                                    <td>icon</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <h4>Informa&ccedil;&otilde;es</h4>
                        <table class="table table-condensed">
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