<?php
if(isset($_REQUEST['buscaDescripcion'])){
    //Incluimos los ficheros necesarios
    include_once '../model/DepartamentoPDO.php';
    include_once '../config/ConfDB.php';
    include_once '../model/BDPDO.php';
    //llamamos al metodo
    DepartamentoPDO::sacarDescripciones($_REQUEST['buscaDescripcion']);
}