<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="descripcion">Busqueda por departamento: </label>
    <input type="text" name="busqueda" placeholder="Descripción to chachi" value="<?php echo $_SESSION['DAW215LLBusquedaDescripcion']; ?>">
    <input type="submit" name="buscar" value="Buscar">
</form>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=altaDepartamento"?>"><img src="webroot/img/nuevo.png" alt="nuevo" class="nuevo" title="Crear un nuevo departamento"></a>     
        <br/>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Volver"  id="volver"></a>
        <br>
        <br>
        <?php echo $tabla; ?>


<br/><br/><br/>

