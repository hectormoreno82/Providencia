<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Iniciar sesión</h3>
                        <p>Favor de capturar tus datos para iniciar sesión.</p>
                        <form role="form" id="frmLogin" action="verificalogin" method="post">
                            <div class="form-group"><label>Email</label> <input name="username" id="username" type="email" placeholder="Escribir email" class="form-control" required></div>
                            <div class="form-group"><label>Contraseña</label> <input type="password" name="password" id="password" placeholder="Escribir contraseña" class="form-control" required></div>
                            <?php if (isset($error)) { ?>
                                <div class="form-group"><p class="text-danger"><?= $error; ?></p></div>
                            <?php } ?>
                            <div>
                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Entrar</strong></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6"><h4>¿Aún no eres miembro?</h4>
                        <p>Puedes crear una cuenta con nosotros:</p>
                        <p class="text-center">
                            <a href="#"><i class="fa fa-sign-in big-icon"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

