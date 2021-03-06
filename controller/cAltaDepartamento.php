<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPagina'] = $_SESSION['DAW215LLPaginaAnterior'];
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}
    $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
    //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    $aErrores = [
        'cod' => null,
        'desc' => null,
        'vol' => null,
        'cp' => null
    ];
    if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['cod'] = validacionFormularios::comprobarAlfabetico($_POST['cod'], 3, 3, 1);  //maximo, mínimo y opcionalidad
        $aErrores['desc'] = validacionFormularios::comprobarAlfaNumerico($_POST['desc'], 255, 1, 1); //maximo, mínimo y opcionalidad
        $aErrores['vol'] = validacionFormularios::comprobarFloat($_POST['vol'], 99999, 0, 1); //maximo, mínimo y opcionalidad
        $aErrores['cp'] = validacionFormularios::validarCp($_POST['cp'], 1); //opcionalidad
        
        if(strlen(trim(substr($_POST['cod'],1))) != 2 && $aErrores['cod'] == null){
            $aErrores['cod'] = "Eso está feo.";
        }
        if(!isset($_POST['provincia']) && $aErrores['cp'] == null){
            $aErrores['cp'] = "El código postal no pertenece a ninguna provincia española";
        }
        foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
            if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                $entradaOK = false; //Cambia la condiccion de la variable
            }
        }
        //Autenticación con la base de datos
        if ($entradaOK) {
            $codDepartamento = strtoupper($_POST['cod']);
            $descDepartamento = ucfirst($_POST['desc']);
            $vol =  $_POST['vol']; 
            $cp = intval($_POST['cp'] / 1000);
            if(!DepartamentoPDO::validaCodNoExiste($codDepartamento)){ //Si el codigo ya está en uso, muestra un mensaje de error
                $aErrores['cod'] = "El usuario ya existe";
            }else{
                $objetoDepartamento = DepartamentoPDO::altaDepartamento($codDepartamento, $descDepartamento, $vol, $cp); //Comprobar que el usuario existe en la base de datos
                $_SESSION['DAW215LoginLogoutPOODepartamento'] = $objetoDepartamento;
                $_SESSION['DAW215LLPagina'] = 'mtoDepartamentos';
                $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
                header("Location: index.php?pagina=" . $_SESSION['DAW215LLPaginaAnterior']); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
                exit;
            }
        }
    }
$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base