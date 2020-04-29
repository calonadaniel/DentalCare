Dropzone.options.dropzone =
{
    dictDefaultMessage: "Arraste o de clic aqui para agregar imagenes",
    dictRemoveFile:"Borrar",
    dictCancelUpload: "Cancelar subida ",
    dictFileTooBig: "El archivo seleccionado es muy grande ({{filesize}}MiB). Tamaño máximo permitido: {{maxFilesize}}MiB",
    dictCancelUploadConfirmation: "¿Esta seguro que desea cancelar subida de este archivo?",
    dictMaxFilesExceeded: "Maximo de 5 archivos por subida",
    maxFilesize: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    timeout: 90000,
    autoProcessQueue: false,
    parallelUploads: 5,
    //maxFiles : 5,
    renameFile: function (file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },

    init: function() {
        var submitButton = document.querySelector("#btn_submitimages")
            myDropzone = this; // closure
        submitButton.addEventListener("click", function() {
            myDropzone.processQueue();
        });
        // You might want to show the submit button only when 
        // files are dropped here:
        //this.on("addedfile", function() {
          // Show submit button here and/or inform user to click it.
        //});
    },
    removedfile: function (file) {
        var name = file.upload.filename;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            /*url: '{{ url("") }}',*/
            url: 'fotos-delete',
            data: {filename: name},
            success: function (data) {
                console.log("File has been successfully removed!!");

            },
            error: function (e) {
                console.log(e);
            }
        });
        var fileRef;
        return (fileRef = file.previewElement) != null ?
        fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },

    success: function (file, response) {
        console.log(response);
        //var id_expediente = $(this).data("id_expediente");
        //window.location.href = "fotos-" + id_expediente;
    },
    error: function (file, response) {
        console.log(response);
        return false;
    },
    queuecomplete: function() {
        this.on("queuecomplete", function (){
            window.location.replace(location.href);
        });
    },
    maxfilesexceeded: function(file) {
        this.on("maxfilesexceeded", function (){
            alert("Maximo de 5 archivos por subida.");
            this.removeFile(file);
        });
    },
    dictFileTooBig: function(file) {
        this.on("dictFileTooBig", function() {
            alert("El archivo seleccionado es muy grande ({{filesize}}MiB). Tamaño máximo permitido: {{maxFilesize}}MiB");
            this.removeFile(file)
        });
    }
};