-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 06:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `RefNo` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `NIC` varchar(255) NOT NULL,
  `BirthDate` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`RefNo`, `FullName`, `Contact`, `NIC`, `BirthDate`, `Gender`, `Username`, `Password`) VALUES
('24718105953805', 'Suchini Ishanka ', '0702343279', '200059300232', '2000-04-02', 'Female', '39-bit-0014', '1234'),
('24718110130320', 'Chathumi Himasha', '0716568953', '200059707255', '2000-12-15', 'Female', '39-bit-0013', '1234'),
('24718110227744', 'Upani Ehara', '0716568791', '200159507455', '2001-02-12', 'Female', '39-bit-0016', '1234'),
('24718110328439', 'Thisarani Thanuja', '0716565000', '200259872405', '2002-01-09', 'Female', '39-bit-0015', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`RefNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
