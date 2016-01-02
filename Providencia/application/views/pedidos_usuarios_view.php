
<div class="animated fadeInRight ibox center-block">
    <div class="ibox-title">
        <h5>Mis pedidos</h5>
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
                                        <span class="<?= $pedido->Clase; ?>"><?= $pedido->Estatus; ?></span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs detalle" data-toggle="modal" data-target="#myModal2" value="<?= $pedido->idPedidos; ?>">Ver</button>
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
<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"><div id="idPedido"></div></h4>
                                            <div id="estatus"></div>
<!--                                            <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                remaining essentially unchanged.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


<script src="<?= base_url(); ?>js/views/pedidos_usuarios.js"></script>