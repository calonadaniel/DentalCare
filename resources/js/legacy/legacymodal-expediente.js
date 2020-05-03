
/*Legacy code mas reduntante
/*Ver expediente*/
$('#Modal-show').on('show.bs.modal', function(event){ 

    var button = $(event.relatedTarget)
    var nombre = button.data('nombre')
    var apellido = button.data('apellido')
    var direccion = button.data('direccion')
    var costo_tratamiento = button.data('costo_tratamiento')
    var prima_inicial = button.data('prima_inicial')
    
    /*Aqui obtengo el valor del buttn data el cual es un array con los checkbox maracdos provenientes de la base de datos pasado por medio del data-atrribute */
    var show_dentpersuperiorizquierda = button.data('dentpersuperiorizquierda')

    /*Aqui obtengo el string del nombre de la variable no el valor que esta posee */
    var str_dentpersuperiorizquierda = Object.keys({show_dentpersuperiorizquierda:0})[0]

    /*Primero se desmarca todos los check box  y luego se cragan los marcados segun los datos traidos por el button.data  cada vez que se abre 
    el modal para que se muestren correctamente, debido a que sin el uncheck carga los de anteriores modales abiertos de expedientes */ 
    uncheckcheckboxdentadura(str_dentpersuperiorizquierda)
    checkcheckboxdentadura(show_dentpersuperiorizquierda, str_dentpersuperiorizquierda )

    var modal = $(this);
    
    modal.find('.modal-title').text('Detalles del Expediente')
    modal.find('.modal-body #show_nombre').val(nombre)
    modal.find('.modal-body #show_apellido').val(apellido)
    modal.find('.modal-body #show_direccion').val(direccion)
    modal.find('.modal-body #show_costo_tratamiento').val(costo_tratamiento)
    modal.find('.modal-body #show_prima_inicial').val(prima_inicial)            
});

/*Editar expediente*/
$('#Modal-edit').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var nombre = button.data('nombre')
    var apellido = button.data('apellido')
    var direccion = button.data('direccion')
    var costo_tratamiento = button.data('costo_tratamiento')
    var prima_inicial = button.data('prima_inicial')
    var id_expediente = button.data('id_expediente')
    var edit_dentpersuperiorizquierda = button.data('dentpersuperiorizquierda')

    /*Aqui obtengo el string del nombre de la variable no el valor que esta posee */
    var str_dentpersuperiorizquierda = Object.keys({edit_dentpersuperiorizquierda:0})[0]

    /*Primero se desmarca todos los check box  y luego se cragan los marcados segun los datos traidos por el button.data  cada vez que se abre 
    el modal para que se muestren correctamente, debido a que sin el uncheck carga los de anteriores modales abiertos de expedientes */ 
    uncheckcheckboxdentadura(str_dentpersuperiorizquierda)
    checkcheckboxdentadura(edit_dentpersuperiorizquierda, str_dentpersuperiorizquierda )

    var modal = $(this);
    
    modal.find('.modal-title').text('Editar información del Expediente')
    modal.find('.modal-body #edit_nombre').val(nombre)
    modal.find('.modal-body #edit_apellido').val(apellido)
    modal.find('.modal-body #edit_direccion').val(direccion)
    modal.find('.modal-body #edit_costo_tratamiento').val(costo_tratamiento)
    modal.find('.modal-body #edit_prima_inicial').val(prima_inicial)

    modal.find('.modal-body #edit_id_expediente').val(id_expediente)

});

/*Borrar expediente*/
$('#Modal-deleteeee').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var id_expediente = button.data('id_expediente')

    var modal = $(this);
    
    //modal.find('.modal-title').text('Borrar Expediente')

    modal.find('.modal-body #delete_id_expediente').val(id_expediente)
});