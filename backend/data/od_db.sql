-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 08:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `slika` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doktor`
--

INSERT INTO `doktor` (`id`, `ime`, `prezime`, `slika`) VALUES
(1, 'Petar', 'Petrovic', ''),
(2, 'Mirko', 'Mirkovic', 'https://image.freepik.com/free-photo/doctor-smiling-with-stethoscope_1154-36.jpg'),
(3, 'Petar', 'Peric', 'https://randomuser.me/api/portraits/men/41.jpg'),
(4, 'Milinko', 'Maric', 'https://randomuser.me/api/portraits/men/46.jpg'),
(5, 'Radisa', 'Trajkovic', 'http://www.svet.rs/wp-content/uploads/2016/12/Radisa-Trajkovic-Djani-foto-Ivan-Vucicevic-8-copy.jpg'),
(6, 'Mali', 'Rambo', 'https://upload.wikimedia.org/wikipedia/sr/thumb/2/2d/Ipceahmedovski-1.jpg/250px-Ipceahmedovski-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `id` bigint(20) NOT NULL,
  `ocena` int(11) NOT NULL,
  `profesor_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id`, `ocena`, `profesor_id`) VALUES
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doktor`
--
ALTER TABLE `doktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
