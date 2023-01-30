-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 23 jan 2023 om 09:08
-- Serverversie: 5.7.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE-J2-P3`
--
CREATE DATABASE IF NOT EXISTS `BE-J2-P3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BE-J2-P3`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Instructeur`
--

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(100) NOT NULL,
  `Tussenvoegsel` varchar(50) DEFAULT NULL,
  `Achternaam` varchar(150) NOT NULL,
  `Mobiel` varchar(20) NOT NULL,
  `DatumInDienst` date NOT NULL,
  `AantalSterren` varchar(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Instructeur`
--

INSERT INTO `Instructeur` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Mobiel`, `DatumInDienst`, `AantalSterren`) VALUES
(1, 'Li', NULL, 'Zhan', '06-28493827', '2015-04-17', '***'),
(2, 'Leroy', NULL, 'Boerhaven', '06-39398734', '2018-06-25', '*'),
(3, 'Yoeri', 'Van', 'Veen', '06-24383291', '2023-01-10', '***'),
(4, 'Bert', 'Van', 'Sali', '06-48293823', '2012-01-10', '****'),
(5, 'Mohammeed', 'El', 'Yassidi', '06-34291234', '2010-06-14', '*****');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `TypeVoertuig`
--

DROP TABLE IF EXISTS `TypeVoertuig`;
CREATE TABLE IF NOT EXISTS `TypeVoertuig` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeVoertuig` varchar(200) NOT NULL,
  `Rijbewijscategorie` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `TypeVoertuig`
--

INSERT INTO `TypeVoertuig` (`Id`, `TypeVoertuig`, `Rijbewijscategorie`) VALUES
(1, 'Personenauto', 'B'),
(2, 'Vrachtwagen', 'C'),
(3, 'Bus', 'D'),
(4, 'Bromfiets', 'AM');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Voertuig`
--

DROP TABLE IF EXISTS `Voertuig`;
CREATE TABLE IF NOT EXISTS `Voertuig` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(8) NOT NULL,
  `Type` varchar(150) NOT NULL,
  `Bouwjaar` date NOT NULL,
  `Brandstof` varchar(150) NOT NULL,
  `TypeVoertuigId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `TypeVoertuig` (`TypeVoertuigId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Voertuig`
--

INSERT INTO `Voertuig` (`Id`, `Kenteken`, `Type`, `Bouwjaar`, `Brandstof`, `TypeVoertuigId`) VALUES
(1, 'AU-67-IO', 'Golf', '2017-06-12', 'Diesel', 1),
(2, 'TR-24-OP', 'DAF', '2019-05-23', 'Diesel', 2),
(3, 'TH-78-KL', 'Mercedes', '2023-01-01', 'Benzine', 1),
(4, '90-KL-TR', 'Fiat 500', '2021-09-12', 'Benzine', 1),
(5, '34-TK-LP', 'Scania', '2015-03-13', 'Diesel', 2),
(6, 'YY-OP-78', 'BMW M5', '2022-05-13', 'Diesel', 1),
(7, 'UU-HH-JK', 'M.A.N', '2017-12-03', 'Diesel', 2),
(8, 'ST-FZ-28', 'Citroën', '2018-01-20', 'Elektrisch', 1),
(9, '123-FR-T', 'Piaggo ZIP', '2021-02-01', 'Bezine', 4),
(10, 'DRS-52-P', 'Vespa', '2022-03-21', 'Bezine', 4),
(11, 'STP-12-U', 'Kymco', '2022-07-02', 'Bezine', 4),
(12, '45-SD-23', 'Renault', '2023-01-01', 'Diesel', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `VoertuigInstructeur`
--

DROP TABLE IF EXISTS `VoertuigInstructeur`;
CREATE TABLE IF NOT EXISTS `VoertuigInstructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `VoertuigId` int(11) NOT NULL,
  `InstructeurId` int(11) NOT NULL,
  `DatumToekenning` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Voertuig` (`VoertuigId`),
  KEY `Instructeur` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `VoertuigInstructeur`
--

INSERT INTO `VoertuigInstructeur` (`Id`, `VoertuigId`, `InstructeurId`, `DatumToekenning`) VALUES
(1, 1, 5, '2017-06-18'),
(2, 3, 1, '2021-09-26'),
(3, 9, 1, '2021-09-27'),
(4, 3, 4, '2022-08-01'),
(5, 5, 1, '2019-08-30'),
(6, 10, 5, '2020-02-02');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Voertuig`
--
ALTER TABLE `Voertuig`
  ADD CONSTRAINT `TypeVoertuig` FOREIGN KEY (`TypeVoertuigId`) REFERENCES `TypeVoertuig` (`Id`);

--
-- Beperkingen voor tabel `VoertuigInstructeur`
--
ALTER TABLE `VoertuigInstructeur`
  ADD CONSTRAINT `Instructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`),
  ADD CONSTRAINT `Voertuig` FOREIGN KEY (`VoertuigId`) REFERENCES `Voertuig` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
