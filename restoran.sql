-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 09:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE IF NOT EXISTS `galerija` (
`idGalerija` int(11) NOT NULL,
  `putanja` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`idGalerija`, `putanja`, `thumb`, `opis`) VALUES
(56, 'images/table313.jpg', 'images/mala_table313_thumb.jpg', 'h'),
(57, 'images/table44.jpg', 'images/mala_table44_thumb.jpg', 'dd'),
(58, 'images/table63.jpg', 'images/mala_table63_thumb.jpg', 'jhgf'),
(59, 'images/table17.jpg', 'images/mala_table17_thumb.jpg', 'gfdd'),
(60, 'images/table22.jpg', 'images/mala_table22_thumb.jpg', 'hgfdee'),
(61, 'images/table121.jpg', 'images/mala_table121_thumb.jpg', 'gff');

-- --------------------------------------------------------

--
-- Table structure for table `glasanje`
--

CREATE TABLE IF NOT EXISTS `glasanje` (
`idGlasanje` int(11) NOT NULL,
  `idOdgovor` int(11) NOT NULL,
  `ipAdresa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `rezultat` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `glasanje`
--

INSERT INTO `glasanje` (`idGlasanje`, `idOdgovor`, `ipAdresa`, `rezultat`) VALUES
(23, 38, '', 0),
(22, 37, '', 1),
(21, 36, '', 2),
(20, 35, '', 1),
(19, 34, '', 0),
(18, 33, '', 1),
(17, 32, '', 0),
(16, 31, '', 0),
(15, 30, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jelovnik`
--

CREATE TABLE IF NOT EXISTS `jelovnik` (
`idJelovnik` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jelovnik`
--

INSERT INTO `jelovnik` (`idJelovnik`, `naziv`, `cena`) VALUES
(1, 'food1', 650),
(2, 'food2', 380),
(3, 'food3', 800),
(4, 'food4', 789),
(6, 'ice cream', 899),
(8, 'foood', 987),
(9, 'cake', 480);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
`idKorisnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idUloga` int(11) NOT NULL,
  `statusKorisnika` int(11) NOT NULL,
  `rand` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `username`, `password`, `mail`, `idUloga`, `statusKorisnika`, `rand`) VALUES
(15, 'korisnik1', 'korisnik1', 'korisnik1', 'affc2dc1a3f9fb05392d3cb0a784ff61', 'korisnik1@korisnik1.com', 2, 0, 0),
(19, 'zaposleni1', 'zaposleni1', 'zaposleni1', '8086d74cf933f063a86a88cd780fee72', 'zaposleni1@zaposleni1.com', 3, 0, 0),
(30, 'Nekoime', 'Nekoprezime', 'nekousername', '018398a6bce505a41104645c1c14c5a9', 'neko@neko.com', 2, 0, 0),
(31, 'Veljko', 'Fridl', 'VeljkoVF', '429cfa81e92b3aacdcba7fc20f260c83', 'veljko.fridl@gmail.com', 0, 0, 0),
(25, 'Jovana', 'Jovanovic', 'jovana', '4579dfad9fd1c4c419b5c80d33c26869', 'j@j.com', 1, 0, 0),
(28, 'korisnik9', 'korisnik9', 'korisnik9', '4758178aee89eba76062b9f7d1b6209f', 'korisnik9.korisnik9.com', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`idLog` int(11) NOT NULL,
  `datum` int(11) NOT NULL,
  `idTabela` int(11) NOT NULL,
  `idPromena` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`idLog`, `datum`, `idTabela`, `idPromena`, `idKorisnik`) VALUES
(140, 1462719824, 4, 3, 25),
(139, 1462719816, 4, 1, 25),
(138, 1462715837, 6, 2, 25),
(137, 1462715812, 6, 2, 25),
(136, 1462715600, 4, 3, 25),
(135, 1462715592, 4, 1, 25),
(134, 1462715569, 5, 1, 25),
(133, 1462715511, 1, 2, 25),
(132, 1462712748, 6, 2, 25),
(131, 1462712734, 7, 2, 25),
(130, 1462712722, 7, 3, 25),
(129, 1462712714, 7, 1, 25),
(128, 1462712695, 7, 1, 25),
(127, 1462712673, 7, 1, 25),
(126, 1462712653, 5, 1, 25),
(125, 1462712617, 5, 3, 25),
(124, 1462712606, 4, 3, 25),
(123, 1462712598, 4, 2, 25),
(122, 1462712447, 4, 1, 25),
(121, 1462712137, 5, 2, 25),
(120, 1462712112, 5, 1, 25),
(119, 1462712085, 1, 3, 25),
(118, 1462712074, 1, 2, 25),
(117, 1462712051, 1, 1, 25),
(116, 1462669134, 7, 2, 25),
(115, 1462669094, 7, 1, 25),
(114, 1462669058, 7, 3, 25),
(113, 1462669046, 7, 1, 25),
(112, 1462669012, 7, 1, 25),
(111, 1462668853, 7, 1, 25),
(110, 1462668802, 7, 1, 25),
(109, 1462668785, 7, 1, 25),
(108, 1462668769, 5, 1, 25),
(107, 1462668480, 1, 1, 25),
(106, 1462668433, 1, 3, 25),
(105, 1462668422, 1, 1, 25),
(104, 1462668277, 5, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE IF NOT EXISTS `meni` (
`idMeni` int(11) NOT NULL,
  `naslov` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `naslov`, `putanja`) VALUES
(1, 'Pocetna', 'Pocetna'),
(2, 'Kontakt', 'Kontakt'),
(3, 'Galerija', 'Galerija'),
(4, 'Registracija', 'Registracija'),
(5, 'Autor', 'Kontakt/autor');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE IF NOT EXISTS `odgovor` (
`idOdgovor` int(11) NOT NULL,
  `idPitanje` int(11) NOT NULL,
  `odgovor` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`idOdgovor`, `idPitanje`, `odgovor`) VALUES
(37, 14, 'nee'),
(36, 14, 'da'),
(33, 13, 'Ok'),
(31, 0, 'Onako'),
(35, 13, 'Onako');

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE IF NOT EXISTS `pitanje` (
`idPitanje` int(11) NOT NULL,
  `pitanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`idPitanje`, `pitanje`, `status`) VALUES
(14, 'Da li ste zadovoljni uslugom u nasem restoranu?', 1),
(13, 'Kako ste?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promena`
--

CREATE TABLE IF NOT EXISTS `promena` (
`idPromena` int(11) NOT NULL,
  `promena` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promena`
--

INSERT INTO `promena` (`idPromena`, `promena`) VALUES
(1, 'INSERT'),
(2, 'UPDATE'),
(3, 'DELETE');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE IF NOT EXISTS `rezervacija` (
`idRezervacija` int(11) NOT NULL,
  `datum` int(11) NOT NULL,
  `vreme_pocetka` int(11) NOT NULL,
  `idTermin_kraj` int(11) NOT NULL,
  `idSto` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`idRezervacija`, `datum`, `vreme_pocetka`, `idTermin_kraj`, `idSto`, `idKorisnik`, `status`) VALUES
(29, 1459116000, 13, 16, 5, 15, 0),
(30, 1461621600, 3, 7, 4, 15, 0),
(31, 1461448800, 8, 13, 6, 15, 0),
(32, 1461535200, 7, 11, 1, 15, 0),
(33, 1461535200, 10, 12, 4, 15, 0),
(34, 1461535200, 13, 15, 5, 15, 0),
(35, 1461621600, 13, 15, 5, 15, 0),
(36, 1461621600, 14, 16, 5, 15, 0),
(37, 1461708000, 13, 15, 5, 15, 0),
(39, 1461967200, 14, 16, 5, 15, 2),
(40, 1461621600, 15, 16, 1, 15, 2),
(41, 1461967200, 15, 16, 1, 15, 0),
(42, 1462053600, 12, 13, 1, 15, 0),
(48, 1462140000, 6, 7, 4, 15, 2),
(49, 1462140000, 6, 14, 5, 15, 2),
(50, 1462140000, 11, 16, 4, 15, 0),
(51, 1462140000, 7, 11, 4, 15, 2),
(52, 1462140000, 7, 14, 1, 15, 0),
(53, 1462226400, 9, 13, 4, 15, 0),
(54, 1462312800, 10, 14, 4, 15, 0),
(55, 1462399200, 7, 9, 4, 15, 0),
(56, 1462399200, 7, 9, 4, 15, 0),
(57, 1462485600, 7, 9, 4, 15, 2),
(68, 1462572000, 12, 14, 4, 15, 2),
(66, 1462485600, 9, 11, 5, 15, 2),
(60, 1462485600, 8, 12, 1, 15, 2),
(63, 1462485600, 11, 13, 5, 15, 0),
(65, 1462485600, 9, 12, 6, 15, 0),
(69, 1462572000, 15, 16, 1, 15, 0),
(76, 1462658400, 9, 13, 10, 15, 2),
(71, 1462658400, 1, 8, 1, 15, 2),
(72, 1462744800, 5, 13, 4, 15, 0),
(73, 1462572000, 15, 16, 4, 15, 0),
(74, 1462572000, 15, 16, 5, 15, 0),
(75, 1462572000, 15, 16, 6, 15, 0),
(77, 1462658400, 12, 14, 0, 15, 0),
(78, 1462658400, 12, 13, 0, 15, 0),
(79, 1462744800, 13, 15, 10, 15, 0),
(82, 1462831200, 10, 14, 9, 31, 0),
(81, 1462658400, 12, 14, 4, 15, 0),
(122, 1474236000, 12, 17, 10, 15, 1),
(86, 1473976800, 14, 17, 11, 15, 0),
(113, 1474236000, 15, 17, 9, 15, 1),
(90, 1474322400, 11, 14, 11, 15, 1),
(91, 1474408800, 13, 15, 11, 15, 1),
(92, 1474408800, 10, 14, 9, 15, 1),
(115, 1474495200, 13, 17, 11, 15, 1),
(94, 1474495200, 11, 15, 10, 15, 1),
(95, 1474581600, 3, 7, 8, 15, 1),
(116, 1474581600, 12, 17, 12, 15, 1),
(121, 1474668000, 11, 14, 9, 15, 1),
(117, 1474668000, 13, 17, 10, 15, 1),
(124, 1474754400, 12, 17, 12, 15, 1),
(100, 1474754400, 8, 11, 10, 15, 1),
(111, 1474322400, 14, 17, 8, 15, 1),
(114, 1474322400, 14, 17, 11, 15, 1),
(112, 1474408800, 13, 17, 12, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE IF NOT EXISTS `sto` (
`idSto` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `minimum` int(11) NOT NULL,
  `maximum` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`idSto`, `ime`, `minimum`, `maximum`) VALUES
(1, 'table1a', 2, 5),
(4, '2a', 5, 10),
(5, 'table12', 2, 9),
(6, 'table8', 2, 4),
(8, 'table16', 4, 9),
(9, 'table17', 1, 3),
(10, 'table21', 2, 10),
(11, 'table30', 2, 6),
(12, 'table6', 4, 15),
(13, 'table9', 2, 10),
(15, 'VF', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabela`
--

CREATE TABLE IF NOT EXISTS `tabela` (
`idTabela` int(11) NOT NULL,
  `tabela` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tabela`
--

INSERT INTO `tabela` (`idTabela`, `tabela`) VALUES
(1, 'korisnik'),
(2, 'uloga'),
(4, 'jelovnik'),
(5, 'sto'),
(6, 'pitanje'),
(7, 'odgovor');

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

CREATE TABLE IF NOT EXISTS `termin` (
`idTermin` int(11) NOT NULL,
  `termin` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`idTermin`, `termin`) VALUES
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(6, 13),
(7, 14),
(8, 15),
(9, 16),
(10, 17),
(11, 18),
(12, 19),
(13, 20),
(14, 21),
(15, 22),
(16, 23),
(17, 24);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE IF NOT EXISTS `uloga` (
`idUloga` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'zaposleni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
 ADD PRIMARY KEY (`idGalerija`);

--
-- Indexes for table `glasanje`
--
ALTER TABLE `glasanje`
 ADD PRIMARY KEY (`idGlasanje`);

--
-- Indexes for table `jelovnik`
--
ALTER TABLE `jelovnik`
 ADD PRIMARY KEY (`idJelovnik`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
 ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
 ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
 ADD PRIMARY KEY (`idOdgovor`);

--
-- Indexes for table `pitanje`
--
ALTER TABLE `pitanje`
 ADD PRIMARY KEY (`idPitanje`);

--
-- Indexes for table `promena`
--
ALTER TABLE `promena`
 ADD PRIMARY KEY (`idPromena`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
 ADD PRIMARY KEY (`idRezervacija`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
 ADD PRIMARY KEY (`idSto`);

--
-- Indexes for table `tabela`
--
ALTER TABLE `tabela`
 ADD PRIMARY KEY (`idTabela`);

--
-- Indexes for table `termin`
--
ALTER TABLE `termin`
 ADD PRIMARY KEY (`idTermin`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
 ADD PRIMARY KEY (`idUloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
MODIFY `idGalerija` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `glasanje`
--
ALTER TABLE `glasanje`
MODIFY `idGlasanje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `jelovnik`
--
ALTER TABLE `jelovnik`
MODIFY `idJelovnik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
MODIFY `idOdgovor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pitanje`
--
ALTER TABLE `pitanje`
MODIFY `idPitanje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `promena`
--
ALTER TABLE `promena`
MODIFY `idPromena` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
MODIFY `idRezervacija` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
MODIFY `idSto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tabela`
--
ALTER TABLE `tabela`
MODIFY `idTabela` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `termin`
--
ALTER TABLE `termin`
MODIFY `idTermin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
MODIFY `idUloga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
