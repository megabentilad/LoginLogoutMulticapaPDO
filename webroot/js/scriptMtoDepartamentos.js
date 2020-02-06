$(function (){
    
    $('option').on('mouseover',cambiarvalor);
    $('option').on('mouseout',ratonfuera);
    $('option').on('click',valorseleccionado);
    function cambiarvalor(){
        $('#descripcion').val($(this).text());
        $('#descripcion').css("background-color","#a6d3ff");
    }
    function ratonfuera(){
        $('#descripcion').val("");
        $('#descripcion').css("background-color","whitesmoke");
    }
    function valorseleccionado(){
        $('#sugerencias').remove();
        $('#descripcion').css("background-color","whitesmoke");
    }
    
    var miXHR = new XMLHttpRequest();
    //Evento al escribir
    $('#descripcion').on('keyup',mostrar);
    
    function cambio(){
        //Si la conexión ha terminado y es satisfactoria (respectivamente), procede
        if(this.readyState == 4 && this.status == 200){ 
            console.log(this.responseText);
                $("#respuesta").text(this.responseText);
        }
    }
    
    function mostrar(){
        //Lo primero es que evaluar si tenemos instancia del objeto
        if(miXHR){
           //Para enviar potr POST
            miXHR.open("POST", "../core/provincias.php",true); //asincrono
            miXHR.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            miXHR.onreadystatechange = cambio;
            miXHR.send(valor=$('#descripcion').val());
            
            
        }else{
            alert("No existe el objeto de ayax :'/")
        }    
    }
});