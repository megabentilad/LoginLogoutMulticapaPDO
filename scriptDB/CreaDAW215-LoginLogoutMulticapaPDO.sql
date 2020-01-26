/**
 * Author:  David Garcia
 * Created: 26-nov-2019
 */

--Está copiado muy fuertemente

-- Cambiar nombre de la base de datos y el de usuario --
-- DAW215LoginLogoutMulticapaPDO --
-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS DAW215LoginLogoutMulticapaPDO;
-- Uso de la base de datos. --
    USE DAW215LoginLogoutMulticapaPDO;

    CREATE TABLE IF NOT EXISTS T01_Usuario(
        T01_CodUsuario varchar(15) PRIMARY KEY,
        T01_Password varchar(64) NOT null,
        T01_DescUsuario varchar(250) NOT null,
        T01_NumAccesos int default 0,
        T01_FechaHoraUltimaConexion int default 0, -- Es un entero porque timestamp es una porquería no util para lo que quiero hacer
        T01_Perfil enum('administrador', 'usuario') default 'usuario' -- Valor por defecto usuario
    );

    CREATE TABLE IF NOT EXISTS T02_Departamento(
        T02_CodDepartamento varchar(3) PRIMARY KEY,
        T02_DescDepartamento varchar(255) NOT null,
        T02_FechaBajaDepartamento int DEFAULT null, -- Valor por defecto null, ya que cuando lo creas no puede estar de baja logica
        T02_FechaCreacionDepartamento int NOT null,
        T02_VolumenNegocio float NOT null
    );
-- Crear del usuario --
    CREATE USER IF NOT EXISTS 'usuarioDAW215LoginLogoutPDO'@'%' identified BY 'paso'; 
-- Dar permisos al usuario --
    GRANT ALL PRIVILEGES ON DAW215LoginLogoutMulticapaPDO.* TO 'usuarioDAW215LoginLogoutPDO'@'%'; 
-- Hacer el flush privileges, por si acaso --
    FLUSH PRIVILEGES;
