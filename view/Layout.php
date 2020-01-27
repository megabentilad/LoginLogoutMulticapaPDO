<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Luis Mateo Rivera Uriarte</title>
        <meta charset="UTF-8">
        <meta name="author" content="Luis Mateo Rivera Uriarte">
        <link rel="stylesheet" type="text/css" href="webroot/css/styles.css" media="screen">
        <?php
        if($vista == "view/vLogin.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesLogin.css" media="screen"><link rel="stylesheet" type="text/css" href="webroot/css/slick.css" media="screen"><link rel="stylesheet" type="text/css" href="webroot/css/slick-theme.css" media="screen">';}?>
        <?php
        if($vista == "view/vRegistro.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesRegistro.css" media="screen">';}?>
        <?php
        if($vista == "view/vMiCuenta.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesMiCuenta.css" media="screen">';}?>
        <?php
        if($vista == "view/vBorrarCuenta.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesBorrarCuenta.css" media="screen">';}?>
        <?php
        if($vista == "view/vMtoDepartamentos.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesMtoDepartamentos.css" media="screen">';}?>
        <?php
        if($vista == "view/vAltaDepartamento.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesAltaDepartamento.css" media="screen">';}?>
        <?php
        if($vista == "view/vConsultarModificarDepartamento.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesConsultarModificarDepartamento.css" media="screen">';}?>
        <?php
        if($vista == "view/vMtoUsuarios.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesMtoUsuarios.css" media="screen">';}?>
        <?php
        if($vista == "view/vConsultarModificarUsuario.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesConsultarModificarUsuario.css" media="screen">';}?>
        <link rel="icon" type="image/png" href="webroot/img/mifavicon.png">
        <script src="webroot/js/jquery.js"></script>
        <script src="webroot/js/slick.js"></script>
        <script src="webroot/js/script.js"></script>
    </head>
    <body>
        <header>
            <div>
                <h1>
                    Login Logout MVC
                </h1>
                <h2>
                    <?php
                    echo $_SESSION['DAW215LLPOOtituloPagina']?>
                </h2>
            </div>
        </header>
        <div class="contenido">
            <?php require_once $vista; ?>
        </div>
        <footer>
            <p>
                <a href="http://daw215.sauces.local/index.html">
                    <span>© Luis Mateo Rivera Uriarte 2019-2020</span>
                </a>
                <a href="https://github.com/megabentilad/LoginLogoutMulticapaPDO" target="_blank">
                    <img src="webroot/img/gitHub.png" class="iconoFooter"  title="GitHub">
                </a>
                <a href="doc/200112LMRED2.pdf" target="_blank">
                    <img src="webroot/img/tecnologias.png" class="iconoFooter2"  title="Tecnologias">
                </a>
            </p>
        </footer>
    </body>
</html>