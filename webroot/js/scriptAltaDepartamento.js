$(function (){
    $('#cp').on('keyup',mostrarProvincia);
    function mostrarProvincia(){
        var valorEscrito = $('#cp').val();
        var buscar;
        valorEscrito = parseInt(valorEscrito);
        if(Number.isInteger(valorEscrito) && valorEscrito > 999 && valorEscrito < 100000){
            buscar = parseInt(valorEscrito / 1000);
            $.post("controller/cAyax.php",{provincia:buscar}, function(respuesta){
                if(respuesta == ""){
                    $("#provincia").val("");
                }else{
                    $(JSON.parse(respuesta)).each(function(){
                            $("#provincia").val(this["provincia"]);  
                    });
                }
           });
        }else{
            if($('#cp').val() == ""){
                 $("#provincia").attr("placeholder","Zamora"); 
            }else{
                $("#provincia").attr("placeholder","Código postal no válido"); 
            }
            $("#provincia").val("");
        }
    }
});