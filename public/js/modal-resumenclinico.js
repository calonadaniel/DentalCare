var add = "add";
validateform(add)

var edit = "edit";
modaldata(edit)
validateform(edit)

var deletee = "delete";
modaldata(deletee)

function modaldata(str_action) {

    //El string se coloca en el id modal para generar la info para dicho modal
    $('#Modal-resumenclinico-'+str_action).on('show.bs.modal', function(event){
        //El modal-delete solo necesita el id_expediente para borrar el exediente
        if(str_action == "delete"){
            var button = $(event.relatedTarget)
            var id_resumen = button.data('id_resumen')
            var id_expediente = button.data('id_expediente')
            var modal = $(this);
            modal.find('.modal-body #'+str_action+'_id_resumen').val(id_resumen)
            modal.find('.modal-body #'+str_action+'_id_expediente').val(id_expediente)
        }else if(str_action == "edit") { //Los modales de ver y editar utiliza la misma informacion 
        var button = $(event.relatedTarget)
        var id_expediente = button.data('id_expediente')
        var id_resumen = button.data('id_resumen')
        var fecha = button.data('fecha')
        var detalles = button.data('detalles')

        var modal = $(this);
        
        //modal.find('.modal-title').text('Texto dinamico')
        modal.find('.modal-body #'+str_action+'_id_expediente').val(id_expediente)
        modal.find('.modal-body #'+str_action+'_id_resumen').val(id_resumen)
        modal.find('.modal-body #'+str_action+'_fecha').val(fecha)
        modal.find('.modal-body #'+str_action+'_detalles').val(detalles)
    }
    });
}
/*Validacion client-side del formulario para las acciones de agregar y editar expediente 
    para mejorar el funcionamiento para el usuario y evitar recargar la pagina copleta
    Estas valudaciones son complementarias a las del server-side*/ 
    function validateform(action) {
        $('#resumenclinicoform-'+ action).parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
            return true; 
        });
    }









