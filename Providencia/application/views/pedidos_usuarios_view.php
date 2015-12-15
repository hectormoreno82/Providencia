
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
        <!--                                <span class="label label-primary">Pending</span>-->
                                <?= $pedido->Estatus; ?>
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs">Edit</button>
                                    <button class="btn-white btn btn-xs">Delete</button>
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

<script src="<?= base_url(); ?>js/views/pedidos_usuarios.js"></script>