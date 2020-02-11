<?php
/**
 * Class DepartamentoPDO
 * 
 * Clase que contiene todo lo referente al departamentoPDO
 *
 * Clase que contiene todo lo referente al departamentoPDO que sirve para gestionar la base de datos desde la aplicación
 *
 * @since Versión 1.0 Ya está todo listo
 * @author Luis Mateo Rivera Uriarte
 * @version 1.0
 */
require_once 'BDPDO.php';
require_once 'Departamento.php';

class DepartamentoPDO{
    
    /**
     * Función que busca un Departamento.
     * 
     * Función que busca un Departamentos en la base de datos con respecto al código.
     * 
     * @function buscarDepartamentoPorCodigo();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a buscar.
     * @return Departamento
     **/
    public static function buscarDepartamentoPorCodigo($codDepartamento){
        $consulta = "select * from T02_Departamento where T02_CodDepartamento like ?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
        if($resultadoConsulta->rowCount() != 0){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento);
            return $objetoDepartamento;
        } 
        return null;
    }
    
    /**
     * Función que busca Departamentos.
     * 
     * Función que busca Departamentos en la base de datos con respecto a lo que se introduzca en la barra de búsquueda.
     * 
     * @function buscarDepartamentosPorDescripción();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $busqueda Cadena que se compara con las descripciones de los Departamentos.
     * @return array
     **/
    public static function buscarDepartamentosPorDescripcion($busqueda){
        $arrayDepartamentos = [];
        $consulta0 = "select * from T02_Departamento where T02_DescDepartamento like ?;";
        $resultadoConsulta0 = BDPDO::ejecutarConsulta($consulta0, [$busqueda]);
        if($resultadoConsulta0->rowCount() != 0){
            $numPaginas = $resultadoConsulta0->rowCount() / 5;
            $_SESSION['DAW215LLPOONumPaginasTotales'] = $numPaginas;
        }
        $consulta = "select * from T02_Departamento where T02_DescDepartamento like ? LIMIT 5 OFFSET " . $_SESSION['DAW215LLPOONumPagina']*5 . ";";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$busqueda]);
        if($resultadoConsulta->rowCount() != 0){
            for($i = 0; $i < $resultadoConsulta->rowCount(); $i++){
                $resultadoFormateado = $resultadoConsulta->fetchObject();
                $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento);
                array_push($arrayDepartamentos, $objetoDepartamento);
            }
        } 
        return $arrayDepartamentos;
    }
    
    /**
     * Función que da de alta un Departamento.
     * 
     * Función que da de alta un Departamento en la base de datos a partir de un código, una descripción y un volumen de negocio.
     * 
     * @function altaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a utilizar.
     * @param $descDepartamento Descripción del departamento a utilizar.
     * @param $vol Volumen del departamento a aplicar.
     * @return void
     **/
    public static function altaDepartamento($codDepartamento, $descDepartamento, $vol){
        $consulta = "INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) VALUES(?,?,". time() .",?);";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento, $descDepartamento, $vol]);
    }
    
    /**
     * Función que elimina un Departamento.
     * 
     * Función que elimina un Departamento de la base de datos.
     * 
     * @function bajaFisicaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a eliminar.
     * @return void
     **/
    public static function bajaFisicaDepartamento($codDepartamento){
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que da de baja un Departamento.
     * 
     * Función que da de baja un Departamento de la base de datos.
     * 
     * @function bajaLogicaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a dar de baja.
     * @return void
     **/
    public static function bajaLogicaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = ". time() ." where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que modifica un Departamento.
     * 
     * Función que modifica un Departamento cambiando la descripción y el volumen de negocio.
     * 
     * @function modificarDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a utilizar.
     * @param $nuevaDescDepartamento Descripción del departamento a cambiar.
     * @param $nuevoVolumen Volumen del departamento a cambiar.
     * @return void
     **/
    public static function modificaDepartamento($codDepartamento, $nuevaDescDepartamento, $nuevoVolumen){
        $consulta1 = "UPDATE T02_Departamento SET T02_DescDepartamento = ?, T02_VolumenNegocio = ? WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta1, [$nuevaDescDepartamento, $nuevoVolumen, $codDepartamento]);
    }
    
    /**
     * Función que rehabilita Departamento.
     * 
     * Función que rehabilita un Departamento de la base de datos.
     * 
     * @function rehabilitaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento a rehabilitar.
     * @return void
     **/
    public static function rehabilitaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = null where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    /**
     * Función que comprueba si existe un código.
     * 
     * Función que comprueba si existe un código en la base de datos.
     * 
     * @function validaCodNoExiste();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $codDepartamento Código del departamento quer se va a comprobar.
     * @return boolean
     **/
    public static function validaCodNoExiste($codDepartamento){
        $consulta = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
         if($resultadoConsulta->rowCount() == 1){
             return false;
         }
        return true;
    }
    
}
