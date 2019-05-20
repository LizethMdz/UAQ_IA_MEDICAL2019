-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2019 a las 15:05:48
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `illnesses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `idenfermedades` int(11) NOT NULL,
  `nombenf` varchar(250) DEFAULT NULL,
  `origenenf` varchar(500) NOT NULL,
  `imgenf` varchar(250) DEFAULT NULL,
  `tratamientos_idtratamientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`idenfermedades`, `nombenf`, `origenenf`, `imgenf`, `tratamientos_idtratamientos`) VALUES
(1, 'Salmonelosis', 'Está causada por bacterias que pueden desencadenar una salmonelosis en el ser humano (salmonella enteritis), una enfermedad con diarrea infecciosa que está limitada al tracto intestinal (enteritis, infección del intestino).', 'salmonelosis.jpg', 1),
(2, 'Apendicitis', 'Es la infección bacteriana del apéndice vermiforme ( apéndice con forma de gusano) situado en el extremo inferior del colon derecho, muy cerca de la unión con el intestino delgado.', 'apendicitis.jpeg', 2),
(3, 'Cancer Gastrico', 'Es un crecimiento descontrolado de las células que cubren la superficie interna del estómago. Estas células pueden invadir el resto de la pared gástrica y luego diseminarse a otros órganos o sistemas (ganglios linfáticos, hígado, peritoneo o pulmón).', 'cancerg.jpg', 3),
(4, 'Parasitosis', 'Están involucrados los problemas digestivos: mal aliento, apetito inestable, constipación, diarreas, acidez, cuadros apendiculares o vesiculares, gastroenteritis, etc. Las toxinas parasitarias provocan un bloqueo de la absorción de los alimentos a nivel de la mucosa intestinal, que genera, en muchos casos, la delgadez de muchos parasitados. Un hecho curioso que presentan casi todos los parasitados es la intolerancia alimenticia denominada discontinua: “Hoy sí, mañana no”\r\n', 'parasitosis.jpg', 4),
(5, 'Diarrea', 'La diarrea no constituye una enfermedad en sí, sino el síntoma de una infección del tracto gastrointestinal por virus, bacterias o parásitos. Los agentes patógenos llegan al sistema digestivo por medio de alimentos o agua potable contaminados. Si la diarrea es la única molestia, suele ser inofensiva', 'diarrea.jpg', 5),
(6, 'Dispepsia', 'Es un trastorno frecuente del estómago que se caracteriza principalmente por la presencia de molestias en la parte superior del abdomen. Suele manifestarse con pesadez, presión, ardor de estómago, gases, náuseas o vómitos.', 'dispepsia.jpg', 6),
(7, 'Gastritis', 'Es una patología muy común, que se define como una inflamación de la mucosa gástrica. Se distingue una forma crónica y una forma aguda que puede cursar con o sin síntomas y cuya diferencia fundamental es el tiempo de duración del trastorno. Las gastritis se producen con mayor frecuencia en pacientes con edades avanzadas. Las causas pueden ser muy variadas.', 'gastritis.jpg', 7),
(8, 'Gastroenteritis', 'Es una inflamación del tracto intestinal (estómago e intestino) que suele cursar con diarrea y vómitos. Suele estar provocada por una infección, la ingesta de un alimento en mal estado o incluso por el estrés. Es un problema muy común que afecta especialmente durante la infancia.', 'gastroenteritis.jpg', 8),
(9, 'Intolerancia a la lactosa', 'Se manifiesta cuando el organismo reacciona de forma patológica ante el azúcar de la leche. En estos casos, el cuerpo no puede digerir la glucosa de la leche (lactosa). La intolerancia a la lactosa se conoce también como intolerancia a productos lácteos.', 'lactosa.jpg', 9),
(10, 'Intolerancia al Gluten', 'Es una intolerancia permanente del organismo al gluten, que provoca una reacción inmunológica en el intestino, provocando daño severo en el intestino, su inflamación crónica y la desaparición de microvellosidades intestinales. El gluten es una proteína que está presente en el grano del centeno, el trigo, la cebada, el kamut, el triticale y la espelta.', 'celiaquia.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades_has_sintomas`
--

CREATE TABLE `enfermedades_has_sintomas` (
  `id_enf_sint` int(11) NOT NULL,
  `sintomas_idsintomas` int(11) NOT NULL,
  `enfermedades_idenfermedades` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedades_has_sintomas`
--

INSERT INTO `enfermedades_has_sintomas` (`id_enf_sint`, `sintomas_idsintomas`, `enfermedades_idenfermedades`, `valor`) VALUES
(1, 1, 1, '0.00'),
(2, 2, 1, '0.10'),
(3, 3, 1, '0.50'),
(4, 4, 1, '0.70'),
(5, 5, 1, '0.00'),
(6, 6, 1, '0.40'),
(7, 7, 1, '0.60'),
(8, 8, 1, '0.85'),
(9, 9, 1, '0.70'),
(10, 10, 1, '0.80'),
(11, 11, 1, '0.00'),
(12, 12, 1, '0.00'),
(13, 13, 1, '0.00'),
(14, 14, 1, '0.50'),
(15, 15, 1, '0.00'),
(16, 16, 1, '0.00'),
(17, 17, 1, '0.00'),
(18, 18, 1, '0.70'),
(19, 19, 1, '0.00'),
(20, 20, 1, '0.00'),
(21, 21, 1, '0.60'),
(22, 22, 1, '0.00'),
(23, 23, 1, '0.00'),
(24, 24, 1, '0.00'),
(25, 25, 1, '0.00'),
(26, 26, 1, '0.00'),
(27, 27, 1, '0.00'),
(28, 28, 1, '0.00'),
(29, 29, 1, '0.00'),
(30, 30, 1, '0.00'),
(31, 31, 1, '0.00'),
(32, 32, 1, '0.00'),
(33, 33, 1, '0.00'),
(34, 34, 1, '0.00'),
(35, 35, 1, '0.00'),
(36, 36, 1, '0.00'),
(37, 37, 1, '0.00'),
(38, 38, 1, '0.00'),
(39, 1, 2, '0.00'),
(40, 2, 2, '0.10'),
(41, 3, 2, '0.00'),
(42, 4, 2, '0.65'),
(43, 5, 2, '0.90'),
(44, 6, 2, '0.50'),
(45, 7, 2, '0.00'),
(46, 8, 2, '0.00'),
(47, 9, 2, '0.65'),
(48, 10, 2, '0.85'),
(49, 11, 2, '0.00'),
(50, 12, 2, '0.00'),
(51, 13, 2, '0.50'),
(52, 14, 2, '0.60'),
(53, 15, 2, '0.00'),
(54, 16, 2, '0.00'),
(55, 17, 2, '0.00'),
(56, 18, 2, '0.00'),
(57, 19, 2, '0.00'),
(58, 20, 2, '0.00'),
(59, 21, 2, '0.00'),
(60, 22, 2, '0.60'),
(61, 23, 2, '0.00'),
(62, 24, 2, '0.00'),
(63, 25, 2, '0.00'),
(64, 26, 2, '0.00'),
(65, 27, 2, '0.00'),
(66, 28, 2, '0.00'),
(67, 29, 2, '0.00'),
(68, 30, 2, '0.00'),
(69, 31, 2, '0.50'),
(70, 32, 2, '0.00'),
(71, 33, 2, '0.00'),
(72, 34, 2, '0.00'),
(73, 35, 2, '0.00'),
(74, 36, 2, '0.00'),
(75, 37, 2, '0.00'),
(76, 38, 2, '0.00'),
(77, 1, 3, '0.50'),
(78, 2, 3, '0.10'),
(79, 3, 3, '0.70'),
(80, 4, 3, '0.00'),
(81, 5, 3, '0.95'),
(82, 6, 3, '0.70'),
(83, 7, 3, '0.00'),
(84, 8, 3, '0.00'),
(85, 9, 3, '0.00'),
(86, 10, 3, '0.00'),
(87, 11, 3, '0.00'),
(88, 12, 3, '0.90'),
(89, 13, 3, '0.00'),
(90, 14, 3, '0.00'),
(91, 15, 3, '0.00'),
(92, 16, 3, '0.00'),
(93, 17, 3, '0.00'),
(94, 18, 3, '0.00'),
(95, 19, 3, '0.00'),
(96, 20, 3, '0.80'),
(97, 21, 3, '0.90'),
(98, 22, 3, '0.00'),
(99, 23, 3, '0.00'),
(100, 24, 3, '0.00'),
(101, 25, 3, '0.75'),
(102, 26, 3, '0.70'),
(103, 27, 3, '0.00'),
(104, 28, 3, '0.00'),
(105, 29, 3, '0.70'),
(106, 30, 3, '0.00'),
(107, 31, 3, '0.00'),
(108, 32, 3, '0.50'),
(109, 33, 3, '0.65'),
(110, 34, 3, '0.00'),
(111, 35, 3, '0.00'),
(112, 36, 3, '0.00'),
(113, 37, 3, '0.00'),
(114, 38, 3, '0.00'),
(115, 1, 4, '0.00'),
(116, 2, 4, '0.10'),
(117, 3, 4, '0.55'),
(118, 4, 4, '0.00'),
(119, 5, 4, '0.00'),
(120, 6, 4, '0.00'),
(121, 7, 4, '0.50'),
(122, 8, 4, '0.80'),
(123, 9, 4, '0.00'),
(124, 10, 4, '0.00'),
(125, 11, 4, '0.00'),
(126, 12, 4, '0.00'),
(127, 13, 4, '0.00'),
(128, 14, 4, '0.00'),
(129, 15, 4, '0.00'),
(130, 16, 4, '0.00'),
(131, 17, 4, '0.65'),
(132, 18, 4, '0.00'),
(133, 19, 4, '0.00'),
(134, 20, 4, '0.00'),
(135, 21, 4, '0.00'),
(136, 22, 4, '0.00'),
(137, 23, 4, '0.00'),
(138, 24, 4, '0.00'),
(139, 25, 4, '0.00'),
(140, 26, 4, '0.00'),
(141, 27, 4, '0.00'),
(142, 28, 4, '0.00'),
(143, 29, 4, '0.00'),
(144, 30, 4, '0.00'),
(145, 31, 4, '0.00'),
(146, 32, 4, '0.00'),
(147, 33, 4, '0.00'),
(148, 34, 4, '0.60'),
(149, 35, 4, '0.50'),
(150, 36, 4, '0.40'),
(151, 37, 4, '0.55'),
(152, 38, 4, '0.30'),
(153, 1, 5, '0.00'),
(154, 2, 5, '0.10'),
(155, 3, 5, '0.90'),
(156, 4, 5, '0.80'),
(157, 5, 5, '0.70'),
(158, 6, 5, '0.75'),
(159, 7, 5, '0.00'),
(160, 8, 5, '1.00'),
(161, 9, 5, '0.60'),
(162, 10, 5, '0.70'),
(163, 11, 5, '0.70'),
(164, 12, 5, '0.00'),
(165, 13, 5, '0.00'),
(166, 14, 5, '0.00'),
(167, 15, 5, '0.00'),
(168, 16, 5, '0.50'),
(169, 17, 5, '0.70'),
(170, 18, 5, '0.80'),
(171, 19, 5, '0.00'),
(172, 20, 5, '0.00'),
(173, 21, 5, '0.00'),
(174, 22, 5, '0.00'),
(175, 23, 5, '0.00'),
(176, 24, 5, '0.00'),
(177, 25, 5, '0.00'),
(178, 26, 5, '0.00'),
(179, 27, 5, '0.00'),
(180, 28, 5, '0.00'),
(181, 29, 5, '0.00'),
(182, 30, 5, '0.00'),
(183, 31, 5, '0.00'),
(184, 32, 5, '0.00'),
(185, 33, 5, '0.00'),
(186, 34, 5, '0.00'),
(187, 35, 5, '0.00'),
(188, 36, 5, '0.00'),
(189, 37, 5, '0.00'),
(190, 38, 5, '0.00'),
(191, 1, 6, '0.50'),
(192, 2, 6, '0.10'),
(193, 3, 6, '0.00'),
(194, 4, 6, '0.75'),
(195, 5, 6, '0.75'),
(196, 6, 6, '0.00'),
(197, 7, 6, '0.00'),
(198, 8, 6, '0.00'),
(199, 9, 6, '0.00'),
(200, 10, 6, '0.00'),
(201, 11, 6, '0.00'),
(202, 12, 6, '0.60'),
(203, 13, 6, '0.00'),
(204, 14, 6, '0.60'),
(205, 15, 6, '0.50'),
(206, 16, 6, '0.40'),
(207, 17, 6, '0.50'),
(208, 18, 6, '0.00'),
(209, 19, 6, '0.30'),
(210, 20, 6, '0.00'),
(211, 21, 6, '0.00'),
(212, 22, 6, '0.00'),
(213, 23, 6, '0.00'),
(214, 24, 6, '0.00'),
(215, 25, 6, '0.00'),
(216, 26, 6, '0.00'),
(217, 27, 6, '0.00'),
(218, 28, 6, '0.00'),
(219, 29, 6, '0.00'),
(220, 30, 6, '0.00'),
(221, 31, 6, '0.00'),
(222, 32, 6, '0.00'),
(223, 33, 6, '0.00'),
(224, 34, 6, '0.00'),
(225, 35, 6, '0.00'),
(226, 36, 6, '0.00'),
(227, 37, 6, '0.00'),
(228, 38, 6, '0.00'),
(229, 1, 7, '0.00'),
(230, 2, 7, '0.10'),
(231, 3, 7, '0.40'),
(232, 4, 7, '0.60'),
(233, 5, 7, '0.60'),
(234, 6, 7, '0.65'),
(235, 7, 7, '0.60'),
(236, 8, 7, '0.40'),
(237, 9, 7, '0.00'),
(238, 10, 7, '0.00'),
(239, 11, 7, '0.40'),
(240, 12, 7, '0.00'),
(241, 13, 7, '0.00'),
(242, 14, 7, '0.00'),
(243, 15, 7, '0.60'),
(244, 16, 7, '0.00'),
(245, 17, 7, '0.00'),
(246, 18, 7, '0.00'),
(247, 19, 7, '0.00'),
(248, 20, 7, '0.60'),
(249, 21, 7, '0.00'),
(250, 22, 7, '0.00'),
(251, 23, 7, '0.20'),
(252, 24, 7, '0.00'),
(253, 25, 7, '0.00'),
(254, 26, 7, '0.00'),
(255, 27, 7, '0.00'),
(256, 28, 7, '0.40'),
(257, 29, 7, '0.00'),
(258, 30, 7, '0.00'),
(259, 31, 7, '0.00'),
(260, 32, 7, '0.00'),
(261, 33, 7, '0.00'),
(262, 34, 7, '0.00'),
(263, 35, 7, '0.00'),
(264, 36, 7, '0.00'),
(265, 37, 7, '0.00'),
(266, 38, 7, '0.00'),
(267, 1, 8, '0.00'),
(268, 2, 8, '0.10'),
(269, 3, 8, '0.60'),
(270, 4, 8, '0.55'),
(271, 5, 8, '0.00'),
(272, 6, 8, '0.60'),
(273, 7, 8, '0.40'),
(274, 8, 8, '0.45'),
(275, 9, 8, '0.75'),
(276, 10, 8, '0.60'),
(277, 11, 8, '0.00'),
(278, 12, 8, '0.00'),
(279, 13, 8, '0.00'),
(280, 14, 8, '0.00'),
(281, 15, 8, '0.00'),
(282, 16, 8, '0.60'),
(283, 17, 8, '0.00'),
(284, 18, 8, '0.00'),
(285, 19, 8, '0.00'),
(286, 20, 8, '0.00'),
(287, 21, 8, '0.00'),
(288, 22, 8, '0.00'),
(289, 23, 8, '0.00'),
(290, 24, 8, '0.00'),
(291, 25, 8, '0.00'),
(292, 26, 8, '0.00'),
(293, 27, 8, '0.00'),
(294, 28, 8, '0.00'),
(295, 29, 8, '0.00'),
(296, 30, 8, '0.00'),
(297, 31, 8, '0.00'),
(298, 32, 8, '0.00'),
(299, 33, 8, '0.00'),
(300, 34, 8, '0.00'),
(301, 35, 8, '0.00'),
(302, 36, 8, '0.00'),
(303, 37, 8, '0.00'),
(304, 38, 8, '0.00'),
(305, 1, 9, '0.00'),
(306, 2, 9, '0.10'),
(307, 3, 9, '0.75'),
(308, 4, 9, '0.45'),
(309, 5, 9, '0.85'),
(310, 6, 9, '0.00'),
(311, 7, 9, '0.20'),
(312, 8, 9, '0.70'),
(313, 9, 9, '0.00'),
(314, 10, 9, '0.00'),
(315, 11, 9, '0.80'),
(316, 12, 9, '0.40'),
(317, 13, 9, '0.75'),
(318, 14, 9, '0.00'),
(319, 15, 9, '0.00'),
(320, 16, 9, '0.00'),
(321, 17, 9, '0.00'),
(322, 18, 9, '0.00'),
(323, 19, 9, '0.00'),
(324, 20, 9, '0.00'),
(325, 21, 9, '0.00'),
(326, 22, 9, '0.00'),
(327, 23, 9, '0.00'),
(328, 24, 9, '0.00'),
(329, 25, 9, '0.00'),
(330, 26, 9, '0.00'),
(331, 27, 9, '0.00'),
(332, 28, 9, '0.00'),
(333, 29, 9, '0.00'),
(334, 30, 9, '0.00'),
(335, 31, 9, '0.00'),
(336, 32, 9, '0.00'),
(337, 33, 9, '0.00'),
(338, 34, 9, '0.00'),
(339, 35, 9, '0.00'),
(340, 36, 9, '0.00'),
(341, 37, 9, '0.00'),
(342, 38, 9, '0.00'),
(343, 1, 10, '0.00'),
(344, 2, 10, '0.10'),
(345, 3, 10, '0.75'),
(346, 4, 10, '0.00'),
(347, 5, 10, '0.80'),
(348, 6, 10, '0.00'),
(349, 7, 10, '0.25'),
(350, 8, 10, '0.75'),
(351, 9, 10, '0.00'),
(352, 10, 10, '0.00'),
(353, 11, 10, '0.70'),
(354, 12, 10, '0.30'),
(355, 13, 10, '0.70'),
(356, 14, 10, '0.00'),
(357, 15, 10, '0.45'),
(358, 16, 10, '0.00'),
(359, 17, 10, '0.40'),
(360, 18, 10, '0.00'),
(361, 19, 10, '0.00'),
(362, 20, 10, '0.00'),
(363, 21, 10, '0.00'),
(364, 22, 10, '0.00'),
(365, 23, 10, '0.00'),
(366, 24, 10, '0.10'),
(367, 25, 10, '0.00'),
(368, 26, 10, '0.00'),
(369, 27, 10, '0.60'),
(370, 28, 10, '0.00'),
(371, 29, 10, '0.00'),
(372, 30, 10, '0.35'),
(373, 31, 10, '0.00'),
(374, 32, 10, '0.00'),
(375, 33, 10, '0.00'),
(376, 34, 10, '0.00'),
(377, 35, 10, '0.00'),
(378, 36, 10, '0.00'),
(379, 37, 10, '0.00'),
(380, 38, 10, '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `username_medico` varchar(50) NOT NULL,
  `pass_medico` varchar(100) NOT NULL,
  `nom_medico` varchar(100) NOT NULL,
  `status_medico` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `username_medico`, `pass_medico`, `nom_medico`, `status_medico`) VALUES
(1, 'letisosa', '123456', 'Leticia Sosa López', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `idsintomas` int(11) NOT NULL,
  `nombsintoma` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`idsintomas`, `nombsintoma`) VALUES
(1, 'Acidez Estomacal'),
(2, 'Nauseas'),
(3, 'Retortijones'),
(4, 'Vómitos'),
(5, 'Hinchazón del abdomen'),
(6, 'Falta de apetito'),
(7, 'Dolor de cabeza'),
(8, 'Diarrea\r\n'),
(9, 'Escalofríos'),
(10, 'Fiebre'),
(11, 'Flatulencias'),
(12, 'Pérdida de peso'),
(13, 'Estreñimiento'),
(14, 'Mareos'),
(15, 'Sensación de saciedad'),
(16, 'Sudoración'),
(17, 'Fatiga'),
(18, 'Deshidratación'),
(19, 'Manos humedas'),
(20, 'Vómitos con sangre'),
(21, 'Sangre al excretar'),
(22, 'Dolor en el recto'),
(23, 'Eructos'),
(24, 'Falta de sueño'),
(25, 'Indigestión'),
(26, 'Intolerancia a alimentos'),
(27, 'Irritabilidad'),
(28, 'Mal sabor de boca'),
(29, 'Molestias en la deglucion'),
(30, 'Palidez'),
(31, 'Pulso Acelerado'),
(32, 'Saciedad precoz'),
(33, 'Sensacion de pesadez'),
(34, 'Picazón en el área genital'),
(35, 'Insomnio'),
(36, 'Tos seca'),
(37, 'Cambios en el apetito'),
(38, 'Ansiedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `idtratamientos` int(11) NOT NULL,
  `desctrat` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`idtratamientos`, `desctrat`) VALUES
(1, 'Se dirige principalmente a restaurar la pérdida de líquidos y electrolitos causada por los vómitos y la diarrea. Aquí es importante vigilar las funciones circulatorias. Además de compensar la pérdida de agua y del contenido de minerales, mantener un aseo especialmente cuidadoso favorecerá la curación'),
(2, 'Deber ser rápido y certero para evitar complicaciones y que la enfermedad siga avanzando. Si existe sospecha de apendicitis, el afectado deberá permanecer en observación en el hospital,  no se deben ingerir alimentos. Si es una apendicitis se debe realizar la extracción quirúrgica del apéndice inflamado.'),
(3, 'El tratamiento es fundamentalmente quirúrgico, mediante una cirugía en la que se extirpa el estómago, ya sea totalmente o en forma parcial.'),
(4, 'Hacer un tratamiento continuo cada cuatro meses, tomar la medicación correctamente, sin ningún tipo de interrupción. Sabido es que viviendo en zona parasitada, eliminar totalmente los parásitos es utópico, pues diariamente el medio ambiente favorece su reingreso. Los parásitos que traen problemas serios, son los antiguos y no los nuevos, así que haciendo tratamientos periódicos hacemos que el paciente esté libre de esa sintomatología.\r\n'),
(5, 'La pérdida de líquidos puede equilibrarse con electrolitos en polvo o preparados de electrolitos que se pueden conseguir en las farmacias. Los polvos pueden disolverse en agua caliente. Cada hora debe tomar un cuarto de litro de la solución. Los alimentos ricos en grasa pueden empeorar la diarrea, hay que llevar una dieta ligera. Durante los dos primeros días, el viajero debe conformarse con caldos ligeros, palitos salados, manzanas ralladas y pan tostado. El tercer día puede introducir arroz o patatas en el menú. Desde el cuarto día es posible ir incorporándose poco a poco a la dieta normal.\r\n'),
(6, 'Es aconsejable comer pequeñas porciones de alimentos de forma regular. Sin embargo, no hay una dieta universal especial para la dispepsia; más bien se tiene en cuenta las compatibilidades de cada persona.'),
(7, 'Se orienta hacia las causas subyacentes. Ya que los ácidos del jugo gástrico juegan un papel importante en la aparición de la gastritis aguda, para el tratamiento también se utilizan sobre todo medicamentos que inhiben la producción del ácido gástrico (denominados bloqueantes de ácidos). Los más efectivos son los inhibidores de la bomba de protones (por ejemplo, los compuestos activos omeprazol, pantoprazol, esomeprazol). También los fármacos que inhiben el receptor de histamina-2 (como la cimetidina y la ranitidina) pueden ayudar en el tratamiento de la gastritis, aunque su potencia es menor que los anteriores.'),
(8, 'Requiere un tratamiento que reponga y equilibre los líquidos y electrolitos perdidos. En el caso de los adultos con buen estado general de salud, la infección gastrointestinal evoluciona a menudo de tal forma que los síntomas mejoran por sí mismos y el cuerpo se recupera sin medicamentos especiales.'),
(9, 'Evitar en la mayor medida la leche, sus derivados y otros productos que contengan lactosa, es decir, adaptarse a una alimentación pobre en lactosa. Si la intolerancia a la lactosa surge a raíz de una enfermedad intestinal.'),
(10, 'Consiste en eliminar totalmente de la dieta, durante toda la vida, los alimentos que contienen gluten. Estos incluyen los cereales como el trigo, la cebada, el centeno, el kamut, el triticale o la espelta y los productos derivados tales como harinas, pan, pasteles, pasta, pan rallado, cereales, etc.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`idenfermedades`),
  ADD KEY `fk_enfermedades_tratamientos1` (`tratamientos_idtratamientos`);

--
-- Indices de la tabla `enfermedades_has_sintomas`
--
ALTER TABLE `enfermedades_has_sintomas`
  ADD PRIMARY KEY (`id_enf_sint`),
  ADD KEY `fk_sintomas_has_enfermedades_sintomas` (`sintomas_idsintomas`),
  ADD KEY `fk_sintomas_has_enfermedades_enfermedades1` (`enfermedades_idenfermedades`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`idsintomas`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`idtratamientos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `idenfermedades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `enfermedades_has_sintomas`
--
ALTER TABLE `enfermedades_has_sintomas`
  MODIFY `id_enf_sint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `idsintomas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `idtratamientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD CONSTRAINT `fk_enfermedades_tratamientos1` FOREIGN KEY (`tratamientos_idtratamientos`) REFERENCES `tratamientos` (`idtratamientos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfermedades_has_sintomas`
--
ALTER TABLE `enfermedades_has_sintomas`
  ADD CONSTRAINT `fk_sintomas_has_enfermedades_enfermedades1` FOREIGN KEY (`enfermedades_idenfermedades`) REFERENCES `enfermedades` (`idenfermedades`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sintomas_has_enfermedades_sintomas` FOREIGN KEY (`sintomas_idsintomas`) REFERENCES `sintomas` (`idsintomas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
