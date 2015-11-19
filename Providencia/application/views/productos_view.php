
<div class="wrapper wrapper-content animated fadeInRight">
    <?php if ($productos) { ?>
        <div class="row">
            <?php
            foreach ($productos->result() as $producto) {
                ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                <?php
                                if ($producto->Ruta == "") {
                                    echo "SIN IMAGEN";
                                } else {
                                    ?>
                                <img class="img-responsive" src="<?= base_url(); ?>imagenes/<?= $producto->Ruta; ?>">
                                <?php
                                }
                                ?>
                                
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    $<?= $producto->Precio; ?>
                                </span>
                                <small class="text-muted"><?= $producto->Nombre; ?></small>
                                <a href="#" class="product-name"> <?= $producto->Titulo; ?></a>



                                <div class="small m-t-xs">
                                    <?= $producto->Descripcion; ?>
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <?php
    }
    ?>





</div>