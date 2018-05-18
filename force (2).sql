-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2018 a las 01:32:44
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `force`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdos`
--

CREATE TABLE `acuerdos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `fecha_acuerdo` date DEFAULT NULL,
  `tipo_alta_credito` int(11) DEFAULT NULL,
  `art_73` int(11) DEFAULT NULL,
  `sector_economico` longtext COLLATE utf8mb4_unicode_ci,
  `otra` longtext COLLATE utf8mb4_unicode_ci,
  `tipo_comite` int(11) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE `adicionales` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `origen_prospecto` int(11) DEFAULT NULL,
  `paso_siguiente` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkbox`
--

CREATE TABLE `checkbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkbox_registro`
--

CREATE TABLE `checkbox_registro` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_checkbox` int(10) UNSIGNED NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_prospecto`
--

CREATE TABLE `comentarios_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios_prospecto`
--

INSERT INTO `comentarios_prospecto` (`id`, `id_user`, `id_prospecto`, `comentario`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 9, 'fasdfasdfasd', '2018-04-05 17:28:52', '2018-04-05 17:28:52'),
(2, 1, 9, 'prueba2', '2018-04-17 21:58:02', '2018-04-17 21:58:02'),
(3, 1, 9, 'prueba3', '2018-04-17 22:21:36', '2018-04-17 22:21:36'),
(4, 1, 9, '1123', '2018-04-17 22:28:30', '2018-04-17 22:28:30'),
(5, 1, 9, 'prueba', '2018-04-19 14:22:13', '2018-04-19 14:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_prospecto`
--

CREATE TABLE `contactos_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `numero` bigint(20) DEFAULT NULL,
  `extension` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos_prospecto`
--

INSERT INTO `contactos_prospecto` (`id`, `id_user`, `id_prospecto`, `numero`, `extension`, `tipo`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 9, 55479315223, 56, 2, '2018-04-05 17:28:51', '2018-04-23 18:13:17'),
(2, 1, 9, 213213, NULL, 0, '2018-04-05 17:28:51', '2018-04-05 17:28:51'),
(3, 1, 9, 31232132, NULL, 2, '2018-04-05 17:28:51', '2018-04-05 17:28:51'),
(4, 1, 9, 5547931522, NULL, 0, '2018-04-19 15:30:05', '2018-04-23 18:13:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `tipo_credito` int(11) DEFAULT NULL,
  `importe` bigint(20) DEFAULT NULL,
  `saldo_actual` bigint(20) DEFAULT NULL,
  `plazo_meses` int(11) DEFAULT NULL,
  `limite_credito` bigint(20) DEFAULT NULL,
  `tasa_interes` bigint(20) DEFAULT NULL,
  `tasa_moratoria` bigint(20) DEFAULT NULL,
  `tasa_ordinaria` bigint(20) DEFAULT NULL,
  `comision_apertura` bigint(20) DEFAULT NULL,
  `comision_estructuracion` bigint(20) DEFAULT NULL,
  `periodicidad_pago` bigint(20) DEFAULT NULL,
  `destino` longtext COLLATE utf8mb4_unicode_ci,
  `forma_disposicion` longtext COLLATE utf8mb4_unicode_ci,
  `forma_pago_intereses` longtext COLLATE utf8mb4_unicode_ci,
  `forma_pago_capital` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id`, `id_oportunidad`, `tipo_credito`, `importe`, `saldo_actual`, `plazo_meses`, `limite_credito`, `tasa_interes`, `tasa_moratoria`, `tasa_ordinaria`, `comision_apertura`, `comision_estructuracion`, `periodicidad_pago`, `destino`, `forma_disposicion`, `forma_pago_intereses`, `forma_pago_capital`, `fecha_alta`, `fecha_actualizacion`, `id_user`) VALUES
(1, 1, 1, 1, 1, 3, 2, 5, NULL, NULL, 65, 4, NULL, NULL, NULL, NULL, NULL, '2018-05-18 18:05:46', '2018-05-18 18:05:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE `datos_generales` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `grupo_economico` longtext COLLATE utf8mb4_unicode_ci,
  `folio_bc` bigint(20) DEFAULT NULL,
  `localidad` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_constitucion` date DEFAULT NULL,
  `tamano` int(11) DEFAULT NULL,
  `tenencia_accionaria` longtext COLLATE utf8mb4_unicode_ci,
  `calif_sector` int(11) DEFAULT NULL,
  `clave_actividad` int(11) DEFAULT NULL,
  `administracion` longtext COLLATE utf8mb4_unicode_ci,
  `puesto` longtext COLLATE utf8mb4_unicode_ci,
  `nombre_solicitante` longtext COLLATE utf8mb4_unicode_ci,
  `numero_empleados` int(11) DEFAULT NULL,
  `institucion_financiera` longtext COLLATE utf8mb4_unicode_ci,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clave_actividad_economica` int(11) DEFAULT NULL,
  `clave_programa` int(11) DEFAULT NULL,
  `condiciones_previas` longtext COLLATE utf8mb4_unicode_ci,
  `condiciones_consideraciones` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_responsabilidades` date DEFAULT NULL,
  `fecha_sugeridad_contrato` date DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripciones`
--

CREATE TABLE `descripciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descripciones`
--

INSERT INTO `descripciones` (`id`, `id_oportunidad`, `descripcion`, `fecha_alta`, `fecha_actualizacion`, `id_user`) VALUES
(1, 1, 'fasd', '2018-05-18 18:05:46', '2018-05-18 18:05:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_prospecto`
--

CREATE TABLE `direcciones_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entidad_federativa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones_prospecto`
--

INSERT INTO `direcciones_prospecto` (`id`, `id_user`, `id_prospecto`, `calle`, `numero`, `colonia`, `codigo_postal`, `municipio`, `ciudad`, `pais`, `entidad_federativa`, `fecha_alta`, `fecha_actualizacion`) VALUES
(4, 1, 8, 'privada 20 de noviembre, plan de ayala', '1', 'plan de ayala', '14470', 'Tlalpan', 'Tlalpan', '3', '2', '2018-04-05 17:28:17', '2018-04-05 17:28:17'),
(5, 1, 9, 'privada 20 de noviembre, plan de ayalas', '133', 'Tlalcoligia', '14430', 'Tlalpan', 'Distrito Federal', '3', 'Distrito Federal', '2018-04-05 17:28:51', '2018-04-24 14:29:30'),
(6, 1, 9, 'aa', 'aassaaa', 'Plan', '14470', 'Tlalpan', 'Distrito Federal', 'México', 'Distrito Federal', '2018-04-19 14:15:55', '2018-04-20 17:27:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_prospecto`
--

CREATE TABLE `empresas_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `id_giro_mercantil` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_tipo_empresa` int(10) UNSIGNED NOT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anyos_constitucion` int(11) DEFAULT NULL,
  `numero_empleados` int(11) DEFAULT NULL,
  `ingresos_anuales` bigint(20) DEFAULT NULL,
  `sitio_web` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas_prospecto`
--

INSERT INTO `empresas_prospecto` (`id`, `id_prospecto`, `id_giro_mercantil`, `id_user`, `id_tipo_empresa`, `rfc`, `anyos_constitucion`, `numero_empleados`, `ingresos_anuales`, `sitio_web`, `fecha_alta`, `fecha_actualizacion`) VALUES
(5, 8, 1, 1, 1, 'TOGM920527CI8', 12123, 5, 5000000, 'http://www.google.com', '2018-04-05 17:28:17', '2018-04-05 17:28:17'),
(6, 9, 1, 1, 1, 'TOGM920527CI8', 12123, 5, 5000000, 'http://www.google.com', '2018-04-05 17:28:51', '2018-04-05 17:28:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_prospecto`
--

CREATE TABLE `estados_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_prospecto`
--

INSERT INTO `estados_prospecto` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Abrir', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Prospecto', '2018-04-16 00:00:00', '2018-04-16 00:00:00'),
(2, 1, 'Contacto', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas_avanza`
--

CREATE TABLE `etapas_avanza` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_etapa` int(11) DEFAULT NULL,
  `id_etapa_siguiente` int(11) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etapas_avanza`
--

INSERT INTO `etapas_avanza` (`id`, `id_user`, `id_etapa`, `id_etapa_siguiente`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `fecha_asignacion_expediente` date DEFAULT NULL,
  `fecha_firma_estados_credito` date DEFAULT NULL,
  `fecha_aprobacion_acta` date DEFAULT NULL,
  `fecha_reunion` date DEFAULT NULL,
  `opinion_valor` longtext COLLATE utf8mb4_unicode_ci,
  `analista` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias`
--

CREATE TABLE `garantias` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `garantia` longtext COLLATE utf8mb4_unicode_ci,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros_mercantiles`
--

CREATE TABLE `giros_mercantiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `giros_mercantiles`
--

INSERT INTO `giros_mercantiles` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Agricultura', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_oportunidad` int(10) UNSIGNED NOT NULL,
  `pre_calificacion` int(11) DEFAULT NULL,
  `reserva_ponderadas_monto` bigint(20) DEFAULT NULL,
  `capital_monto` bigint(20) DEFAULT NULL,
  `raroc` longtext COLLATE utf8mb4_unicode_ci,
  `rorac` longtext COLLATE utf8mb4_unicode_ci,
  `ventas_anuales` longtext COLLATE utf8mb4_unicode_ci,
  `reserva_ponderas_porcentaje` bigint(20) DEFAULT NULL,
  `capital_porcentaje` bigint(20) DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_21_161438_users_table_update', 2),
(4, '2018_02_21_164027_create_prefijos_table', 3),
(5, '2018_02_21_164230_create_giros_mercantiles_table', 3),
(6, '2018_02_21_164256_create_giros_productos_interes_table', 3),
(7, '2018_02_21_164737_create_estados_prospecto_interes_table', 3),
(8, '2018_02_21_164814_create_estados_origen_prospecto_table', 3),
(9, '2018_02_21_164837_create_estados_tipos_empresa_table', 3),
(10, '2018_02_21_165124_create_direcciones_prospectos_table', 3),
(11, '2018_02_21_165238_create_contactos_prospecto_table', 3),
(12, '2018_02_21_181643_create_empresas_prospecto_table', 3),
(13, '2018_02_21_183057_create_prospectos_table', 3),
(14, '2018_02_21_190246_create_comentariosprospectos_table', 3),
(15, '2018_02_21_190501_foreign_keys_table', 3),
(16, '2018_02_21_235937_prefijo_table', 4),
(17, '2018_02_22_001130_prospecto_table', 5),
(21, '2018_03_20_154201_create_roles_table', 6),
(22, '2018_03_20_154259_create_roles_user_table', 6),
(23, '2018_03_20_154317_create_permisos_table', 6),
(24, '2018_03_20_154339_create_permisos_rol_table', 6),
(25, '2018_04_12_222407_create_etapas_table', 7),
(26, '2018_04_16_152502_create_etapas_avanza_table', 7),
(27, '2018_04_16_162712_create_prospectos_etapas_table', 8),
(28, '2018_05_08_222653_create_oportunidades_table', 9),
(29, '2018_05_11_140415_create_creditos_table', 10),
(30, '2018_05_11_141700_create_descripcion_table', 10),
(31, '2018_05_11_141958_create_garantias_table', 10),
(32, '2018_05_11_142047_create_adicionales_table', 10),
(33, '2018_05_11_142107_create_acuerdos_table', 10),
(34, '2018_05_11_142147_create_evaluaciones_table', 10),
(35, '2018_05_11_142218_create_datos_generales_table', 10),
(36, '2018_05_11_142449_create_indicadores_table', 10),
(37, '2018_05_11_164448_add_users_actualizacion_table', 11),
(38, '2018_05_18_224129_create_checkbox_table', 12),
(39, '2018_05_18_230248_create_checkbox_registro_table', 12),
(40, '2018_05_18_230409_create_registro_prospect_table', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oportunidades`
--

CREATE TABLE `oportunidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cliente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aprobador` int(11) DEFAULT NULL,
  `ingresos` bigint(20) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `tipo_registro` int(11) DEFAULT NULL,
  `id_etapa` int(11) DEFAULT NULL,
  `id_etapa_documentos` int(11) DEFAULT NULL,
  `estatus_credito` int(11) DEFAULT NULL,
  `probabilidad` bigint(20) DEFAULT NULL,
  `numero_cuenta` bigint(20) DEFAULT NULL,
  `campaña` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `osag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ran3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ran4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_persona` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oportunidades`
--

INSERT INTO `oportunidades` (`id`, `id_prospecto`, `nombre`, `nombre_cliente`, `aprobador`, `ingresos`, `tipo`, `tipo_registro`, `id_etapa`, `id_etapa_documentos`, `estatus_credito`, `probabilidad`, `numero_cuenta`, `campaña`, `osag`, `ran3`, `ran4`, `tipo_persona`, `fecha_cierre`, `fecha_alta`, `fecha_actualizacion`, `id_user`) VALUES
(1, 9, 'andres', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-18 18:05:46', '2018-05-18 18:05:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen_prospecto`
--

CREATE TABLE `origen_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `origen_prospecto`
--

INSERT INTO `origen_prospecto` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Internet', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(10) UNSIGNED NOT NULL,
  `permiso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`, `descripcion`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 'roles/index', 'roles', '2018-04-04 00:00:00', '2018-04-04 00:00:00'),
(2, 'users/index', 'users/index', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'permisos/index', 'asd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'permisos/update', 'permisos/update', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'permisos/store', 'permisos/update', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'permisos/create', 'afsd\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'prospectos/view', 'pros', '2018-04-05 18:24:27', '2018-04-05 18:24:27'),
(8, 'permisosrol/index', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'prospectos/index', 'index', '2018-04-13 22:40:06', '2018-04-13 22:40:06'),
(10, 'permisos/show', 'index', '2018-04-13 22:40:26', '2018-04-13 22:40:26'),
(11, 'permisosrol/create', 'create', '2018-04-13 22:47:02', '2018-04-13 22:47:02'),
(12, 'permisosrol/store', 'create', '2018-04-13 22:48:00', '2018-04-13 22:48:00'),
(13, 'prospectos/update', 'update', '2018-04-16 17:33:40', '2018-04-16 17:33:40'),
(14, 'permisosrol/show', 'show', '2018-04-16 17:34:36', '2018-04-16 17:34:36'),
(15, 'prospectos/comentarios', 'per', '2018-04-17 21:57:50', '2018-04-17 21:57:50'),
(16, 'prospectos/direccion', 'direccion', '2018-04-19 14:10:13', '2018-04-19 14:10:13'),
(17, 'users/show', 'show', '2018-04-23 17:36:20', '2018-04-23 17:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_rol`
--

CREATE TABLE `permisos_rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `permiso_id` int(10) UNSIGNED NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos_rol`
--

INSERT INTO `permisos_rol` (`id`, `rol_id`, `permiso_id`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 13, '2018-04-16 17:34:00', '2018-04-16 17:34:00'),
(14, 1, 14, '2018-04-16 17:34:53', '2018-04-16 17:34:53'),
(15, 1, 15, '2018-04-17 21:57:59', '2018-04-17 21:57:59'),
(16, 1, 16, '2018-04-19 14:10:24', '2018-04-19 14:10:24'),
(17, 1, 17, '2018-04-23 17:36:31', '2018-04-23 17:36:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prefijos`
--

CREATE TABLE `prefijos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prefijos`
--

INSERT INTO `prefijos` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Sr.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_interes`
--

CREATE TABLE `productos_interes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_interes`
--

INSERT INTO `productos_interes` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'Crédito en cuenta Corriente', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectos`
--

CREATE TABLE `prospectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_origen_prospecto` int(10) UNSIGNED NOT NULL,
  `id_estado_prospecto` int(10) UNSIGNED NOT NULL,
  `id_producto_interes` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `id_prefijo` int(10) UNSIGNED NOT NULL,
  `tipo_persona` int(11) DEFAULT NULL,
  `id_etapa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prospectos`
--

INSERT INTO `prospectos` (`id`, `id_user`, `id_origen_prospecto`, `id_estado_prospecto`, `id_producto_interes`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `nacionalidad`, `fecha_alta`, `fecha_actualizacion`, `id_prefijo`, `tipo_persona`, `id_etapa`) VALUES
(3, 1, 1, 1, 1, 'Marco Andrés De la', 'González', 'Torre', 'madgmadg@gmail.com', 'Mexicana', '2018-04-05 17:14:14', '2018-04-05 17:14:14', 1, 0, 1),
(8, 1, 1, 1, 1, 'Marco Andrés De la', 'González', 'Torre', 'madgmadg@gmail.com', 'Mexicana', '2018-04-05 17:28:17', '2018-04-05 17:28:17', 1, 0, 1),
(9, 1, 1, 1, 1, 'Marco Andrés', 'De la Torre', 'González', 'madgmadg@gmail.coms', 'Mexicana', '2018-04-05 17:28:51', '2018-04-25 16:10:36', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_prospecto`
--

CREATE TABLE `registro_prospecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_prospecto` int(10) UNSIGNED NOT NULL,
  `id_registro` int(10) UNSIGNED NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `descripcion`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 'admin', 'na', '2018-04-04 00:00:00', '2018-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`id`, `id_user`, `rol_id`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 1, '2018-04-04 00:00:00', '2018-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_empresa`
--

CREATE TABLE `tipos_empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_empresa`
--

INSERT INTO `tipos_empresa` (`id`, `id_user`, `nombre`, `fecha_alta`, `fecha_actualizacion`) VALUES
(1, 1, 'PyME', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `puesto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subarea` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `puesto`, `area`, `subarea`) VALUES
(1, 'Marco Andrés De la Torre González', 'mtorre', '$2y$10$F/WUcqFnuObu1rMUtIaRx.JSyKzHmvUbJeyQLMdkpUynvOpYf6oey', 'yQDtfy1qCn4b8qpTBXyoIDc1CX36JJUQEVTbGyxdXutAzDNahMomzo5TLE98', '2018-02-21 22:28:01', '2018-04-25 19:25:33', 'Analista Jr. Desarrollo', 'Sistemas', 'Desarrollo'),
(2, 'Monica Nayeli Sanchez Vazquez', 'msanchezv', '$2y$10$0LBr0a2Mab840LuX1OWIz.ML4wuU53akDo6v/8dZGyT10ES4N6Ufa', NULL, '2018-04-13 21:47:52', '2018-04-13 21:47:52', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_acuerdos` (`id_oportunidad`),
  ADD KEY `my_id_user_acuerdos` (`id_user`);

--
-- Indices de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_adicionales` (`id_oportunidad`),
  ADD KEY `my_id_user_adicionales` (`id_user`);

--
-- Indices de la tabla `checkbox`
--
ALTER TABLE `checkbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_checkbox` (`id_user`);

--
-- Indices de la tabla `checkbox_registro`
--
ALTER TABLE `checkbox_registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_checkbox_registro` (`id_user`),
  ADD KEY `my_id_checkbox_checkbox_registro` (`id_checkbox`);

--
-- Indices de la tabla `comentarios_prospecto`
--
ALTER TABLE `comentarios_prospecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos_prospecto`
--
ALTER TABLE `contactos_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_contactos_prospecto_users` (`id_user`),
  ADD KEY `my_id_prospecto_contactos_prospecto_prospectos` (`id_prospecto`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_oportunidades` (`id_oportunidad`),
  ADD KEY `my_id_user_creditos` (`id_user`);

--
-- Indices de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_datos_generales` (`id_oportunidad`),
  ADD KEY `my_id_user_datos_generales` (`id_user`);

--
-- Indices de la tabla `descripciones`
--
ALTER TABLE `descripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_descripciones` (`id_oportunidad`),
  ADD KEY `my_id_user_descripciones` (`id_user`);

--
-- Indices de la tabla `direcciones_prospecto`
--
ALTER TABLE `direcciones_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_direcciones_prospectos_users` (`id_user`),
  ADD KEY `my_id_prospecto_direcciones_prospectos_prospectos` (`id_prospecto`);

--
-- Indices de la tabla `empresas_prospecto`
--
ALTER TABLE `empresas_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_empresas_prospecto_users` (`id_user`),
  ADD KEY `my_id_prospecto_empresas_prospecto_prospectos` (`id_prospecto`),
  ADD KEY `my_id_giro_mercantil_empresas_prospecto_giros` (`id_giro_mercantil`),
  ADD KEY `my_id_tipo_empresa_empresas_prospecto_tipo` (`id_tipo_empresa`);

--
-- Indices de la tabla `estados_prospecto`
--
ALTER TABLE `estados_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_estados_prospecto_users` (`id_user`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_etapas_users` (`id_user`);

--
-- Indices de la tabla `etapas_avanza`
--
ALTER TABLE `etapas_avanza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_etapas_avanza_users` (`id_user`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_evaluaciones` (`id_oportunidad`),
  ADD KEY `my_id_user_evaluaciones` (`id_user`);

--
-- Indices de la tabla `garantias`
--
ALTER TABLE `garantias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_garantias` (`id_oportunidad`),
  ADD KEY `my_id_user_garantias` (`id_user`);

--
-- Indices de la tabla `giros_mercantiles`
--
ALTER TABLE `giros_mercantiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_giros_mercantiles_users` (`id_user`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_oportunidad_indicadores` (`id_oportunidad`),
  ADD KEY `my_id_user_indicadores` (`id_user`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_prospecto_oportunidades` (`id_prospecto`),
  ADD KEY `my_id_user_oportunidades` (`id_user`);

--
-- Indices de la tabla `origen_prospecto`
--
ALTER TABLE `origen_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_origen_prospecto_users` (`id_user`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos_rol`
--
ALTER TABLE `permisos_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_permiso_id_permisos_permisos` (`permiso_id`),
  ADD KEY `my_rol_id_permisos_rol` (`rol_id`);

--
-- Indices de la tabla `prefijos`
--
ALTER TABLE `prefijos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_prefijos_users` (`id_user`);

--
-- Indices de la tabla `productos_interes`
--
ALTER TABLE `productos_interes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_productos_interes_users` (`id_user`);

--
-- Indices de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_prospectoss_users` (`id_user`),
  ADD KEY `my_id_origen_prospecto_prospectoss_prospectos` (`id_origen_prospecto`),
  ADD KEY `my_id_estado_prospecto_prospectos_giros` (`id_estado_prospecto`),
  ADD KEY `my_id_producto_interes_prospectos_tipo` (`id_producto_interes`),
  ADD KEY `my_id_prefijo_prefijos_prospectos` (`id_prefijo`);

--
-- Indices de la tabla `registro_prospecto`
--
ALTER TABLE `registro_prospecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_registro_prospecto` (`id_user`),
  ADD KEY `my_id_prospecto_registro_prospecto` (`id_prospecto`),
  ADD KEY `my_id_registro_registro_prospecto` (`id_registro`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_rol_usuario` (`id_user`),
  ADD KEY `my_rol_id_rol_usuario` (`rol_id`);

--
-- Indices de la tabla `tipos_empresa`
--
ALTER TABLE `tipos_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_id_user_tipos_empresa_users` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `checkbox`
--
ALTER TABLE `checkbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `checkbox_registro`
--
ALTER TABLE `checkbox_registro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios_prospecto`
--
ALTER TABLE `comentarios_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contactos_prospecto`
--
ALTER TABLE `contactos_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `descripciones`
--
ALTER TABLE `descripciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `direcciones_prospecto`
--
ALTER TABLE `direcciones_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `empresas_prospecto`
--
ALTER TABLE `empresas_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `estados_prospecto`
--
ALTER TABLE `estados_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `etapas_avanza`
--
ALTER TABLE `etapas_avanza`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `garantias`
--
ALTER TABLE `garantias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `giros_mercantiles`
--
ALTER TABLE `giros_mercantiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `origen_prospecto`
--
ALTER TABLE `origen_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `permisos_rol`
--
ALTER TABLE `permisos_rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `prefijos`
--
ALTER TABLE `prefijos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos_interes`
--
ALTER TABLE `productos_interes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `registro_prospecto`
--
ALTER TABLE `registro_prospecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipos_empresa`
--
ALTER TABLE `tipos_empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdos`
--
ALTER TABLE `acuerdos`
  ADD CONSTRAINT `acuerdos_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `acuerdos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `adicionales`
--
ALTER TABLE `adicionales`
  ADD CONSTRAINT `adicionales_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `adicionales_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `checkbox`
--
ALTER TABLE `checkbox`
  ADD CONSTRAINT `checkbox_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `checkbox_registro`
--
ALTER TABLE `checkbox_registro`
  ADD CONSTRAINT `checkbox_registro_id_checkbox_foreign` FOREIGN KEY (`id_checkbox`) REFERENCES `checkbox` (`id`),
  ADD CONSTRAINT `checkbox_registro_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `contactos_prospecto`
--
ALTER TABLE `contactos_prospecto`
  ADD CONSTRAINT `contactos_prospecto_id_prospecto_foreign` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id`),
  ADD CONSTRAINT `contactos_prospecto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `creditos_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `creditos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD CONSTRAINT `datos_generales_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `datos_generales_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `descripciones`
--
ALTER TABLE `descripciones`
  ADD CONSTRAINT `descripciones_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `descripciones_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `direcciones_prospecto`
--
ALTER TABLE `direcciones_prospecto`
  ADD CONSTRAINT `direcciones_prospectos_id_prospecto_foreign` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id`),
  ADD CONSTRAINT `direcciones_prospectos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empresas_prospecto`
--
ALTER TABLE `empresas_prospecto`
  ADD CONSTRAINT `empresas_prospecto_id_giro_mercantil_foreign` FOREIGN KEY (`id_giro_mercantil`) REFERENCES `giros_mercantiles` (`id`),
  ADD CONSTRAINT `empresas_prospecto_id_prospecto_foreign` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id`),
  ADD CONSTRAINT `empresas_prospecto_id_tipo_empresa_foreign` FOREIGN KEY (`id_tipo_empresa`) REFERENCES `tipos_empresa` (`id`),
  ADD CONSTRAINT `empresas_prospecto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `estados_prospecto`
--
ALTER TABLE `estados_prospecto`
  ADD CONSTRAINT `estados_prospecto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD CONSTRAINT `etapas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `etapas_avanza`
--
ALTER TABLE `etapas_avanza`
  ADD CONSTRAINT `etapas_avanza_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `evaluaciones_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `garantias`
--
ALTER TABLE `garantias`
  ADD CONSTRAINT `garantias_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `garantias_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `giros_mercantiles`
--
ALTER TABLE `giros_mercantiles`
  ADD CONSTRAINT `giros_mercantiles_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_id_oportunidad_foreign` FOREIGN KEY (`id_oportunidad`) REFERENCES `oportunidades` (`id`),
  ADD CONSTRAINT `indicadores_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  ADD CONSTRAINT `oportunidades_id_prospecto_foreign` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id`),
  ADD CONSTRAINT `oportunidades_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `origen_prospecto`
--
ALTER TABLE `origen_prospecto`
  ADD CONSTRAINT `origen_prospecto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `permisos_rol`
--
ALTER TABLE `permisos_rol`
  ADD CONSTRAINT `permisos_rol_permiso_id_foreign` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `permisos_rol_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `prefijos`
--
ALTER TABLE `prefijos`
  ADD CONSTRAINT `prefijos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos_interes`
--
ALTER TABLE `productos_interes`
  ADD CONSTRAINT `productos_interes_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD CONSTRAINT `prospectos_id_estado_prospecto_foreign` FOREIGN KEY (`id_estado_prospecto`) REFERENCES `estados_prospecto` (`id`),
  ADD CONSTRAINT `prospectos_id_origen_prospecto_foreign` FOREIGN KEY (`id_origen_prospecto`) REFERENCES `origen_prospecto` (`id`),
  ADD CONSTRAINT `prospectos_id_prefijo_foreign` FOREIGN KEY (`id_prefijo`) REFERENCES `prefijos` (`id`),
  ADD CONSTRAINT `prospectos_id_producto_interes_foreign` FOREIGN KEY (`id_producto_interes`) REFERENCES `productos_interes` (`id`),
  ADD CONSTRAINT `prospectos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `registro_prospecto`
--
ALTER TABLE `registro_prospecto`
  ADD CONSTRAINT `registro_prospecto_id_prospecto_foreign` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id`),
  ADD CONSTRAINT `registro_prospecto_id_registro_foreign` FOREIGN KEY (`id_registro`) REFERENCES `checkbox_registro` (`id`),
  ADD CONSTRAINT `registro_prospecto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_usuario_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rol_usuario_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `tipos_empresa`
--
ALTER TABLE `tipos_empresa`
  ADD CONSTRAINT `tipos_empresa_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
