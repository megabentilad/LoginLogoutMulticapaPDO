$(function () {
    
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
