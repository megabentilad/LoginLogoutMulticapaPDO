<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="name">Nombre del usuario: </label>
            <input type="text" id="name" name="name" placeholder="Usuario" width="10" height="20" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
} ?>"><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="desc">Descripción del usuario: </label>
            <input type="text" id="desc" name="desc" placeholder="Descripción" width="10" height="20" value="<?php if (isset($_POST['desc'])) {
    echo $_POST['desc'];
} ?>"><br>   
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
            <input type="submit" name="enviar" value="Registrarse">
            <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . $_SESSION['DAW215LLPaginaAnterior']; ?>"><input type="button" name="volver" value="Cancelar"></a>
        </div>
    </fieldset>
</form>
    <?php if ($aErrores['name'] != NULL) { ?>
    <div class="error" id="ename">
    <?php echo $aErrores['name']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php }
if ($aErrores['desc'] != NULL) {
    ?>
    <div class="error" id="edesc">
    <?php echo $aErrores['desc']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php }
    if ($aErrores['pass'] != NULL) {
        ?>
    <div class="error" id="epass">
    <?php echo $aErrores['pass']; //Mensaje de error que tiene el array aErrores    ?>
    </div> 
<?php }
if ($aErrores['pass2'] != NULL) {
    ?>
    <div class="error" id="epass2">
    <?php echo $aErrores['pass2']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php } ?>    