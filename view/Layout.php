<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Luis Mateo Rivera Uriarte</title>
        <meta charset="UTF-8">
        <meta name="author" content="Luis Mateo Rivera Uriarte">
        <link rel="stylesheet" type="text/css" href="webroot/css/styles.css" media="screen">
        <?php
        if($vista == "view/vLogin.php"){echo '<link rel="stylesheet" type="text/css" href="webroot/css/stylesLogin.css" media="screen">';}?>
        <link rel="icon" type="image/png" href="webroot/img/mifavicon.png">
        <script src="webroot/js/jquery.js"></script>
        <script src="webroot/js/script.js"></script>
    </head>
    <body>
        <header>
            <div>
                <h1>
                    Login Logout MVC
                </h1>
                <h2>
                    <?phpecho $tituloPagina?>
                </h2>
            </div>
        </header>
        <div class="contenido">
            <?php require_once $vista; ?>
        </div>
        <footer>
            <p>
                <a href="#">
                    © Luis Mateo Rivera Uriarte 2019-2020
                </a>
                <a href="http://daw-usgit.sauces.local/luism/LoginLogoutMulticapaPDO/tree/master" target="_blank">
                    <img src="webroot/img/gitLab.png" class="iconoFooter"  title="GitLab">
                </a>
            </p>
        </footer>
    </body>
</html>