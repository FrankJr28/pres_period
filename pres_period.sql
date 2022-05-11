-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2022 a las 00:29:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pres_period`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_a` int(10) NOT NULL,
  `nombre_a` text NOT NULL,
  `app_a` text NOT NULL,
  `apm_a` text NOT NULL,
  `contra_a` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_a`, `nombre_a`, `app_a`, `apm_a`, `contra_a`) VALUES
(10, 'Javier Antonio', 'Zepeda', 'Vargas', 'ant123'),
(20, 'Luis', 'Hernández', 'Pérez', 'lui123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camara`
--

CREATE TABLE `camara` (
  `id_c` bigint(12) NOT NULL,
  `modelo_c` varchar(15) NOT NULL,
  `baterias_c` tinyint(1) NOT NULL,
  `cabaud_c` bit(1) NOT NULL,
  `cabvid_c` bit(1) NOT NULL,
  `mem4_c` tinyint(1) NOT NULL,
  `mem16_c` tinyint(1) NOT NULL,
  `tapa_c` bit(1) NOT NULL,
  `maleta_c` bit(1) NOT NULL,
  `correa_c` bit(1) NOT NULL,
  `carga_c` bit(1) NOT NULL,
  `obs_c` varchar(150) DEFAULT NULL,
  `disp_c` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `camara`
--

INSERT INTO `camara` (`id_c`, `modelo_c`, `baterias_c`, `cabaud_c`, `cabvid_c`, `mem4_c`, `mem16_c`, `tapa_c`, `maleta_c`, `correa_c`, `carga_c`, `obs_c`, `disp_c`) VALUES
(1, 'sn9687', 1, b'0', b'1', 0, 1, b'1', b'1', b'1', b'1', 'Todo bien', b'1'),
(2, 'sn9685', 1, b'0', b'1', 0, 1, b'1', b'1', b'1', b'1', 'Todo bien', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camgopro`
--

CREATE TABLE `camgopro` (
  `id_cgopro` bigint(10) NOT NULL,
  `marca_cgopro` varchar(25) NOT NULL,
  `modelo_cgopro` varchar(25) NOT NULL,
  `mem_cgopro` bit(1) NOT NULL,
  `bateria_cgopro` bit(1) NOT NULL,
  `bateria_extra_cgopro` bit(1) NOT NULL,
  `cargador_dual_cgopro` bit(1) NOT NULL,
  `cable_usb` bit(1) NOT NULL,
  `disp_cgopro` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `camgopro`
--

INSERT INTO `camgopro` (`id_cgopro`, `marca_cgopro`, `modelo_cgopro`, `mem_cgopro`, `bateria_cgopro`, `bateria_extra_cgopro`, `cargador_dual_cgopro`, `cable_usb`, `disp_cgopro`) VALUES
(3113644, 'GO PRO', 'Hero Black 5', b'1', b'1', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_cam`
--

CREATE TABLE `carrito_cam` (
  `codigo_u` bigint(10) NOT NULL,
  `id_c` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_cgopro`
--

CREATE TABLE `carrito_cgopro` (
  `codigo_u` bigint(10) NOT NULL,
  `id_cgopro` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_cgopro`
--

INSERT INTO `carrito_cgopro` (`codigo_u`, `id_cgopro`) VALUES
(219635753, 3113644);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_desl`
--

CREATE TABLE `carrito_desl` (
  `codigo_u` bigint(10) NOT NULL,
  `id_d` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_desl`
--

INSERT INTO `carrito_desl` (`codigo_u`, `id_d`) VALUES
(219635753, 3108804);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_flash`
--

CREATE TABLE `carrito_flash` (
  `codigo_u` bigint(10) NOT NULL,
  `id_f` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_flash`
--

INSERT INTO `carrito_flash` (`codigo_u`, `id_f`) VALUES
(219635753, 3113654);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_grab`
--

CREATE TABLE `carrito_grab` (
  `id_g` bigint(12) NOT NULL,
  `codigo_u` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_lamp`
--

CREATE TABLE `carrito_lamp` (
  `codigo_u` bigint(10) NOT NULL,
  `id_l` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_maletin`
--

CREATE TABLE `carrito_maletin` (
  `codigo_u` bigint(10) NOT NULL,
  `id_m` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_maletin`
--

INSERT INTO `carrito_maletin` (`codigo_u`, `id_m`) VALUES
(219635753, 3125925);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_micro`
--

CREATE TABLE `carrito_micro` (
  `codigo_u` bigint(10) NOT NULL,
  `id_m` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_otro`
--

CREATE TABLE `carrito_otro` (
  `codigo_u` bigint(10) NOT NULL,
  `otro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_proy`
--

CREATE TABLE `carrito_proy` (
  `codigo_u` bigint(10) NOT NULL,
  `id_p` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_proy`
--

INSERT INTO `carrito_proy` (`codigo_u`, `id_p`) VALUES
(219635753, 1914220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_tripie`
--

CREATE TABLE `carrito_tripie` (
  `codigo_u` bigint(10) NOT NULL,
  `id_t` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deslizador`
--

CREATE TABLE `deslizador` (
  `id_d` bigint(10) NOT NULL,
  `marca_d` varchar(25) NOT NULL,
  `modelo_d` varchar(25) NOT NULL,
  `maleta_d` bit(1) NOT NULL,
  `protector_zap` bit(1) NOT NULL,
  `disp_d` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deslizador`
--

INSERT INTO `deslizador` (`id_d`, `marca_d`, `modelo_d`, `maleta_d`, `protector_zap`, `disp_d`) VALUES
(3108804, 'LIBEC', 'ALX', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_doc` bigint(10) NOT NULL,
  `nombre_doc` text NOT NULL,
  `app_doc` text NOT NULL,
  `apm_doc` text NOT NULL,
  `contra_doc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_doc`, `nombre_doc`, `app_doc`, `apm_doc`, `contra_doc`) VALUES
(50, 'Juan', 'Medrano', 'Gutierrez', 'jua123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_e` int(11) NOT NULL,
  `desc_e` date NOT NULL,
  `fechai_e` date NOT NULL,
  `fechaf_e` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flash`
--

CREATE TABLE `flash` (
  `id_f` bigint(10) NOT NULL,
  `marca_f` varchar(25) NOT NULL,
  `modelo_f` varchar(30) NOT NULL,
  `estuche_f` bit(1) NOT NULL,
  `difusor_f` bit(1) NOT NULL,
  `zapata_f` bit(1) NOT NULL,
  `disp_f` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flash`
--

INSERT INTO `flash` (`id_f`, `marca_f`, `modelo_f`, `estuche_f`, `difusor_f`, `zapata_f`, `disp_f`) VALUES
(3113654, 'Canon', '430EXlll-RT', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grabadora`
--

CREATE TABLE `grabadora` (
  `id_g` bigint(12) NOT NULL,
  `marca_g` varchar(25) NOT NULL,
  `modelo_g` varchar(15) NOT NULL,
  `baterias_g` tinyint(1) NOT NULL,
  `cabaudvid_g` bit(1) NOT NULL,
  `cabdat_g` bit(1) NOT NULL,
  `esponja_g` bit(1) NOT NULL,
  `estuche_g` bit(1) NOT NULL,
  `sopmano_g` bit(1) NOT NULL,
  `carga_g` bit(1) NOT NULL,
  `disp_g` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grabadora`
--

INSERT INTO `grabadora` (`id_g`, `marca_g`, `modelo_g`, `baterias_g`, `cabaudvid_g`, `cabdat_g`, `esponja_g`, `estuche_g`, `sopmano_g`, `carga_g`, `disp_g`) VALUES
(1740952, 'Sony', 'ICD-UX80', 0, b'0', b'1', b'0', b'1', b'0', b'0', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lamp`
--

CREATE TABLE `lamp` (
  `id_l` bigint(12) NOT NULL,
  `modelo_l` varchar(15) NOT NULL,
  `baterias_l` tinyint(1) NOT NULL,
  `tapa_l` bit(1) NOT NULL,
  `estuche_l` bit(1) NOT NULL,
  `correa_l` bit(1) NOT NULL,
  `carga_l` bit(1) NOT NULL,
  `obs_l` text DEFAULT NULL,
  `disp_l` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lamp`
--

INSERT INTO `lamp` (`id_l`, `modelo_l`, `baterias_l`, `tapa_l`, `estuche_l`, `correa_l`, `carga_l`, `obs_l`, `disp_l`) VALUES
(1, 'pan6328', 1, b'1', b'1', b'1', b'1', 'Correcto', b'1'),
(2, 'pan6328', 1, b'1', b'1', b'1', b'1', 'Corrrecto', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maletin`
--

CREATE TABLE `maletin` (
  `id_m` bigint(10) NOT NULL,
  `marca_m` varchar(25) NOT NULL,
  `modelo_m` varchar(25) NOT NULL,
  `protect_lluvia` bit(1) NOT NULL,
  `correa_hombro` bit(1) NOT NULL,
  `disp_m` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maletin`
--

INSERT INTO `maletin` (`id_m`, `marca_m`, `modelo_m`, `protect_lluvia`, `correa_hombro`, `disp_m`) VALUES
(3125925, 'THINK TANK', 'WORKHORSE', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `microfono`
--

CREATE TABLE `microfono` (
  `id_m` bigint(12) NOT NULL,
  `modelo_m` varchar(15) NOT NULL,
  `baterias_m` bit(1) NOT NULL,
  `mem2_m` bit(1) NOT NULL,
  `mem4_m` bit(1) NOT NULL,
  `esp_m` bit(1) NOT NULL,
  `estuche_m` bit(1) NOT NULL,
  `obs_m` text DEFAULT NULL,
  `disp_m` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `microfono`
--

INSERT INTO `microfono` (`id_m`, `modelo_m`, `baterias_m`, `mem2_m`, `mem4_m`, `esp_m`, `estuche_m`, `obs_m`, `disp_m`) VALUES
(1, 'mine859', b'1', b'1', b'0', b'0', b'1', 'Correcto', b'1'),
(2, 'mine8593', b'1', b'0', b'0', b'1', b'1', 'correcto', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_pres` bigint(11) NOT NULL,
  `codigo_u` bigint(10) DEFAULT NULL,
  `id_doc` bigint(10) DEFAULT NULL,
  `aprob_doc` bit(1) NOT NULL,
  `fecha_pres` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'0',
  `obs_pres` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_pres`, `codigo_u`, `id_doc`, `aprob_doc`, `fecha_pres`, `fecha_fin`, `estado`, `obs_pres`) VALUES
(1, 219635753, 50, b'1', '2022-02-04 16:47:27', '2022-02-04 23:46:26', b'1', 'ok'),
(11, 219635753, 50, b'1', '2022-02-04 16:47:41', '2022-02-04 23:46:26', b'1', 'ok'),
(12, 219635753, 50, b'1', '2022-02-05 13:46:21', '2022-02-07 11:41:39', b'1', NULL),
(17, 219635753, 50, b'1', '2022-02-07 10:59:43', '2022-02-07 11:42:47', b'1', NULL),
(24, 219635753, 50, b'1', '2022-02-07 11:43:01', '2022-02-07 11:59:39', b'1', NULL),
(25, 219635753, 50, b'1', '2022-02-07 12:00:19', '2022-02-07 12:02:59', b'1', NULL),
(26, 219635753, 50, b'1', '2022-02-07 12:03:17', '2022-02-07 12:04:07', b'1', NULL),
(28, 219635753, 50, b'1', '2022-02-07 12:11:23', '2022-02-07 12:12:53', b'1', NULL),
(31, 219635753, 50, b'1', '2022-02-07 13:44:52', '2022-02-07 13:51:44', b'1', NULL),
(32, 219635753, 50, b'1', '2022-02-07 13:52:03', '2022-02-07 14:39:35', b'1', NULL),
(33, 218887446, 50, b'1', '2022-02-07 14:50:41', '2022-02-07 14:55:18', b'1', NULL),
(34, 219635753, 50, b'1', '2022-02-07 14:56:10', '2022-02-07 15:14:24', b'1', NULL),
(35, 218887446, 50, b'1', '2022-02-07 14:56:20', '2022-02-07 15:14:28', b'1', NULL),
(36, 218887446, 50, b'1', '2022-02-07 15:17:29', '2022-02-09 17:03:08', b'1', NULL),
(37, 219635753, 50, b'1', '2022-02-07 15:17:35', '2022-02-21 12:53:03', b'1', NULL),
(38, 218887446, 50, b'1', '2022-02-09 17:03:48', '2022-02-09 17:07:33', b'1', NULL),
(39, 217458666, 50, b'1', '2022-02-09 17:05:36', '2022-02-09 17:07:36', b'1', NULL),
(40, 218887446, 50, b'1', '2022-02-09 17:07:49', '2022-02-09 17:11:55', b'1', NULL),
(42, 218887446, 50, b'1', '2022-02-09 17:28:01', '2022-02-16 23:34:58', b'1', NULL),
(44, 218887446, 50, b'1', '2022-02-16 23:48:11', '2022-02-16 23:48:52', b'1', NULL),
(45, 218887446, 50, b'1', '2022-02-16 23:49:27', '2022-02-16 23:50:43', b'1', NULL),
(46, 218887446, 50, b'1', '2022-02-16 23:50:59', '2022-02-16 23:56:34', b'1', NULL),
(47, 218887446, 50, b'1', '2022-02-16 23:57:17', '2022-02-16 23:58:12', b'1', NULL),
(48, 218887446, 50, b'1', '2022-02-17 00:07:29', '2022-02-17 00:14:38', b'1', NULL),
(49, 218887446, 50, b'1', '2022-02-17 00:15:31', '2022-02-17 09:30:52', b'1', NULL),
(61, 218887446, 50, b'1', '2022-02-17 12:58:55', '2022-02-19 23:05:23', b'1', NULL),
(62, 218887446, 50, b'1', '2022-02-19 23:06:23', '2022-02-19 23:29:59', b'1', NULL),
(63, 218887446, 50, b'1', '2022-02-19 23:30:10', '2022-02-19 23:30:58', b'1', NULL),
(64, 218887446, 50, b'1', '2022-02-19 23:31:19', '2022-02-19 23:32:05', b'1', NULL),
(66, 218887446, 50, b'1', '2022-02-20 00:41:45', '2022-02-20 10:36:23', b'1', NULL),
(68, 218887446, 50, b'1', '2022-02-20 11:31:04', '2022-02-20 11:32:37', b'1', NULL),
(74, 217458666, 50, b'1', '2022-02-21 10:45:41', '2022-02-21 13:00:50', b'1', NULL),
(76, 218887446, 50, b'1', '2022-02-21 12:47:47', '2022-02-21 12:52:40', b'1', NULL),
(77, 218887446, 50, b'1', '2022-02-21 12:53:36', '2022-02-21 12:55:33', b'1', NULL),
(78, 218887446, 50, b'1', '2022-02-21 12:56:59', '2022-02-21 13:00:52', b'1', NULL),
(79, 218887446, 50, b'1', '2022-02-21 13:01:30', '2022-02-21 13:03:05', b'1', NULL),
(80, 218887446, 50, b'1', '2022-02-21 13:03:31', '2022-02-21 13:04:10', b'1', NULL),
(81, 218887446, 50, b'1', '2022-02-21 13:04:33', '2022-02-21 13:05:18', b'1', NULL),
(82, 218887446, 50, b'1', '2022-02-21 13:06:07', '2022-02-21 13:10:14', b'1', NULL),
(83, 218887446, 50, b'1', '2022-02-21 13:15:48', '2022-02-21 13:17:13', b'1', NULL),
(84, 218887446, 50, b'1', '2022-02-21 13:18:26', '2022-02-21 13:20:53', b'1', NULL),
(85, 218887446, 50, b'1', '2022-02-21 13:25:32', '2022-02-21 13:27:28', b'1', NULL),
(86, 218887446, 50, b'1', '2022-02-21 13:31:31', '2022-02-21 13:32:46', b'1', NULL),
(88, 218887446, 50, b'1', '2022-02-22 13:09:16', '2022-02-22 13:09:57', b'1', NULL),
(89, 218887446, 50, b'1', '2022-02-23 17:15:34', '2022-02-23 17:16:53', b'1', NULL),
(90, 218887446, 50, b'0', '2022-02-23 17:21:35', NULL, b'0', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_cam`
--

CREATE TABLE `pres_cam` (
  `id_pres` bigint(11) NOT NULL,
  `id_c` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_cam`
--

INSERT INTO `pres_cam` (`id_pres`, `id_c`) VALUES
(11, 2),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(61, 1),
(74, 1),
(76, 1),
(76, 2),
(78, 2),
(83, 1),
(83, 2),
(86, 1),
(88, 1),
(88, 2),
(89, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_cgopro`
--

CREATE TABLE `pres_cgopro` (
  `id_pres` bigint(11) NOT NULL,
  `id_cgopro` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_cgopro`
--

INSERT INTO `pres_cgopro` (`id_pres`, `id_cgopro`) VALUES
(49, 3113644),
(61, 3113644),
(76, 3113644),
(82, 3113644),
(83, 3113644);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_desl`
--

CREATE TABLE `pres_desl` (
  `id_pres` bigint(11) NOT NULL,
  `id_d` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_desl`
--

INSERT INTO `pres_desl` (`id_pres`, `id_d`) VALUES
(49, 3108804),
(61, 3108804),
(76, 3108804),
(82, 3108804),
(83, 3108804);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_flash`
--

CREATE TABLE `pres_flash` (
  `id_pres` bigint(11) NOT NULL,
  `id_f` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_flash`
--

INSERT INTO `pres_flash` (`id_pres`, `id_f`) VALUES
(48, 3113654),
(49, 3113654),
(76, 3113654),
(79, 3113654),
(81, 3113654),
(83, 3113654);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_g`
--

CREATE TABLE `pres_g` (
  `id_pres` bigint(11) NOT NULL,
  `id_g` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_g`
--

INSERT INTO `pres_g` (`id_pres`, `id_g`) VALUES
(76, 1740952),
(77, 1740952),
(82, 1740952),
(83, 1740952),
(85, 1740952);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_lamp`
--

CREATE TABLE `pres_lamp` (
  `id_pres` bigint(11) NOT NULL,
  `id_l` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_lamp`
--

INSERT INTO `pres_lamp` (`id_pres`, `id_l`) VALUES
(12, 1),
(17, 1),
(17, 2),
(24, 2),
(25, 1),
(25, 2),
(26, 2),
(26, 1),
(28, 2),
(31, 2),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(40, 1),
(42, 2),
(42, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(61, 2),
(76, 1),
(76, 2),
(79, 1),
(79, 2),
(81, 1),
(81, 2),
(83, 1),
(83, 2),
(89, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_male`
--

CREATE TABLE `pres_male` (
  `id_pres` bigint(11) NOT NULL,
  `id_m` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_male`
--

INSERT INTO `pres_male` (`id_pres`, `id_m`) VALUES
(49, 3125925),
(76, 3125925),
(82, 3125925),
(83, 3125925);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_micro`
--

CREATE TABLE `pres_micro` (
  `id_pres` bigint(11) NOT NULL,
  `id_m` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_micro`
--

INSERT INTO `pres_micro` (`id_pres`, `id_m`) VALUES
(47, 1),
(48, 1),
(49, 1),
(76, 1),
(76, 2),
(79, 1),
(79, 2),
(80, 2),
(80, 1),
(83, 1),
(83, 2),
(88, 1),
(90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_otro`
--

CREATE TABLE `pres_otro` (
  `id_pres` bigint(11) NOT NULL,
  `otro_P` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_otro`
--

INSERT INTO `pres_otro` (`id_pres`, `otro_P`) VALUES
(61, 'sd 64'),
(84, 'sd128Gb'),
(84, 'sd256'),
(88, 'sd 128'),
(89, 'sd 256');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_proy`
--

CREATE TABLE `pres_proy` (
  `id_pres` bigint(11) NOT NULL,
  `id_p` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_proy`
--

INSERT INTO `pres_proy` (`id_pres`, `id_p`) VALUES
(47, 1914220),
(48, 1914220),
(49, 1914220),
(74, 1914220),
(76, 1914220),
(83, 1914220),
(88, 1914220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_t`
--

CREATE TABLE `pres_t` (
  `id_pres` bigint(12) NOT NULL,
  `id_t` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_tripie`
--

CREATE TABLE `pres_tripie` (
  `id_pres` bigint(11) NOT NULL,
  `id_t` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_tripie`
--

INSERT INTO `pres_tripie` (`id_pres`, `id_t`) VALUES
(66, 1778310),
(68, 1778310),
(76, 1778310),
(82, 1778310),
(83, 1778310),
(89, 1778310);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proy`
--

CREATE TABLE `proy` (
  `id_p` bigint(10) NOT NULL,
  `marca_p` varchar(20) NOT NULL,
  `modelo_p` varchar(20) NOT NULL,
  `maleta_p` bit(1) NOT NULL,
  `cable_Luz` bit(1) NOT NULL,
  `cable_Vga` bit(1) NOT NULL,
  `disp_p` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proy`
--

INSERT INTO `proy` (`id_p`, `marca_p`, `modelo_p`, `maleta_p`, `cable_Luz`, `cable_Vga`, `disp_p`) VALUES
(1914220, '3M', 'X20', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripie`
--

CREATE TABLE `tripie` (
  `id_t` bigint(12) NOT NULL,
  `modelo_t` varchar(15) NOT NULL,
  `marca_t` varchar(30) NOT NULL,
  `maleta_t` bit(1) NOT NULL,
  `disp_t` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tripie`
--

INSERT INTO `tripie` (`id_t`, `modelo_t`, `marca_t`, `maleta_t`, `disp_t`) VALUES
(1778310, 'LS-22M', 'LIBEC', b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigo_u` bigint(10) NOT NULL,
  `nombre_u` text NOT NULL,
  `app_usu` text NOT NULL,
  `apm_usu` text NOT NULL,
  `tipo_u` text NOT NULL,
  `tel_u` bigint(10) DEFAULT NULL,
  `cor_u` varchar(40) NOT NULL,
  `cel_u` bigint(10) DEFAULT NULL,
  `carrera_u` int(40) DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `contra_ui` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo_u`, `nombre_u`, `app_usu`, `apm_usu`, `tipo_u`, `tel_u`, `cor_u`, `cel_u`, `carrera_u`, `sector`, `contra_ui`) VALUES
(217458666, 'José', 'López', 'Merlo', 'Publico', 3414106917, 'joselopm12@gmail.com', 3416945215, NULL, 'Publico', 'jos123'),
(218887446, 'Manuel', 'Quiroz', 'Férnandez', 'Publico', 3414109632, 'manuelquirof@gmail.com', 3416985236, NULL, 'Publico', 'man123'),
(219635753, 'Luis ', 'Jímienez', 'Mendoza', 'Alumno', 3414128378, 'luisjimMen1999@alumnos.udg.mx', 3415698378, 0, 'Publico', 'lui123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_a`);

--
-- Indices de la tabla `camara`
--
ALTER TABLE `camara`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `camgopro`
--
ALTER TABLE `camgopro`
  ADD PRIMARY KEY (`id_cgopro`);

--
-- Indices de la tabla `carrito_cam`
--
ALTER TABLE `carrito_cam`
  ADD KEY `FK_carritocam1` (`codigo_u`),
  ADD KEY `id_c` (`id_c`);

--
-- Indices de la tabla `carrito_cgopro`
--
ALTER TABLE `carrito_cgopro`
  ADD KEY `carricgopro1` (`codigo_u`),
  ADD KEY `carrigopro2` (`id_cgopro`);

--
-- Indices de la tabla `carrito_desl`
--
ALTER TABLE `carrito_desl`
  ADD KEY `carrid1` (`id_d`),
  ADD KEY `carrid2` (`codigo_u`);

--
-- Indices de la tabla `carrito_flash`
--
ALTER TABLE `carrito_flash`
  ADD KEY `carrif1` (`id_f`),
  ADD KEY `carrif2` (`codigo_u`);

--
-- Indices de la tabla `carrito_grab`
--
ALTER TABLE `carrito_grab`
  ADD KEY `id_g` (`id_g`),
  ADD KEY `codigo_u` (`codigo_u`);

--
-- Indices de la tabla `carrito_lamp`
--
ALTER TABLE `carrito_lamp`
  ADD KEY `codigo_usuarioLamp` (`codigo_u`),
  ADD KEY `id_llamp` (`id_l`);

--
-- Indices de la tabla `carrito_maletin`
--
ALTER TABLE `carrito_maletin`
  ADD KEY `carrim2` (`id_m`);

--
-- Indices de la tabla `carrito_micro`
--
ALTER TABLE `carrito_micro`
  ADD KEY `FK_carritomicro1` (`codigo_u`),
  ADD KEY `FK_carritomicro2` (`id_m`);

--
-- Indices de la tabla `carrito_otro`
--
ALTER TABLE `carrito_otro`
  ADD KEY `codigo_u` (`codigo_u`);

--
-- Indices de la tabla `carrito_proy`
--
ALTER TABLE `carrito_proy`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `carrito_tripie`
--
ALTER TABLE `carrito_tripie`
  ADD KEY `codigo_u` (`codigo_u`),
  ADD KEY `id_t` (`id_t`);

--
-- Indices de la tabla `deslizador`
--
ALTER TABLE `deslizador`
  ADD PRIMARY KEY (`id_d`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_e`);

--
-- Indices de la tabla `flash`
--
ALTER TABLE `flash`
  ADD PRIMARY KEY (`id_f`);

--
-- Indices de la tabla `grabadora`
--
ALTER TABLE `grabadora`
  ADD PRIMARY KEY (`id_g`);

--
-- Indices de la tabla `lamp`
--
ALTER TABLE `lamp`
  ADD PRIMARY KEY (`id_l`);

--
-- Indices de la tabla `maletin`
--
ALTER TABLE `maletin`
  ADD PRIMARY KEY (`id_m`);

--
-- Indices de la tabla `microfono`
--
ALTER TABLE `microfono`
  ADD PRIMARY KEY (`id_m`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_pres`),
  ADD KEY `codigo_usuario` (`codigo_u`),
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `pres_cam`
--
ALTER TABLE `pres_cam`
  ADD KEY `pc2` (`id_c`),
  ADD KEY `pc1` (`id_pres`);

--
-- Indices de la tabla `pres_cgopro`
--
ALTER TABLE `pres_cgopro`
  ADD KEY `prescgp1` (`id_pres`),
  ADD KEY `prescgp2` (`id_cgopro`);

--
-- Indices de la tabla `pres_desl`
--
ALTER TABLE `pres_desl`
  ADD KEY `presd1` (`id_d`),
  ADD KEY `presd2` (`id_pres`);

--
-- Indices de la tabla `pres_flash`
--
ALTER TABLE `pres_flash`
  ADD KEY `presf1` (`id_f`),
  ADD KEY `presf2` (`id_pres`);

--
-- Indices de la tabla `pres_g`
--
ALTER TABLE `pres_g`
  ADD KEY `id_pres` (`id_pres`),
  ADD KEY `id_g` (`id_g`);

--
-- Indices de la tabla `pres_lamp`
--
ALTER TABLE `pres_lamp`
  ADD KEY `presL` (`id_pres`),
  ADD KEY `presLa` (`id_l`);

--
-- Indices de la tabla `pres_male`
--
ALTER TABLE `pres_male`
  ADD KEY `presm2` (`id_pres`),
  ADD KEY `presm1` (`id_m`);

--
-- Indices de la tabla `pres_micro`
--
ALTER TABLE `pres_micro`
  ADD KEY `pm2` (`id_m`),
  ADD KEY `pm1` (`id_pres`);

--
-- Indices de la tabla `pres_otro`
--
ALTER TABLE `pres_otro`
  ADD KEY `id_pres` (`id_pres`);

--
-- Indices de la tabla `pres_proy`
--
ALTER TABLE `pres_proy`
  ADD KEY `presp1` (`id_p`),
  ADD KEY `presp2` (`id_pres`);

--
-- Indices de la tabla `pres_tripie`
--
ALTER TABLE `pres_tripie`
  ADD KEY `id_pres` (`id_pres`),
  ADD KEY `id_t` (`id_t`);

--
-- Indices de la tabla `proy`
--
ALTER TABLE `proy`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `tripie`
--
ALTER TABLE `tripie`
  ADD PRIMARY KEY (`id_t`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_a` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `camara`
--
ALTER TABLE `camara`
  MODIFY `id_c` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `camgopro`
--
ALTER TABLE `camgopro`
  MODIFY `id_cgopro` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3113645;

--
-- AUTO_INCREMENT de la tabla `deslizador`
--
ALTER TABLE `deslizador`
  MODIFY `id_d` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3108805;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `flash`
--
ALTER TABLE `flash`
  MODIFY `id_f` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3113655;

--
-- AUTO_INCREMENT de la tabla `grabadora`
--
ALTER TABLE `grabadora`
  MODIFY `id_g` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1740953;

--
-- AUTO_INCREMENT de la tabla `maletin`
--
ALTER TABLE `maletin`
  MODIFY `id_m` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3125926;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_pres` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `proy`
--
ALTER TABLE `proy`
  MODIFY `id_p` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1914221;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_u` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219635754;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_cam`
--
ALTER TABLE `carrito_cam`
  ADD CONSTRAINT `FK_carritocam1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`),
  ADD CONSTRAINT `carrito_cam_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `camara` (`id_c`);

--
-- Filtros para la tabla `carrito_cgopro`
--
ALTER TABLE `carrito_cgopro`
  ADD CONSTRAINT `carricgopro1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrigopro2` FOREIGN KEY (`id_cgopro`) REFERENCES `camgopro` (`id_cgopro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_desl`
--
ALTER TABLE `carrito_desl`
  ADD CONSTRAINT `carrid1` FOREIGN KEY (`id_d`) REFERENCES `deslizador` (`id_d`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrid2` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_flash`
--
ALTER TABLE `carrito_flash`
  ADD CONSTRAINT `carrif1` FOREIGN KEY (`id_f`) REFERENCES `flash` (`id_f`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrif2` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_grab`
--
ALTER TABLE `carrito_grab`
  ADD CONSTRAINT `carrito_grab_ibfk_1` FOREIGN KEY (`id_g`) REFERENCES `grabadora` (`id_g`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_grab_ibfk_2` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_lamp`
--
ALTER TABLE `carrito_lamp`
  ADD CONSTRAINT `FK_carritolam1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`),
  ADD CONSTRAINT `FK_carritolam2` FOREIGN KEY (`id_l`) REFERENCES `lamp` (`id_l`);

--
-- Filtros para la tabla `carrito_maletin`
--
ALTER TABLE `carrito_maletin`
  ADD CONSTRAINT `carrim1` FOREIGN KEY (`id_m`) REFERENCES `maletin` (`id_m`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrim2` FOREIGN KEY (`id_m`) REFERENCES `maletin` (`id_m`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_micro`
--
ALTER TABLE `carrito_micro`
  ADD CONSTRAINT `FK_carritomicro1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`),
  ADD CONSTRAINT `FK_carritomicro2` FOREIGN KEY (`id_m`) REFERENCES `microfono` (`id_m`);

--
-- Filtros para la tabla `carrito_otro`
--
ALTER TABLE `carrito_otro`
  ADD CONSTRAINT `carrito_otro_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrito_proy`
--
ALTER TABLE `carrito_proy`
  ADD CONSTRAINT `carrito_proy_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`),
  ADD CONSTRAINT `carrito_proy_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `proy` (`id_p`);

--
-- Filtros para la tabla `carrito_tripie`
--
ALTER TABLE `carrito_tripie`
  ADD CONSTRAINT `carrito_tripie_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_tripie_ibfk_2` FOREIGN KEY (`id_t`) REFERENCES `tripie` (`id_t`) ON DELETE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `codigo_u` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE,
  ADD CONSTRAINT `codigo_u2` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE CASCADE,
  ADD CONSTRAINT `codigo_usuario` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`) ON DELETE SET NULL,
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`codigo_u`) REFERENCES `usuario` (`codigo_u`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `docente` (`id_doc`);

--
-- Filtros para la tabla `pres_cam`
--
ALTER TABLE `pres_cam`
  ADD CONSTRAINT `pc1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `pc2` FOREIGN KEY (`id_c`) REFERENCES `camara` (`id_c`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_cam_ibfk_1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`),
  ADD CONSTRAINT `pres_cam_ibfk_2` FOREIGN KEY (`id_c`) REFERENCES `camara` (`id_c`);

--
-- Filtros para la tabla `pres_cgopro`
--
ALTER TABLE `pres_cgopro`
  ADD CONSTRAINT `prescgp1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescgp2` FOREIGN KEY (`id_cgopro`) REFERENCES `camgopro` (`id_cgopro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_desl`
--
ALTER TABLE `pres_desl`
  ADD CONSTRAINT `presd1` FOREIGN KEY (`id_d`) REFERENCES `deslizador` (`id_d`) ON DELETE CASCADE,
  ADD CONSTRAINT `presd2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_flash`
--
ALTER TABLE `pres_flash`
  ADD CONSTRAINT `presf1` FOREIGN KEY (`id_f`) REFERENCES `flash` (`id_f`) ON DELETE CASCADE,
  ADD CONSTRAINT `presf2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_g`
--
ALTER TABLE `pres_g`
  ADD CONSTRAINT `pres_g_ibfk_1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_g_ibfk_2` FOREIGN KEY (`id_g`) REFERENCES `grabadora` (`id_g`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_lamp`
--
ALTER TABLE `pres_lamp`
  ADD CONSTRAINT `presL` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `presLa` FOREIGN KEY (`id_l`) REFERENCES `lamp` (`id_l`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_lamp_ibfk_1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`),
  ADD CONSTRAINT `pres_lamp_ibfk_2` FOREIGN KEY (`id_l`) REFERENCES `lamp` (`id_l`);

--
-- Filtros para la tabla `pres_male`
--
ALTER TABLE `pres_male`
  ADD CONSTRAINT `presm1` FOREIGN KEY (`id_m`) REFERENCES `maletin` (`id_m`) ON DELETE CASCADE,
  ADD CONSTRAINT `presm2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_micro`
--
ALTER TABLE `pres_micro`
  ADD CONSTRAINT `pm1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `pm2` FOREIGN KEY (`id_m`) REFERENCES `microfono` (`id_m`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_micro_ibfk_1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`),
  ADD CONSTRAINT `pres_micro_ibfk_2` FOREIGN KEY (`id_m`) REFERENCES `microfono` (`id_m`);

--
-- Filtros para la tabla `pres_otro`
--
ALTER TABLE `pres_otro`
  ADD CONSTRAINT `pres_otro_ibfk_1` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_proy`
--
ALTER TABLE `pres_proy`
  ADD CONSTRAINT `presp1` FOREIGN KEY (`id_p`) REFERENCES `proy` (`id_p`) ON DELETE CASCADE,
  ADD CONSTRAINT `presp2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pres_tripie`
--
ALTER TABLE `pres_tripie`
  ADD CONSTRAINT `pres_tripie_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `tripie` (`id_t`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_tripie_ibfk_2` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`) ON DELETE CASCADE,
  ADD CONSTRAINT `pres_tripie_ibfk_3` FOREIGN KEY (`id_pres`) REFERENCES `prestamo` (`id_pres`),
  ADD CONSTRAINT `pres_tripie_ibfk_4` FOREIGN KEY (`id_t`) REFERENCES `tripie` (`id_t`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
