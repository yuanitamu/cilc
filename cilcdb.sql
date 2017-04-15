
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 09 Jan 2014 pada 02.35
-- Versi Server: 5.1.67
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `u519640583_colic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'lingga', 'password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
  `idMakan` int(11) NOT NULL AUTO_INCREMENT,
  `idNegara` int(11) NOT NULL,
  `makan` int(11) NOT NULL,
  `transKereta` int(11) NOT NULL,
  `transPribadi` int(11) NOT NULL,
  `transTaxi` int(11) NOT NULL,
  `transBus` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `apartment` int(11) NOT NULL,
  `home` int(11) NOT NULL,
  `listrik` int(11) NOT NULL,
  `air` int(11) NOT NULL,
  `airminum` int(11) NOT NULL,
  `gas` int(11) NOT NULL,
  `laundry` int(11) NOT NULL,
  PRIMARY KEY (`idMakan`),
  KEY `idNegara` (`idNegara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`idMakan`, `idNegara`, `makan`, `transKereta`, `transPribadi`, `transTaxi`, `transBus`, `hotel`, `apartment`, `home`, `listrik`, `air`, `airminum`, `gas`, `laundry`) VALUES
(8, 10, 7, 9, 8, 80, 0, 56, 45, 34, 67, 56, 45, 67, 67),
(9, 13, 89, 99, 5, 45, 0, 89, 45, 67, 78, 34, 23, 45, 78),
(10, 12, 9, 67, 56, 66, 0, 34, 68, 89, 78, 56, 45, 56, 78),
(11, 11, 89, 56, 44, 33, 0, 1, 56, 77, 78, 7, 55, 22, 3),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 14, 4, 187, 4, 6, 3, 16, 20, 5, 5, 5, 10, 20, 11),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 15, 1, 2, 3, 4, 0, 500, 448, 23, 40, 39, 3, 58, 5),
(18, 18, 8, 2, 1, 3, 2, 11, 31, 0, 6, 8, 9, 15, 8),
(19, 17, 9, 8, 19, 26, 0, 6, 80, 66, 5, 22, 19, 10, 11),
(20, 19, 2, 34, 3, 65, 3, 5, 12, 22, 34, 5, 5, 6, 8),
(21, 22, 6, 24, 14, 10, 0, 52, 63, 23, 10, 12, 5, 2, 4),
(22, 23, 6, 1, 1, 1, 1, 212, 17, 254, 1, 1, 1, 1, 1),
(23, 24, 6, 1, 2, 2, 0, 165, 26, 8, 1, 1, 1, 1, 1),
(24, 25, 4, 6, 45, 5, 0, 13, 34, 44, 22, 33, 66, 77, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `idMap` int(11) NOT NULL AUTO_INCREMENT,
  `idNegara` int(11) NOT NULL,
  `long` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  PRIMARY KEY (`idMap`),
  KEY `idNegara` (`idNegara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `map`
--

INSERT INTO `map` (`idMap`, `idNegara`, `long`, `lat`) VALUES
(6, 10, '21.033481878801354', '-6.735447846786603'),
(7, 13, '-100.78271649999994', '43.65593819721564'),
(8, 11, '-84.25927899999999', '37.52278421268865'),
(9, 12, '136.521971', '-26.652382766101642'),
(10, 14, '-95.71289', '37.09024'),
(11, 18, '138.25292', '36.20482'),
(12, 17, '133.77514', '-25.27440'),
(13, 19, '5.29127', '52.13263'),
(14, 22, '8.729002250000008', '47.94209598040075'),
(15, 23, '-55.079593500000044', '-11.937242596021742'),
(16, 24, '127.38134600000001', '38.90384573853249'),
(17, 25, '113.65839220361329', '-8.155052595872395');

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `idNegara` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ibukota` varchar(100) NOT NULL,
  `luas` varchar(100) NOT NULL,
  `kepadatan` varchar(100) NOT NULL,
  `matauang` varchar(100) NOT NULL,
  `bendera` varchar(100) NOT NULL,
  `bahasa` varchar(100) NOT NULL,
  `tglEdit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNegara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`idNegara`, `nama`, `ibukota`, `luas`, `kepadatan`, `matauang`, `bendera`, `bahasa`, `tglEdit`) VALUES
(18, 'Japan', 'Tokyo', '377,944', '337,4', 'Yen', 'Jepang.jpg', 'Japanese', '2013-12-11 15:15:32'),
(19, 'Netherlands', 'Amsterdam', '41,543 ', '16,819,595', 'Euro', 'belanda.jpg', 'English', '2013-12-11 15:20:23'),
(14, 'United States', 'Washington, D.C.', '9,826,675', '34,2', 'USD', 'amrik.jpg', 'English', '2013-12-11 15:40:43'),
(17, 'Australia', 'Canberra', '7,692,024', '2.8', 'Australian Dollar', 'AustralianFlag.jpg', 'English', '2013-12-11 10:07:51'),
(22, 'Jerman', 'Berlin', '357.021 ', '357.021 ', 'Euro', 'german.jpg', 'bahasa Jerman', '2013-12-19 12:48:42'),
(23, 'Brazil', 'Brasilia', '8.515.767', '23.7', 'Real', 'Brasil.jpg', 'Portuguese', '2014-01-02 12:07:24'),
(24, 'South Korea', 'Seoul', '100.210', '501.1', 'South Korean Won', 'south_korea.jpg', 'Korean', '2014-01-02 13:26:45'),
(25, 'Coba', 'coba2', '123', '456', 'Dolar', 'coba.jpg', 'English', '2014-01-03 03:28:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
