-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 09:25 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ste_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idc` int(10) NOT NULL,
  `comtext` text NOT NULL,
  `comdate` date NOT NULL,
  `modified` tinyint(1) NOT NULL,
  `idu` int(5) NOT NULL,
  `idp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idc`, `comtext`, `comdate`, `modified`, `idu`, `idp`) VALUES
(1, 'hi', '2020-07-03', 0, 1, 2),
(2, 'hi2', '2020-07-03', 0, 1, 2),
(3, 'salut', '2020-07-03', 0, 1, 1),
(4, 'hi', '2020-07-03', 0, 1, 1),
(5, 'hi', '2020-07-04', 0, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `idu` int(5) NOT NULL,
  `idp` int(3) NOT NULL,
  `state` int(1) NOT NULL DEFAULT '0',
  `idd` int(6) DEFAULT NULL,
  `np` int(3) DEFAULT NULL,
  `ddate` date DEFAULT NULL,
  `vdate` date DEFAULT NULL,
  `fdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`idu`, `idp`, `state`, `idd`, `np`, `ddate`, `vdate`, `fdate`) VALUES
(2, 5, 2, 2, 3, '2020-07-15', '2020-07-01', NULL),
(2, 6, 2, 2, 15, '2020-07-07', '2020-07-01', NULL),
(2, 6, 1, 3, 10, '2020-07-01', NULL, NULL),
(1, 1, 3, 4, 20, '2020-07-03', '2020-07-03', '2020-07-04'),
(1, 2, 3, 4, 9, '2020-07-03', '2020-07-03', '2020-07-04'),
(1, 1, 2, 5, 5, '2020-07-04', '2020-07-04', NULL),
(1, 2, 2, 5, 4, '2020-07-04', '2020-07-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `idf` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num` varchar(15) NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`idf`, `fname`, `lname`, `email`, `num`, `txt`) VALUES
(1, 'joha', 'wa7i', 'ibra@gmail.com', '0612457836', '\r\nHallo, wie geht es dir? Ich weiss nicht, warum ich diese Mail schreibe, und ich weiss nicht, an wen ich sie sende');

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

CREATE TABLE `mylist` (
  `idu` int(5) NOT NULL,
  `idp` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mylist`
--

INSERT INTO `mylist` (`idu`, `idp`) VALUES
(1, 14),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodect`
--

CREATE TABLE `prodect` (
  `idp` int(3) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `ptype` varchar(30) NOT NULL,
  `pl` float NOT NULL,
  `pw` float NOT NULL,
  `ph` float NOT NULL,
  `pcat` varchar(15) NOT NULL,
  `price` int(8) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `descp` text NOT NULL,
  `imgs` varchar(30) NOT NULL,
  `img2` varchar(30) NOT NULL,
  `img3` varchar(30) NOT NULL,
  `xhover` int(100) NOT NULL DEFAULT '0',
  `xvisit` int(100) NOT NULL DEFAULT '0',
  `in_home` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodect`
--

INSERT INTO `prodect` (`idp`, `pname`, `ptype`, `pl`, `pw`, `ph`, `pcat`, `price`, `in_stock`, `descp`, `imgs`, `img2`, `img3`, `xhover`, `xvisit`, `in_home`) VALUES
(1, 'SERRE CABLE', 'Fer', 0, 0, 0, 'AUTRE', 6, 1, 'p1', '5efdbad753dd24.11514565.jpg', '5efdbad753dd24.11514565.jpg', '5efdbad753dd24.11514565.jpg', 24, 14, 1),
(2, 'CABLE Dâ€™ACIER 18X2 6MM', 'fer', 0, 0.6, 0, 'CABLE', 60, 1, 'p2', '5efdbe95706298.04387558.jpg', '5efdbe95706298.04387558.jpg', '5efdbe95706298.04387558.jpg', 35, 3, 0),
(3, 'CABLE Dâ€™ACIER 15X2 5MM', 'fer', 0, 0.5, 0, 'CABLE', 50, 1, 'p3', '5efdbee759e109.32060228.jpg', '5efdbee759e109.32060228.jpg', '5efdbee759e109.32060228.jpg', 30, 0, 0),
(4, 'CAPUCHON', 'Plastique', 0, 0, 0, 'AUTRE', 12, 1, 'p3', '5efdbf44b2bc63.41201791.jpg', '5efdbf44b2bc63.41201791.jpg', '5efdbf44b2bc63.41201791.jpg', 2, 0, 0),
(5, 'FER FIXATIO', 'fer', 0, 0, 0, 'AUTRE', 7, 1, 'p4', '5efdbf87f0d6c7.23432675.jpg', '5efdbf87f0d6c7.23432675.jpg', '5efdbf87f0d6c7.23432675.jpg', 0, 0, 0),
(6, 'FIL GALVANISE', 'fer', 0, 0, 0, 'CABLE', 25, 1, 'p5', '5efdc021a4a4e3.60700620.jpg', '5efdc021a4a4e3.60700620.jpg', '5efdc021a4a4e3.60700620.jpg', 7, 0, 0),
(7, 'GRANDE  BASE', 'Ciment', 0, 0, 0, 'BASE', 15, 1, 's1s', '5efdc16fc07a78.22212350.jpg', '5efdc16fc0a9e2.37716670.jpg', '5efdc16fc0dd87.93026206.jpg', 4, 4, 0),
(8, 'POUR PAUTEAU CENTRALE', 'Ciment', 0, 0, 0, 'BASE', 13, 1, 's3s', '5efdc2c4093c63.66867059.jpg', '5efdc2c4097ab4.24678659.jpg', '5efdc2c4093c63.66867059.jpg', 4, 0, 0),
(9, 'BASE POUR PAUTEAU CENTRALE', 'Ciment', 0, 0, 0, 'BASE', 16, 1, 'bas', '5efdc40ccaae03.18840099.jpg', '5efdc40ccaae03.18840099.jpg', '5efdc40ccaae03.18840099.jpg', 0, 0, 0),
(10, 'FER Dâ€™ANCRAGE	', 'fer', 0, 0, 0, 'AUTRE', 11, 1, 'vs', '5efdc4afdcee48.78929788.jpg', '5efdc4afdcee48.78929788.jpg', '5efdc4afdcee48.78929788.jpg', 29, 0, 1),
(11, 'SOCLE', 'Ciment', 0, 0, 0, 'BASE', 19, 0, 'vxd', '5efdc53f16ea91.11904473.jpg', '5efdc53f16ea91.11904473.jpg', '5efdc53f16ea91.11904473.jpg', 13, 1, 0),
(12, 'TUYAU  CAPILLAIRE', 'Plastique', 0, 0, 0, 'AUTRE', 22, 1, 'mml', '5efdc57d4a5ea6.24080754.jpg', '5efdc57d4a5ea6.24080754.jpg', '5efdc57d4a5ea6.24080754.jpg', 13, 0, 1),
(13, 'PAUTEAUX 2.50 6X6', 'Ciment', 6, 6, 250, 'PAUTEAUX', 35, 0, 'b dj', '5efdc6143301b1.55865488.jpg', '5efdc6143301b1.55865488.jpg', '5efdc6143301b1.55865488.jpg', 13, 1, 1),
(14, 'PAUTEAUX 2.50 7X8', 'Ciment', 8, 7, 250, 'PAUTEAUX', 37, 1, 'wcv', '5efdc669616669.02909594.jpg', '5efdc669616669.02909594.jpg', '5efdc669616669.02909594.jpg', 2, 10, 0),
(15, 'PAUTEAUX 2.70 6X6', 'Ciment', 6, 6, 270, 'PAUTEAUX', 40, 1, 'ppc ', '5efdc6ef260c47.86358888.jpg', '5efdc6ef260c47.86358888.jpg', '5efdc6ef260c47.86358888.jpg', 0, 0, 0),
(16, 'PAUTEAUX 2.90 7X8', 'Ciment', 7, 8, 290, 'PAUTEAUX', 48, 0, ',n r', '5efdc7aa2397e0.40087397.jpg', '5efdc7aa2397e0.40087397.jpg', '5efdc7aa2397e0.40087397.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `idc` int(10) NOT NULL,
  `replytext` text NOT NULL,
  `idu` int(5) NOT NULL,
  `replydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`idc`, `replytext`, `idu`, `replydate`) VALUES
(1, 'rep', 1, '2020-07-03'),
(1, 'LOS', 1, '2020-07-03'),
(2, 'LIS', 1, '2020-07-03'),
(2, 'LIS2', 1, '2020-07-03'),
(5, 'hi2', 1, '2020-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `bd` date NOT NULL,
  `gender` char(1) NOT NULL,
  `pn` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `datei` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `bd`, `gender`, `pn`, `email`, `address`, `city`, `password`, `datei`) VALUES
(1, 'BOUGARROUA', 'ibrahim', '2000-03-08', 'M', '0722111465', 'email', 'iaazanene', 'NADOR', 'b17e1e0450dac425ea318253f6f852972d69731d6c7499c001468b695b6da219', '0000-00-00'),
(2, 'ENS2', 'ENS2', '2000-02-18', 'M', '0123456704', 'ens2@a.a', 'Stret stret', 'BERKANE', 'b17e1e0450dac425ea318253f6f852972d69731d6c7499c001468b695b6da219', '0000-00-00'),
(3, 'joha', 'wa7i', '2020-07-08', 'F', '0612457838', 'ibra@gmail.com', 'nadorboughgafer', 'NADOR', 'b17e1e0450dac425ea318253f6f852972d69731d6c7499c001468b695b6da219', '2020-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(3) NOT NULL,
  `file` varchar(25) NOT NULL,
  `x` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `file`, `x`) VALUES
(1, 'index', 48),
(2, 'categorie', 47),
(3, 'commande', 69),
(4, 'connect', 4),
(5, 'connected', 15),
(6, 'contact', 6),
(7, 'depliant', 1),
(8, 'developpers', 1),
(9, 'inscrire', 1),
(10, 'myliste', 14),
(11, 'place', 1),
(12, 'product', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `prodect`
--
ALTER TABLE `prodect`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodect`
--
ALTER TABLE `prodect`
  MODIFY `idp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
