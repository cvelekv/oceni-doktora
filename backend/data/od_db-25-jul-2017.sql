-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2017 at 08:39 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `od_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `doktor`
--

CREATE TABLE `doktor` (
  `id` int(11) NOT NULL,
  `ime` varchar(64) NOT NULL,
  `prezime` varchar(64) NOT NULL,
  `slika` varchar(1000) NOT NULL,
  `Opis` varchar(200) NOT NULL,
  `institucija_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doktor`
--

INSERT INTO `doktor` (`id`, `ime`, `prezime`, `slika`, `Opis`, `institucija_id`) VALUES
(1, 'Petar', 'Petrovic', 'http://yunus.hacettepe.edu.tr/~gyavuz09/doktor.jpg', '', 1),
(2, 'Mirko', 'Mirkovic', 'https://image.freepik.com/free-photo/doctor-smiling-with-stethoscope_1154-36.jpg', '', 1),
(3, 'Petar', 'Peric', 'https://randomuser.me/api/portraits/men/41.jpg', '', 2),
(4, 'Milinko', 'Maric', 'https://randomuser.me/api/portraits/men/46.jpg', '', 2),
(5, 'Radisa', 'Trajkovic', 'http://www.svet.rs/wp-content/uploads/2016/12/Radisa-Trajkovic-Djani-foto-Ivan-Vucicevic-8-copy.jpg', '', 3),
(6, 'Mali', 'Rambo', 'https://upload.wikimedia.org/wikipedia/sr/thumb/2/2d/Ipceahmedovski-1.jpg/250px-Ipceahmedovski-1.jpg', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` bigint(20) NOT NULL,
  `ime_grada` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `ime_grada`) VALUES
(1, 'Beograd'),
(2, 'Kraljevo');

-- --------------------------------------------------------

--
-- Table structure for table `institucija`
--

CREATE TABLE `institucija` (
  `id` bigint(20) NOT NULL,
  `ime_institucije` varchar(50) NOT NULL,
  `grad_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institucija`
--

INSERT INTO `institucija` (`id`, `ime_institucije`, `grad_id`) VALUES
(1, 'Batut', 1),
(2, 'Sveti Nikola', 2),
(3, 'Studenica', 2),
(4, 'VMA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `id` bigint(20) NOT NULL,
  `ocena` int(11) NOT NULL,
  `doktor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id`, `ocena`, `doktor_id`) VALUES
(1, 4, 1),
(2, 5, 1),
(3, 4, 1),
(4, 5, 1),
(5, 4, 1),
(6, 3, 1),
(7, 4, 2),
(8, 5, 3),
(9, 4, 3),
(10, 3, 3),
(11, 4, 2),
(12, 5, 3),
(13, 1, 3),
(14, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doktor`
--
ALTER TABLE `doktor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_institucija_id` (`institucija_id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `institucija`
--
ALTER TABLE `institucija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grad_id` (`grad_id`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doktor_id` (`doktor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doktor`
--
ALTER TABLE `doktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `institucija`
--
ALTER TABLE `institucija`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doktor`
--
ALTER TABLE `doktor`
  ADD CONSTRAINT `fk_institucija_id` FOREIGN KEY (`institucija_id`) REFERENCES `institucija` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `institucija`
--
ALTER TABLE `institucija`
  ADD CONSTRAINT `fk_grad_id` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
