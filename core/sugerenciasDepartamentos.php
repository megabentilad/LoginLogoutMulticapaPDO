<?php
define("CONEXION", "mysql:host=192.168.20.19:3306;dbname=DAW215LoginLogoutMulticapaPDO"); //clase
//define("CONEXION", "mysql:host=192.168.1.203:3306;dbname=DAW215LoginLogoutMulticapaPDO"); //casa
define("USUARIO", "usuarioDAW215LoginLogoutPDO");
define("PASSWORD", "paso");
try {
    $miDB = new PDO(CONEXION, USUARIO, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $miDB->prepare("SELECT T02_DescDepartamento FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%" . $_REQUEST['valor'] . "%';");
    $resultado->execute();
} catch (Exception $ex) {
    echo $ex->getMessage();
    die("Me muerto");
    $resultado = null;
}

if ($resultado->rowCount() != 0) {
    $devuelve = array();
    while($resultadoFormateado = $resultado->fetchObject()) {
        $descripcion = $resultadoFormateado->T02_DescDepartamento;
        $devuelve[] = array(
            "desc" => $descripcion
        );
    }
    echo json_encode($devuelve);
}