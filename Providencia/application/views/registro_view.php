
<form role="form" id="frmLogin" action="registro/registrar_cliente" method="post">
    <h1><label>¡Bienvenido! Crea tu cuenta</label></h1>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4" >

            <div class="form-group form-group-lg">
                <span class="label_form">Nombre:</span>
                <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre" class="form-control texto_form"/>
            </div>

            <div class="form-group form-group-lg">
                <span class="label_form">Apellido Paterno:</span>
                <input type="text" id="txtApPaterno" name="txtApPaterno"  placeholder="Apellido Paterno" class="form-control texto_form"/>
            </div>

            <div class="form-group form-group-lg">
                <span class="label_form">Apellido Materno:</span>
                <input type="text" id="txtApMaterno" name="txtApMaterno"  placeholder="Apellido Materno" class="form-control texto_form"/>
            </div>


        </div>
        <div class="col-xs-4 col-sm-4 col-md-4" >
            <div class="form-group form-group-lg">
                <span class="label_form">Correo:</span>
                <input type="email" id="txtCorreo" name="txtCorreo"  placeholder="Correo" class="form-control texto_form"/>
            </div>


            <div class="form-group form-group-lg">
                <span class="label_form">Repetir Correo:</span>
                <input type="email" id="txtCorreoConf" placeholder="Correo" class="form-control texto_form"/>
            </div>


            <div class="form-group form-group-lg">
                <span class="label_form">Teléfono:</span>
                <input type="tel"  id="txtTelefono" name="txtTelefono"  placeholder="Teléfono" class="form-control texto_form"/>
            </div>  
        </div>


        <div class="col-xs-4 col-sm-4 col-md-4" >
            <div class="form-group form-group-lg">
                <span class="label_form">Estado:</span>
                <select id="cbxEstados" name="cbxEstados" class="form-control texto_form">
                    <option value="">- Seleccione -</option>
                    <?php
                    if ($estados) {
                        foreach ($estados->result() as $estados) {
                            echo '<option value="' . $estados->idEstados . '">' . $estados->Nombre . '</option>';
                        }
                    }
                    ?>
                </select>
            </div> 
            
               <div class="form-group form-group-lg">
                <span class="label_form">Municipio:</span>
                <input type="tel"  id="txtMunicipio" name="txtMunicipio" placeholder="Municipio" class="form-control texto_form"/>
            </div>  
            
        </div>
        <div class="row center-block">
            <br/><br/>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right" >
             <br/><br/> 
             <button type="submit" class="btn btn-lg btn-danger label_form"  id="enviar">Registrar</button>
            <div id="divMensaje"></div>
        </div>
        </div>
    </div>
    <div class="row">
        <h1><label>Razones para registrarte</label></h1>

        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row ">
                        <div class="col-md-6 fondoRojo">
                            <h5 class="text-center cursiva2">Compras</h5>
                            <h4 class="text-center">Compra en línea desde la comodidad de tu casa y sin largas fílas.</h4>
                            <br/>
                        </div>
                        <div class="col-md-6 center-block">
                            <img src="<?= base_url(); ?>img/registro/compra-icon.png" alt="logo" class="img-responsive  center-block" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row ">
                        <div class="col-md-6 fondoGris">
                            <h5 class="text-center cursiva2">Pedidos</h5>
                            <h4 class="text-center">Podrás accede a tu historial de pedidos y el estatus de tus envíos.</h4>
                            <br/>
                        </div>
                        <div class="col-md-6 center-block">
                            <img src="<?= base_url(); ?>img/registro/pedidos-icon.png"  alt="logo" class="img-responsive  center-block" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row ">
                        <div class="col-md-6 fondoAmarillo">
                            <h5 class="text-center cursiva2">Confort</h5>
                            <h4 class="text-center">Recibe nuestros productos en la comodidad de tu casa.</h4>
                            <br/>
                        </div>
                        <div class="col-md-6 center-block">
                            <img src="<?= base_url(); ?>img/registro/recibe-icon.png" alt="logo" class="img-responsive  center-block" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br/><br/>
</form>
