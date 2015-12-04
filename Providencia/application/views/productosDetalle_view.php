<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox product-detail">
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">


                            <div class="product-images">
                                <?php
                                if ($imagenes) {
                                    foreach ($imagenes->result() as $imagen) {
                                        ?>
                                        <div>

                                            <img class="img-responsive" src="<?= base_url(); ?>imagenes/<?= $imagen->Ruta; ?>">

                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>
                        <?php if ($producto) { ?>


                            <div class="col-md-7">

                                <h2 class="font-bold m-b-xs">
                                    <?= $producto->result()[0]->Titulo; ?>
                                </h2>
                                <small><?= $producto->result()[0]->Subtitulo; ?></small>
                                <div class="m-t-md">
                                    <?php if (isset($usuario)) { ?>
                                        <h2 class="product-main-price">$<?= $producto->result()[0]->Precio; ?> <small class="text-muted">Sin I.V.A.</small> </h2>
                                    <?php } else { ?>
                                        <a href="<?= base_url();?>login"><button class="btn btn-primary btn-sm"><i class="fa fa-sign-in"></i> Inicia sesión para ver precio</button></a>
                                    <?php }?>

                                </div>
                                <hr>

                                <h4>Descripción del producto</h4>

                                <div class="small text-muted">
                                    <?= $producto->result()[0]->Descripcion; ?>
                                </div>
                                <dl class="small m-t-md">
                                    <dt>Categoría</dt>
                                    <dd><?= $producto->result()[0]->Nombre; ?></dd>
                                </dl>
                                <hr>

                                <div>
                                    <div class="btn-group">
                                        <?php if (isset($usuario)) { ?>
                                        <form role="form" id="frmLogin" action="<?= base_url(); ?>carrito/agregar_producto" method="post">
                                            <input type="hidden" id="txtidProductos" name="txtidProductos" value="<?= $producto->result()[0]->idProductos; ?>">
                                            <div class="form-group"><label>Cantidad</label> <input name="txtCantidad" id="txtCantidad" type="number" class="form-control" min="1" required></div>
                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-cart-plus"></i> Agregar al carrito</button>
                                        </form>
                                    <?php } else { ?>
                                        <a href="<?= base_url();?>login"><button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Inicia sesión para agregar al carrito</button></a>
                                    <?php }?>
                                        
    <!--                                    <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                        <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>-->
                                    </div>
                                </div>



                            </div>
                        <?php } ?>
                    </div>

                </div>
                <div class="ibox-footer">
                    <span class="pull-right">
                        Copyright Mako ©
                    </span>
                    Todas las imágenes de los productos son propiedad de Mako 
                </div>
            </div>

        </div>
    </div>
</div>

