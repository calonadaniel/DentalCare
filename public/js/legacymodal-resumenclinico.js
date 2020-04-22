
/*Editar pago*/
$('#Modal-editresumenclinico').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var fecha = button.data('fecha')
    var detalles = button.data('detalles')

    var id_expediente = button.data('id_expediente')
    var id_resumen = button.data('id_resumen')

    var modal = $(this);
    
    /*modal.find('.modal-title').text('Editar Informacion del Expediente')*/
    modal.find('.modal-body #fecha').val(fecha)
    modal.find('.modal-body #detalles').val(detalles)

    modal.find('.modal-body #id_expediente').val(id_expediente)
    modal.find('.modal-body #id_resumen').val(id_resumen)

});

/*Borrar registo de clinico*/
    $('#Modal-deleteresumenclinico').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var id_expediente = button.data('id_expediente')
        var id_resumen = button.data('id_resumen')

        var modal = $(this);

        modal.find('.modal-body #id_expediente').val(id_expediente)
        modal.find('.modal-body #id_resumen').val(id_resumen)
    });