<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 */
/**
 * Class DepartamentoPDO
 *
 * Clase que contiene todo lo referente al departamentoPDO que sirve para gestionar la base de datos desde la aplicación
 * @since Versión 1.0 Ya está todo listo
 * @author Luis Mateo Rivera Uriarte
 * @package POO-LMR
 * @version 1.0
 */
class DepartamentoPDO{
    
    /**
     * Función que busca un Departamento.
     * 
     * Función que busca un Departamentos en la base de datos con respecto al código.
     * @function buscarDepartamentoPorCodigo();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a buscar.
     * @return Departamento Devuelve un objeto dDepartamento
     **/
    public static function buscarDepartamentoPorCodigo($codDepartamento){
        $consulta = "select * from T02_Departamento where T02_CodDepartamento like ?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
        if($resultadoConsulta->rowCount() != 0){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento, $resultadoFormateado->T02_Provincia);
            return $objetoDepartamento;
        } 
        return null;
    }
    
    /**
     * Función que busca Departamentos.
     * 
     * Función que busca Departamentos en la base de datos con respecto a lo que se introduzca en la barra de búsquueda.
     * @function buscarDepartamentosPorDescripcion();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $busqueda Cadena que se compara con las descripciones de los Departamentos.
     * @return array Devuelve un array que contiene uno o varios objetos Departamento.
     **/
    public static function buscarDepartamentosPorDescripcion($busqueda){
        $arrayDepartamentos = [];
        //Conteo de páginas
        switch($_SESSION['DAW215LLBusquedaEstado']){
            case "alta":
                $consulta0 = "select count(T02_DescDepartamento) from T02_Departamento where T02_DescDepartamento like ? and T02_FechaBajaDepartamento is null;";
                break;
            case "baja":
                $consulta0 = "select count(T02_DescDepartamento) from T02_Departamento where T02_DescDepartamento like ? and T02_FechaBajaDepartamento is not null;";
                break;
            default:
                $consulta0 = "select count(T02_DescDepartamento) from T02_Departamento where T02_DescDepartamento like ?;";
        }
        $resultadoConsulta0 = BDPDO::ejecutarConsulta($consulta0, [$busqueda]);
        $resultadoFormateado0 = $resultadoConsulta0->fetchColumn();
        if($resultadoFormateado0 % 5 == 0){
            $_SESSION['DAW215LLPOONumPaginasTotales'] = ($resultadoFormateado0 / 5);
        }else{
            $_SESSION['DAW215LLPOONumPaginasTotales'] = intval($resultadoFormateado0 / 5)+1;
        }
        //Busqueda de departamentos en una página
        switch($_SESSION['DAW215LLBusquedaEstado']){
            case "alta":
                $consulta = "select * from T02_Departamento where T02_DescDepartamento like ? and T02_FechaBajaDepartamento is null LIMIT 5 OFFSET " . $_SESSION['DAW215LLPOONumPagina']*5 . ";";
                break;
            case "baja":
                $consulta = "select * from T02_Departamento where T02_DescDepartamento like ? and T02_FechaBajaDepartamento is not null LIMIT 5 OFFSET " . $_SESSION['DAW215LLPOONumPagina']*5 . ";";
                break;
            default:
                $consulta = "select * from T02_Departamento where T02_DescDepartamento like ? LIMIT 5 OFFSET " . $_SESSION['DAW215LLPOONumPagina']*5 . ";";
        }
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$busqueda]);
        if($resultadoConsulta->rowCount() != 0){
            for($i = 0; $i < $resultadoConsulta->rowCount(); $i++){
                $resultadoFormateado = $resultadoConsulta->fetchObject();
                $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento, $resultadoFormateado->T02_Provincia);
                array_push($arrayDepartamentos, $objetoDepartamento);
            }
        }
        return $arrayDepartamentos;
    }
    
    /**
     * Función que da de alta un Departamento.
     * 
     * Función que da de alta un Departamento en la base de datos a partir de un código, una descripción y un volumen de negocio.
     * @function altaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a utilizar.
     * @param string $descDepartamento Descripción del departamento a utilizar.
     * @param float $vol Volumen del departamento a aplicar.
     * @param int $cp Código postal de la provincia a la que pertenece.
     **/
    public static function altaDepartamento($codDepartamento, $descDepartamento, $vol, $cp){
        $consulta = "INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio, T02_Provincia) VALUES(?,?,". time() .",?,?);";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento, $descDepartamento, $vol, $cp]);
    }
    /**
     * Función que elimina un Departamento.
     * 
     * Función que elimina un Departamento de la base de datos.
     * @function bajaFisicaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a eliminar.
     **/
    public static function bajaFisicaDepartamento($codDepartamento){
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que da de baja un Departamento.
     * 
     * Función que da de baja un Departamento de la base de datos.
     * @function bajaLogicaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a dar de baja.
     **/
    public static function bajaLogicaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = ". time() ." where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que modifica un Departamento.
     * 
     * Función que modifica un Departamento cambiando la descripción y el volumen de negocio.
     * @function modificarDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a utilizar.
     * @param string $nuevaDescDepartamento Descripción del departamento a cambiar.
     * @param float $nuevoVolumen Volumen del departamento a cambiar.
     **/
    public static function modificaDepartamento($codDepartamento, $nuevaDescDepartamento, $nuevoVolumen){
        $consulta1 = "UPDATE T02_Departamento SET T02_DescDepartamento = ?, T02_VolumenNegocio = ? WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta1, [$nuevaDescDepartamento, $nuevoVolumen, $codDepartamento]);
    }
    
    /**
     * Función que rehabilita Departamento.
     * 
     * Función que rehabilita un Departamento de la base de datos.
     * @function rehabilitaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento a rehabilitar.
     **/
    public static function rehabilitaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = null where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que comprueba si existe un código.
     * 
     * Función que comprueba si existe un código en la base de datos.
     * @function validaCodNoExiste();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $codDepartamento Código del departamento quer se va a comprobar.
     * @return boolean Devuelve true o false dependiendo de si existe o no el código en la base de datos.
     **/
    public static function validaCodNoExiste($codDepartamento){
        $consulta = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
         if($resultadoConsulta->rowCount() == 1){
             return false;
         }
        return true;
    }
    
    /*AJAX*/
    
    
    /**
     * Función que devuelve descripciones.
     * 
     * Función que devuelve descripciones para que las utilice Ajax en MtoDepartamentos a la hora de sugerir departamentos en la búsqueda.
     * @function sacarDescripciones();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $busqueda Texto escrito en el campo de búsqueda en MtoDepartamentos.
     **/
    public static function sacarDescripciones($busqueda){
        $consulta="select T02_DescDepartamento from T02_Departamento where T02_DescDepartamento like ? LIMIT 4;";
        $resultado = BDPDO::ejecutarConsulta($consulta, ["%$busqueda%"]);
        if ($resultado->rowCount() != 0) {
            $aDescripciones = array();
            while ($resultadoFormateado = $resultado->fetchObject()) { //metemos en un array todas las descripciones de departamentos
                $descripcion = $resultadoFormateado->T02_DescDepartamento;
                $aDescripciones[] = array(
                    "desc" => $descripcion
                );
            }
            echo json_encode($aDescripciones); //Mostramos el resultado en formato json para que ayax pueda leerlo
        }
    }
    
    /**
     * Función que devuelve la provincia.
     * 
     * Función que devuelve la provincia para que ayax pueda leerlo y utilizarlo en AltaDepartamento y en ModificarDepartamento.
     * @function sacarDescripciones();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $cp Código postal a busca.
     **/
    public static function sacarProvincia($cp){
        $consulta="select T03_provincia from T03_Provincias where T03_id_provincia = ?;";
        $resultado = BDPDO::ejecutarConsulta($consulta, [$cp]);
        if ($resultado->rowCount() != 0) {
            $aProvincia = array();
            while ($resultadoFormateado = $resultado->fetchObject()) { //metemos en un array todas las descripciones de departamentos
                $provincia = $resultadoFormateado->T03_provincia;
                $aProvincia[] = array(
                    "provincia" => $provincia
                );
            }
            echo json_encode($aProvincia); //Mostramos el resultado en formato json para que ayax pueda leerlo
        }
    }
}

require_once 'BDPDO.php';
require_once 'Departamento.php';