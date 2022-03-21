-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 03:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidsafeplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `batiment`
--

CREATE TABLE `batiment` (
  `idBatiment` int(11) NOT NULL,
  `nomBatiment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batiment`
--

INSERT INTO `batiment` (`idBatiment`, `nomBatiment`) VALUES
(1, 'LaPlaine'),
(2, 'Erasme');

-- --------------------------------------------------------

--
-- Table structure for table `local_`
--

CREATE TABLE `local_` (
  `idLocal` int(11) NOT NULL,
  `capteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `idBatiment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `local_`
--

INSERT INTO `local_` (`idLocal`, `capteur`, `nom`, `idBatiment`) VALUES
(1, 1, '1503', 1),
(2, 2, '1250', 2),
(3, 3, '2101', 1),
(4, 4, '3500', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mesure`
--

CREATE TABLE `mesure` (
  `idMesure` int(11) NOT NULL,
  `taux` int(11) NOT NULL,
  `typeData` int(11) NOT NULL,
  `date_` datetime NOT NULL,
  `idLocal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesure`
--

INSERT INTO `mesure` (`idMesure`, `taux`, `typeData`, `date_`, `idLocal`) VALUES
(1, 25, 1, '2022-02-21 23:12:23', 1),
(2, 750, 3, '2022-03-22 11:23:40', 1),
(3, 650, 3, '2022-02-21 13:12:53', 2),
(4, 65, 2, '2022-02-21 23:35:39', 1),
(5, 44, 2, '2022-02-21 23:51:38', 3),
(6, 32, 2, '2022-02-21 21:48:50', 4),
(7, 80, 2, '2022-02-21 08:29:23', 2),
(8, 200, 3, '2022-02-21 02:18:37', 1),
(9, -5, 1, '2022-02-21 10:23:06', 4),
(10, 12, 1, '2022-02-21 06:02:32', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`idBatiment`);

--
-- Indexes for table `local_`
--
ALTER TABLE `local_`
  ADD PRIMARY KEY (`idLocal`),
  ADD KEY `idBatiment` (`idBatiment`);

--
-- Indexes for table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `idLocal` (`idLocal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `idBatiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `local_`
--
ALTER TABLE `local_`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mesure`
--
ALTER TABLE `mesure`
  MODIFY `idMesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_`
--
ALTER TABLE `local_`
  ADD CONSTRAINT `local__ibfk_1` FOREIGN KEY (`idBatiment`) REFERENCES `batiment` (`idBatiment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `mesure_ibfk_1` FOREIGN KEY (`idLocal`) REFERENCES `local_` (`idLocal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
