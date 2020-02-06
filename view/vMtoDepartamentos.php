<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
    <fieldset>
        <label for="descripcion">Busqueda por departamento: </label>
        <input type="text" name="busqueda" placeholder="Descripción" value="<?php echo $_SESSION['DAW215LLBusquedaDescripcion']; ?>" id="descripcion">
        <br/>
        <label id="etiquetaEstado">Estado</label>
        <div id="divEstadoEtiquetas">
            <label for="alta">Alta: </label>
            <label for="baja">Baja: </label>
            <label for="todos">Todos: </label>
        </div>
        <div id="divEstadoRadio">
            <input type="radio" name="estado" value="alta" id="alta" <?php if($_SESSION['DAW215LLBusquedaEstado'] == "alta"){ echo "checked"; } ?>>
            <input type="radio" name="estado" value="baja" id="baja" <?php if($_SESSION['DAW215LLBusquedaEstado'] == "baja"){ echo "checked"; } ?>>
            <input type="radio" name="estado" value="todos" id="todos" <?php if($_SESSION['DAW215LLBusquedaEstado'] == "todos"){ echo "checked"; } ?>>
        </div>
        <br/>
        <input type="submit" name="buscar" value="Buscar">
        <br/>
        <select id="sugerencias" size="4" name="sugerencias">
            <option value="1">Buenas</option>
            <option value="2">Tardes</option>
            <option value="3">Tenga</option>
            <option value="4">Usted</option>
        </select>
    </fieldset>
</form>


        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=altaDepartamento"?>"><img src="webroot/img/nuevo.png" alt="nuevo" class="nuevo" title="Crear un nuevo departamento"></a>     
        <br/>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Volver"  id="volver"></a>
        <?php echo $tabla; ?>


<br/><br/><br/>

