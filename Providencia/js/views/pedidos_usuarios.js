$(document).ready(function () {
    $('.dataTables-pedidos-usuario').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Aún no hay datos para poder visualizar",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    $('.detalle').click(function () {
        $( "#idPedido" ).empty();
        $( "#estatus" ).empty();
        $('#divContenidoPedido').empty();
        $('#divTotalPedido').empty();
        var Total = 0;
        $.getJSON('pedidos/detalle/' + $(this).val(), function (data) {
            $('#idPedido').append('Pedido No.'+ data[0].idPedidos);
            $('#estatus').append('<span class="' + data[0].Clase + '">' + data[0].Nombre + '</span>');
            $.each(data, function (k, v) {
                console.log(v.Nombre);
                $('#divContenidoPedido').append('<tr>'
                                                +'<td>'
                                                    +'<div>'
                                                        +'<img class="col-lg-2 img-responsive" src="imagenes/' + v.Ruta + '">'
                                                    +'</div>'
                                                    +'<div>'+ v.Descripcion + '</div>'
                                                +'</td>'
                                                +'<td>' + v.Cantidad + '</td>'
                                                +'<td><div class="text-danger">$' + v.PrecioR + '</div></td>'
                                                +'<td><div class="text-danger">$' + v.Subtotal + '</div></td>'
                                            +'</tr>');
                Total = Total + parseFloat(v.Subtotal);
            });
            $('#divTotalPedido').append('$' + Total);
        });
    });
});


