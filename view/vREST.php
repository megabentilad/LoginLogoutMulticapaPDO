<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend>Pokeapi</legend>
        <label for="pokemon">ID o nombre del pokemon: </label>
        <input type="text" id="pokemon" name="pokemon" placeholder="azumarill" value="<?php echo $_SESSION['DAW215LLBusquedaPokemon']; ?>">
        <br/>
        <label for="shiny" class="labelshiny">Shiny: </label>
        <input type="checkbox" name="shiny" id="shiny" value="shiny" <?php if($_SESSION['DAW215LLBusquedaPokemonShiny']){ echo 'checked'; } ?>>
        <br/>
    </fieldset>
    <input type="submit" name="buscar" value="Buscar">
    </form>
<?php if ($aErrores['pokemon'] != NULL) { ?>
    <div class="error" id="epokemon">
    <?php echo $aErrores['pokemon']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php } ?>
<a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Volver"></a>
<img src="<?php if(isset($_SESSION['DAW215LLBusquedaPokemonSprite'])){ echo $_SESSION['DAW215LLBusquedaPokemonSprite']; } ?>" class="pokemonSprite">