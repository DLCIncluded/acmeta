-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 10:26 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mike`
--

-- --------------------------------------------------------

--
-- Table structure for table `toons`
--

CREATE TABLE `toons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `star` varchar(255) NOT NULL,
  `element` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toons`
--

INSERT INTO `toons` (`id`, `name`, `img`, `job`, `star`, `element`, `grade`, `displayorder`) VALUES
(1, 'Balt', 'balt.png', 'sol.png', '5', '4', 'ss', 12),
(2, 'Anastasia', 'anas.png', 'ank.png', '', '6', 's', 19),
(4, 'Acht', 'acha.png', 'acha-str.png', '5', '4', 'ss', 13),
(5, 'Orion', 'orion-2.png', 'orion01.png', '5', '3', 'ss', 11),
(6, 'alaia', 'alai.png', 'bar.png', '', '2', 'a', 40),
(7, 'albea', 'albe.png', 'lnc.png', '5', '6', 's', 15),
(8, 'alexis', 'alex.png', 'yuj.png', '1', '2', 'c', 60),
(9, 'alfred', 'alfr.png', 'thi.png', '2', '3', 'c', 62),
(10, 'almira', 'almi.png', 'hun.png', '3', '4', 'b', 56),
(11, 'amis', 'amis.png', 'yuj.png', '3', '3', 'c', 63),
(12, 'ange', 'anjo.png', 'bar.png', '2', '3', 'c', 64),
(13, 'ankh', 'ankh.png', 'gunl.png', '5', '2', 'ss', 9),
(14, 'annerose', 'anne.png', 'wiz.png', '3', '6', 'c', 58),
(15, 'annika', 'anni.png', 'huu.png', '5', '2', 's', 26),
(16, 'eren', 'aot-eren.png', 'aot-eren01.png', '5', '1', 'ss', 8),
(17, '', 'aot-hanj.png', 'aot-hanj01.png', '5', '5', 's', 20),
(18, 'levi', 'aot-levi.png', 'aot-levi01.png', '5', '6', 'ss', 1),
(19, 'mikasa', 'aot-mika.png', 'aot-mika01.png', '5', '2', 'ss', 10),
(20, 'reiner', 'aot-rein.png', 'aot-rein01.png', '5', '4', 'ss', 14),
(21, 'arkil', 'arki.png', 'thi.png', '3', '1', 'b', 48),
(22, 'aruba', 'arub.png', 'shn.png', '5', '3', 's', 28),
(23, 'aswald', 'asuw.png', 'kil.png', '5', '6', 's', 18),
(24, 'alyu', 'ayll.png', 'bar.png', '3', '1', 'd', 66),
(25, 'basheeny', 'basi.png', 'basi-sol.png', '5', '6', 'ss', 0),
(26, 'bashosen', 'basy.png', 'lnc.png', '5', '4', 'a', 45),
(27, 'berha', 'belt.png', 'art.png', '5', '6', 'a', 31),
(28, 'birgitta', 'birg.png', 'syo.png', '5', '6', 'a', 32),
(29, 'blanchett', 'blan.png', 'sol.png', '3', '6', 's', 16),
(30, 'bud', 'bud.png', 'bud01.png', '5', '5', 'ss', 2),
(31, 'cadanova', 'cada.png', 'cada-sei.png', '5', '1', 's', 22),
(32, 'kanon', 'cano.png', 'cano-arm.png', '3', '5', 'ss', 3),
(33, 'carla', 'carl.png', 'strb.png', '5', '1', 'ss', 6),
(34, 'celine', 'celi.png', 'wiz.png', '4', '4', 'c', 65),
(35, 'celiers', 'cell.png', 'dgn.png', '3', '5', 'b', 46),
(36, 'caris', 'chal.png', 'gun.png', '4', '3', 'b', 52),
(37, 'chao', 'chao.png', 'hwiz.png', '5', '3', 'a', 43),
(38, 'chat noir', 'chat.png', 'kil.png', '4', '2', 'a', 41),
(39, 'chihaya', 'chih.png', 'odo.png', '4', '1', 'ss', 4),
(40, 'chiruru', 'chir.png', 'sen.png', '4', '2', 'c', 61),
(41, 'ciel', 'ciel.png', 'thi.png', '2', '1', 'd', 67),
(42, 'chloe', 'cloe.png', 'sei.png', '5', '5', 's', 21),
(43, 'cordelia', 'cord.png', 'val.png', '5', '4', 'b', 57),
(44, 'daisy', 'dais.png', 'spe.png', '5', '1', 'a', 38),
(45, 'decel', 'dece.png', 'wiz.png', '3', '5', 'c', 59),
(46, 'deneb', 'dene.png', 'sen.png', '5', '3', 's', 29),
(47, 'dilga', 'dilg.png', 'arm.png', '4', '3', 'b', 53),
(48, 'dias', 'dios.png', 'arm.png', '2', '6', 's', 17),
(49, 'collab almira', 'dis-almi.png', 'dis-thi.png', '5', '4', 's', 30),
(50, 'etna', 'dis-eton.png', 'dis-eton1.png', '5', '5', 'a', 36),
(51, 'kilia', 'dis-kill.png', 'dis-kill1.png', '5', '6', 'a', 33),
(52, 'laharl', 'dis-laha.png', 'dis-laha1.png', '5', '1', 's', 23),
(53, 'prinny', 'dis-prin.png', 'dis-prin2.png', '3', '2', 'b', 49),
(54, 'red magnus', 'dis-redm.png', 'dis-redm1.png', '5', '1', 'a', 39),
(55, 'collab rin', 'dis-rinn.png', 'dis-arch.png', '5', '2', 's', 27),
(56, 'collab rosa', 'dis-rosa.png', 'dis-demon.png', '5', '6', 'a', 34),
(57, 'seraphina', 'dis-sera.png', 'dis-sera1.png', '5', '5', 'b', 47),
(58, 'usalia', 'dis-usal.png', 'dis-usal1.png', '3', '3', 'b', 54),
(59, 'don taras', 'donta.png', 'donta01.png', '5', '1', 'ss', 7),
(60, 'dorothea', 'doro.png', 'nec.png', '5', '1', 's', 24),
(61, 'edgar', 'edga.png', 'gun.png', '3', '3', 'b', 55),
(62, 'edwin', 'edwi.png', 'gua.png', '4', '6', 'a', 35),
(63, 'eizan', 'eiza.png', 'kaj.png', '5', '3', 'a', 44),
(64, 'elaine', 'elai.png', 'hun.png', '3', '2', 'b', 50),
(65, 'elizabeth', 'eliz.png', 'doc.png', '5', '2', 'a', 42),
(66, 'emma', 'ema.png', 'wea.png', '5', '1', 'ss', 5),
(67, 'ennis', 'enni.png', 'yuj.png', '3', '2', 'd', 68),
(68, 'elrike', 'erur.png', 'thi.png', '3', '2', 'b', 51),
(69, 'eve', 'eve.png', 'wed.png', '5', '1', 's', 25),
(70, 'alphonse', 'fa-alph.png', 'fa-alph01.png', '4', '5', 'a', 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toons`
--
ALTER TABLE `toons`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toons`
--
ALTER TABLE `toons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
