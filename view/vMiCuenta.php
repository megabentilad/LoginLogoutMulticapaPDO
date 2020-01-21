<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        <label for="name">Nombre del usuario: </label>
                        <input type="text" id="name" name="name" width="10" height="20" value="<?php echo $datos['codigo'] ?>" disabled><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="desc">Descripción del usuario: </label>
                        <input type="text" id="desc" name="desc" placeholder="Descripción" value="<?php echo $datos['descripcion']; ?>" width="10" height="20"><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="tipo">Tipo de usuario: </label> 
                        <input type="text" id="tipo" name="tipo" value="<?php echo $datos['tipo'] ?>" disabled><br>      
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="conexiones">Número de accesos: </label> 
                        <input type="text" id="conexiones" name="conexiones" value="<?php echo $datos['accesos'] ?>" disabled><br>        
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="fecha">Fecha de la última conexión: </label> 
                        <input type="text" id="fecha" name="fecha" value="<?php echo date('d/m/Y - H:i:s',$datos['fecha']) ?>" disabled><br>        
                    </div>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Aceptar">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . $_SESSION['DAW215LLPaginaAnterior']; ?>"><input type="button" name="volver" value="Cancelar"></a>
                    </div>
                </fieldset>
                <br/>
                <a href="cambiarPassword.php"><input type="button" name="volver" value="Cambiar contraseña" disabled></a>
            </form>
  
<?php 
if ($aErrores['desc'] != NULL) {
    ?>
    <div class="error" id="edesc">
    <?php echo $aErrores['desc']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php }
