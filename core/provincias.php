<?php

define("CONEXION", "mysql:host=192.168.20.19:3306;dbname=DAW215LoginLogoutMulticapaPDO"); //clase
//define("CONEXION", "mysql:host=192.168.1.203:3306;dbname=DAW215LoginLogoutMulticapaPDO"); //casa
define("USUARIO", "usuarioDAW215LoginLogoutPDO");
define("PASSWORD", "paso");
try {
    $miDB = new PDO(CONEXION, USUARIO, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $resultado = $miDB->prepare("SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%" . $_POST['valor'] . "%';");
    $resultado->execute();
} catch (Exception $ex) {
    echo $ex->getMessage();
    die("Me muesrto");
    $resultado = null;
}

if ($resultado->rowCount() != 0) {
    $devuelve = [];
    while($resultadoFormateado = $resultado->fetchObject()) {
        $id = $resultadoFormateado->id;
        $id_provincia = $resultadoFormateado->id_provincia;
        $provincia = $resultadoFormateado->provincia;
        $devuelve[] = array(
            "id" => $id,
            "id_provincia" => $id_provincia,
            "provincia" => $provincia,
        );
    }
    echo json_encode($devuelve);
}