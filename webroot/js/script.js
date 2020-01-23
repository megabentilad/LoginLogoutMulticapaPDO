$(function () {
    
    reloj = setInterval(function(){
        var tiempo = new Date();
        $('#aguja').css("transform","rotate(" + parseInt(tiempo.getTime()/10*0.06)%360 + "deg)");
        $('#minutero').css("transform","rotate(" + parseInt(tiempo.getTime()/10*0.06)%(360*60)/60 + "deg)");
        $('#horero').css("transform","rotate(" + parseInt((tiempo.getTime())/10*0.06)%(360*60)/3600 + "deg)");
//        aguja.style.transform = "rotate(" + centisegundos*0.06%360 + "deg)";
//            minutero.style.transform = "rotate(" + centisegundos*0.06%(360*60)/60 + "deg)";
//            horero.style.transform = "rotate(" + centisegundos*0.06%(360*3600)/3600 + "deg)";
    },1000);
    
    function recargar(){
        //Si está creada la sesion storage que la ponga en el input de usuario
        var usuarioSesion= sessionStorage.getItem("usuario");
        if(usuarioSesion!==null){
            $("#name").val(usuarioSesion);
            $("#recordar").attr("checked")===true;
        }

        $("#iniciarSesion").click(function () {
            if($("#recordar").attr("checked")===true){
                sessionStorage.setItem("usuario", $("#name").prop("value"));
            }else{
                sessionStorage.removeItem("usuario");
            }
        });
        
        $("#formulario").submit();
    }
    

});
