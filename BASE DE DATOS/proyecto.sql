-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-03-2020 a las 14:43:47
-- Versión del servidor: 5.5.62
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consignatarios`
--

CREATE TABLE `consignatarios` (
  `idConsignatario` int(11) NOT NULL,
  `nombre_consig` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consignatarios`
--

INSERT INTO `consignatarios` (`idConsignatario`, `nombre_consig`) VALUES
(1, 'CINTAC S.A.I.C'),
(2, 'VH  MANUFACTURA DE TUBOS DE ACERO SA'),
(3, 'BARRACA  DE FIERRO CARLOS HERRERA ARREDONDO LMTDA'),
(4, 'FORMACION DE ACERO S.A'),
(5, 'FRANCISCO PETRICIO S.A'),
(6, 'KUPFER HERMANOS S.A'),
(7, 'MULTIACEROS SOCIEDAD ANONIMA'),
(8, 'PERFILES Y TUBOS DE ACERO ALMARZA S.A'),
(9, 'TECNOVIAL S.A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_carguio`
--

CREATE TABLE `control_carguio` (
  `IdControl` int(11) NOT NULL,
  `Patente` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Num_documento` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Tipo_Bulto` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Cantidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `control_carguio`
--

INSERT INTO `control_carguio` (`IdControl`, `Patente`, `Num_documento`, `Tipo_Bulto`, `Cantidad`) VALUES
(1, 'NH5193', 'F45321L04059D', '1', 4),
(2, 'WEWE89', 'WA43569876IOER', '3', 3),
(3, 'WEPE12', 'LXYS2KXK23LAlOSD2', '3', 4),
(4, 'CGPB49', 'M4D38412854ED45DS', '4', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faenas`
--

CREATE TABLE `faenas` (
  `idfaena` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `faenas`
--

INSERT INTO `faenas` (`idfaena`, `nombre`) VALUES
(1, 'ABATE MOLINA'),
(2, 'ACUARIO III'),
(3, 'AGUNSA'),
(4, 'AGUNSA ARIES'),
(5, 'AGUNSA CAPELA'),
(6, 'ALMIRANTE 1'),
(7, 'ANTONIO'),
(8, 'AQUALEO'),
(9, 'ARIES'),
(10, 'ASHIYA STAR'),
(11, 'ASMAR'),
(12, 'ATALNTIC ACANTHUS'),
(13, 'AUTUMN WAVE'),
(14, 'BANDURRIA II'),
(15, 'BBC ELBE'),
(16, 'BBC KIMBERLEY'),
(17, 'BELLAVISTA'),
(18, 'BETA CENTAURO'),
(19, 'BREMEN'),
(20, 'CABO DE HORNOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `idIngreso` int(11) NOT NULL,
  `Mes` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Faena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Turno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Hora` time NOT NULL,
  `Patente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Operacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Procedencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contenedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Iso_Code` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Observacion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `Empleado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`idIngreso`, `Mes`, `Faena`, `Fecha`, `Turno`, `Hora`, `Patente`, `Tipo_Operacion`, `Procedencia`, `Contenedor`, `Iso_Code`, `Observacion`, `Empleado`) VALUES
(15, 'December', '', '2013-12-19', '', '00:43:03', 'UD6473', '3', '1', 'SKU-123456', '4066', 'CONTENEDOR RIFFER', '0'),
(16, 'December', '', '2013-12-19', '', '00:43:36', 'DSKU32', '4', '4', 'Sin Contenedor', '1000', 'Rancho', '0'),
(17, 'December', '', '2013-12-19', '', '00:44:11', 'SDFG21', '10', '2', 'SKU-45732', '2000', 'CONTENEDOR RIFFER', '0'),
(18, 'December', '', '2013-12-19', '', '00:44:42', 'KIUJ67', '14', '2', 'Sin Contenedor', '1000', 'Rampla', '0'),
(19, 'December', '', '2013-12-19', '', '00:45:27', 'NJMK54', '12', '1', 'SKU-345603M', '2004', 'Sitio 8', '0'),
(20, 'December', '', '2013-12-19', '', '00:45:51', 'POUI54', '3', '2', 'SKU-5467MJU', '2003', 'CONTENEDOR RIFFER', '0'),
(21, 'December', '', '2013-12-19', '', '00:46:37', 'JUIK22', '1', '2', 'SKU-3JK603M', '10G0', 'CONTENEDOR RIFFER', '0'),
(22, 'December', '', '2013-12-19', '', '00:47:00', 'UIYT87', '3', '1', 'SKU-JUI14732', '2001', 'CONTENEDOR RIFFER', '0'),
(23, 'December', '', '2013-12-19', '', '00:47:18', 'POIU21', '1', '1', 'chku 12345563 7', '10G0', 'CONTENEDOR RIFFER', '0'),
(24, 'December', '', '2013-12-19', '', '00:47:34', 'HJKL32', '1', '1', 'chku 123JN3 7', '10G0', 'CONTENEDOR RIFFER', '0'),
(25, 'December', '', '2013-12-19', '', '13:22:27', 'UYHJ43', '8', '2', 'SKU-TER4331', '2004', 'CONTENEDOR RIFFER', '0'),
(31, 'December', '', '2019-12-13', '', '13:42:03', 'UIOP33', '5', '2', 'SKU-UIO3456', '2001', 'CONTENEDOR RIFFER', '0'),
(32, 'December', '', '2019-12-13', '', '19:47:37', 'UYOK-14', '10', '2', 'SKU-MMMUIO124', '2001', 'CONTENEDOR RIFFER', '0'),
(33, 'December', '', '2019-12-13', '', '20:27:33', 'JUYT12', '10', '2', 'SKU-UYTQW12', '2002', 'CONTENEDOR RIFFER', '0'),
(34, 'December', '', '2019-12-30', '', '11:21:03', 'KCKB63', '3', '2', 'N/A', '1000', 'CONTENEDOR RIFFER', 'asantis'),
(35, 'December', '', '2019-12-30', '', '15:41:41', 'ASDF21', '3', '3', 'SKU123456', '2011', 'CONTENEDOR RIFFER', 'asantis'),
(36, 'December', '', '2019-12-30', '', '15:43:20', 'prueba3', '4', '4', 'chku 12345563 7', '2000', 'CONTENEDOR RIFFER', 'asantis'),
(37, 'December', '', '2019-12-30', '', '16:20:38', 'kdpv27', '19', '1', 'chku 12345563 7', '1000', 'CONTENEDOR RIFFER', 'asantis'),
(38, 'diciembre', '', '2019-12-30', '', '17:04:55', 'UD6473', '1', '3', 'chku 12345563 7', '12G0', 'CONTENEDOR RIFFER', 'asantis'),
(39, 'diciembre', '', '2019-12-30', '', '18:07:17', 'UD6473', '10', '2', 'chku 12345563 7', '2000', 'CONTENEDOR RIFFER', 'asantis'),
(40, 'diciembre', '', '2019-12-30', '', '18:29:42', 'ASDF21', '3', '2', 'chku 12345563 7', '2001', 'CONTENEDOR RIFFER', 'asantis'),
(41, 'diciembre', '', '2019-12-30', '', '18:31:15', 'SDFG21', '4', '2', 'chku 12345563 7', '12G0', 'CONTENEDOR RIFFER', 'asantis'),
(42, 'diciembre', '', '2019-12-30', '', '18:31:43', 'abcd12', '3', '3', 'chku 12345563 7', '2002', 'otra vez', 'informatica'),
(43, 'diciembre', '', '2019-12-30', '', '18:40:07', 'ASCX12', '1', '1', 'S/N', '2001', 'SITIO 8', 'asantis'),
(44, 'enero', '', '2020-01-09', '', '12:07:44', 'UDPO12', '1', '1', 'S/N', '1000', 'SITIO 8', 'asantis'),
(45, 'enero', '', '2020-01-09', '', '20:58:51', 'CKCB63', '4', '1', 'S/N', '1000', 'ISLA DE PASCUA', 'asantis'),
(46, 'enero', '', '2020-01-13', '', '09:59:32', 'CJUY12', '4', '1', 'S/N', '1000', 'ISLA DE PASCUA', 'asantis'),
(47, 'enero', '', '2020-01-13', '', '10:09:40', 'UDJU12', '4', '2', 'S/N', '1000', 'ISLA DE PASCUA', 'asantis'),
(48, 'enero', '', '2020-01-15', '', '21:16:50', 'POIU21', '17', '1', 'SKU-r1234', '2000', 'SITIO 8', 'asantis'),
(49, 'enero', '', '2020-01-15', '', '22:53:36', 'TYUR12', '17', '2', 'SKU-12345', '2000', 'SITIO 8', 'asantis'),
(50, 'enero', '', '2020-01-16', '', '17:22:59', 'YTRE12', '4', '1', 'S/N', '1000', 'SITIO 8', 'asantis'),
(51, 'enero', '', '2020-01-22', '', '12:55:22', 'FFXV', '5', '1', 'S/N', '1000', 'Huele mal', 'Informatica'),
(52, 'enero', '', '2020-01-22', '', '16:36:59', 'FFXV', '4', '4', 'S/N', '1000', 'Sin inconveniente', 'Informatica'),
(53, 'enero', '', '2020-01-22', '', '17:09:41', 'FFXV', '6', '4', '3812838121293', '2000', 'Nuevo Registro 16:09', ''),
(54, 'enero', '', '2020-01-23', '', '10:00:37', 'XXII', '5', '4', '3812838121293', '2000', 'N/A', ''),
(55, 'enero', '', '2020-01-23', '', '10:23:34', 'XXII', '4', '4', 'S/N', '1000', 'Vuelve', ''),
(56, 'enero', '', '2020-01-23', '', '10:55:00', 'NIEW44', '5', '2', 'S/N', '1000', 'N/A', ''),
(57, 'enero', '', '2020-01-23', '', '12:57:43', 'XXII', '10', '3', 'S/N', '1000', 'Wololo', ''),
(58, 'enero', '', '2020-01-23', '', '18:24:14', 'SAMI12', '1', '3', 'S/N', '1000', 'Dato Nuevo', 'Informatica'),
(59, 'enero', '', '2020-01-23', '', '18:26:48', 'FFXV', '4', '2', 'S/N', '1000', 'N/A', 'Informatica'),
(60, 'enero', '', '2020-01-23', '', '18:38:31', 'SAFE12', '2', '2', '3812838121293', '2001', '123123123', 'Informatica'),
(61, 'enero', '', '2020-01-24', '', '09:58:44', 'LOMI41', '1', '2', 'S/N', '1000', 'S/N', 'Informatica'),
(62, 'enero', '', '2020-01-24', '', '09:59:07', 'WAXI89', '5', '2', 'S/N', '1000', 'S/N', 'Informatica'),
(63, 'enero', '', '2020-01-24', '', '09:59:35', 'TEXE78', '14', '2', 'S/N', '1000', 'S/N', 'Informatica'),
(64, 'enero', '', '2020-01-24', '', '13:04:35', 'TCVA12', '1', '2', 'S/N', '1000', 'N/A', 'Informatica'),
(65, 'enero', '', '2020-01-24', '', '13:40:11', 'XPLD22', '13', '1', '3812838121293', '2015', 'N/A', 'Informatica'),
(66, 'enero', '', '2020-01-24', '', '13:44:00', 'MOMO90', '2', '4', '3812838121293', '12G0', 'N/A', 'Informatica'),
(67, 'enero', '', '2020-01-27', '', '09:10:13', 'WEWE89', '11', '2', 'S/N', '1000', 'N/A', 'Informatica'),
(68, 'enero', '', '2020-01-27', '', '09:22:26', 'RERE21', '8', '2', 'S/N', '2004', 'N/A', 'Informatica'),
(69, 'enero', '', '2020-01-31', '', '15:14:13', 'SIXI', '9', '3', 'S/N', '1000', 'N/A', ''),
(70, 'enero', '', '2020-01-28', '', '09:07:33', 'KVCE21', '9', '3', 'S/N', '1000', 'N/A', 'Informatica'),
(71, 'enero', '', '2020-01-28', '', '10:15:27', 'CHFE83', '5', '2', 'S/N', '1000', 'N/A', 'Informatica'),
(72, 'enero', '', '2020-01-29', '', '08:48:14', 'WEWE89', '1', '2', 'S/N', '1000', 'N/A', ''),
(73, 'enero', '', '2020-01-29', '', '17:36:46', 'NH5193', '15', '2', '3812838121293', '2013', 'N/A', ''),
(74, 'enero', '', '2020-01-29', '', '17:44:08', 'KKEE03', '15', '2', 'S/N', '2003', 'N/A', '3'),
(75, 'enero', '', '2020-01-29', '', '17:45:03', 'NEWE', '5', '4', 'S/N', '2013', 'N/A', 'usuario1'),
(76, 'febrero', '', '2020-02-04', '', '17:02:34', 'CGPB49', '10', '2', 'S/N', '2042', 'N/A', 'usuario2'),
(77, 'febrero', '', '2020-02-04', '', '17:03:13', 'WEPE12', '3', '3', '3812838121293', '2000', 'Falla Puerta lateral', 'usuario2'),
(78, 'febrero', '', '2020-02-05', '', '09:22:11', 'NCGG12', '7', '2', '3812838121293', '10G0', 'N/A', 'usuario1'),
(79, 'febrero', '', '2020-02-05', '', '17:52:44', 'HPHP12', '8', '3', 'S/N', '2030', 'Sin inconveniente', 'usuario1'),
(80, 'febrero', '', '2020-02-05', '', '17:59:03', 'VUVU12', '8', '2', 'S/N', '2025', 'N/A', 'usuario1'),
(81, 'febrero', '', '2020-02-07', '', '13:36:12', 'FFXV', '14', '3', '3812838121293', '2015', 'N/A', 'usuario1'),
(82, 'febrero', '', '2020-02-10', '', '09:14:35', 'HHEE12', '2', '2', 'S/N', '0', 'N/A', 'usuario1'),
(83, 'febrero', '', '2020-02-10', '', '09:15:11', 'HHEE12', '2', '2', 'S/N', '0', 'N/A', 'usuario1'),
(84, 'febrero', '', '2020-02-10', '', '09:17:58', 'ASDF12', '7', '2', 'S/N', '0', 'N/A', 'usuario1'),
(85, 'febrero', '', '2020-02-10', '', '09:18:36', 'ASDF12', '7', '2', 'S/N', '0', 'N/A', 'usuario1'),
(86, 'febrero', '', '2020-02-10', '', '09:19:08', 'QWER12', '6', '2', '3812838121293', '10G0', 'N/A', 'usuario1'),
(87, 'febrero', '', '2020-02-10', '', '09:20:16', 'FFIV07', '17', '2', '3812838121293', '2026', 'N/A', 'usuario1'),
(88, 'febrero', '', '2020-02-10', '', '09:21:10', 'NH5193', '9', '2', 'RG43REWWER32', '0', 'N/A', 'usuario1'),
(89, 'febrero', '', '2020-02-10', '', '09:22:08', 'RTYU32', '6', '2', 'S/N', '2002', 'N/A', 'usuario1'),
(90, 'febrero', '', '2020-02-10', '', '09:22:39', 'QWER12', '1', '2', 'S/N', '10G0', 'N/A', 'usuario1'),
(91, 'febrero', '', '2020-02-10', '', '09:23:11', 'NH5193', '2', '2', 'S/N', '10G0', 'N/A', 'usuario1'),
(92, 'febrero', '', '2020-02-10', '', '09:24:49', 'CVBN65', '19', '2', '', '0', '', 'usuario1'),
(93, 'febrero', '', '2020-02-10', '', '09:41:33', 'HHEE12', '5', '2', 'RG43REWWER32', '2003', 'N/A', 'usuario1'),
(94, 'febrero', '', '2020-02-11', '', '11:58:05', 'TEST12', '1', '1', 'S/N', '1000', 'N/A', 'usuario1'),
(95, 'febrero', '', '2020-02-12', '', '14:40:07', 'HSKT99', '18', '2', 'S/N', '2022', 'N/A', 'usuario2'),
(96, 'febrero', '', '2020-02-12', '', '23:37:48', 'DPNL88', '4', '2', 'SKU-345603M', '2000', 'SITIO 8', 'usuario1'),
(97, 'febrero', '', '2020-02-13', '', '11:35:02', 'YS7708', '9', '2', '', '1000', '', 'usuario1'),
(98, 'febrero', '', '2020-02-13', '', '11:47:45', 'JGFL51', '6', '4', '', '1000', '', 'usuario1'),
(99, 'febrero', '', '2020-02-13', '', '12:19:39', 'FTDK22', '5', '2', 'N/A', '1000', 'N/A', 'usuario1'),
(100, 'febrero', '', '2020-02-13', '', '12:39:13', 'NH5193', '6', '2', 'N/A', '0', 'N/A', 'usuario1'),
(101, 'febrero', '', '2020-02-13', '', '16:27:16', 'DPVD88', '1', '2', 'N/A', '0', 'N/A', 'usuario1'),
(102, 'febrero', '', '2020-02-13', '', '17:36:31', 'HTLM16', '1', '2', 'N/A', '0', 'N/A', 'usuario1'),
(103, 'febrero', '', '2020-02-17', '', '13:11:24', 'LRDY63', '15', '1', 'N/A', '0', 'N/A', 'usuario1'),
(104, 'febrero', '', '2020-02-17', '', '14:25:33', 'ZV3329', '2', '4', 'N/A', '0', 'N/A', 'usuario1'),
(105, 'febrero', '', '2020-02-19', '', '14:24:18', 'POLO12', '1', '2', 'N/A', '0', 'N/A', 'Ig.rodriguezl'),
(106, 'febrero', '', '2020-02-19', '', '14:40:47', 'CZD623', '2', '2', 'N/A', '0', 'N/A', 'usuario1'),
(107, 'febrero', '', '2020-02-19', '', '15:06:14', 'GDVS38', '4', '2', '3812838121293', '2015', 'N/A', 'usuario1'),
(108, 'febrero', '', '2020-02-19', '', '15:18:47', 'YU3826', '9', '2', 'N/A', '1000', 'N/A', 'usuario1'),
(109, 'febrero', '', '2020-02-19', '', '15:27:42', 'POLO12', '3', '3', 'N/A', '1000', 'N/A', 'usuario1'),
(110, 'febrero', '', '2020-02-19', '', '16:15:36', 'WEHO43', '2', '2', 'N/A', '1000', 'N/A', 'Ig.rodriguezl'),
(111, 'febrero', '', '2020-02-19', '', '16:23:25', 'DRHZ28', '2', '2', 'N/A', '1000', 'N/A', 'Ig.rodriguezl'),
(112, 'febrero', '', '2020-02-20', '', '15:54:16', 'WF7218', '2', '3', 'N/A', '1000', 'N/A', 'usuario1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iso_codes`
--

CREATE TABLE `iso_codes` (
  `isocode` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `largo` int(10) NOT NULL,
  `medida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `iso_codes`
--

INSERT INTO `iso_codes` (`isocode`, `descrip`, `largo`, `medida`) VALUES
('1000', 'Ninguno', 0, 0),
('10G0', '10G0 Ten foot containers', 10, 9),
('12G0', '12G0 General purpose container without', 10, 9),
('2000', '2000 General purpose, Opening(s) at one', 20, 8),
('2001', '2001 General purpose, Opening(s) at one', 20, 8),
('2002', '2002 General purpose, Opening(s) at one', 20, 8),
('2003', '2003 General purpose, Opening(s) at one', 20, 8),
('2004', '2004 General purpose, Opening(s) at one', 20, 8),
('2010', '2010 Closed, Vented, Passive vents at up', 20, 8),
('2011', '2011 Closed, Vented, Passive vents at up', 20, 8),
('2013', '2013 Closed, Ventilated, Non mechanical', 20, 8),
('2015', '2015 Closed, Ventilated, Mechanical vent', 20, 8),
('2020', '2020 Closed, Ventilated, Mechanical vent', 20, 8),
('2021', '2021 Dry bulk, Non-pressurized, Box type', 20, 8),
('2022', '2022 Dry bulk, Non-pressurized, Box type', 20, 8),
('2025', '2025 Named cargo, Livestock carrier', 20, 8),
('2026', '2026 Named cargo, Automobile carrier', 20, 8),
('2030', '2030 Thermal, Refrigerated, Expendable r', 20, 8),
('2031', '2031 Thermal, Mechanically refrigerated', 20, 8),
('2032', '2032 Thermal, Refrigerated and heated', 20, 8),
('2040', '2040 Thermal, Refrigerated and/or heated', 20, 8),
('2041', '2041 Thermal, Refrigerated and/or heated', 20, 8),
('2042', '2042 Thermal, Refrigerated and/or heated', 20, 8),
('2050', '2050 Open top, Opening(s) at one or both', 20, 8),
('3004', '3004 General purpose, Opening(s) at one', 30, 8),
('3066', '3066 Platform with complete superstructu', 30, 8),
('3078', '3078 Tank, Dangerous gases, test pressur', 30, 8),
('3080', '3080 Dry bulk, Non pressurized, hopper t', 30, 8),
('3098', '3098 Mafi Extra Large 30FT', 30, 3),
('3099', '3099 Standard Mafi 30FT', 30, 3),
('3CB1', '3CB1 Dry bulk, Non pressurized, box type', 30, 9),
('3CBU', '3CBU Dry bulk container, Non', 30, 9),
('3DB0', '3DB0 Dry bulk, Non pressurized, box type', 30, 9),
('3DB1', '3DB1 Dry bulk, Non pressurized, box type', 30, 9),
('3MB0', '3MB0 Dry bulk, Non pressurized, box type', 30, 9),
('4000', '4000 General purpose, Opening(s) at one', 40, 8),
('4060', '4060 Platform with complete superstructu', 40, 8),
('4066', '4066 Platform with complete superstructu', 40, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedencias`
--

CREATE TABLE `procedencias` (
  `idProcedencia` int(11) NOT NULL,
  `Procedencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `procedencias`
--

INSERT INTO `procedencias` (`idProcedencia`, `Procedencia`) VALUES
(1, 'Intraterminal'),
(2, 'SIZEAL'),
(3, 'Otro'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `idRol` int(5) NOT NULL,
  `rol` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`idRol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Operador'),
(3, 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idSalida` int(11) NOT NULL,
  `Mes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Patente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Operacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Faena` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Iso_Code` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Contenedor` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Consignatario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numBL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Bulto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Guia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Folio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Turno` int(3) NOT NULL,
  `Empleado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idIngreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`idSalida`, `Mes`, `Fecha`, `Hora`, `Patente`, `Tipo_Operacion`, `Faena`, `Iso_Code`, `Contenedor`, `Consignatario`, `Observacion`, `numBL`, `Tipo_Bulto`, `Cantidad`, `Guia`, `Folio`, `Turno`, `Empleado`, `idIngreso`) VALUES
(1, '', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', 0, '', '', 0, '', 0),
(2, 'December', '2019-12-30', '15:19:40', '', '1', '1', '10G0', '', '3', '', '', '1', 0, '', '', 0, 'asantis', 0),
(3, 'December', '2019-12-30', '15:20:36', 'prueba3', '1', '11', '2010', 'chku 12345563 7', '8', 'sdd', 'M/ASGFD123', '3', 2, '123', 'AF1234', 0, 'asantis', 0),
(4, 'December', '2019-12-30', '15:42:28', 'ASDF21', '4', '3', '2000', 'chku 12345563 7', '5', 'CONTENEDOR RIFFER', 'M/ASGFD123', '1', 2, '102', 'AF1234', 0, 'asantis', 0),
(5, 'December', '2019-12-30', '15:48:23', 'prueba3', '9', '8', '2004', 'chku 12345563 7', '1', 'sdd', 'M/ASGFD123', '3', 2, '102', 'AF1234', 0, 'asantis', 0),
(6, 'December', '2019-12-30', '15:59:45', 'prueba3', '0', '0', '0', 'chku 12345563 7', '4', '', 'M/ASGFD123', '1', 2, '102', 'AF1234', 0, 'asantis', 0),
(7, 'diciembre', '2019-12-30', '18:08:18', 'UD6473', '2', '2', '2000', 'chku 12345563 7', '4', 'CONTENEDOR RIFFER', 'M/BHJLLLL12', '1', 2, '1234', 'AS123', 0, 'asantis', 0),
(8, 'diciembre', '2019-12-30', '18:29:46', 'UD6473', '2', '5', '2004', 'chku 12345563 7', '4', 'CONTENEDOR RIFFER', 'M/BHJLLLL12', '3', 2, '1234', 'AS123', 0, 'informatica', 0),
(9, 'diciembre', '2019-12-30', '18:40:15', 'TAHK34', '2', '1', '2000', 'S/N', '7', 'SITIO 7', 'M/BHJLLLL12', '1', 2, 'TC12345', '123456', 0, 'informatica', 0),
(10, 'enero', '2020-01-08', '23:22:21', 'CKCB63', '2', '1', '1000', 'S/N', '3', 'CONTENEDOR RIFFER', 'M/ASGFD123', '1', 3, 'TC12345', 'AF1234', 0, 'asantis', 0),
(11, 'enero', '2020-01-09', '12:07:46', 'MMSA21', '8', '1', '1000', 'S/N', '1', 'SITIO 8', 'M/BHJLLLL12', '3', 2, 'TC12345', 'AF1234', 0, 'informatica', 0),
(12, 'enero', '2020-01-09', '21:00:10', 'CKCB63', '4', '1', '1000', 'S/N', '1', 'ISLA DE PASCUA', 'MF/123456', '1', 2, 'TC54321', '23A', 0, 'asantis', 0),
(13, 'enero', '2020-01-10', '17:44:33', 'CVCJ23', '4', '7', '1000', 'S/N', '1', 'ISLA DE PASCUA', 'BL-M12345', '2', 10, 'TC2341', 'FTCV087', 0, 'asantis', 0),
(14, 'enero', '2020-01-10', '20:58:19', 'UDSA12', '4', '7', '1000', 'S/N', '1', 'ISLA DE PASCUA', 'BL-M3456', '2', 12, 'TC-G123', 'TC-F567', 0, 'asantis', 0),
(15, 'enero', '2020-01-10', '21:34:41', 'CFDR23', '4', '7', '1000', 'S/N', '1', 'ISLA DE PASCA', 'BL/123', '2', 12, 'GU-123', 'FL123', 0, 'asantis', 0),
(16, 'enero', '2020-01-13', '10:16:57', 'QWER12', '4', '7', '1000', 'S/N', '1', 'ISLA DE PASCUA', 'BL-M2354', '2', 12, 'GTC43', 'FTC324', 0, 'asantis', 0),
(17, 'enero', '2020-01-22', '15:51:33', 'FFXV', '14', '6', '1000', 'S/N', '1', '', 'BLDJSDW/4343', '1', 5, '32124531', 'FL3321', 0, 'Informatica', 0),
(18, 'enero', '2020-01-22', '15:53:08', 'DSKU32', '4', '2', '10G0', 'S/N', '5', '', 'BLDJSDW/4343', '2', 5, '32124531', '', 0, 'Informatica', 0),
(19, 'ENERO', '2020-01-23', '17:57:00', 'SAMM', '2', '4', '1000', '2000', '2', 'ASD', '23124132312', '1', 4, '1234', 'FO1234', 0, 'Informatica', 0),
(109, 'enero', '2020-01-23', '19:00:31', 'SAMI12', '6', '4', '1000', 'S/N', '5', 'N/A', 'BLDJSDW/4343', '1', 5, '32124531', 'FL3321', 0, 'Informatica', 58),
(110, 'enero', '2020-01-24', '10:54:31', 'TEXE78', '6', '5', '2000', 'S/N', '6', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'Informatica', 63),
(111, 'enero', '2020-01-24', '13:05:52', 'TCVA12', '1', '6', '1000', 'S/N', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'Informatica', 64),
(112, 'enero', '2020-01-24', '13:42:37', 'XPLD22', '13', '11', '2010', '3812838121293', '4', 'N/A', 'BLDJSDW/4343', '2', 5, '32124531', 'FL3321', 0, 'Informatica', 65),
(113, 'enero', '2020-01-26', '13:45:21', 'MOMO90', '5', '1', '10G0', 'S/N', '3', 'N/A', 'BLDJSDW/4343', '1', 5, '32124531', '', 0, 'Informatica', 66),
(114, 'enero', '2020-01-31', '09:12:34', 'WEWE89', '16', '5', '1000', 'S/N', '5', 'N/A', 'BLDJSDW/4343', '1', 5, '32124531', 'FL3321', 0, 'Informatica', 67),
(115, 'enero', '2020-01-27', '15:16:48', 'RERE21', '5', '3', '1000', 'S/N', '7', 'N/A', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, '', 68),
(116, 'enero', '2020-01-28', '10:05:04', 'KCKB63', '12', '8', '1000', 'S/N', '9', '', 'BLDJSDW/4343', '1', 2, '32124531', 'FL3321', 0, 'Informatica', 34),
(117, 'enero', '2020-01-28', '10:08:25', 'KVCE21', '8', '8', '10G0', '3812838121293', '3', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'Informatica', 70),
(118, 'enero', '2020-01-29', '08:49:12', 'WEWE89', '1', '1', '10G0', 'S/N', '5', 'N/A', 'BLDJSDW/4343', '1', 1, '32124531', 'FL3321', 0, '', 72),
(119, 'enero', '2020-01-29', '14:53:30', 'SAFE', '6', '6', '2015', 'S/N', '8', 'N/A', 'BLDJSDW/4343', '3', 1, '32124531', 'FL3321', 0, '', 60),
(120, 'febrero', '2020-02-03', '17:52:30', 'UDJU12', '5', '5', '2002', 'S/N', '4', '', 'BLDJSDW/4343', '2', 1, '32124531', 'FL3321', 0, 'usuario1', 47),
(123, 'febrero', '2020-02-04', '17:21:08', 'NH5193', '0', '0', '0', '', '0', '', '', '0', 0, '', '', 0, 'usuario2', 73),
(124, 'febrero', '2020-02-04', '17:24:03', 'WEPE12', '0', '0', '0', '', '0', '', '', '', 0, '', '', 0, 'usuario2', 77),
(125, 'febrero', '2020-02-04', '18:02:11', 'CGPB49', '2', '4', '2002', 'S/N', '7', 'N/A', 'BLDJSDW/4343', '2', 3, '32124531', 'FL3321', 0, 'usuario2', 76),
(126, 'febrero', '2020-02-05', '09:23:21', 'NCGG12', '1', '6', '2003', '3812838121293', '9', 'N/A', 'BLDJSDW/4343', '1', 1, '32124531', 'FL3321', 0, 'usuario1', 78),
(127, 'febrero', '2020-02-05', '09:31:11', '0', '0', '0', '0', '', '0', '', '', '0', 0, '', '', 0, 'usuario1', 0),
(128, 'febrero', '2020-02-05', '09:31:32', 'CHFE83', '3', '5', '2003', 'S/N', '4', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 0),
(129, 'febrero', '2020-02-05', '12:55:02', '0', '0', '0', '0', '', '0', '', '', '0', 0, '', '', 0, 'usuario1', 0),
(130, 'febrero', '2020-02-05', '17:14:18', 'CHFE83', '4', '5', '2000', 'S/N', '4', 'N/A', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, 'usuario1', 71),
(131, 'febrero', '2020-02-05', '18:51:24', 'CHFE83', '4', '5', '2000', 'S/N', '4', 'N/A', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, 'usuario1', 71),
(141, 'febrero', '2020-02-05', '19:35:47', 'SIXI', '2', '1', '12G0', 'S/N', '5', 'Huele mal', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 0),
(143, 'febrero', '2020-02-05', '19:39:12', 'KKEE03', '5', '3', '2001', '3812838121293', '4', 'N/A', 'BLDJSDW/4343', '2', 2, '32124531', 'FL3321', 0, 'usuario1', 74),
(144, 'febrero', '2020-02-05', '20:04:37', 'NEWE', '3', '6', '2010', '3812838121293', '6', 'S/N', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, 'usuario1', 0),
(145, 'febrero', '2020-02-05', '20:04:52', 'NEWE', '3', '6', '2010', '3812838121293', '6', 'S/N', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, 'usuario1', 0),
(146, 'febrero', '2020-02-05', '20:07:07', 'NEWE', '5', '3', '2001', 'S/N', '5', 'N/A', 'BLDJSDW/4343', '1', 5, '32124531', 'FL3321', 0, 'usuario1', 0),
(147, 'febrero', '2020-02-05', '20:08:13', 'NEWE', '3', '2', '2000', '3812838121293', '3', 'N/A', 'BLDJSDW/4343', '2', 2, '32124531', 'FL3321', 0, 'usuario1', 75),
(148, 'febrero', '2020-02-05', '20:14:16', 'LOMI41', '4', '3', '2000', 'S/N', '3', 'S/N', 'BLDJSDW/4343', '1', 5, '32124531', 'FL3321', 0, 'usuario1', 61),
(149, 'febrero', '2020-02-05', '20:18:17', 'WAXI89', '2', '2', '12G0', 'S/N', '3', 'N/A', 'BLDJSDW/4343', '3', 2, '32124531', 'FL3321', 0, 'usuario1', 62),
(150, 'febrero', '2020-02-05', '20:47:18', 'FFXV', '3', '3', '2001', 'S/N', '4', 'N/A', 'BLDJSDW/4343', '2', 2, '32124531', 'FL3321', 0, 'usuario1', 59),
(151, 'febrero', '2020-02-05', '20:48:15', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(152, 'febrero', '2020-02-05', '20:48:50', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(153, 'febrero', '2020-02-05', '20:48:57', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(154, 'febrero', '2020-02-05', '20:49:34', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(155, 'febrero', '2020-02-05', '20:51:53', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(156, 'febrero', '2020-02-05', '20:52:34', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(157, 'febrero', '2020-02-05', '20:52:40', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(158, 'febrero', '2020-02-05', '20:53:03', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(159, 'febrero', '2020-02-05', '20:55:14', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(160, 'febrero', '2020-02-05', '20:58:44', 'XXII', '2', '3', '0', '', '1', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'FL3321', 0, 'usuario1', 54),
(161, 'febrero', '2020-02-10', '13:30:34', 'NH5193', '4', '10', '0', 'S/N', '9', 'N/A', 'BLDJSDW/4343', '3', 1, '32124531', 'FL3321', 0, 'usuario1', 88),
(162, 'febrero', '2020-02-10', '13:36:57', 'NH5193', '18', '4', '0', 'S/N', '1', 'N/A', 'QWEEWRE23421', '2', 20, 'FRFR32334', 'QWER23123QWE', 0, 'usuario1', 91),
(163, 'febrero', '2020-02-10', '13:42:43', 'HHEE12', '18', '7', '3066', 'RG43REWWER32', '5', 'N/A', 'QWEEWRE23421', '2', 5, 'FRFR32334', 'QWER23123QWE', 0, 'usuario1', 93),
(164, 'febrero', '2020-02-12', '14:40:55', 'HSKT99', '7', '9', '2010', 'S/N', '6', 'N/A', 'QWEEWRE23421', '3', 5, 'FRFR32334', 'FL3321', 0, 'usuario2', 95),
(165, 'febrero', '2020-02-13', '15:31:27', 'JGFL51', '7', '7', '2003', 'S/N', '6', 'N/A', 'QWEEWRE23421', '2', 1, '32124531', 'QWER23123QWE', 0, 'usuario1', 98),
(166, 'febrero', '2020-02-17', '13:12:33', 'LRDY63', '3', '4', '0', 'N/A', '6', 'N/A', 'QWEEWRE23421', '2', 2, '32124531', 'QWER23123QWE', 0, 'usuario1', 103),
(167, 'febrero', '2020-02-17', '14:26:07', 'ZV3329', '8', '4', 'N/A', 'N/A', '6', 'N/A', 'QWEEWRE23421', '2', 2, '32124531', 'QWER23123QWE', 0, 'usuario1', 104),
(168, 'febrero', '2020-02-17', '14:27:28', 'ZV3329', '8', '4', '0', 'N/A', '6', 'N/A', 'QWEEWRE23421', '2', 2, '32124531', 'QWER23123QWE', 0, 'usuario1', 104),
(169, 'febrero', '2020-02-18', '16:56:46', 'HTLM16', '4', '8', 'N/A', 'N/A', '6', 'N/A', 'BLDJSDW/4343', '2', 5, 'FRFR32334', 'FL3321', 0, 'usuario2', 102),
(170, 'febrero', '2020-02-19', '11:41:18', 'DPVD88', '19', '7', 'N/A', 'N/A', '4', 'N/A', 'BLDJSDW/4343', '2', 2, '32124531', 'FL3321', 0, 'usuario1', 101),
(171, 'febrero', '2020-02-19', '11:42:07', 'NH5193', '7', '4', '0', 'S/N', '9', 'Sin inconveniente', 'QWEEWRE23421', '1', 5, 'FRFR32334', 'FL3321', 0, 'usuario1', 100),
(172, 'febrero', '2020-02-19', '11:45:25', 'FTDK22', '14', '5', 'N/A', 'S/N', '5', 'N/A', 'BLDJSDW/4343', '2', 2, '32124531', 'FL3321', 0, 'usuario1', 99),
(173, 'febrero', '2020-02-19', '12:35:37', 'YS7708', '8', '3', '1000', 'S/N', '5', 'Sin inconveniente', 'QWEEWRE23421', '3', 2, '32124531', 'FL3321', 0, 'usuario2', 97),
(174, 'febrero', '2020-02-19', '15:26:14', 'POLO12', '2', '6', '1000', 'N/A', '3', 'N/A', 'BLDJSDW/4343', '3', 5, '32124531', 'QWER23123QWE', 0, 'usuario1', 105),
(175, 'febrero', '2020-02-19', '15:30:25', 'POLO12', '5', '5', '3004', 'S/N', '1', 'N/A', 'QWEEWRE23421', '1', 5, '32124531', 'FL3321', 0, 'Ig.rodriguezl', 109),
(176, 'febrero', '2020-02-20', '15:59:09', 'WF7218', '6', '6', '1000', 'N/A', '3', 'N/A', 'QWEEWRE23421', '2', 5, '32124531', 'QWER23123QWE', 0, 'usuario1', 112),
(177, 'febrero', '2020-02-21', '13:04:20', 'DRHZ28', '2', '1', '1000', 'S/N', '3', 'N/A', 'QWEEWRE23421', '2', 15, 'FRFR32334', 'FL3321', 0, 'usuario1', 111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bultos`
--

CREATE TABLE `tipo_bultos` (
  `idBulto` int(11) NOT NULL,
  `bulto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_bultos`
--

INSERT INTO `tipo_bultos` (`idBulto`, `bulto`) VALUES
(1, 'BOBINAS'),
(2, 'PLANCHAS'),
(3, 'COBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

CREATE TABLE `tipo_operacion` (
  `idOperacion` int(11) NOT NULL,
  `operacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_operacion`
--

INSERT INTO `tipo_operacion` (`idOperacion`, `operacion`) VALUES
(1, 'Aprovicionamiento'),
(2, 'Auto-Camioneta'),
(3, 'Break Bulk'),
(4, 'Cabotaje'),
(5, 'Camion Vacio'),
(6, 'Camion Vacio Retiro de Basura'),
(7, 'Choco'),
(8, 'Cobre'),
(9, 'CTR Full'),
(10, 'CTR Full IMO TPSV'),
(11, 'CTR MTY'),
(12, 'CTR MTY IMO TPSV'),
(13, 'OTROS'),
(14, 'Rampla Vacia'),
(15, 'Rancho'),
(16, 'Sin Movimiento'),
(17, 'Sobredimension'),
(18, 'Sobredimension TPSV'),
(19, 'Termo Full');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `idRol`) VALUES
(1, 'Alejandro', 'Santis', 'asantis', '123456', 1),
(2, 'Informatica', 'TCVAL', 'informatica', '123456', 1),
(3, 'usuario1', 'usuario1', 'usuario1', '123', 1),
(4, 'usuario2', 'usuario2', 'usuario2', '123', 2),
(5, 'usuario3', 'usuario3', 'usuario3', '123', 3),
(19, 'Ignacio', 'Rodriguez', 'Ig.rodriguezl', 'tcval123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consignatarios`
--
ALTER TABLE `consignatarios`
  ADD PRIMARY KEY (`idConsignatario`);

--
-- Indices de la tabla `control_carguio`
--
ALTER TABLE `control_carguio`
  ADD PRIMARY KEY (`IdControl`);

--
-- Indices de la tabla `faenas`
--
ALTER TABLE `faenas`
  ADD PRIMARY KEY (`idfaena`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`idIngreso`);

--
-- Indices de la tabla `iso_codes`
--
ALTER TABLE `iso_codes`
  ADD PRIMARY KEY (`isocode`);

--
-- Indices de la tabla `procedencias`
--
ALTER TABLE `procedencias`
  ADD PRIMARY KEY (`idProcedencia`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `FK_INGRESOS` (`idIngreso`) USING BTREE;

--
-- Indices de la tabla `tipo_bultos`
--
ALTER TABLE `tipo_bultos`
  ADD PRIMARY KEY (`idBulto`);

--
-- Indices de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`idOperacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `Fk_rol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consignatarios`
--
ALTER TABLE `consignatarios`
  MODIFY `idConsignatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `control_carguio`
--
ALTER TABLE `control_carguio`
  MODIFY `IdControl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `faenas`
--
ALTER TABLE `faenas`
  MODIFY `idfaena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `idIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT de la tabla `procedencias`
--
ALTER TABLE `procedencias`
  MODIFY `idProcedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT de la tabla `tipo_bultos`
--
ALTER TABLE `tipo_bultos`
  MODIFY `idBulto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  MODIFY `idOperacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
