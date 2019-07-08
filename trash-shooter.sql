-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 02:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trash-shooter`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `username` varchar(100) NOT NULL,
  `playtime` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`username`, `playtime`, `level`, `score`) VALUES
('a1', '2019-05-20 20:40:05', 1, 0),
('a', '2019-05-20 20:44:38', 1, 0),
('aa', '2019-05-20 20:44:50', 1, 0),
('andre', '2019-05-25 08:20:30', 1, 6),
('aaaa', '2019-05-25 08:25:37', 1, 37),
('admin', '2019-07-08 02:33:25', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(11, 'andre', 'mostoplesam@gmail.com', '$2y$10$8/cBLW.jx4GFaUF6xvHaoudWjaAWXX2T6U/2sLgX0.1cCEACY.lUK', 'Andreas Wegiq Adia Hendix', '0000406.jpg'),
(12, 'one', 'mostoplesam@gmail.com2', '$2y$10$wKVeRmLvxKpxLTGunjgOUOhIPevAmLcOnNeXLQcJydiOBDJKlI7u2', 'aa', ''),
(13, 'admin', 'mostoplesam@gmail.com', '$2y$10$86yQGUdLS05Q40aUeUlijOdiGOtYO/fbfB9AxQz/3GfFXdHwFSR.y', 'admin', ''),
(15, 'andreas', '', '$2y$10$tHcMD6vXttcl1Esn1yGBxeFcDMnq1cGULDHfKaKVXF7kVTZ5Vprh2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
