-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giventake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `bantuan_id` int(11) NOT NULL,
  `bantuan_type` varchar(128) NOT NULL,
  `bantuan_status` varchar(128) NOT NULL,
  `donatur_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `bb_id` int(11) NOT NULL,
  `bu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_barang`
--

CREATE TABLE `bantuan_barang` (
  `bb_id` int(11) NOT NULL,
  `bb_jenis` varchar(128) NOT NULL,
  `bb_nama` varchar(128) NOT NULL,
  `bb_satuan` varchar(128) NOT NULL,
  `bb_jumlah` int(11) NOT NULL,
  `bb_img_attachement` varchar(256) NOT NULL,
  `bb_pickup_loc` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_uang`
--

CREATE TABLE `bantuan_uang` (
  `bu_id` int(11) NOT NULL,
  `bu_nominal` int(11) NOT NULL,
  `bu_img_proof` varchar(256) NOT NULL,
  `bu_bank` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id`, `status`) VALUES
(7, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `identity_id` int(11) NOT NULL,
  `identity_name` varchar(256) NOT NULL,
  `identity_created` int(11) NOT NULL,
  `identity_username` varchar(256) NOT NULL,
  `identity_password` varchar(256) NOT NULL,
  `identity_email` varchar(256) NOT NULL,
  `identity_address` varchar(256) NOT NULL,
  `identity_phone_number` varchar(256) NOT NULL,
  `relawan_id` int(11) DEFAULT NULL,
  `donatur_id` int(11) DEFAULT NULL,
  `penyintas_id` int(11) DEFAULT NULL,
  `identity_role` int(11) NOT NULL,
  `identity_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`identity_id`, `identity_name`, `identity_created`, `identity_username`, `identity_password`, `identity_email`, `identity_address`, `identity_phone_number`, `relawan_id`, `donatur_id`, `penyintas_id`, `identity_role`, `identity_is_active`) VALUES
(12, 'test', 1672320613, 'test144241', '$2y$10$o/V0VEofsYsH1lK81ileQeskizSt67Dm/PqamY4a6xK.WW3w26Pba', 'testo@yopmail.com', 'test', '123', NULL, 7, NULL, 1, 1),
(13, 'Mukio', 1672380123, 'Mukio477992', '$2y$10$rf6mouVwy8FhCKMfNqdD6OXF61UgvXSw.XvfIJOlvc7RXoOwL3Bzm', 'testomen@yopmail.com', 'Kalasan, Abepura, Jayapura', '0967378129', 8, NULL, NULL, 2, 1),
(14, 'Narumi', 1672397097, 'Narumi314703', '$2y$10$zZL.BzvP8DhjrmkVrOZ6geT5J9Q4XmQ1uErK/G.dxziiOpbW7CXN6', 'narumi@yopmail.com', 'Jepang', '08129388123', NULL, NULL, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_body` text DEFAULT NULL,
  `msg_created` int(11) NOT NULL,
  `msg_is_attached` int(11) DEFAULT NULL,
  `msg_sender` varchar(128) NOT NULL,
  `msg_attachement` varchar(256) DEFAULT NULL,
  `relawan_id` int(11) DEFAULT NULL,
  `donatur_id` int(11) DEFAULT NULL,
  `penyintas_id` int(11) DEFAULT NULL,
  `ss_id` int(11) NOT NULL,
  `msg_is_opened` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg_body`, `msg_created`, `msg_is_attached`, `msg_sender`, `msg_attachement`, `relawan_id`, `donatur_id`, `penyintas_id`, `ss_id`, `msg_is_opened`) VALUES
(150, 'Halo', 1672743309, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(151, 'Siapa ini? Valentino mengirm', 1672743363, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(152, 'Halo ini valentino', 1672743434, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(153, 'Halo, ini valentino', 1672743455, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(154, 'Halo', 1672743506, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(155, 'dwfsdf', 1672743557, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(156, 'siapa ini?', 1672743802, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(157, 'valentino', 1672744027, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(158, 'sd', 1672744084, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(159, 'sdfsd', 1672744088, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(160, 'sdfsdsdfsdsdf', 1672744202, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(161, 'halo', 1672744516, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(162, 'siapa ini?', 1672744522, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(163, 'halo', 1672744559, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(164, 'kim', 1672744616, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(165, 'halo', 1672744667, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(166, 'sadasd', 1672744671, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(167, 'Halo, ini daengan balentino', 1672744702, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(168, 'halo', 1672744865, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(169, 'jojo', 1672744872, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(170, 'Halo', 1672744900, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(171, 'halo valen, ini jojo', 1672745084, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(172, 'test', 1672745091, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(173, 'siapa ', 1672745109, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(174, 'siapa ini', 1672745145, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(175, 'sasada', 1672745150, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(176, 'asdasd', 1672745153, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(177, 'asddsa', 1672745156, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(178, '123', 1672745185, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(179, 'aasasa', 1672745200, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(180, 'asdasd', 1672745221, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(181, '123', 1672745289, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(182, 'kimiiioo', 1672745295, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(183, 'kmkkjk', 1672745301, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(184, 'Valentino', 1672745446, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(185, 'sdasd', 1672745499, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(186, 'sdasdasd', 1672745543, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(187, 'sdasdsdaaaaa', 1672745551, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(188, 'asd', 1672745651, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(189, 'iyakah??', 1672745700, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(190, 'sadasd', 1672745995, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(191, 'asdasd', 1672746011, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(192, 'Halo', 1672746378, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(193, 'asd', 1672746716, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(194, 'adsa', 1672747142, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(195, 'hal', 1672783837, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(196, 'valne', 1672783980, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(197, 'Bale', 1672784004, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(198, 'halo', 1672784009, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(199, 'ha', 1672784012, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(200, 'ha', 1672784015, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(201, 'asd', 1672784188, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(202, 'valen', 1672784249, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(203, 'ini hani cantikmu', 1672784258, 0, 'test', NULL, NULL, 7, NULL, 1, 0),
(204, 'Halo', 1672784354, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(205, 'ini valen', 1672784361, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(206, 'Gimana len?', 1672784391, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(207, 'kamu sudah bawa makanannya keluar', 1672784400, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(208, 'sdh kok', 1672784404, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(209, '', 1672784406, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(210, 'ada di mana?', 1672784411, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(211, 'ada siapa?', 1672784425, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(212, 'sadas', 1672784437, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(213, 'sadas', 1672784442, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(214, 'sds', 1672784448, 0, 'admin', NULL, 8, NULL, NULL, 1, 0),
(215, NULL, 1672784464, 1, 'Mukio', 'item-230104-f0d7d2a88c.png', 8, NULL, NULL, 1, 0),
(216, NULL, 1672784481, 1, 'Mukio', 'item-230104-ec6f6d5dae.png', 8, NULL, NULL, 1, 0),
(217, NULL, 1672784495, 1, 'Mukio', 'item-230104-790548d9c9.png', 8, NULL, NULL, 1, 0),
(218, 'halo', 1672785660, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(219, 'ini valentino', 1672785666, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(220, 'halo', 1672786033, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(221, 'ini siapa', 1672786038, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(222, 'halllll', 1672786091, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(223, 'mmmlmlmlmm', 1672786148, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(224, 'narumiii', 1672786259, 0, 'Mukio', NULL, 8, NULL, NULL, 1, 0),
(225, NULL, 1672786330, 0, 'Narumi', NULL, NULL, NULL, 1, 1, 0),
(226, NULL, 1672786360, 0, 'Narumi', NULL, NULL, NULL, 1, 1, 0),
(227, NULL, 1672786376, 0, 'Narumi', NULL, NULL, NULL, 1, 1, 0),
(228, NULL, 1672786494, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(229, NULL, 1672786495, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(230, NULL, 1672786496, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(231, NULL, 1672786497, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(232, NULL, 1672786498, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(233, NULL, 1672786499, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(234, NULL, 1672786500, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(235, NULL, 1672786501, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(236, NULL, 1672786502, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(237, NULL, 1672786503, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(238, NULL, 1672786504, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(239, NULL, 1672786505, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(240, NULL, 1672786506, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(241, NULL, 1672786507, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(242, NULL, 1672786508, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(243, NULL, 1672786509, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(244, NULL, 1672786510, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(245, NULL, 1672786511, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(246, NULL, 1672786512, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(247, NULL, 1672786513, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(248, NULL, 1672786514, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(249, NULL, 1672786515, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(250, NULL, 1672786516, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(251, NULL, 1672786517, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(252, NULL, 1672786518, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(253, NULL, 1672786519, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(254, NULL, 1672786520, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(255, NULL, 1672786521, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(256, NULL, 1672786522, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(257, NULL, 1672786523, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(258, NULL, 1672786524, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(259, NULL, 1672786525, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(260, NULL, 1672786526, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(261, NULL, 1672786527, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(262, NULL, 1672786528, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(263, NULL, 1672786529, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(264, NULL, 1672786530, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(265, NULL, 1672786531, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(266, NULL, 1672786532, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(267, NULL, 1672786533, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(268, NULL, 1672786534, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(269, NULL, 1672786535, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(270, NULL, 1672786536, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(271, NULL, 1672786537, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(272, NULL, 1672786538, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(273, NULL, 1672786539, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(274, NULL, 1672786540, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(275, NULL, 1672786541, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(276, NULL, 1672786542, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(277, NULL, 1672786543, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(278, NULL, 1672786544, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(279, NULL, 1672786545, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(280, NULL, 1672786546, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(281, NULL, 1672786547, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(282, NULL, 1672786548, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(283, NULL, 1672786549, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(284, NULL, 1672786550, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(285, NULL, 1672786551, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(286, NULL, 1672786552, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(287, NULL, 1672786553, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(288, NULL, 1672786554, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(289, NULL, 1672786555, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(290, NULL, 1672786556, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(291, NULL, 1672786557, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(292, NULL, 1672786558, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(293, NULL, 1672786559, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(294, NULL, 1672786560, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(295, NULL, 1672786877, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(296, NULL, 1672786878, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(297, NULL, 1672786879, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(298, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(299, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(300, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(301, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(302, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(303, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(304, NULL, 1672786880, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(305, NULL, 1672786881, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(306, NULL, 1672786881, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(307, NULL, 1672786881, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(308, NULL, 1672786881, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(309, NULL, 1672786881, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(310, NULL, 1672786882, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(311, NULL, 1672786883, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(312, NULL, 1672786884, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(313, NULL, 1672786885, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(314, NULL, 1672786886, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(315, NULL, 1672786887, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(316, NULL, 1672786888, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(317, NULL, 1672786889, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(318, NULL, 1672786890, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(319, NULL, 1672786891, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(320, NULL, 1672786892, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(321, NULL, 1672786893, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(322, NULL, 1672786894, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(323, NULL, 1672786895, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(324, NULL, 1672786895, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(325, NULL, 1672786895, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(326, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(327, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(328, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(329, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(330, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(331, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(332, NULL, 1672786896, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(333, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(334, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(335, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(336, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(337, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(338, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(339, NULL, 1672786897, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(340, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(341, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(342, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(343, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(344, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(345, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(346, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(347, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(348, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(349, NULL, 1672786898, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(350, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(351, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(352, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(353, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(354, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(355, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(356, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(357, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(358, NULL, 1672786899, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(359, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(360, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(361, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(362, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(363, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(364, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(365, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(366, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(367, NULL, 1672786900, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(368, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(369, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(370, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(371, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(372, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(373, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(374, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(375, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(376, NULL, 1672786901, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(377, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(378, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(379, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(380, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(381, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(382, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(383, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(384, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(385, NULL, 1672786902, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(386, NULL, 1672786903, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(387, NULL, 1672786903, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(388, NULL, 1672786904, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(389, NULL, 1672786905, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(390, NULL, 1672786906, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(391, NULL, 1672786907, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(392, NULL, 1672786908, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(393, NULL, 1672786909, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(394, NULL, 1672786910, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(395, NULL, 1672786911, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(396, NULL, 1672786912, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(397, NULL, 1672786913, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(398, NULL, 1672786914, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(399, NULL, 1672786915, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(400, NULL, 1672786916, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(401, NULL, 1672786916, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(402, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(403, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(404, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(405, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(406, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(407, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(408, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(409, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(410, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(411, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(412, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(413, NULL, 1672786917, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(414, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(415, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(416, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(417, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(418, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(419, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(420, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(421, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(422, NULL, 1672786918, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(423, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(424, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(425, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(426, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(427, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(428, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(429, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(430, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(431, NULL, 1672786919, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(432, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(433, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(434, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(435, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(436, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(437, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(438, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(439, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(440, NULL, 1672786920, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(441, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(442, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(443, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(444, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(445, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(446, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(447, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(448, NULL, 1672786921, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(449, NULL, 1672786922, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(450, NULL, 1672786922, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(451, NULL, 1672786923, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(452, NULL, 1672786924, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(453, NULL, 1672786925, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(454, NULL, 1672786926, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(455, NULL, 1672786927, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(456, NULL, 1672786928, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(457, NULL, 1672786929, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(458, NULL, 1672786930, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(459, NULL, 1672786931, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(460, NULL, 1672786932, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(461, NULL, 1672786933, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(462, NULL, 1672786934, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(463, NULL, 1672786935, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(464, NULL, 1672786936, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(465, NULL, 1672786937, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(466, NULL, 1672786938, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(467, NULL, 1672786939, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(468, NULL, 1672786940, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(469, NULL, 1672786941, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(470, NULL, 1672786942, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(471, NULL, 1672786943, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(472, NULL, 1672786944, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(473, NULL, 1672786945, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(474, NULL, 1672786946, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(475, NULL, 1672786947, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(476, NULL, 1672786948, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(477, NULL, 1672786949, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(478, NULL, 1672786950, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(479, NULL, 1672786951, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(480, NULL, 1672786952, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(481, NULL, 1672786953, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(482, NULL, 1672786954, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(483, NULL, 1672786955, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(484, NULL, 1672786956, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(485, NULL, 1672786957, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(486, NULL, 1672786958, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(487, NULL, 1672786959, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(488, NULL, 1672786960, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(489, NULL, 1672786961, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(490, NULL, 1672786962, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(491, NULL, 1672786963, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(492, NULL, 1672786964, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(493, NULL, 1672786965, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(494, NULL, 1672786966, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(495, NULL, 1672786967, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(496, NULL, 1672786968, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(497, NULL, 1672786969, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(498, NULL, 1672786970, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(499, NULL, 1672786971, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(500, NULL, 1672786972, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(501, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(502, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(503, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(504, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(505, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(506, NULL, 1672786973, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(507, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(508, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(509, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(510, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(511, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(512, NULL, 1672786974, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(513, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(514, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(515, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(516, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(517, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(518, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(519, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(520, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(521, NULL, 1672786975, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(522, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(523, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(524, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(525, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(526, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(527, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(528, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(529, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(530, NULL, 1672786976, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(531, NULL, 1672786977, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(532, NULL, 1672786977, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(533, NULL, 1672786977, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(534, NULL, 1672786977, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(535, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(536, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(537, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(538, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(539, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(540, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(541, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(542, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(543, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(544, NULL, 1672786978, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(545, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(546, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(547, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(548, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(549, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(550, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(551, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(552, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(553, NULL, 1672786979, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(554, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(555, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(556, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(557, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(558, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(559, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(560, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(561, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(562, NULL, 1672786980, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(563, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(564, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(565, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(566, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(567, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(568, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(569, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(570, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(571, NULL, 1672786981, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(572, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(573, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(574, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(575, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(576, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(577, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(578, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(579, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(580, NULL, 1672786982, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(581, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(582, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(583, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(584, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(585, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(586, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(587, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(588, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(589, NULL, 1672786983, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(590, NULL, 1672786984, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(591, NULL, 1672786984, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(592, NULL, 1672786984, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(593, NULL, 1672786985, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(594, NULL, 1672786986, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(595, NULL, 1672786987, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(596, NULL, 1672786988, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(597, NULL, 1672786989, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(598, NULL, 1672786990, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(599, NULL, 1672786991, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(600, NULL, 1672786992, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(601, NULL, 1672786993, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(602, NULL, 1672786994, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(603, NULL, 1672786995, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(604, NULL, 1672786996, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(605, NULL, 1672786997, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(606, NULL, 1672786998, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(607, NULL, 1672786999, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(608, NULL, 1672787000, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(609, NULL, 1672787001, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(610, NULL, 1672787002, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(611, NULL, 1672787002, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(612, NULL, 1672787002, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(613, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(614, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(615, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(616, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(617, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(618, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(619, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(620, NULL, 1672787003, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(621, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(622, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(623, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(624, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(625, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(626, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(627, NULL, 1672787039, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(628, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(629, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(630, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(631, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(632, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(633, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(634, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(635, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(636, NULL, 1672787040, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(637, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(638, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(639, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(640, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(641, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(642, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(643, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(644, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(645, NULL, 1672787041, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(646, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(647, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(648, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(649, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(650, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(651, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(652, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(653, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(654, NULL, 1672787042, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(655, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(656, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(657, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(658, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(659, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(660, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(661, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(662, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(663, NULL, 1672787043, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(664, NULL, 1672787044, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(665, 'halo', 1672787045, 0, 'admin', NULL, NULL, NULL, 1, 1, 0),
(666, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(667, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(668, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(669, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(670, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(671, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(672, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(673, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(674, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(675, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(676, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(677, NULL, 1672787046, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(678, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(679, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(680, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(681, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(682, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(683, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(684, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(685, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(686, NULL, 1672787047, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(687, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(688, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(689, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(690, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(691, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(692, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(693, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(694, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(695, NULL, 1672787048, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(696, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(697, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(698, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(699, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(700, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(701, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(702, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(703, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(704, NULL, 1672787049, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(705, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(706, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(707, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(708, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(709, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(710, NULL, 1672787050, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(711, NULL, 1672787051, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(712, NULL, 1672787052, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(713, NULL, 1672787053, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(714, NULL, 1672787054, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(715, NULL, 1672787055, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(716, NULL, 1672787056, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(717, NULL, 1672787057, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(718, NULL, 1672787058, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(719, NULL, 1672787059, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(720, NULL, 1672787060, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(721, NULL, 1672787060, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(722, NULL, 1672787060, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(723, NULL, 1672787060, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(724, NULL, 1672787060, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(725, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(726, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(727, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(728, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(729, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(730, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(731, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(732, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(733, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(734, NULL, 1672787061, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(735, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(736, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(737, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(738, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(739, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(740, NULL, 1672787062, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(741, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(742, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(743, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(744, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(745, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(746, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(747, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(748, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(749, NULL, 1672787063, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(750, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(751, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(752, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(753, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(754, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(755, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(756, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(757, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(758, NULL, 1672787064, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(759, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(760, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(761, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(762, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(763, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(764, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(765, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(766, NULL, 1672787065, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(767, NULL, 1672787066, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(768, NULL, 1672787066, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(769, NULL, 1672787067, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(770, NULL, 1672787068, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(771, NULL, 1672787069, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(772, NULL, 1672787070, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(773, NULL, 1672787071, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(774, NULL, 1672787072, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(775, NULL, 1672787073, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(776, NULL, 1672787074, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(777, 'valentino', 1672787112, 0, 'admin', NULL, NULL, NULL, 1, 1, 0),
(778, 'kimigayo', 1672787197, 0, 'admin', NULL, NULL, NULL, 1, 1, 0),
(779, NULL, 1672787363, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(780, NULL, 1672787364, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(781, NULL, 1672787365, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(782, NULL, 1672787366, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(783, NULL, 1672787367, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(784, NULL, 1672787368, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(785, NULL, 1672787369, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(786, NULL, 1672787370, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(787, NULL, 1672787371, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(788, NULL, 1672787372, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(789, NULL, 1672787373, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(790, NULL, 1672787374, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(791, NULL, 1672787375, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(792, NULL, 1672787376, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(793, NULL, 1672787377, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(794, NULL, 1672787378, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(795, NULL, 1672787379, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(796, NULL, 1672787380, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(797, NULL, 1672787381, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(798, NULL, 1672787382, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(799, NULL, 1672787383, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(800, NULL, 1672787384, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(801, NULL, 1672787385, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(802, NULL, 1672787386, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(803, NULL, 1672787387, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(804, NULL, 1672787388, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(805, NULL, 1672787389, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(806, NULL, 1672787390, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(807, NULL, 1672787391, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(808, NULL, 1672787392, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(809, NULL, 1672787393, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(810, NULL, 1672787394, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(811, NULL, 1672787395, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(812, NULL, 1672787396, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(813, NULL, 1672787397, 0, 'admin', NULL, NULL, NULL, NULL, 1, 0),
(814, 'halo', 1672788879, 0, 'admin', NULL, NULL, NULL, 1, 1, 0),
(815, 'siapa ini??', 1672788885, 0, 'admin', NULL, NULL, NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migi`
--

CREATE TABLE `migi` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migi`
--

INSERT INTO `migi` (`id`, `nama`, `kelas`) VALUES
(1, '0', 2),
(2, '0', 10),
(3, 'valentino', 10),
(4, 'dfgs', 0),
(5, 'Vincent', 3),
(6, 'titus', 10),
(7, 'KIMIGAYO', 100),
(8, '', 0),
(9, '', 0),
(10, 'halo valentinoi', 2),
(11, 'Valentino', 2),
(12, 'imasdasdassa', 2),
(13, 'valentino', 2),
(14, 'Anjingg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penyintas`
--

CREATE TABLE `penyintas` (
  `id` int(11) NOT NULL,
  `penyintas_no_rek` varchar(256) DEFAULT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyintas`
--

INSERT INTO `penyintas` (`id`, `penyintas_no_rek`, `status`) VALUES
(1, NULL, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_bantuan`
--

CREATE TABLE `permohonan_bantuan` (
  `pb_id` int(11) NOT NULL,
  `pb_deskripsi_tambahan` varchar(256) DEFAULT NULL,
  `pb_tingkat_urgensi` varchar(128) DEFAULT NULL,
  `pb_satuan_barang` varchar(128) NOT NULL,
  `pb_jumlah_barang` int(11) NOT NULL,
  `pb_jumlah_donasi` int(11) DEFAULT NULL,
  `pb_barang_kebutuhan` varchar(128) NOT NULL,
  `pb_status` varchar(128) NOT NULL,
  `pb_jawaban` varchar(256) DEFAULT NULL,
  `pb_drop_loc` varchar(256) NOT NULL,
  `pb_jenis_bantuan` varchar(128) DEFAULT NULL,
  `penyintas_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `pb_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permohonan_bantuan`
--

INSERT INTO `permohonan_bantuan` (`pb_id`, `pb_deskripsi_tambahan`, `pb_tingkat_urgensi`, `pb_satuan_barang`, `pb_jumlah_barang`, `pb_jumlah_donasi`, `pb_barang_kebutuhan`, `pb_status`, `pb_jawaban`, `pb_drop_loc`, `pb_jenis_bantuan`, `penyintas_id`, `ss_id`, `pb_created`) VALUES
(1, 'Bawa', NULL, 'KG', 3, NULL, 'Beras', 'Menunggu Konfirmasi', NULL, 'Universitas Kristen Immanuel, Kalasan, Yogyakarta', NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relawan`
--

CREATE TABLE `relawan` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relawan`
--

INSERT INTO `relawan` (`id`, `status`) VALUES
(8, 'on'),
(9, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `ss`
--

CREATE TABLE `ss` (
  `ss_id` int(11) NOT NULL,
  `ss_password` varchar(256) NOT NULL,
  `ss_name` varchar(128) NOT NULL,
  `ss_username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ss`
--

INSERT INTO `ss` (`ss_id`, `ss_password`, `ss_name`, `ss_username`) VALUES
(1, 'admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_status` varchar(256) NOT NULL,
  `task_time_ddl` int(11) NOT NULL,
  `relawan_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `bantuan_id` int(11) NOT NULL,
  `pb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `tkn_id` int(11) NOT NULL,
  `tkn_email` varchar(256) NOT NULL,
  `tkn_token` varchar(256) NOT NULL,
  `tkn_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`tkn_id`, `tkn_email`, `tkn_token`, `tkn_created`) VALUES
(10, 'testo@yopmail.com', 'OsFhMRAtlM6Uh3EnEOcP/uI2A3m3ps+vzcQcrv2jw7Q=', 1672320613),
(11, 'testomen@yopmail.com', 'YoNNgXTQuuLhJIeQMltj8/uvZmABChkp7e0T27l4/qc=', 1672380123),
(12, 'narumi@yopmail.com', 'Q66za6apaloSfsDpTLM09ADnTIgDOFkefcjohQti6UI=', 1672397097);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`bantuan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `ss_id` (`ss_id`),
  ADD KEY `bb_id` (`bb_id`),
  ADD KEY `bu_id` (`bu_id`);

--
-- Indexes for table `bantuan_barang`
--
ALTER TABLE `bantuan_barang`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `bantuan_uang`
--
ALTER TABLE `bantuan_uang`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`identity_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `penyintas_id` (`penyintas_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `penyintas_id` (`penyintas_id`),
  ADD KEY `ss_id` (`ss_id`);

--
-- Indexes for table `migi`
--
ALTER TABLE `migi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyintas`
--
ALTER TABLE `penyintas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `penyintas_id` (`penyintas_id`),
  ADD KEY `ss_id` (`ss_id`);

--
-- Indexes for table `relawan`
--
ALTER TABLE `relawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `ss_id` (`ss_id`),
  ADD KEY `bantuan_id` (`bantuan_id`),
  ADD KEY `pb_id` (`pb_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`tkn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `bantuan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bantuan_barang`
--
ALTER TABLE `bantuan_barang`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bantuan_uang`
--
ALTER TABLE `bantuan_uang`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `identity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=816;

--
-- AUTO_INCREMENT for table `migi`
--
ALTER TABLE `migi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penyintas`
--
ALTER TABLE `penyintas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relawan`
--
ALTER TABLE `relawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ss`
--
ALTER TABLE `ss`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `tkn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `bantuan_ibfk_1` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `bantuan_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`),
  ADD CONSTRAINT `bantuan_ibfk_3` FOREIGN KEY (`bb_id`) REFERENCES `bantuan_barang` (`bb_id`),
  ADD CONSTRAINT `bantuan_ibfk_4` FOREIGN KEY (`bu_id`) REFERENCES `bantuan_uang` (`bu_id`);

--
-- Constraints for table `identity`
--
ALTER TABLE `identity`
  ADD CONSTRAINT `identity_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `identity_ibfk_2` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `identity_ibfk_3` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`),
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`);

--
-- Constraints for table `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  ADD CONSTRAINT `permohonan_bantuan_ibfk_1` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`),
  ADD CONSTRAINT `permohonan_bantuan_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuan` (`bantuan_id`),
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`pb_id`) REFERENCES `permohonan_bantuan` (`pb_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
