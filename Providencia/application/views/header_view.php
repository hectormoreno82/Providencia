<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/dashboard_4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Sep 2015 16:37:40 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Providencia</title>

    <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?= base_url(); ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="<?= base_url(); ?>" class="navbar-brand">Providencia</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
<!--                    <li class="active">
                        <a aria-expanded="false" role="button" href="layouts.html"> Back to main Layout page</a>
                    </li>-->
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Categorias <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?= base_url(); ?>Productos/Categorias/1">Categoria 1</a></li>
                            <li><a href="<?= base_url(); ?>Productos/Categorias/2">Categoria 2</a></li>
                            <li><a href="<?= base_url(); ?>Productos/Categorias/3">Categoria 3</a></li>
                            <li><a href="<?= base_url(); ?>Productos/Categorias/4">Categoria 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" >Contacto<span class="nav-label"></span></a>
<!--                        <ul role="menu" class="dropdown-menu">
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                            <li><a href="#">Menu item</a></li>
                        </ul>-->
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>