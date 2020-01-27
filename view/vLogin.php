<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="name">Nombre de usuario: </label>
            <input type="text" id="name" name="name" placeholder="Usuario" width="10" height="20" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
} ?>"><br>

        </div>
        <br/>
        <div class="obligatorio">
            <label for="pass">Contraseña: </label> 
            <input type="password" id="pass" name="pass" placeholder="Contraseña"><br>

        </div>
        <div class="recordar">
            <label class="switch">
                <input type="checkbox">
                <span class="slider"></span>
                <span class="trecordar">Recordar</span>
            </label>
        </div>
        <br/>
        <br/>
        <br/>
        <div>
            <input type="submit" name="enviar" value="Iniciar sesión">
            <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . 'registro'; ?>"><input type="button" name="registro" value="Registrarse"></a>
        </div>
    </fieldset>
</form>
    <?php if ($aErrores['name'] != NULL) { ?>
    <div class="error" id="ename">
    <?php echo $aErrores['name']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php }
    if ($aErrores['pass'] != NULL) {
        ?>
    <div class="error" id="epass">
    <?php echo $aErrores['pass']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php } ?>    
<div id="marco">
    <div id="aguja"></div>
    <div id="centro"></div>
    <div id="minutero"></div>
    <div id="horero"></div>
    <div id="doce">12</div>
    <div id="tres">3</div>
    <div id="seis">6</div>
    <div id="nueve">9</div>
</div>   
<div class="carrusel">
    <div class="diagramaDeClases"><a href="webroot/img/DiagramaDeClases.png" target="_blank"><img src="webroot/img/DiagramaDeClases.png" title="Diagrama de clases" alt="Diagrama de clases" class="imagenCarrusel"></a></div>
    <div class="estructuraDeAlmacenamiento"><img src="webroot/img/estructuraDeAlmacenamiento.png" title="Estructura de almacenamiento" alt="Estructura de almacenamiento" class="imagenCarrusel"></div>
    <div class="arbolDeNavegacion"><a href="webroot/img/ArbolDeNavegacion.png" target="_blank"><img src="webroot/img/ArbolDeNavegacion.png" title="Arbol de navegación" alt="Arbol de navegación" class="imagenCarrusel"></a></div>
    <div class="catalogoDeRequisitos"><a href="doc/200113CatalogoDeRequisitos.pdf" target="_blank"><img src="webroot/img/catalogoDeRequisitos.PNG" title="Catalogo de requisitos" alt="Catalogo de requisitos" class="imagenCarrusel"></a></div>
    <div class="diagramaDeCasosDeUso"><a href="webroot/img/DiagramaDeCasosDeUso.png" target="_blank"><img src="webroot/img/DiagramaDeCasosDeUso.png" title="Diagrama de casos de uso" alt="Diagrama de casos de uso" class="imagenCarrusel"></a></div>
    <div class="modeloFisicoDeDatos"><img src="webroot/img/ModeloFisicoDeDatos.png" title="Modelo Fisico De Datos" alt="Modelo Fisico De Datos" class="imagenCarrusel"></div>
    <div class="relacionDeFicheros"><a href="webroot/img/RelacionDeFicheros.png" target="_blank"><img src="webroot/img/RelacionDeFicheros.png" title="Relación de ficheros" alt="Relación de ficheros" class="imagenCarrusel"></a></div>
</div>
