$(function () {
    var valorEscrito = $('#provincia').val();
    $.post("controller/cAyax.php", {provincia: valorEscrito}, function (respuesta) {
        $(JSON.parse(respuesta)).each(function () {
            $("#provincia").val(this["provincia"]);
        });
    });
});