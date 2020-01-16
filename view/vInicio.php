<h3><?php echo $mensajeDeBienvenida; ?>.</h3>
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
        <a href="#"><button disabled="">Ir al detalle</button></a>
        <a href="#"><button disabled="">Editar perfil</button></a>
        <a href="index.php?cerrar=true"><button>Cerrar sesión</button></a>
        <div class="contenedorBanderas">
            <a href="programa.php?idioma=espanol"><img src="webroot/img/espana.png" class="bandera" title="Español" alt="Idioma español"></a>
            <a href="programa.php?idioma=ingles"><img src="webroot/img/inglaterra.png" class="bandera" title="English" alt="English language"></a>
            <a href="programa.php?idioma=aleman"><img src="webroot/img/alemania.png" class="bandera" title="Deutsch" alt="Deutsche sprache"></a>
        </div>