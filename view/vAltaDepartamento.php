<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <div class="obligatorio">
            <label for="cod">Codigo del departamento: </label>
            <input type="text" id="cod" name="cod" placeholder="Código" maxlength="3" width="10" height="20" value="<?php if (isset($_POST['cod'])) {
    echo $_POST['cod'];
} ?>"><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="desc">Descripción del departamento: </label>
            <input type="text" id="desc" name="desc" placeholder="Descripción" width="10" height="20" value="<?php if (isset($_POST['desc'])) {
    echo $_POST['desc'];
} ?>"><br>   
        </div>
        <br/>
        <div class="obligatorio">
            <label for="vol">Volumen de negocio: </label>
            <input type="text" id="vol" name="vol" placeholder="Volumen" width="10" height="20" value="<?php if (isset($_POST['vol'])) {
    echo $_POST['vol'];
} ?>"><br>   
        </div>
        <br/>
        <div>
            <input type="submit" name="enviar" value="Dar de alta">
            <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=" . $_SESSION['DAW215LLPaginaAnterior']; ?>"><input type="button" name="volver" value="Cancelar"></a>
        </div>
    </fieldset>
</form>
    <?php if ($aErrores['cod'] != NULL) { ?>
    <div class="error" id="ecod">
    <?php echo $aErrores['cod']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php }
if ($aErrores['desc'] != NULL) {
    ?>
    <div class="error" id="edesc">
    <?php echo $aErrores['desc']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php }
    if ($aErrores['vol'] != NULL) {
        ?>
    <div class="error" id="evol">
    <?php echo $aErrores['vol']; //Mensaje de error que tiene el array aErrores    ?>
    </div> 
<?php } 


