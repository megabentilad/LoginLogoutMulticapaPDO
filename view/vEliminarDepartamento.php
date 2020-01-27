<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="obligatorio">
                        <label for="code">Codigo de departamento: </label>
                        <input type="text" id="cod" name="cod" width="10" height="20" value="<?php echo $_SESSION['DAW215LoginLogoutPOODepartamento']->getCodDepartamento(); ?>" disabled><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="desc">Descripción del departamento: </label>
                        <input type="text" id="desc" name="desc" value="<?php echo $_SESSION['DAW215LoginLogoutPOODepartamento']->getDescDepartamento(); ?>" width="10" height="20" disabled><br>   
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="vol">Volumen de negocio: </label> 
                        <input type="text" id="vol" name="vol" value="<?php echo $_SESSION['DAW215LoginLogoutPOODepartamento']->getVolumenNegocio(); ?>" disabled><br>      
                    </div>
                    <br/>
                    <div class="obligatorio">
                        <label for="creacion">Fecha de creación del departamento: </label> 
                        <input type="text" id="creacion" name="creacion" value="<?php echo date('d/m/Y - H:i:s',$_SESSION['DAW215LoginLogoutPOODepartamento']->getFechaCreacionDepartamento()); ?>" disabled><br>        
                    </div>
                    <?php if($_SESSION['DAW215LoginLogoutPOODepartamento']->getFechaBajaDepartamento() != null){ ?>
                    <br/>
                    <div class="obligatorio">
                        <label for="baja">Fecha de baja lógica: </label> 
                        <input type="text" id="baja" name="baja" value="<?php echo date('d/m/Y - H:i:s',$_SESSION['DAW215LoginLogoutPOODepartamento']->getFechaBajaDepartamento()); ?>" disabled><br>        
                    </div>
                    <?php } ?>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Eliminar">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=mtoDepartamentos"; ?>"><input type="button" name="volver" value="Cancelar"></a>
                    </div>
                </fieldset>
            </form>
