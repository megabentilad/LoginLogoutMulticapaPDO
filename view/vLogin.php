<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        <label for="name">Nombre de usuario: </label>
                        <input type="text" id="name" name="name" placeholder="Usuario" width="10" height="20" value="<?php if($aErrores['name'] == NULL && isset($_POST['name'])){ echo $_POST['name'];} ?>"><br>
                              
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="pass">Contraseña: </label> 
                        <input type="password" id="pass" name="pass" placeholder="Contraseña" value="<?php if($aErrores['pass'] == NULL && isset($_POST['pass'])){ echo $_POST['pass'];} ?>"><br>
                               
                    </div>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Iniciar sesión">
                        <a href="registro.php"><input type="button" name="registro" value="Registrarse"></a>
                    </div>
                </fieldset>
            </form>
            <?php if ($aErrores['name'] != NULL) { ?>
                <div class="error" id="ename">
                    <?php echo $aErrores['name']; //Mensaje de error que tiene el array aErrores   ?>
                </div>   
            <?php }   
            if ($aErrores['pass'] != NULL) { ?>
                <div class="error" id="epass">
                    <?php echo $aErrores['pass']; //Mensaje de error que tiene el array aErrores   ?>
                </div>   
            <?php } ?>    