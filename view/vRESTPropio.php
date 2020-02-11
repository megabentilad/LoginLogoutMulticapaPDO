<h3>Cómo usar mi api</h3>
<p>La utilización de mi api es MUY sencilla. Solo debes seguir un par de pasos :D</p>
<ol>
    <li>A la api se la llama de la siguiente manera: <b>http://daw215.sauces.local/proyectoDWES/loginLogoutPOO/api/apiREST.php?codigo=<mark>{código de departamento}</mark></b></li>
    <br/>
    <li>La llamada a la api <u><b>devuelve el valor bruto del volumen o null</b></u> si no ha encontrado el departamento</li>
    <br/>
    <li>Si aun con esto no ha quedado claro, aquí un ejemplo de cómo programarlo;</li>
</ol>
<br/>
</br>
<div class="codigo">
    <h1>Ejemplo de función en el modelo REST</h1>
    <pre>
    public static function propioApiREST($codDepartamento){
        $curl = curl_init(); //Iniciamos el curl
        $url = "http://daw215.sauces.local/proyectoDWES/loginLogoutPOO/api/apiREST.php?codigo=" . $codDepartamento;  //Preparamos la url de la api con el departamento que buscamos

        curl_setopt($curl, CURLOPT_URL, $url); //Le decimos que queremos los datos de esa url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //le decimos que lo guarde en "curl_exec" en vez de mostrarlo

        $result = curl_exec($curl); //cogemos el resultado de curl_exec para devolverlo
        $resultadoFinal = json_decode($result,true);
        curl_close($curl); //cerramos el curl

        return $resultadoFinal;   
    }
    </pre>
</div>
<br>
<br>
<div class="codigo">
    <h1>Ejemplo de implantación en un controlador</h1>
    <pre>
    if (isset($_POST['buscarPropio'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['codPropio'] = validacionFormularios::comprobarAlfabetico($_POST['codPropio'],3,3,1); //max, min y obligatoriedad

        if(strlen(trim(substr($_POST['codPropio'],1))) != 2 && $aErrores['codPropio'] == null){
            $aErrores['codPropio'] = "No puede haber espacios.";
        }
        foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
            if ($error != null) { //Si el código está mal formateado, da error
                $entradaOK = false; //Cambia la condiccion de la variable
                $_SESSION['DAW215LLBusquedaVolPropio'] = "";
                $_SESSION['DAW215LLValorVolPropio'] = "";
            }
        }

        if ($entradaOK) {
            $_SESSION['DAW215LLBusquedaVolPropio'] = strtoupper($_POST['codPropio']);

            $volumenPropio = REST::propioApiREST($_SESSION['DAW215LLBusquedaVolPropio']);
            if (is_null($volumenPropio)) { 
                $aErrores['codPropio'] = "Ese departamento no existe.";
                $_SESSION['DAW215LLBusquedaVolPropio'] = "";
                $_SESSION['DAW215LLValorVolPropio'] = "";
            }else{
                $_SESSION['DAW215LLValorVolPropio'] = $volumenPropio;
            }
            if(is_null($aErrores['codPropio'])){
                header("Location: index.php");
                exit;
            }
        }
    }
    </pre>
</div>
<br/>
<br/>
<br/>

<a href="<?php echo $_SERVER['PHP_SELF'] . "?pagina=rest"; ?>"><input type="button" name="volver" value="Volver" id="volver"></a>