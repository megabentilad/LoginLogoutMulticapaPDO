<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        <label for="name">Nombre del usuario: </label>
                        <input type="text" id="name" name="name" width="10" height="20" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuario']->getCodUsuario(); ?>" disabled><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="desc">Descripción del usuario: </label>
                        <input type="text" id="desc" name="desc" placeholder="Descripción" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuario']->getDescUsuario(); ?>" width="10" height="20"><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="tipo">Tipo de usuario: </label> 
                        <input type="text" id="tipo" name="tipo" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuario']->getPerfil(); ?>" disabled><br>      
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="conexiones">Número de accesos: </label> 
                        <input type="text" id="conexiones" name="conexiones" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuario']->getNumAccesos() + 1; ?>" disabled><br>        
                    </div>
                    <?php if($_SESSION['DAW215LoginLogoutPOOUsuario']->getFechaHoraUltimaConexion() == null){ ?>
                    <br/>
                    <div class="obligatorio">
                        <label for="fecha">Fecha de la última conexión: </label> 
                        <input type="text" id="fecha" name="fecha" value="<?php echo date('d/m/Y - H:i:s',$_SESSION['DAW215LoginLogoutPOOUsuario']->getFechaHoraUltimaConexion()); ?>" disabled><br>        
                    </div>
                    <?php } ?>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Aceptar">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Cancelar"></a>
                    </div>
                </fieldset>
                <br/>
                <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . 'borrarCuenta'; ?>"><input type="button" name="Eliminar cuenta" value="Eliminar cuenta"></a>
            </form>
  
<?php 
if ($aErrores['desc'] != NULL) {
    ?>
    <div class="error" id="edesc">
    <?php echo $aErrores['desc']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php }
