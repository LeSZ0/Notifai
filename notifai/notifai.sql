SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `notifai`
--

CREATE DATABASE notifai;

-- --------------------------------------------------------
USE notifai;

--
-- Estructura de tabla para la tabla rol
--

CREATE TABLE rol (
	id_rol int NOT NULL primary key,
	descripcion varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla rol
--

INSERT INTO rol (id_rol, descripcion) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla seccion
--

CREATE TABLE seccion (
	id_seccion int NOT NULL auto_increment primary key,
	nombre varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuario
--

CREATE TABLE usuario (
	id_usuario int NOT NULL auto_increment primary key,
	usuario varchar(255) NOT NULL,
	clave varchar(32) NOT NULL,
	id_rol int(1) NOT NULL,
	mail varchar(255) NOT NULL,
	nombre varchar(255) NOT NULL,
	apellido varchar(255) NOT NULL,
	FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla noticia
--

CREATE TABLE noticia (
	id_noticia int NOT NULL auto_increment primary key,
	id_seccion int(11) NOT NULL,
	titulo varchar(255) NOT NULL,
	fecha datetime NOT NULL,
	copete varchar(1000) NOT NULL,
	contenido text NOT NULL,
	id_usuario int(11) NOT NULL,
	FOREIGN KEY (id_seccion) REFERENCES seccion(id_seccion),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla comentario
--

CREATE TABLE comentario (
	id_comentario int NOT NULL auto_increment primary key,
	id_noticia int(11) NOT NULL,
	id_usuario int(11) NOT NULL,
	comentario_original int(11) NOT NULL,
	contenido varchar(100) NOT NULL,
	fecha datetime NOT NULL,
	megusta int(11) NOT NULL,
	FOREIGN KEY (id_noticia) REFERENCES noticia(id_noticia),
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla estado_evento
--

CREATE TABLE IF NOT EXISTS estado_evento(
    id_estado int not null auto_increment primary key,
    descripcion varchar(150)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment = 1;

--
-- Volcado de datos para la tabla estado_evento
--

INSERT INTO estado_evento(id_estado, descripcion) VALUES
(1, 'vigente'),
(2, 'vencido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla evento
--

CREATE TABLE IF NOT EXISTS evento (
    id_evento int not null auto_increment primary key,
    nombre varchar(150) not null,
    descripcion varchar(1000) not null,
    fecha_inicio datetime not null,
    fecha_fin datetime not null,
    id_estado int not null,
    FOREIGN KEY (id_estado) REFERENCES estado_evento (id_estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla inscripcion_evento
--

CREATE TABLE IF NOT EXISTS inscripcion_evento(
    id_inscripcion int not null auto_increment primary key,
    id_usuario int not null,
    id_evento int not null,
    FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
    FOREIGN KEY (id_evento) REFERENCES evento (id_evento)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 auto_increment=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla rubro
--

CREATE TABLE rubro (
	id_rubro int(11) NOT NULL primary key,
	nombre varchar(100) DEFAULT NULL,
	descripcion varchar(500) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla estado_aviso
--

CREATE TABLE estado_aviso (
	id_estado_aviso int(11) NOT NULL PRIMARY KEY,
	nombre varchar(100) DEFAULT NULL,
	descripcion varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla aviso
--

CREATE TABLE aviso (
	id_aviso int(11) NOT NULL primary key,
	nombre varchar(100) DEFAULT NULL,
	descripcion varchar(500) DEFAULT NULL,
	fecha_inicio date DEFAULT NULL,
	fecha_fin date DEFAULT NULL,
	creado_por_id int(11) DEFAULT NULL,
	modificado_por_id int(11) DEFAULT NULL,
	estado_id int(11) DEFAULT NULL,
	rubro_id int(11) DEFAULT NULL,
	FOREIGN KEY (creado_por_id) REFERENCES usuario (id_usuario),
	FOREIGN KEY (modificado_por_id) REFERENCES usuario (id_usuario),
	FOREIGN KEY (estado_id) REFERENCES estado_aviso (id_estado_aviso),
	FOREIGN KEY (rubro_id) REFERENCES rubro (id_rubro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS me_gusta (

  id_comentario int(11) NOT NULL primary key,

  id_usuario int(11) NOT NULL,

  FOREIGN KEY (id_comentario) REFERENCES comentario(id_comentario), 

  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;