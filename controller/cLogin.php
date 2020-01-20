<?php
$entradaOK = true;
$aErrores = [
    'name' => null,
    'pass' => null
];
$_SESSION['DAW215LLPagina'] = $controladores['login'];
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] = $_REQUEST['pagina'];
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}
if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['name'] = validacionFormularios::comprobarAlfaNumerico($_POST['name'], 25, 1, 1);  //maximo, mínimo y opcionalidad
    $aErrores['pass'] = validacionFormularios::comprobarAlfaNumerico($_POST['pass'], 25, 4, 1); //maximo, mínimo y opcionalidad
    
    foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
        if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
            $entradaOK = false; //Cambia la condiccion de la variable
        }
    }

    //Autenticación con la base de datos
    if ($entradaOK) {
        $codUsuario = $_POST['name'];
        $password = hash('sha256', $_POST['name'] . $_POST['pass']); //Guardar la contraseña ya resumida
        $objetoUsuario = UsuarioPDO::validarUsuario($codUsuario, $password); //Comprobar que el usuario existe en la base de datos

        if (!is_null($objetoUsuario)) { //Si el objeto contiene algo, lo meto en la sesión
            $_SESSION['DAW215LoginLogoutPOO'] = $objetoUsuario;
            $_SESSION['DAW215LLPagina'] = $controladores['inicio'];
            $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
            UsuarioPDO::actualizarUsuario($codUsuario);
            header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
            exit;
        } else { //Si el objeto está vacío, creamos un error y recargamos la página
            $aErrores['name'] = "El usuario o la contraseña son incorrectos";
        }
    }
}
$vista = $vistas["login"]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = "Login"; //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base
