jQuery.extend(jQuery.validator.messages, {
    required: '<div class="label label-danger remueve">Campo requerido</div>',
});


$('#btnEnviar').on('click', function () {
    // Setup validation

    $("#frmRegistro").validate({
        focusInvalid: false,
        rules: {
            'txtNombre': {
                required: true
            },
            'txtApPaterno': {
                required: true
            },
            'txtApMaterno': {
                required: true
            },
            'txtCorreo': {
                required: true
            },
            'txtCorreoConf': {
                required: true
            },
            'txtTelefono': {
                required: true
            },
            'txtMunicipio': {
                required: true
            }
        },
        highlight: function (element) {

            var btn = $('#btnEnviar');
            btn.button('reset');

        }
    });

    var btn = $('#btnEnviar');
    btn.button('loading');
    setTimeout(function () {
        btn.button('reset');
    }, 9999999);

});



$("#txtCorreo").focusout(function () {
    var btn = $('#btnEnviar');
    btn.button('loading');
 $( "#mensaje" ).empty();
    var query_string = $.param({ "Correo": $("#txtCorreo").val()});
    
        $.getJSON('consultar_correo?' + query_string, function (data) {
        $.each(data, function (k, v) {
         if(v.Valor==1){
             $( "#mensaje" ).append("<span class='text-danger'>El correo <b>"+$("#txtCorreo").val()+"</b> ya esta registrado</span>");
             $("#txtCorreo").val("");
             $("#txtCorreo").attr("placeholder", "Escribe otro correo");
             btn.button('reset');
         }
         else{
              $( "#mensaje" ).empty();
               btn.button('reset');
         }
        });
    });
 
});



$("#txtCorreoConf").focusout(function () {
    var btn = $('#btnEnviar');
    btn.button('loading');
    $( "#mensajeCompara" ).empty();
    
    if($("#txtCorreoConf").val()!= $("#txtCorreo").val()){
         $( "#mensajeCompara" ).append("<span class='text-danger'>Los correos son diferentes</span>");
    }
    else{
         btn.button('reset');
    }
 
});