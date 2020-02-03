<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <legend>Pokeapi</legend>
        <label for="pokemon" class="labelbuscador">ID o nombre del pokemon: </label>
        <input type="text" id="pokemon" name="pokemon" placeholder="azumarill" value="<?php echo $_SESSION['DAW215LLBusquedaPokemon']; ?>">
        <br/>
        <div class="shiny-box">
            <label for="shiny" class="labelshiny">Shiny: </label>
            <input type="checkbox" name="shiny" id="shiny" value="shiny" <?php if($_SESSION['DAW215LLBusquedaPokemonShiny']){ echo 'checked'; } ?>>
        </div>
        
        <div class="genero">
            <label for="generoM" class="labelspriteM">Macho: </label>
            <input type="radio" name="genero" id="generoM" value="macho" <?php if($_SESSION['DAW215LLBusquedaPokemonGenero'] == "macho"){ echo 'checked'; } ?>>
            <br/>
            <label for="generoF" class="labelspriteF">Hembra: </label>
            <input type="radio" name="genero" id="generoF" value="hembra" <?php if($_SESSION['DAW215LLBusquedaPokemonGenero'] == "hembra"){ echo 'checked'; } ?>>
        </div>
        
    </fieldset>
    <input type="submit" name="buscar" value="Buscar">
    </form>
<?php if ($aErrores['pokemon'] != NULL) { ?>
    <div class="error" id="epokemon">
    <?php echo $aErrores['pokemon']; //Mensaje de error que tiene el array aErrores   ?>
    </div>   
    <?php } ?>
<?php if($_SESSION['DAW215LLBusquedaPokemonErrorGenero'] != NULL) { ?>
    <div class="error" id="egenero">
    <?php echo $_SESSION['DAW215LLBusquedaPokemonErrorGenero']; ?>
    </div>   
    <?php } ?>
<a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=inicio"; ?>"><input type="button" name="volver" value="Volver" id="volver"></a>
<img src="<?php if(isset($_SESSION['DAW215LLBusquedaPokemonSprite'])){ echo $_SESSION['DAW215LLBusquedaPokemonSprite']; } ?>" class="pokemonSprite">
<br/>
<img src="<?php if(isset($_SESSION['DAW215LLBusquedaPokemonSprite2'])){ echo $_SESSION['DAW215LLBusquedaPokemonSprite2']; } ?>" class="pokemonSprite2">
<?php if(isset($_SESSION['DAW215LLBusquedaPokemonDatos'])){ ?>
<div class="pokedatos">
    <p><?php echo "Nº" . $_SESSION['DAW215LLBusquedaPokemonDatos']['id']; ?></p>
    <p><?php echo ucfirst($_SESSION['DAW215LLBusquedaPokemonDatos']['name']); ?></p>
</div>
<?php } ?>