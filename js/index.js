$(document).ready(function () {
    $("#enviar").click(function () {
        var form = new FormData($("#form")[0]);
        $.ajax({
            url: 'recebe_chat.php',
            method: 'post',
            dataType: 'json',
            date: form,
            cache: false,    
            processData: false,
            contentType: false,
            timeout: 8000,
            // success: function (resultado) {
            //     $("#resposta").html(resultado);
            //     console.log(resultado); 
            // }
        }).done(function(resultado){
            alert(resultado);
        })
    });
});