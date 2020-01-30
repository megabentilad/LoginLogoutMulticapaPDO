$(function () {

    var usuarioSesion = sessionStorage.getItem("usuario");
    if (usuarioSesion !== null) {
        $("#name").val(usuarioSesion);
        $("#recordar").attr("checked") === true;
    }
    
    reloj = setInterval(function(){
        var tiempo = new Date();
        $('#aguja').css("transform","rotate(" + parseInt(tiempo.getTime()*0.006)%360 + "deg)");
        $('#minutero').css("transform","rotate(" + (parseInt(tiempo.getTime()*0.006)%(360*60)/60) + "deg)");
        $('#horero').css("transform","rotate(" + ((parseInt(tiempo.getTime()*0.006)%(360*720)/720)+30) + "deg)");
    },1000);
    
    /*Carrusel*/
    
    $('.carrusel').slick({
        variableWidth: true,
        infinite: true,
        speed: 300,
        centerMode: true,
        autoplaySpeed: 5000
    });
//    $('.carrusel').slick({
//        slidesToShow: 1,
//        slidesToScroll: 1,
//        arrows: false,
//        fade: true,
//        asNavFor: '.carrusel-nav'
//    });
//    $('.carrusel-nav').slick({
//        slidesToShow: 3,
//        slidesToScroll: 1,
//        asNavFor: '.carrusel',
//        dots: true,
//        centerMode: true,
//        focusOnSelect: true
//    });

    function guardar(){
        if ($("#recordar").attr("checked") === true) {
            sessionStorage.setItem("usuario", $("#name").prop("value"));
        } else {
            sessionStorage.removeItem("usuario");
        }
        return true;
    }
});
