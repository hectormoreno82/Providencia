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

        <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <script src="<?= base_url(); ?>js/jquery-2.1.1.js"></script>

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
                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <?php if (isset($usuario)) { ?>

                                    <li>
                                        <?= $usuario; ?>
                                    </li>
                                    <li>
                                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                            <i class="fa fa-shopping-cart"></i>  <span class="label label-warning">
                                                <?php
                                                if (isset($cantidadCarrito)) {
                                                    echo $cantidadCarrito;
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