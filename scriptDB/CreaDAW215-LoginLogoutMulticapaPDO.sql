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

    CREATE TABLE IF NOT EXISTS T03_Provincias(
        T03_id int(11) NOT NULL,
        T03_id_provincia smallint(6) DEFAULT null,
        T03_provincia varchar(40) DEFAULT null,
        PRIMARY KEY (T03_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `T03_Provincias` (`T03_id`, `T03_id_provincia`, `T03_provincia`) VALUES
(1, 2, 'Albacete'),
(2, 3, 'Alicante/Alacant'),
(3, 4, 'Almeria'),
(4, 1, 'Araba/Alava'),
(5, 33, 'Asturias'),
(6, 5, 'Avila'),
(7, 6, 'Badajoz'),
(8, 7, 'Balears, Illes'),
(9, 8, 'Barcelona'),
(10, 48, 'Bizkaia'),
(11, 9, 'Burgos'),
(12, 10, 'Caceres'),
(13, 11, 'Cadiz'),
(14, 39, 'Cantabria'),
(15, 12, 'Castellon/Castello'),
(16, 51, 'Ceuta'),
(17, 13, 'Ciudad Real'),
(18, 14, 'Cordoba'),
(19, 15, 'Coruna'),
(20, 16, 'Cuenca'),
(21, 20, 'Gipuzkoa'),
(22, 17, 'Girona'),
(23, 18, 'Granada'),
(24, 19, 'Guadalajara'),
(25, 21, 'Huelva'),
(26, 22, 'Huesca'),
(27, 23, 'Jaen'),
(28, 24, 'Leon'),
(29, 27, 'Lugo'),
(30, 25, 'Lleida'),
(31, 28, 'Madrid'),
(32, 29, 'Malaga'),
(33, 52, 'Melilla'),
(34, 30, 'Murcia'),
(35, 31, 'Navarra'),
(36, 32, 'Ourense'),
(37, 34, 'Palencia'),
(38, 35, 'Palmas, Las'),
(39, 36, 'Pontevedra'),
(40, 26, 'Rioja, La'),
(41, 37, 'Salamanca'),
(42, 38, 'Santa Cruz de Tenerife'),
(43, 40, 'Segovia'),
(44, 41, 'Sevilla'),
(45, 42, 'Soria'),
(46, 43, 'Tarragona'),
(47, 44, 'Teruel'),
(48, 45, 'Toledo'),
(49, 46, 'Valencia'),
(50, 47, 'Valladolid'),
(51, 49, 'Zamora'),
(52, 50, 'Zaragoza');

ALTER TABLE `T03_Provincias` MODIFY `T03_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

    CREATE TABLE IF NOT EXISTS T02_Departamento(
        T02_CodDepartamento varchar(3) PRIMARY KEY,
        T02_DescDepartamento varchar(255) NOT null,
        T02_FechaBajaDepartamento int DEFAULT null, -- Valor por defecto null, ya que cuando lo creas no puede estar de baja logica
        T02_FechaCreacionDepartamento int NOT null,
        T02_VolumenNegocio float NOT null,
        T02_Provincia int(11) not null,
        FOREIGN KEY (T02_Provincia) REFERENCES T03_Provincias(T03_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    
-- Crear del usuario --
    CREATE USER IF NOT EXISTS 'usuarioDAW215LoginLogoutPDO'@'%' IDENTIFIED BY 'paso1234'; 
-- Dar permisos al usuario --
    GRANT ALL PRIVILEGES ON DAW215LoginLogoutMulticapaPDO.* TO 'usuarioDAW215LoginLogoutPDO'@'%'; 
-- Hacer el flush privileges, por si acaso --
    FLUSH PRIVILEGES;
