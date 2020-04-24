Dropzone.options.dropzone =
{
    //type: 'POST',
    //url: 'fotos-add',
    dictDefaultMessage: "Arraste o de clic aqui para agregar imagenes",
    dictRemoveFile:"Borrar",
    maxFilesize: 12,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    addRemoveLinks: true,
    timeout: 50000,
    autoProcessQueue: false,
    parallelUploads: 20,
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
        return false;
    },
    queuecomplete: function() {
        this.on("queuecomplete", function (){
            window.location.replace(location.href);
        });
    },
};