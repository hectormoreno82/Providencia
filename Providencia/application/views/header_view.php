<!DOCTYPE html>
<html>


    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Sep 2015 16:37:40 GMT -->
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Mako</title>

        <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= base_url(); ?>css/plugins/slick/slick.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/plugins/slick/slick-theme.css" rel="stylesheet">

        <link href="<?= base_url(); ?>css/animate.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
        <!-- Toastr style -->
        <link href="<?= base_url(); ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Data Tables -->
        <link href="<?= base_url(); ?>css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


        <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <script src="<?= base_url(); ?>js/jquery-2.1.1.js"></script>

        <!-- Mainly scripts -->

<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url(); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Data Tables -->
<script src="<?= base_url(); ?>js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?= base_url(); ?>js/plugins/dataTables/dataTables.tableTools.min.js"></script>


<!-- Custom and plugin javascript -->
<!--<script src="<?= base_url(); ?>js/inspinia.js"></script>-->
<script src="<?= base_url(); ?>js/plugins/pace/pace.min.js"></script>

<!-- slick carousel-->
<script src="<?= base_url(); ?>js/plugins/slick/slick.min.js"></script>


<script src="<?= base_url(); ?>js/views/login.js"></script>

        <!-- Jquery Validate -->
        <script src="<?= base_url(); ?>js/plugins/validate/jquery.validate.min.js"></script>
    </head>

    <body class="top-navigation">

        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">

                <img src="<?= base_url(); ?>img/logo.jpg" alt="logo" class="img-responsive center-block" />
                <br/>
                <div class="row border-bottom white-bg">
                    <nav class="navbar navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <i class="fa fa-reorder"></i>
                            </button>
                            <a href="<?= base_url(); ?>" class="navbar-brand">Mako</a>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a aria-expanded="false" role="button" href="<?= base_url(); ?>" > Inicio</a>
                                </li>
                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Productos <span class="caret"></span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="<?= base_url(); ?>Productos/Categorias/1">Chamaras</a></li>
                                        <li><a href="<?= base_url(); ?>Productos/Categorias/2">Chalecos</a></li>
                                        <li><a href="<?= base_url(); ?>Productos/Categorias/3">Cojines</a></li>
                                        <li><a href="<?= base_url(); ?>Productos/Categorias/4">Categoria 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" >Registro<span class="nav-label"></span></a>
                                </li>
                                <li>
                                    <a href="#" >Contacto<span class="nav-label"></span></a>
                                </li>
                                <?php
                                if (isset($usuario) && isset($tipo)) {
                                    if ($tipo == 2) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url(); ?>Pedidos" >Mis pedidos<span class="nav-label"></span></a>
                                        </li>
                                    <?php } else {
                                        ?>
                                        <li class="dropdown">
                                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Administración <span class="caret"></span></a>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="#">Clientes</a></li>
                                                <li><a href="<?= base_url(); ?>Pedidos/pedidos_admin">Pedidos</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>

                            <ul class="nav navbar-top-links navbar-right">
                                <?php if (isset($usuario)) { ?>

                                    <li>
                                        <?= $usuario; ?>
                                    </li>
                                    <li>
                                        <a href="<?= base_url(); ?>carrito">
                                            <i class="fa fa-shopping-cart"></i>  <span class="label label-warning">
                                                <?php
                                                if ($cantidadCarrito) {
                                                    echo $cantidadCarrito;
                                                } else {
                                                    echo '0';
                                                }
                                                ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url(); ?>welcome/logout">
                                            <i class="fa fa-sign-out"></i> Salir
                                        </a>
                                    </li>

                                <?php } else { ?>
                                    <li>
                                        <a href="<?= base_url(); ?>login">
                                            <i class="fa fa-sign-in"></i> Iniciar sesión
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="wrapper wrapper-content">
                    <div  class="container">