
<div class="wrapper wrapper-content animated fadeInRight">
    <?php if ($productos) { ?>

        <?php
        $i = 1;
        $cantRenglon = 4;
        foreach ($productos->result() as $producto) {
            if ($i % $cantRenglon == 0 || $i == 1) {
                echo '<div class="row">';
            }
            ?>

            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">


                        <?php
                        if ($producto->Ruta == "") {
                            echo "SIN IMAGEN";
                        } else {
                            ?>
                            <img class="img-responsive" src="<?= base_url(); ?>imagenes/<?= $producto->Ruta; ?>">
                            <?php
                        }
                        ?>

                        <div class="product-desc">
                            <span class="product-price">
                                <?php
                                if (isset($usuario)) {
                                    echo '$' . $producto->Precio;
                                }
                                ?>
                            </span>
                            <small class="text-muted"><?= $producto->Nombre; ?></small>
                            <a href="#" class="product-name"> <?= $producto->Titulo; ?></a>



                            <div class="small m-t-xs">
                                <?= $producto->Descripcion; ?>
                            </div>
                            <div class="m-t text-righ">

                                <a href="<?= base_url(); ?>Productos/Detalle/<?= $producto->idProductos; ?>" class="btn btn-xs btn-outline btn-primary">Ver más <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($i % $cantRenglon == 0) {
                echo '</div>';
            }
            $i++;
        }
        ?>
    </div>
    <?php
}
?>





</div>