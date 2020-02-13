$(function (){
    $('#descripcion').on('keyup',mostrarLista);
    $('#descripcion').on('focusout',valorSeleccionado);
    var valorEscrito;
    function cambiarValor(){
        $('#descripcion').val($(this).text());
        $(this).css("background-color","#dedede");
        $('#descripcion').css("background-color","#a6d3ff");
    }
    function ratonFuera(){
        $('#descripcion').css("background-color","whitesmoke");
        $('#descripcion').val(valorEscrito);
        $(this).css("background-color","#f9f9f9");
    }
    function valorSeleccionado(){
        $('#sugerencias').empty();
        $('#descripcion').css("background-color","whitesmoke");
        $('option').css("background-color","#e8e8e8");
    }
    function mostrarLista(){
        $('#sugerencias').empty();
        valorEscrito = $('#descripcion').val();
        
        //mostrar las opciones
        $.post("controller/cMtoDepartamentos.php",{valor:valorEscrito}, function(respuesta){
            $(JSON.parse(respuesta)).each(function(){
                $("#sugerencias").append("<option>" + this["desc"] + "</option>"); 
                $('option').css("background-color","#f9f9f9");
                $('option').on('mouseover',cambiarValor);
                $('option').on('mouseout',ratonFuera);
                $('option').on('click',valorSeleccionado);
            });
       });
       
    }
    
   
});