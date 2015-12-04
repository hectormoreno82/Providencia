<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <?php if ($productosCarrito) { ?>
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
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($productosCarrito->result() as $productoCarrito) {
                                            $total = $total + $productoCarrito->Subtotal;
                                            ?>
                                            <tr>
                                                <td>
                                                    <div>
                                                        <img class="col-lg-2 img-responsive" src="<?= base_url(); ?>imagenes/<?= $productoCarrito->Ruta; ?>">
                                                    </div>
                                                    <div>
                                                        <?= $productoCarrito->Descripcion; ?>
                                                    </div>
                                                </td>
                                                <td><?= $productoCarrito->Cantidad; ?></td>
                                                <td><div class="text-danger">$<?= $productoCarrito->PrecioR; ?></div></td>
                                                <td><div class="text-danger">$<?= $productoCarrito->Subtotal; ?></div></td>
                                                <td><a href="<?= base_url(); ?>carrito/borrar_producto/<?= $productoCarrito->idProductos; ?>"><div class="fa fa-times-circle">&nbsp;</div></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Resumen de tu pedido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>TOTAL</td>
                                            <td><div class="text-danger">$<?= $total; ?></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <br>
                                                <a href="#" class="btn btn-lg btn-primary center-block m-t-n-xs">Procesar pedido</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>