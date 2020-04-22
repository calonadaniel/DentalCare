    /*Script para <-  ver - editar - borrar -> la informacion de un expediente por medio del modal*/
    var add = "add";
    validateform(add)

    var show = "show";
    modaldata(show)

    var edit = "edit";
    modaldata(edit)
    validateform(edit)

    var deletee = "delete";
    modaldata(deletee)

    //Con esta funcion muestro los datos en los respectivos modales la cual es inicilializada con un string indicando la accion
    function modaldata(str_action) {

        //El string se coloca en el id modal para generar la info para dicho modal
        $('#Modal-'+str_action).on('show.bs.modal', function(event){
            //El modal-delete solo necesita el id_expediente para borrar el exediente
            if(str_action == "delete"){
                var button = $(event.relatedTarget)
                var id_expediente = button.data('id_expediente')
                var modal = $(this);
                modal.find('.modal-body #delete_id_expediente').val(id_expediente)
            }else if(str_action == "show"||"edit") { //Los modales de ver y editar utiliza la misma informacion 
            var button = $(event.relatedTarget)
            var nombre = button.data('nombre')
            var apellido = button.data('apellido')
            var direccion = button.data('direccion')
            var costo_tratamiento = button.data('costo_tratamiento')
            var prima_inicial = button.data('prima_inicial')
            var id_expediente = button.data('id_expediente')

            var edad = button.data('edad')
            var encargado = button.data('encargado')
            var telefono = button.data('telefono')
            var sexo = button.data('sexo')
            var fecha_inicio = button.data('fecha_inicio')
            var higiene = button.data('higiene')
            var actividad_cariogenica = button.data('actividad_cariogenica')
            var habitos = button.data('habitos')

            var extraccion_indicada = button.data('extraccion_indicada')
            var cirugia_impacto = button.data('cirugia_impacto')
            var dentdetalles = button.data('dentdetalles')
            var arcada_superior = button.data('arcada_superior')
            var arcada_inferior = button.data('arcada_inferior')
            var tipo_mordida = button.data('tipo_mordida')
            var duracion_tratamiento = button.data('duracion_tratamiento')
            var relacionmolar = button.data('relacionmolar')
            var relacioncanino = button.data('relacioncanino')
            var antecedente_familiar = button.data('antecedente_familiar')

            /*Aqui obtengo el valor del button data el cual es un array con los checkbox maracdos 
            provenientes de la base de datos pasado por medio del data-atrribute */
            //Denticion permanente
            var dentpersuperiorizquierda = button.data('dentpersuperiorizquierda'); var dentpersuperiorderecha = button.data('dentpersuperiorderecha')
            var dentperinferiorizquierda = button.data('dentperinferiorizquierda'); var dentperinferiorderecha = button.data('dentperinferiorderecha')
            //Denticion temporal
            var denttemsuperiorizquierda = button.data('denttemsuperiorizquierda'); var denttemsuperiorderecha = button.data('denttemsuperiorderecha')
            var dentteminferiorizquierda = button.data('dentteminferiorizquierda'); var dentteminferiorderecha = button.data('dentteminferiorderecha')

            /*Aqui obtengo el string del nombre para encontrar el elemento en el html por medio de las funciones check y uncheck de abajo */
            //Denticion permanente
            str_dentpersuperiorizquierda = str_action+"_dentpersuperiorizquierda"; str_dentpersuperiorderecha = str_action+"_dentpersuperiorderecha"
            str_dentperinferiorizquierda = str_action+"_dentperinferiorizquierda"; str_dentperinferiorderecha = str_action+"_dentperinferiorderecha"
            //Denticion temporal
            str_denttemsuperiorizquierda = str_action+"_denttemsuperiorizquierda"; str_denttemsuperiorderecha = str_action+"_denttemsuperiorderecha"
            str_dentteminferiorizquierda = str_action+"_dentteminferiorizquierda"; str_dentteminferiorderecha = str_action+"_dentteminferiorderecha"

            //Dentdetalles, relacion molar, relacion canino
            str_dentdetalles = str_action+"_dentdetalles"
            str_relacionmolar = str_action+"_relacionmolar"
            str_relacioncanino = str_action+"_relacioncanino"
            /*Primero se desmarca todos los check box  y luego se cragan los marcados segun los datos 
            traidos por el button.data(cada vez que se abre el modal) para que se muestren correctamente, 
            debido a que sin el uncheck carga los de anteriores modales abiertos de otros expedientes */
            //denticion permanente 
            uncheckcheckboxdentadura(str_dentpersuperiorizquierda)
            checkcheckboxdentadura(dentpersuperiorizquierda, str_dentpersuperiorizquierda)
            uncheckcheckboxdentadura(str_dentpersuperiorderecha)
            checkcheckboxdentadura(dentpersuperiorderecha, str_dentpersuperiorderecha)

            uncheckcheckboxdentadura(str_dentperinferiorizquierda)
            checkcheckboxdentadura(dentperinferiorizquierda, str_dentperinferiorizquierda)
            uncheckcheckboxdentadura(str_dentperinferiorderecha)
            checkcheckboxdentadura(dentperinferiorderecha, str_dentperinferiorderecha)

            //Denticion temporal
            uncheckcheckboxdentadura(str_denttemsuperiorizquierda)
            checkcheckboxdentadura(denttemsuperiorizquierda, str_denttemsuperiorizquierda)
            uncheckcheckboxdentadura(str_denttemsuperiorderecha)
            checkcheckboxdentadura(denttemsuperiorderecha, str_denttemsuperiorderecha)

            uncheckcheckboxdentadura(str_dentteminferiorizquierda)
            checkcheckboxdentadura(dentteminferiorizquierda, str_dentteminferiorizquierda)
            uncheckcheckboxdentadura(str_dentteminferiorderecha)
            checkcheckboxdentadura(dentteminferiorderecha, str_dentteminferiorderecha)

            //
            uncheckcheckboxdentadura(str_dentdetalles)
            checkcheckboxdentadura(dentdetalles, str_dentdetalles)

            uncheckcheckboxdentadura(str_relacioncanino)
            checkcheckboxdentadura(relacioncanino, str_relacioncanino)

            uncheckcheckboxdentadura(str_relacionmolar)
            checkcheckboxdentadura(relacionmolar, str_relacionmolar)
    
            var modal = $(this);
            
            //modal.find('.modal-title').text('Texto dinamico')
            modal.find('.modal-body #'+str_action+'_nombre').val(nombre)
            modal.find('.modal-body #'+str_action+'_apellido').val(apellido)
            modal.find('.modal-body #'+str_action+'_direccion').val(direccion)
            modal.find('.modal-body #'+str_action+'_costo_tratamiento').val(costo_tratamiento)
            modal.find('.modal-body #'+str_action+'_prima_inicial').val(prima_inicial)
            modal.find('.modal-body #'+str_action+'_id_expediente').val(id_expediente)

            modal.find('.modal-body #'+str_action+'_edad').val(edad)
            modal.find('.modal-body #'+str_action+'_encargado').val(encargado)
            modal.find('.modal-body #'+str_action+'_telefono').val(telefono)
            modal.find('.modal-body #'+str_action+'_sexo').val(sexo)
            modal.find('.modal-body #'+str_action+'_fecha_inicio').val(fecha_inicio)
            modal.find('.modal-body #'+str_action+'_higiene').val(higiene)
            modal.find('.modal-body #'+str_action+'_actividad_cariogenica').val(actividad_cariogenica)
            modal.find('.modal-body #'+str_action+'_habitos').val(habitos)
            modal.find('.modal-body #'+str_action+'_extraccion_indicada').val(extraccion_indicada)
            modal.find('.modal-body #'+str_action+'_cirugia_impacto').val(cirugia_impacto)
            modal.find('.modal-body #'+str_action+'_arcada_superior').val(arcada_superior)
            modal.find('.modal-body #'+str_action+'_arcada_inferior').val(arcada_inferior)
            modal.find('.modal-body #'+str_action+'_tipo_mordida').val(tipo_mordida)
            modal.find('.modal-body #'+str_action+'_duracion_tratamiento').val(duracion_tratamiento)
            modal.find('.modal-body #'+str_action+'_antecedente_familiar').val(antecedente_familiar)
            //El modal de ver  solo debe mostrar la informacion sin que esta pueda ser editable por lo que se desactivan
            //sus campos dejando solo los botones de cerrar y dismiss habilitados.
            if(str_action =="show"){
                $('#Modal-show *').prop('disabled', true); 
                $('.btn-secondary').attr('disabled',false);
                $('.close').attr('disabled',false);
            }
        }
        });
    }

    function checkcheckboxdentadura(dentadura, str_varname ) {
        if(str_varname && dentadura != null) {
            dentadura.forEach(element => 
                $ ("input[name='"+str_varname+"[]"+"']").each(function(){
                    if( $(this).val() == element){
                        $(this).prop('checked', true);
                    }
                 })
            )
        } 
    }
    
    function uncheckcheckboxdentadura(str_varname) {
        if(str_varname != null) {
            $ ("input[name='"+str_varname+"[]"+"']").each(function(){
                $(this).prop('checked', false);
             })
        } 
    }

    /*Validacion client-side del formulario para las acciones de agregar y editar expediente 
    para mejorar el funcionamiento para el usuario y evitar recargar la pagina copleta
    Estas valudaciones son complementarias a las del server-side*/ 
    function validateform(action) {
        $('#expedienteform-'+ action).parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
            return true; 
        });
    }


