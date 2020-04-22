    /*Editar pago*/
    $('#Modal-pago-edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var fecha = button.data('fecha')
        var cuota = button.data('cuota')
        var saldo = button.data('saldo')
        var detalles = button.data('detalles')
        var id_expediente = button.data('id_expediente')

        var id_pago = button.data('id_pago')

        var modal = $(this);
        
        /*modal.find('.modal-title').text('Editar Informacion del Expediente')*/
        modal.find('.modal-body #fecha').val(fecha)
        modal.find('.modal-body #cuota').val(cuota)
        modal.find('.modal-body #saldo').val(saldo)
        modal.find('.modal-body #detalles').val(detalles)

        modal.find('.modal-body #id_expediente').val(id_expediente)
        modal.find('.modal-body #id_pago').val(id_pago)

    });

    /*Borrar registor*/
        /*Borrar expediente*/
        $('#Modal-pago-delete').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id_expediente = button.data('id_expediente')
            var id_pago = button.data('id_pago')
    
            var modal = $(this);
            
            /*modal.find('.modal-title').text('Borrar Expediente')*/
    
            modal.find('.modal-body #id_expediente').val(id_expediente)
                
            modal.find('.modal-body #id_pago').val(id_pago)
    
        });
    