-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 10:09 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bl2014`
--

-- --------------------------------------------------------

--
-- Table structure for table `msexpo`
--

CREATE TABLE IF NOT EXISTS `msexpo` (
  `ExpoID` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalExpo` char(10) NOT NULL,
  `Batas` int(11) NOT NULL,
  PRIMARY KEY (`ExpoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `msexpo`
--

INSERT INTO `msexpo` (`ExpoID`, `TanggalExpo`, `Batas`) VALUES
(1, '2014/07/15', 400),
(2, '2013/07/21', 350),
(3, '2013/07/28', 350),
(4, '2013/09/01', 400),
(5, '2013/09/08', 400);

-- --------------------------------------------------------

--
-- Table structure for table `msjadwal`
--

CREATE TABLE IF NOT EXISTS `msjadwal` (
  `JadwalID` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalID` int(11) NOT NULL,
  `ShiftID` int(11) NOT NULL,
  PRIMARY KEY (`JadwalID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `msjadwal`
--

INSERT INTO `msjadwal` (`JadwalID`, `TanggalID`, `ShiftID`) VALUES
(1, 1, 3),
(2, 1, 5),
(4, 2, 3),
(5, 2, 5),
(0, 0, 0),
(7, 4, 3),
(8, 4, 5),
(9, 5, 3),
(10, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `msruang`
--

CREATE TABLE IF NOT EXISTS `msruang` (
  `RuangID` int(11) NOT NULL AUTO_INCREMENT,
  `Ruang` char(3) NOT NULL,
  `Available` varchar(50) NOT NULL,
  `Sisa` int(11) NOT NULL,
  PRIMARY KEY (`RuangID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `msruang`
--

INSERT INTO `msruang` (`RuangID`, `Ruang`, `Available`, `Sisa`) VALUES
(1, 'A', '1', 52),
(2, 'B', '1', 60),
(3, 'C', '1', 60),
(4, 'D', '1', 60),
(5, 'A', '2', 60),
(6, 'B', '2', 60),
(7, 'C', '2', 60),
(8, 'D', '2', 60),
(9, 'A', '3', 60),
(10, 'B', '3', 60),
(11, 'C', '3', 60),
(12, 'D', '3', 60),
(13, 'A', '4', 60),
(14, 'B', '4', 60),
(15, 'C', '4', 60),
(16, 'D', '4', 60),
(17, 'A', '5', 60),
(18, 'B', '5', 60),
(19, 'C', '5', 60),
(20, 'D', '5', 60);

-- --------------------------------------------------------

--
-- Table structure for table `msshift`
--

CREATE TABLE IF NOT EXISTS `msshift` (
  `ShiftID` int(11) NOT NULL AUTO_INCREMENT,
  `Waktu` char(11) NOT NULL,
  PRIMARY KEY (`ShiftID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `msshift`
--

INSERT INTO `msshift` (`ShiftID`, `Waktu`) VALUES
(1, '09:00-12:00'),
(2, '13:00-16:00'),
(0, 'Tidak ada'),
(3, '09:00-11:00'),
(4, '11:00-13:00'),
(5, '13:00-15:00'),
(6, '15:00-17:00');

-- --------------------------------------------------------

--
-- Table structure for table `mstanggal`
--

CREATE TABLE IF NOT EXISTS `mstanggal` (
  `TanggalID` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` char(10) NOT NULL,
  PRIMARY KEY (`TanggalID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mstanggal`
--

INSERT INTO `mstanggal` (`TanggalID`, `Tanggal`) VALUES
(1, '08/09/2014'),
(2, '10/09/2014'),
(0, 'Tidak ada'),
(4, '16/09/2014'),
(5, '18/09/2014');

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(26) NOT NULL,
  `Password` char(32) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`UserID`, `Username`, `Password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(27, 'bncc1', '940a7e91a5c567e8705f1aa70343f699'),
(28, 'bncc2', 'a728c0df4c7c1998b29b65bff2d628d5'),
(29, 'bncc3', '3c6011b9d27ad4fc4576a888b7e751a0'),
(30, 'cis', 'f9180cb9286c49c4f3a6c793798b9ddf'),
(31, 'cis2', 'eea1937b1da40db17d0da4b510d40287');

-- --------------------------------------------------------

--
-- Table structure for table `trbl`
--

CREATE TABLE IF NOT EXISTS `trbl` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NoTiket` varchar(10) NOT NULL,
  `NIM` varchar(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `NoHP` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `isOlimpiade` int(11) NOT NULL,
  `Souvenir` int(11) NOT NULL,
  `JadwalID` int(11) NOT NULL,
  `RuangID` int(11) NOT NULL,
  `TanggalDaftar` char(10) NOT NULL,
  `Catat` varchar(32) NOT NULL,
  `Via` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NIM` (`NIM`),
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trbl`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
