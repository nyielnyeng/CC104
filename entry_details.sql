-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database1`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry_details`
--

CREATE TABLE `entry_details` (
  `surName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `sec` varchar(255) NOT NULL,
  `studentNumber` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entry_details`
--

INSERT INTO `entry_details` (`surName`, `firstName`, `middleName`, `course`, `year`, `sem`, `sec`, `studentNumber`, `email`, `birthdate`, `address`, `username`, `password`) VALUES
('Cortez', 'Christian Chilles', 'Granadel', 'BSCS', '2nd Year', '1st Semester', 'A', 20225168, 'christianchillescortez.scc@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'Chayls21', '12345'),
('Cortez', 'Christian Chilles', 'Granadel', 'BSCS', '2nd Year', '1st Semester', 'A', 20225168, 'christianchillescortez.scc@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'Chayls21', '12345'),
('Cortez', 'Christian Chilles', 'Granadel', 'BSCS', '2nd Year', '1st Semester', 'A', 20225168, 'christianchillescortez.scc@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'Chayls21', '12345'),
('Cortez', 'Christian Chilles', 'Granadel', 'BSCS', '2nd Year', '1st Semester', 'A', 20225168, 'christianchillescortez.scc@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'Chayls21', '12345'),
('Brown', 'Xyrus', 'H', 'BSTM', '2nd Year', '1st Semester', 'D', 20225169, 'dsad3wasdxz.scc@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong SIlang, Caloocan City', 'cortez212', '12345'),
('Green', 'Red', 'Y', 'BEED', '2nd Year', '1st Semester', 'A', 20225100, 'dsadwads@gmail.com', '0000-00-00', 'dsadsadsad', 'icy21', '123456'),
('Black', 'Blue', 'Y', 'BSBA', '1st Year', '1st Semester', 'D', 20228912, 'asdjklnmgrsl@gmail.com', '0000-00-00', 'cxcxzxcz', 'hii21', '12345'),
('Test1', 'Test2', 'Test3', 'BSCS', '2nd Year', '1st Semester', 'A', 20220000, 'weplay.wewin21@gmail.com', '0000-00-00', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'testbot', '12345'),
('1', '2', '3', 'BSHM', '3rd Year', 'Summer', 'E', 20224327, 'dmaskldm.scc@gmail.com', '2023-12-14', 'Phase 9, Package 2, Block 8, Lot 2, Bagong Silang, Caloocan City', 'testbot1', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
