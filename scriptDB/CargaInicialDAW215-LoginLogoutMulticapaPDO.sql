/**
 * Author:  David Garcia
 * Created: 26-nov-2019
 */

--Está copiado muy fuertemente

-- La contraseña de los usuarios, es el codUsuario concatenado con el password, en este caso paso. [$usuario . $pass]
-- Base de datos a usar
USE DAW215LoginLogoutMulticapaPDO;

INSERT INTO T02_Departamento(T02_CodDepartamento,T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio, T02_Provincia) VALUES
    ('INF', 'Departamento de informatica', 1580036552, 50, 15),
    ('VEN', 'Departamento de ventas', 1580036552, 92, 45),
    ('CON', 'Departamento de contabilidad', 1580036552, 125.3, 3),
    ('MAT', 'Departamento de matematicas', 1580036552, 78, 9),
    ('CAT', 'Departamento de gatos', 1580036552, 235.93, 24);
-- 1580036552 -> 26-enero-2020 ~12:00 --

-- El tipo de usuario es "usuario" como predeterminado --
INSERT INTO T01_Usuario(T01_CodUsuario, T01_DescUsuario, T01_Password) VALUES
    ('nacho','El ignacio ese',SHA2('nachopaso',256)),
    ('daniel','daniel',SHA2('danielpaso',256)),
    ('nereaA','nereaA',SHA2('nereaApaso',256)),
    ('miguel','miguel',SHA2('miguelpaso',256)),
    ('alex','alex',SHA2('alexpaso',256)),
    ('david','david',SHA2('davidpaso',256)),
    ('ismael','ismael',SHA2('ismaelpaso',256)),
    ('victor','victor',SHA2('victorpaso',256)),
    ('bea','bea',SHA2('beapaso',256)),
    ('nereaN','nereaN',SHA2('nereaNpaso',256)),
    ('mateo','mateo',SHA2('mateopaso',256)),
    ('rodrigo','rodrigo',SHA2('rodrigopaso',256)),
    ('ruben','ruben',SHA2('rubenpaso',256)),
    ('heraclio','heraclio',SHA2('heracliopaso',256)),
    ('amor','amor',SHA2('amorpaso',256)),
    ('maria','maria',SHA2('mariapaso',256)),
    ('antonio','antonio',SHA2('antoniopaso',256))
;
-- Usuario con el rol admin --
INSERT INTO T01_Usuario(T01_CodUsuario, T01_DescUsuario, T01_Password, T01_Perfil) VALUES ('admin','admin',SHA2('adminpaso',256), 'administrador');