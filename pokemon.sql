-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 06:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemon_data`
--

CREATE TABLE `pokemon_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `height` varchar(5) NOT NULL,
  `hp` int(10) NOT NULL,
  `attack` int(10) NOT NULL,
  `defense` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `picture` text NOT NULL,
  `owner_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon_data`
--

INSERT INTO `pokemon_data` (`id`, `name`, `height`, `hp`, `attack`, `defense`, `type`, `picture`, `owner_status`) VALUES
(2, 'bulbasaur', '7', 45, 49, 49, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png', 2),
(3, 'ivysaur', '10', 60, 62, 63, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png', 2),
(4, 'venusaur', '20', 80, 82, 83, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png', 2),
(5, 'charmander', '6', 39, 52, 43, 'fire', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png', NULL),
(6, 'charmeleon', '11', 58, 64, 58, 'fire', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png', NULL),
(7, 'charizard', '17', 78, 84, 78, 'fire', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png', NULL),
(8, 'squirtle', '5', 44, 48, 65, 'water', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png', 2),
(9, 'wartortle', '10', 59, 63, 80, 'water', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/8.png', NULL),
(10, 'blastoise', '16', 79, 83, 100, 'water', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/9.png', NULL),
(11, 'caterpie', '3', 45, 30, 35, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/10.png', NULL),
(12, 'metapod', '7', 50, 20, 55, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/11.png', NULL),
(13, 'butterfree', '11', 60, 45, 50, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/12.png', NULL),
(14, 'weedle', '3', 40, 35, 30, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/13.png', NULL),
(15, 'kakuna', '6', 45, 25, 50, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/14.png', NULL),
(16, 'beedrill', '10', 65, 90, 40, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/15.png', NULL),
(17, 'pidgey', '3', 40, 45, 40, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/16.png', NULL),
(18, 'pidgeotto', '11', 63, 60, 55, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/17.png', NULL),
(19, 'pidgeot', '15', 83, 80, 75, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/18.png', NULL),
(20, 'rattata', '3', 30, 56, 35, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/19.png', NULL),
(21, 'raticate', '7', 55, 81, 60, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/20.png', NULL),
(22, 'spearow', '3', 40, 60, 30, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/21.png', NULL),
(23, 'fearow', '12', 65, 90, 65, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/22.png', NULL),
(24, 'ekans', '20', 35, 60, 44, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/23.png', NULL),
(25, 'arbok', '35', 60, 95, 69, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/24.png', NULL),
(26, 'pikachu', '4', 35, 55, 40, 'electric', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png', NULL),
(27, 'raichu', '8', 60, 90, 55, 'electric', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/26.png', NULL),
(28, 'sandshrew', '6', 50, 75, 85, 'ground', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/27.png', NULL),
(29, 'sandslash', '10', 75, 100, 110, 'ground', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/28.png', NULL),
(30, 'nidoran-f', '4', 55, 47, 52, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/29.png', NULL),
(31, 'nidorina', '8', 70, 62, 67, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/30.png', NULL),
(32, 'nidoqueen', '13', 90, 92, 87, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/31.png', NULL),
(33, 'nidoran-m', '5', 46, 57, 40, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/32.png', NULL),
(34, 'nidorino', '9', 61, 72, 57, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/33.png', NULL),
(35, 'nidoking', '14', 81, 102, 77, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/34.png', NULL),
(36, 'clefairy', '6', 70, 45, 48, 'fairy', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/35.png', NULL),
(37, 'clefable', '13', 95, 70, 73, 'fairy', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/36.png', NULL),
(38, 'vulpix', '6', 38, 41, 40, 'fire', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/37.png', NULL),
(39, 'ninetales', '11', 73, 76, 75, 'fire', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/38.png', NULL),
(40, 'jigglypuff', '5', 115, 45, 20, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/39.png', NULL),
(41, 'wigglytuff', '10', 140, 70, 45, 'normal', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/40.png', NULL),
(42, 'zubat', '8', 40, 45, 35, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/41.png', NULL),
(43, 'golbat', '16', 75, 80, 70, 'poison', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/42.png', NULL),
(44, 'oddish', '5', 45, 50, 55, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/43.png', NULL),
(45, 'gloom', '8', 60, 65, 70, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/44.png', NULL),
(46, 'vileplume', '12', 75, 80, 85, 'grass', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/45.png', NULL),
(47, 'paras', '3', 35, 70, 55, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/46.png', NULL),
(48, 'parasect', '10', 60, 95, 80, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/47.png', NULL),
(49, 'venonat', '10', 60, 55, 50, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/48.png', NULL),
(50, 'venomoth', '15', 70, 65, 60, 'bug', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/49.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`, `user_email`, `type`, `status`) VALUES
(1, '0CLUTtBRG7PhSJexHX5dwz8jYraEkMDfopQAWiN6KqvOgulVyn', 'asd@mail.com', 0, 0),
(2, 'xicvmwrSoOaBT6XbGyV4C8JzjehqWsKf3YIFEA7d50UNpgk2QH', 'stevenjack98@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `email`, `photo`, `status`) VALUES
(1, 'asd', 'asd', '$2y$10$eSdMYPosKJREua0gG0Nq4e6xAkXow2aiTwVTqU.LQupq2pvtZ0Cla', 'asd@mail.com', 'asd-a.png', 0),
(2, 'steven', 'steven', '$2y$10$xxDxzTYC1VWegu9B8pTma.zsFWGsIRLdlxvYZBEIS.OcXDM7B5Tae', 'stevenjack98@gmail.com', 'steven-a.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon_data`
--
ALTER TABLE `pokemon_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon_data`
--
ALTER TABLE `pokemon_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
