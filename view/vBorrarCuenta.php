<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="name">Nombre del usuario: </label>
            <input type="text" id="name" name="name" width="10" height="20" value="<?php echo $_SESSION['DAW215LoginLogoutPOOUsuario']->getCodUsuario(); ?>" disabled><br>   
        </div>
        <br/>


        <div class="obligatorio">
            <label for="pass">Contraseña: </label> 
            <input type="password" id="pass" name="pass" placeholder="Contraseña"><br>      
        </div>
        <br/>
        <div class="obligatorio">
            <label for="pass2">Repita la contraseña: </label> 
            <input type="password" id="pass2" name="pass2" placeholder="Contraseña"><br>        
        </div>
        <br/>
        <div>
            <input type="submit" name="enviar" value="Borrar cuenta">
            <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . $_SESSION['DAW215LLPaginaAnterior']; ?>"><input type="button" name="volver" value="Cancelar"></a>
        </div>
    </fieldset>
</form>

<?php
if ($aErrores['pass'] != NULL) {
    ?>
    <div class="error" id="epass">
        <?php echo $aErrores['pass']; //Mensaje de error que tiene el array aErrores    ?>
    </div> 
<?php
}
if ($aErrores['pass2'] != NULL) {
    ?>
    <div class="error" id="epass2">
    <?php echo $aErrores['pass2']; //Mensaje de error que tiene el array aErrores     ?>
    </div>   
<?php
}    