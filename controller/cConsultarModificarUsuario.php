<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php");
    exit;
}

$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
    //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    $aErrores = [
        'desc' => null,
        'perfil' => null
    ];
    if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['desc'] = validacionFormularios::comprobarAlfaNumerico($_POST['desc'], 255, 1, 1); //maximo, mínimo y opcionalidad
        $aErrores['perfil'] = validacionFormularios::validarElementoEnLista($_POST['perfil'], ["usuario","administrador"]);

        //Permitir entrada
        if($_POST['desc'] === $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getDescUsuario() && $_POST['perfil'] === $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getPerfil()){
            if($_POST['desc'] === $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getDescUsuario()){
                $aErrores['desc'] = "La descripción es la misma que la anterior.";
            }
            if($_POST['perfil'] === $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getPerfil()){
                $aErrores['perfil'] = "El perfil es el mismo que el anterior.";
            }
        }
        foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
            if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                $entradaOK = false; //Cambia la condiccion de la variable
            }
        }

        //Autenticación con la base de datos
        if ($entradaOK) {
            $descUsuario = $_POST['desc'];
            $perfil = $_POST['perfil'];

            $objetoUsuario = UsuarioPDO::modificarUsuarioGestion($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']->getCodUsuario(), $descUsuario, $perfil);
            $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar'] = $objetoUsuario;
            $_SESSION['DAW215LLPagina'] = 'mtoUsuarios';
            header("Location: index.php"); 
            exit;
        }
    }

$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base
