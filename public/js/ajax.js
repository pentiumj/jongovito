$(document).ready(function(){

    $("#enviarForm").click(function(){
        $.ajax({
            data:  $("#contacto").serialize(),
            url:   '../php/enviarForm.php',
            type:  'post',
            beforeSend: function () {
                    $("#mensajeLogin").html("Enviando, espere por favor...");
            },
            success:  function (response) {
                    $("#respuestaForm").html(response);
            
            }
        });	    	

    });
    
    
});