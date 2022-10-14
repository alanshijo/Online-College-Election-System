-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2021 at 04:17 PM
-- Server version: 10.5.4-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `election_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`election_status`) VALUES
('end');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch`) VALUES
('2019 - 2022'),
('2018 - 2021'),
('2020 - 2023'),
('2019 - 2021');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `rollno` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phno` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pgug` varchar(10) NOT NULL,
  `yos` int(10) NOT NULL,
  `course` varchar(50) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `candidate_position` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `candidate_votes` int(200) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`rollno`, `fname`, `mname`, `lname`, `phno`, `gender`, `dob`, `email`, `pgug`, `yos`, `course`, `batch`, `candidate_position`, `username`, `status`, `candidate_votes`) VALUES
(1111, 'hareesh', '', 'R', 4565453215, 'Male', '2000-08-05', 'hareesh@gmail.com', 'UG', 3, 'BSc Mathematics', '2018 - 2021', 'Magazine Editor', 'hareesh11', 'approved', 1),
(2452, 'Prince', '', 'Anil', 9072138010, 'Male', '2000-02-27', 'prince123@gmail.com', 'UG', 3, 'Bachelor of Computer Applications', '2018 - 2021', 'Chairman', 'prince2452', 'approved', 2),
(2470, 'Alan', '', 'Shijo', 8281187831, 'Male', '2001-01-24', 'alanshijo06@gmail.com', 'UG', 3, 'Bachelor of Computer Applications(Aided)', '2018 - 2021', 'Third Year UG Representative', 'alan2470', 'approved', 2),
(2471, 'Anandhu', '', 'Gopi', 8848134271, 'Male', '2000-07-12', 'anandhugopi11@gmail.com', 'UG', 3, 'BSc Botany', '2018 - 2021', 'Chairman', 'anandhugopi', 'approved', 1),
(7897, 'sony', '', 'michael', 5489764123, 'Male', '1999-03-18', 'sony@gmail.com', 'PG', 2, 'MSc Botany', '2019 - 2022', 'Vice-Chairman', 'sony', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `login_status` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`, `login_status`) VALUES
('admin', 'admin', 'admin', 'approved'),
('alan2470', 'alanshijo', 'candidate', 'approved'),
('alen2451', 'alenshaju', 'voter', 'approved'),
('Allenunni', '123123', 'voter', 'approved'),
('anandhugopi', 'anandhu', 'candidate', 'approved'),
('hareesh11', '1234', 'candidate', 'approved'),
('jeffy12', '123123', 'voter', 'approved'),
('prince2452', 'princeanil', 'candidate', 'approved'),
('sony', '159951', 'candidate', '');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_name`) VALUES
('Third Year UG Representative'),
('Second Year UG Representative'),
('First Year UG Representative'),
('Sports Secretary'),
('Arts Club Secretary'),
('Magazine Editor'),
('University Union Councillor'),
('General Secretary'),
('Vice-Chairman'),
('Chairman'),
('First Year PG Representative'),
('Second Year PG Representative'),
('Lady Representative'),
('UUC');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `rollno` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pgug` varchar(10) NOT NULL,
  `yos` int(10) NOT NULL,
  `course` varchar(70) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`rollno`, `fname`, `mname`, `lname`, `phno`, `gender`, `dob`, `email`, `pgug`, `yos`, `course`, `batch`, `username`, `status`) VALUES
(1234, 'jeffy', '', 'john', 1236547893, 'Male', '2000-04-21', 'jeffy@gmail.com', 'UG', 3, 'MSc Chemistry', '2018 - 2021', 'jeffy12', 'approved'),
(2424, 'Allen ', '', 'Unni', 123654781, 'Male', '2000-04-20', 'Allen@gmail.com', 'UG', 3, 'BSc Botany', '2018 - 2021', 'Allenunni', 'approved'),
(2451, 'Alen', '', 'Shaju', 7559814632, 'Male', '2001-02-14', 'alen159@gmail.com', 'UG', 3, 'Bachelor of Computer Applications(Aided)', '2018 - 2021', 'alen2451', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `voter_id` varchar(30) NOT NULL,
  `position` varchar(40) NOT NULL,
  KEY `voter_id` (`voter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`voter_id`, `position`) VALUES
('alen2451', 'Chairman'),
('jeffy12', 'Third Year UG Representative'),
('jeffy12', 'Chairman'),
('alen2451', 'Third Year UG Representative'),
('Allenunni', 'Chairman'),
('alen2451', 'Magazine Editor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
