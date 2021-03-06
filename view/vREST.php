<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend>Pokeapi</legend>
        <label for="pokemon" class="labelbuscador">ID o nombre del pokemon: </label>
        <input type="text" id="pokemon" name="pokemon" placeholder="azumarill" value="<?php echo $_SESSION['DAW215LLBusquedaPokemon']; ?>">
        <br/>
        <div class="shiny-box">
            <label for="shiny" class="labelshiny">Shiny: </label>
            <input type="checkbox" name="shiny" id="shiny" value="shiny" <?php if ($_SESSION['DAW215LLBusquedaPokemonShiny']) {echo 'checked';} ?>>
        </div>

        <div class="genero">
            <label for="generoM" class="labelspriteM">Macho: </label>
            <input type="radio" name="genero" id="generoM" value="macho" <?php if ($_SESSION['DAW215LLBusquedaPokemonGenero'] == "macho") {echo 'checked';} ?>>
            <br/>
            <label for="generoF" class="labelspriteF">Hembra: </label>
            <input type="radio" name="genero" id="generoF" value="hembra" <?php if ($_SESSION['DAW215LLBusquedaPokemonGenero'] == "hembra") {echo 'checked';} ?>>
        </div>
        <br/>
        <a href="https://pokeapi.co/docs/v2.html#pokemon" target="_blank" class="masInformacionPoke">Mas información</a>
    </fieldset>
    <input type="submit" name="buscar" value="Buscar">
</form>
<br/>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend>Api propia</legend>
        <label for="codPropio" class="labelbuscadorPropio">Código de departamento: </label>
        <input type="text" id="codPropio" name="codPropio" placeholder="CAT" value="<?php echo $_SESSION['DAW215LLBusquedaVolPropio']; ?>" maxlength="3">
        <br/>
        <br/>
        <br/>
        <div>
            <span>Código de departamento: <?php echo $_SESSION['DAW215LLBusquedaVolPropio']; ?></span>
            <br/>
            <span>Volumen del departamento: <?php echo $_SESSION['DAW215LLValorVolPropio']; ?>€</span>
        </div>
      
        <br/>
        <a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=restPropio"; ?>" class="masInformacionPropio">Mas información</a>
    </fieldset>
    <input type="submit" name="buscarPropio" value="Buscar">
</form>
<!--
<p>Cómo usar mi api: Escribir http://daw215.sauces.local/proyectoDWES/loginLogoutPOO/api/apiREST.php?codigo={código del departamento}</p>
<p>Devuelve el volumen cómo cadena si está correcto y "null" si no encuentra el departamento</p> -->
    <?php if ($aErrores['pokemon'] != NULL) { ?>
    <div class="error" id="epokemon">
    <?php echo $aErrores['pokemon']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php } ?>
<?php if ($aErrores['codPropio'] != NULL) { ?>
    <div class="error" id="epropio">
    <?php echo $aErrores['codPropio']; //Mensaje de error que tiene el array aErrores    ?>
    </div>   
<?php } ?>
<?php if ($_SESSION['DAW215LLBusquedaPokemonErrorGenero'] != NULL) { ?>
    <div class="error" id="egenero">
    <?php echo $_SESSION['DAW215LLBusquedaPokemonErrorGenero']; ?>
    </div>   
<?php } ?>
<a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Volver" id="volver"></a>
<img src="<?php if (isset($_SESSION['DAW215LLBusquedaPokemonDatos'])) {
    echo $_SESSION['DAW215LLBusquedaPokemonDatos']->getPokeSprite1();
} ?>" class="pokemonSprite">
<br/>
<img src="<?php if (isset($_SESSION['DAW215LLBusquedaPokemonDatos'])) {
    echo $_SESSION['DAW215LLBusquedaPokemonDatos']->getPokeSprite2();
} ?>" class="pokemonSprite2">
<?php if (isset($_SESSION['DAW215LLBusquedaPokemonDatos'])) { ?>
    <div class="pokedatos">
        <p><?php echo "Nº" . $_SESSION['DAW215LLBusquedaPokemonDatos']->getPokeID(); ?></p>
        <p><?php echo ucfirst($_SESSION['DAW215LLBusquedaPokemonDatos']->getPokeNombre()); ?></p>
    </div>
<?php } ?>