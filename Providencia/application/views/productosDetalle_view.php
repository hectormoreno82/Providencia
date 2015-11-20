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
                                            <div class="image-imitation">
                                                <img class="img-responsive" src="<?= base_url(); ?>imagenes/<?= $imagen->Ruta; ?>">
                                            </div>
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
                                <h2 class="product-main-price">$<?= $producto->result()[0]->Precio; ?> <small class="text-muted">Sin I.V.A.</small> </h2>
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
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Agregar al carrito</button>
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
                        Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                    </span>
                    The generated Lorem Ipsum is therefore always free
                </div>
            </div>

        </div>
    </div>
</div>

