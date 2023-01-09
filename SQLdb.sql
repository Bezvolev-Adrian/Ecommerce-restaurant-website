-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: ian. 09, 2023 la 01:22 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `licenta2`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorie_produse`
--

DROP TABLE IF EXISTS `categorie_produse`;
CREATE TABLE IF NOT EXISTS `categorie_produse` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(100) NOT NULL,
  `statusCategorie` varchar(11) NOT NULL DEFAULT 'activ',
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `categorie_produse`
--

INSERT INTO `categorie_produse` (`id_categorie`, `categorie`, `statusCategorie`) VALUES
(1, 'Noodles', 'activ'),
(2, 'Supe', 'activ'),
(3, 'Bauturi', 'activ'),
(4, 'Bauturi alcoolice', 'activ'),
(5, 'Sushi', 'activ'),
(6, 'Prajite in ulei', 'inactiv');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

DROP TABLE IF EXISTS `comenzi`;
CREATE TABLE IF NOT EXISTS `comenzi` (
  `id_comenzi` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilizatori` bigint(11) NOT NULL,
  `id_metoda_plata` int(11) NOT NULL,
  `id_soferi` int(11) NOT NULL DEFAULT '2',
  `costCos` int(5) NOT NULL,
  `Oras_livrare` varchar(100) NOT NULL,
  `Strada_livrare` varchar(100) NOT NULL,
  `Detalii_suplimentare` varchar(500) NOT NULL,
  `numar_telefon` varchar(11) NOT NULL,
  `status_Comanda` varchar(11) NOT NULL DEFAULT 'preluat',
  `data_Comanda` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comenzi`),
  KEY `id_utilizatori` (`id_utilizatori`),
  KEY `id_metoda_plata` (`id_metoda_plata`),
  KEY `id_soferi` (`id_soferi`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `comenzi`
--

INSERT INTO `comenzi` (`id_comenzi`, `id_utilizatori`, `id_metoda_plata`, `id_soferi`, `costCos`, `Oras_livrare`, `Strada_livrare`, `Detalii_suplimentare`, `numar_telefon`, `status_Comanda`, `data_Comanda`) VALUES
(28, 145, 5, 6, 9, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-21 16:02:21'),
(29, 145, 5, 2, 18, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-21 16:11:58'),
(30, 145, 5, 2, 95, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-21 16:25:03'),
(31, 145, 5, 2, 354, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-21 22:06:19'),
(32, 145, 5, 9, 15, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-21 22:08:03'),
(33, 145, 5, 5, 24, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-21 22:15:24'),
(34, 145, 5, 2, 80, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-21 22:16:35'),
(35, 145, 5, 5, 160, 'Brasov', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-21 22:17:17'),
(36, 147, 5, 5, 189, 'Timisoara', 'Strada ploiesti nr 15', '', '0744811423', 'Livrata', '2022-06-22 19:21:50'),
(37, 146, 5, 2, 25, 'Sibiu', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-25 16:58:16'),
(38, 146, 5, 5, 25, 'Sibiu', 'Strada Buzias Nr. 15A', '', '0744811399', 'Livrata', '2022-06-25 17:03:17'),
(39, 146, 5, 2, 25, 'Sibiu', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-25 17:03:35'),
(40, 146, 5, 2, 25, 'Constanta', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 17:24:22'),
(41, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 17:24:39'),
(42, 145, 5, 2, 191, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 19:42:51'),
(43, 145, 5, 3, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-26 19:48:48'),
(44, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 19:57:06'),
(45, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', 'rapid va rog', '0744811399', 'preluat', '2022-06-26 19:57:33'),
(46, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:12:35'),
(47, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:13:03'),
(48, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:16:50'),
(49, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:18:15'),
(51, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:21:04'),
(52, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:30:30'),
(53, 146, 5, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 20:33:58'),
(54, 146, 7, 2, 25, 'Ploiesti', 'Strada Buzias Nr. 15A', '', '0744811399', 'preluat', '2022-06-26 21:41:20'),
(55, 145, 7, 3, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-26 22:04:35'),
(56, 145, 7, 2, 16, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:06:20'),
(57, 145, 7, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:06:53'),
(58, 145, 7, 3, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'Livrata', '2022-06-26 22:09:46'),
(59, 145, 7, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:10:08'),
(60, 145, 6, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:33:24'),
(61, 145, 6, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:42:54'),
(62, 145, 5, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-06-26 22:43:03'),
(63, 145, 7, 2, 25, 'Bucuresti', 'Strada florilor Bloc 3C  ', 'fara ceapa', '0744181432', 'preluat', '2022-06-26 22:43:24'),
(64, 147, 6, 2, 50, 'Timisoara', 'Strada ploiesti nr 15', '', '0744811423', 'pregatita', '2022-06-27 00:25:11'),
(65, 147, 6, 2, 16, 'Timisoara', 'Strada ploiesti nr 15', '', '0744811423', 'pregatita', '2022-06-27 00:25:21'),
(66, 145, 6, 2, 124, 'Timisoara', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-27 00:36:22'),
(67, 145, 7, 2, 84, 'Timisoara', 'Strada florilor Bloc 3C  ', 'cald va rog', '0744181432', 'pregatita', '2022-06-27 00:36:57'),
(68, 145, 7, 2, 150, 'Timisoara', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-06-27 00:37:33'),
(69, 148, 6, 2, 129, 'Targu Mures', 'Strada Bucuresti Nr. 59', 'Doresc ca livrarea sa se faca dupa ora 15:00', '0744823932', 'preluat', '2022-07-02 18:53:18'),
(70, 148, 7, 2, 25, 'Targu Mures', 'Strada Bucuresti Nr. 59', '', '0744823932', 'pregatita', '2022-07-02 19:42:58'),
(71, 148, 5, 13, 280, 'Targu Mures', 'Strada Bucuresti Nr. 59', '', '0744823932', 'Livrata', '2022-07-02 20:40:06'),
(72, 145, 6, 2, 593, 'Timisoara', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-07-02 22:16:39'),
(73, 145, 5, 2, 25, 'Timisoara', 'Strada florilor Bloc 3C  ', '', '0744181432', 'preluat', '2022-07-02 22:18:45'),
(74, 145, 5, 2, 618, 'Timisoara', 'Strada florilor Bloc 3C  ', '', '0744181432', 'pregatita', '2022-07-13 22:53:48');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cos_cumparaturi`
--

DROP TABLE IF EXISTS `cos_cumparaturi`;
CREATE TABLE IF NOT EXISTS `cos_cumparaturi` (
  `id_cos` int(11) NOT NULL AUTO_INCREMENT,
  `cost_total` int(5) NOT NULL DEFAULT '0',
  `id_produse` int(11) NOT NULL,
  `id_utilizatori` bigint(11) NOT NULL,
  `cantitate` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cos`),
  KEY `id_produse` (`id_produse`),
  KEY `id_utilizatori` (`id_utilizatori`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `cos_cumparaturi`
--

INSERT INTO `cos_cumparaturi` (`id_cos`, `cost_total`, `id_produse`, `id_utilizatori`, `cantitate`) VALUES
(3, 25, 7, 144, 1),
(25, 16, 9, 146, 1),
(26, 25, 7, 145, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `metode_plata`
--

DROP TABLE IF EXISTS `metode_plata`;
CREATE TABLE IF NOT EXISTS `metode_plata` (
  `id_metoda_plata` int(11) NOT NULL AUTO_INCREMENT,
  `metoda_plata` varchar(100) NOT NULL,
  `statusMetode` varchar(11) NOT NULL DEFAULT 'activ',
  PRIMARY KEY (`id_metoda_plata`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `metode_plata`
--

INSERT INTO `metode_plata` (`id_metoda_plata`, `metoda_plata`, `statusMetode`) VALUES
(5, 'Plata cu cardul la curier', 'activ'),
(6, 'Plata cu numerar', 'activ'),
(7, 'Plata cu bonuri de masa ', 'activ'),
(8, 'Plata cu voucher', 'inactiv');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

DROP TABLE IF EXISTS `produse`;
CREATE TABLE IF NOT EXISTS `produse` (
  `id_produse` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `pret` int(100) NOT NULL,
  `ingrediente` varchar(1000) NOT NULL,
  `gramaj` varchar(50) NOT NULL,
  `imagini_produse` varchar(400) NOT NULL,
  `statusProdus` varchar(11) NOT NULL DEFAULT 'activ',
  PRIMARY KEY (`id_produse`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id_produse`, `id_categorie`, `denumire`, `pret`, `ingrediente`, `gramaj`, `imagini_produse`, `statusProdus`) VALUES
(6, 2, 'Supa miso', 25, 'ceapa', '120', 'https://i.imgur.com/LuY3KLv.jpg', 'activ'),
(7, 1, 'Noodles vita', 25, 'vita, legume', '300', 'https://i.imgur.com/Q19zLwp.jpg', 'activ'),
(8, 2, 'Supa ramen', 36, 'legume', '232', 'https://i.imgur.com/Ssa26rC.jpg', 'activ'),
(9, 1, 'Noodles legume', 16, 'morcov, salata verde', '250', 'https://i.imgur.com/08ykQBT.jpg', 'activ'),
(10, 2, 'Supa udon', 23, 'sadadada', '123', 'https://i.imgur.com/dNIBVN6.jpg', 'activ'),
(14, 1, 'Noodles pui', 20, 'ceapa, rosii, castraveti murati', '200', 'https://i.imgur.com/8TuNCzg.jpg', 'activ'),
(15, 4, 'Bere', 9, 'hamei', '200', 'https://i.imgur.com/F9C5vQl.jpg', 'activ'),
(16, 2, 'Supa curry', 22, 'legume', '222', 'https://i.imgur.com/I9ogPlw.jpg', 'activ'),
(17, 3, 'Ceai verde', 16, 'frunze', '200', 'https://i.imgur.com/6iYpVQY.jpg', 'activ'),
(18, 3, 'Limonada', 16, 'Lamaie, menta', '200', 'https://i.imgur.com/nF1lSMh.jpg', 'activ'),
(19, 4, 'Sake', 15, 'Sake', '100', 'https://i.imgur.com/d5xVLda.jpg', 'activ'),
(20, 5, 'Somon rolls', 40, 'Somon', '200', 'https://i.imgur.com/CCY5w7b.jpg', 'activ'),
(21, 5, 'Philadelphia roll', 80, 'Sushi', '300', 'https://i.imgur.com/zQHC4nP.jpg', 'activ'),
(22, 5, 'Tuna rolls', 250, 'ton, orez, alge', '100', 'https://www.restaurantyoshi.ro/wp-content/uploads/2019/03/negi-tuna-roll-200.jpg', 'activ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse_comenzi`
--

DROP TABLE IF EXISTS `produse_comenzi`;
CREATE TABLE IF NOT EXISTS `produse_comenzi` (
  `id_produse_comenzi` int(11) NOT NULL AUTO_INCREMENT,
  `id_comenzi` int(11) NOT NULL,
  `id_produse` int(11) NOT NULL,
  `cost_total` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL,
  PRIMARY KEY (`id_produse_comenzi`),
  KEY `id_comenzi` (`id_comenzi`),
  KEY `id_produse` (`id_produse`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `produse_comenzi`
--

INSERT INTO `produse_comenzi` (`id_produse_comenzi`, `id_comenzi`, `id_produse`, `cost_total`, `cantitate`) VALUES
(55, 28, 15, 9, 1),
(56, 29, 15, 18, 2),
(57, 30, 15, 45, 5),
(58, 30, 7, 50, 2),
(59, 31, 6, 25, 1),
(60, 31, 8, 36, 1),
(61, 31, 10, 23, 1),
(62, 31, 16, 22, 1),
(63, 31, 17, 16, 1),
(64, 31, 18, 32, 2),
(65, 31, 20, 40, 1),
(66, 31, 21, 160, 2),
(67, 32, 19, 15, 1),
(68, 33, 15, 9, 1),
(69, 33, 19, 15, 1),
(70, 34, 7, 25, 1),
(71, 34, 10, 23, 1),
(72, 34, 18, 32, 2),
(73, 35, 17, 160, 10),
(74, 36, 7, 125, 5),
(75, 36, 9, 64, 4),
(76, 37, 7, 25, 1),
(77, 38, 7, 25, 1),
(78, 39, 6, 25, 1),
(79, 40, 7, 25, 1),
(80, 41, 6, 25, 1),
(81, 42, 7, 150, 6),
(82, 42, 6, 25, 1),
(83, 42, 9, 16, 1),
(84, 43, 7, 25, 1),
(85, 44, 7, 25, 1),
(86, 45, 7, 25, 1),
(87, 46, 7, 25, 1),
(88, 47, 7, 25, 1),
(89, 48, 7, 25, 1),
(90, 49, 7, 25, 1),
(91, 51, 7, 25, 1),
(92, 52, 7, 25, 1),
(93, 53, 7, 25, 1),
(96, 54, 7, 25, 1),
(97, 55, 7, 25, 1),
(98, 56, 9, 16, 1),
(99, 57, 7, 25, 1),
(100, 58, 7, 25, 1),
(101, 59, 7, 25, 1),
(102, 60, 7, 25, 1),
(103, 61, 6, 25, 1),
(104, 62, 7, 25, 1),
(105, 63, 7, 25, 1),
(106, 64, 7, 50, 2),
(107, 65, 9, 16, 1),
(108, 66, 7, 50, 2),
(109, 66, 9, 16, 1),
(110, 66, 8, 36, 1),
(111, 66, 16, 22, 1),
(112, 67, 6, 25, 1),
(113, 67, 8, 36, 1),
(114, 67, 10, 23, 1),
(115, 68, 15, 9, 1),
(116, 68, 6, 25, 1),
(117, 68, 8, 36, 1),
(118, 68, 9, 80, 5),
(119, 69, 7, 25, 1),
(120, 69, 9, 32, 2),
(121, 69, 8, 72, 2),
(122, 70, 6, 25, 1),
(123, 71, 20, 40, 1),
(124, 71, 21, 240, 3),
(125, 72, 22, 250, 1),
(126, 72, 21, 80, 1),
(127, 72, 20, 40, 1),
(128, 72, 15, 9, 1),
(129, 72, 19, 15, 1),
(130, 72, 17, 16, 1),
(131, 72, 18, 16, 1),
(132, 72, 16, 22, 1),
(133, 72, 6, 25, 1),
(134, 72, 8, 36, 1),
(135, 72, 10, 23, 1),
(136, 72, 7, 25, 1),
(137, 72, 9, 16, 1),
(138, 72, 14, 20, 1),
(139, 73, 7, 25, 1),
(140, 74, 7, 50, 2),
(141, 74, 9, 16, 1),
(142, 74, 14, 20, 1),
(143, 74, 6, 25, 1),
(144, 74, 8, 36, 1),
(145, 74, 10, 23, 1),
(146, 74, 16, 22, 1),
(147, 74, 17, 16, 1),
(148, 74, 18, 16, 1),
(149, 74, 15, 9, 1),
(150, 74, 19, 15, 1),
(151, 74, 20, 40, 1),
(152, 74, 21, 80, 1),
(153, 74, 22, 250, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `soferi`
--

DROP TABLE IF EXISTS `soferi`;
CREATE TABLE IF NOT EXISTS `soferi` (
  `id_soferi` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `telefon` varchar(11) NOT NULL,
  `oras` varchar(11) NOT NULL,
  PRIMARY KEY (`id_soferi`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `soferi`
--

INSERT INTO `soferi` (`id_soferi`, `nume`, `telefon`, `oras`) VALUES
(2, 'nedefinit', '112', ''),
(3, 'Mihai', '0744811425', 'Bucuresti'),
(4, 'Ion', '0744811392', 'Sibiu'),
(5, 'Mircea', '0743293422', 'Sibiu'),
(6, 'Andrei', '0744811322', 'Brasov'),
(7, 'Dorel', '0766112343', 'Constanta'),
(8, 'Bogdan', '0726112343', 'Constanta'),
(9, 'Ionel', '0722382322', 'Brasov'),
(10, 'Alexandru', '0744811239', 'Timisoara'),
(11, 'Adrian', '0744823123', 'Timisoara'),
(12, 'Cristina', '0734934523', 'Targu Mures'),
(13, 'George', '0734524512', 'Targu Mures'),
(14, 'Stefan', '0722524512', 'Ploiesti'),
(15, 'Gabriel', '0744823295', 'Targu Mures');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id_utilizatori` bigint(11) NOT NULL AUTO_INCREMENT,
  `cod_useri` bigint(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `rang_utilizatori` varchar(100) NOT NULL DEFAULT 'Client',
  `data_Inregistrare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nume_prenume` varchar(100) NOT NULL,
  `varsta` int(11) NOT NULL,
  `oras` varchar(100) NOT NULL,
  `strada_numar_bloc` varchar(100) NOT NULL,
  `nrtelefon` varchar(11) NOT NULL,
  PRIMARY KEY (`id_utilizatori`),
  KEY `cod_useri` (`cod_useri`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id_utilizatori`, `cod_useri`, `username`, `email`, `parola`, `rang_utilizatori`, `data_Inregistrare`, `nume_prenume`, `varsta`, `oras`, `strada_numar_bloc`, `nrtelefon`) VALUES
(144, 9431127313, 'Adrian', 'bezvolevadrian.i@gmail.com', 'Bezvolev99', 'Client', '2022-06-09 13:05:39', 'Bezvolev Adrian ', 23, 'Sibiu', 'Strada Popa Sapca Nr 66', '0744811466'),
(145, 52249694, 'Ionut', 'adrianbezvolev@gmail.com', 'Ionuttest99', 'Administrator', '2022-06-09 13:17:42', 'Ionut Adrian Mihai', 23, 'Timisoara', 'Strada florilor Bloc 3C  ', '0744181432'),
(146, 9484698, 'Mihai', 'mihai@gmail.com', 'Mihai999', 'Bucatar', '2022-06-20 23:00:17', 'Mihai Ioan', 32, 'Targu Mures', 'Strada Buzias Nr. 15A', '0744811399'),
(147, 78935664, 'Ion59', 'emaildetest@asda', 'Ionita98', 'Client', '2022-06-22 15:42:40', 'Mircea Ion', 23, 'Timisoara', 'Strada ploiesti nr 15', '0744811423'),
(148, 531280787, 'alexandru66', 'ionut@gmail.com', 'Alexandru9', 'Client', '2022-07-02 18:15:24', 'Alexandru George', 25, 'Targu Mures', 'Strada Bucuresti Nr. 59', '0744823932');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `comenzi_ibfk_1` FOREIGN KEY (`id_utilizatori`) REFERENCES `utilizatori` (`id_utilizatori`),
  ADD CONSTRAINT `comenzi_ibfk_2` FOREIGN KEY (`id_metoda_plata`) REFERENCES `metode_plata` (`id_metoda_plata`),
  ADD CONSTRAINT `comenzi_ibfk_3` FOREIGN KEY (`id_soferi`) REFERENCES `soferi` (`id_soferi`);

--
-- Constrângeri pentru tabele `cos_cumparaturi`
--
ALTER TABLE `cos_cumparaturi`
  ADD CONSTRAINT `cos_cumparaturi_ibfk_1` FOREIGN KEY (`id_utilizatori`) REFERENCES `utilizatori` (`id_utilizatori`),
  ADD CONSTRAINT `cos_cumparaturi_ibfk_2` FOREIGN KEY (`id_produse`) REFERENCES `produse` (`id_produse`);

--
-- Constrângeri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `produse_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_produse` (`id_categorie`);

--
-- Constrângeri pentru tabele `produse_comenzi`
--
ALTER TABLE `produse_comenzi`
  ADD CONSTRAINT `produse_comenzi_ibfk_1` FOREIGN KEY (`id_comenzi`) REFERENCES `comenzi` (`id_comenzi`),
  ADD CONSTRAINT `produse_comenzi_ibfk_2` FOREIGN KEY (`id_produse`) REFERENCES `produse` (`id_produse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
