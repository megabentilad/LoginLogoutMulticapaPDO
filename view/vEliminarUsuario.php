<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="code">Codigo del usuario: </label>
            <input type="text" id="cod" name="cod" width="10" height="20" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getCodUsuario(); ?>" disabled><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="desc">Descripción del usuario: </label>
            <input type="text" id="desc" name="desc" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getDescUsuario(); ?>" width="10" height="20" disabled><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="num">Numero de accesos: </label> 
            <input type="text" id="num" name="num" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getNumAccesos(); ?>" disabled><br>      
        </div>
        <br/>
        <div class="obligatorio">
            <label for="perfil">Perfil: </label> 
            <input type="text" id="perfil" name="perfil" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getPerfil(); ?>" disabled><br>      
            <br/>        
        </div>
<?php if ($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getFechaHoraUltimaConexion() != 0) { ?>
            <br/>
            <div class="obligatorio">
                <label for="creacion">Fecha última conexión: </label> 
                <input type="text" id="creacion" name="creacion" value="<?php echo date('d/m/Y - H:i:s', $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getFechaHoraUltimaConexion()); ?>" disabled><br>        
            </div>
<?php } ?>
        <br/>
        <div>
            <input type="submit" name="enviar" value="Eliminar">
            <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=mtoUsuarios"; ?>"><input type="button" name="volver" value="Cancelar"></a>
        </div>
    </fieldset>
</form>