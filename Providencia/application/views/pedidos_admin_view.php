
<div class="animated fadeInRight ibox center-block">
    <div class="ibox-title">
        <h5>Listado de pedidos</h5>
    </div>
    <div class="ibox-content">
        <table width="100%" class="table table-striped table-bordered table-hover dataTables-pedidos-usuario" >
            <thead>
                <tr>
                    <th>Id Orden</th>
                    <th>Cantidad Productos</th>
                    <th>Total</th>
                    <th>Fecha alta</th>
                    <th>Fecha modificación</th>
                    <th>Cliente</th>
                    <th>Lugar</th>
                    <th>Estatus</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($pedidosUsuario) {
                    foreach ($pedidosUsuario->result() as $pedido) {
                        ?>
                        <tr>
                            <td>
                                <?= $pedido->idPedidos; ?>
                            </td>
                            <td>
                                <?= $pedido->CantidadProductos; ?>
                            </td>
                            <td>
                                $<?= $pedido->Cantidad; ?>
                            </td>
                            <td>
                                <?= $pedido->FechaPedido; ?>
                            </td>
                            <td>
                                <?= $pedido->FechaModificacion; ?>
                            </td>
                            <td>
                                <?= $pedido->Cliente; ?>
                            </td>
                            <td>
                                <?= $pedido->Lugar; ?>
                            </td>
                            <td>
                                <span class="<?= $pedido->Clase; ?>"><?= $pedido->Estatus; ?></span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs detalle" data-toggle="modal" data-target="#modalDetalle" value="<?= $pedido->idPedidos; ?>">Ver</button>
                                    <button class="btn-white btn btn-xs modificar" data-toggle="modal" data-target="#modalFormulario" value="<?= $pedido->idPedidos; ?>">Modificar</button>
                                    <button class="btn-white btn btn-xs imprimir" data-toggle="modal" data-target="#myModal2" value="<?= $pedido->idPedidos; ?>">Imprimir</button>
                                </div>
                            </td>
                        </tr>


                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal inmodal" id="modalDetalle" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><div id="idPedido"></div></h4>
                <div id="estatus"></div>
<!--                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
            </div>
            <div class="row">
                <div class="col-sm-8 b-r">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="divContenidoPedido">

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Resumen del pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TOTAL</td>
                                <td><div class="text-danger" id="divTotalPedido">$</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--                                        <div class="modal-body">
                                                        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                            remaining essentially unchanged.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>-->
        </div>
    </div>
</div>
<div class="modal inmodal" id="modalFormulario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><div id="idPedidoFormulario"></div></h4>
                <div id="estatusFormulario"></div>
<!--                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
            </div>
            <div class="ibox-content">

                <form class="form-horizontal" id="frmPedidos" method="post" action="actualizar">
                    <input type="hidden" id="txtidPedidos" name="txtidPedidos">
                    <p>Favor de llenar los datos.</p>
                    <div class="form-group"><label class="col-lg-2 control-label">Estatus</label>

                        <div class="col-lg-10">
                            <select class="form-control m-b" name="account" id="cbxEstatus" required>

                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">Costo de envío</label>

                        <div class="col-lg-10">
                            <div class="input-group m-b">
                            <span class="input-group-addon">$</span>
                            <input type="number" name="txtCosto" id="txtCosto" placeholder="Costo de envío" class="form-control" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="<?= base_url(); ?>js/views/pedidos_admin.js"></script>