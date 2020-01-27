<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        <label for="code">Codigo del usuario: </label>
                        <input type="text" id="cod" name="cod" width="10" height="20" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getCodUsuario(); ?>" disabled><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="desc">Descripción del usuario: </label>
                        <input type="text" id="desc" name="desc" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getDescUsuario(); ?>" width="10" height="20"><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="num">Numero de accesos: </label> 
                        <input type="text" id="num" name="num" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getNumAccesos(); ?>" disabled><br>      
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="perfil">Perfil: </label> 
                        <select name="perfil" id="perfil">
                            <option value="usuario" <?php if($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getPerfil() == "usuario"){ echo "selected"; } ?>>Usuario</option>
                            <option value="administrador" <?php if($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getPerfil() == "administrador"){ echo "selected"; } ?>>Administrador</option>
                        </select>
                        <br/>        
                    </div>
                    <?php if($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getFechaHoraUltimaConexion() != 0){ ?>
                    <br/>
                    <div class="obligatorio">
                        <label for="creacion">Fecha última conexión: </label> 
                        <input type="text" id="creacion" name="creacion" value="<?php echo date('d/m/Y - H:i:s',$_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getFechaHoraUltimaConexion()); ?>" disabled><br>        
                    </div>
                    <?php } ?>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Aceptar">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=mtoUsuarios"; ?>"><input type="button" name="volver" value="Cancelar"></a>
                    </div>
                </fieldset>
            </form>
  
<?php 
if ($aErrores['desc'] != NULL) {
    ?>
    <div class="error" id="edesc">
    <?php echo $aErrores['desc']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php } ?>
<?php 
if ($aErrores['perfil'] != NULL) {
    ?>
    <div class="error" id="eperfil">
    <?php echo $aErrores['perfil']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php } ?>
