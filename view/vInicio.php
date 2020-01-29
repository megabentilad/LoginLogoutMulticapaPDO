<h3><?php echo $mensajeDeBienvenida; ?></h3>
        <br/>
        <?php
        //Cambia el texto según la cookie del idioma
        switch ($_COOKIE['idiomaDAW215']){
            case "espanol":
                echo "<h3>Este texto está en español.</h3>";
                break;
            case "ingles":
                echo "<h3>This text is in English.</h3>";
                break;
            case "aleman":
                echo "<h3>Dieser Text ist in deutscher Sprache.</h3>";
                break;
            default:
                echo "<h3>Este texto está en español.</h3>";
        }
        ?>
        <br/>
        <?php if($_SESSION['DAW215LoginLogoutPOOUsuario']->getPerfil() == "usuario"){echo "<a href='" . $_SERVER['PHP_SELF'] . "?pagina=mtoDepartamentos'><button>Mto Departamentos</button></a>";}else{echo "<a href='" . $_SERVER['PHP_SELF'] . "?pagina=mtoUsuarios'><button>Mto Usuarios</button></a>";} ?>
        <br/><br/><br/>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . 'rest'; ?>"><button>Servicio REST</button></a>
        <div class="contenedorBanderas">
            <a href="?idioma=espanol"><img src="webroot/img/espana.png" class="bandera" title="Español" alt="Idioma español"></a>
            <a href="?idioma=ingles"><img src="webroot/img/inglaterra.png" class="bandera" title="English" alt="English language"></a>
            <a href="?idioma=aleman"><img src="webroot/img/alemania.png" class="bandera" title="Deutsch" alt="Deutsche sprache"></a>
        </div>