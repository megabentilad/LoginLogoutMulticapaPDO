<?php
/**
 * Documento de la api
 *
 * Documento de la api que recibe un codigo y devuelve el volumen correspondiente.
 * @author Luis Mateo Rivera Uriarte
 * @version 1.0
 * @package POO-LMR
 */
include_once '../config/ConfDB.php';
include_once '../model/Departamento.php';
include_once '../model/DepartamentoPDO.php';
if(isset($_GET['codigo'])){
    $departamento = DepartamentoPDO::buscarDepartamentoPorCodigo($_GET['codigo']);
    if($departamento !=null){
        echo json_encode($departamento->getVolumenNegocio());
    }else{
        echo json_encode(null);
    }
}else{
    echo json_encode(null);
}


