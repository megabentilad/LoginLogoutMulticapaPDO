<?php
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] = $_REQUEST['pagina'];
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}

    $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
    //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
    $aErrores = [
        'desc' => null
    ];
    if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
        //La posición del array de errores recibe el mensaje de error si hubiera
        $aErrores['desc'] = validacionFormularios::comprobarAlfaNumerico($_POST['desc'], 255, 1, 1); //maximo, mínimo y opcionalidad

        //Permitir entrada
        if($_POST['desc'] === $_SESSION['DAW215LoginLogoutPOO']->getDescUsuario()){
            $aErrores['desc'] = "La descripción es la misma que la anterior.";
        }
        foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
            if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                $entradaOK = false; //Cambia la condiccion de la variable
            }
        }

        //Autenticación con la base de datos
        if ($entradaOK) {
            $descUsuario = $_POST['desc'];

            $objetoUsuario = UsuarioPDO::modificarUsuario($_SESSION['DAW215LoginLogoutPOO']->getCodUsuario(), $descUsuario);
            $_SESSION['DAW215LoginLogoutPOO'] = $objetoUsuario;
            $_SESSION['DAW215LLPagina'] = 'inicio';
            header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
            exit;
        }
}
$datos = [
    'codigo' => $_SESSION['DAW215LoginLogoutPOO']->getCodUsuario(),
    'descripcion' => $_SESSION['DAW215LoginLogoutPOO']->getDescUsuario(),
    'tipo' => $_SESSION['DAW215LoginLogoutPOO']->getPerfil(),
    'accesos' => $_SESSION['DAW215LoginLogoutPOO']->getNumAccesos() +1,
    'fecha' => $_SESSION['DAW215LoginLogoutPOO']->getFechaHoraUltimaConexion()
];
$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base