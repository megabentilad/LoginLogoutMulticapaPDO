$(function (){
    console.log("Hola María, no acabo de entender lo de la clave foranea así que, si bien, funciona correctamente, está mal diseñado.");
    console.log("La tabla T02_Provincia (DEPARTAMENTOS) tiene cómo clave foranea la tabla T03_id (PROVINCIAS)");
    console.log("El problema de esto es que, por ejemplo, 49 no corresponde con Zamora. ESTÁ SOLUCIONADO");
    console.log("Es una chapuza, pero funciona");
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