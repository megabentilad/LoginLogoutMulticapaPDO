$(function () {
    
    reloj = setInterval(function(){
        var tiempo = new Date();
        $('#aguja').css("transform","rotate(" + parseInt(tiempo.getTime()*0.006)%360 + "deg)");
        $('#minutero').css("transform","rotate(" + ((parseInt(tiempo.getTime()*0.006)%(360*60)/60)) + "deg)");
        $('#horero').css("transform","rotate(" + ((parseInt(tiempo.getTime()*0.006)%(360*12)/3600)+45) + "deg)");
    },1000);
    
    /*Carrusel*/
    $('.carrusel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.carrusel-nav'
    });
    $('.carrusel-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.carrusel',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });

  
  
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
