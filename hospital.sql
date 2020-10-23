-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2017 at 01:51 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallpatientinf`()
BEGIN
 SELECT * FROM patientinformation;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getallpatientinfo`()
BEGIN
SELECT * FROM patientinformation;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getsinglepatientinfo`(in patient_no varchar(50))
BEGIN
SELECT * FROM patientinformation 
WHERE patient_id= patient_no;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `billinformation`
--

CREATE TABLE IF NOT EXISTS `billinformation` (
  `Date` datetime NOT NULL,
  `Bill_no` int(50) NOT NULL,
  `Patient_no` varchar(50) NOT NULL,
  `Doctor_no` varchar(50) NOT NULL,
  `Room_no` varchar(50) NOT NULL,
  `No_days` varchar(30) NOT NULL,
  `Room_rent` varchar(30) NOT NULL,
  `Medicin_fees` varchar(20) NOT NULL,
  `Doctor_fees` varchar(15) NOT NULL,
  `Amount` varchar(50) NOT NULL,
  PRIMARY KEY (`Bill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctorinformation`
--

CREATE TABLE IF NOT EXISTS `doctorinformation` (
  `Doctor_id` int(20) NOT NULL AUTO_INCREMENT,
  `Doctor_name` varchar(30) NOT NULL,
  `ph_no` varchar(30) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  ` Specialization` varchar(50) NOT NULL,
  PRIMARY KEY (`Doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctorinformation`
--

INSERT INTO `doctorinformation` (`Doctor_id`, `Doctor_name`, `ph_no`, `room_no`, ` Specialization`) VALUES
(1, 'Dr.Ramesh', '9876543210', '1', 'Heart');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`) VALUES
('jk', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `patientinformation`
--

CREATE TABLE IF NOT EXISTS `patientinformation` (
  `patient_id` int(15) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `admitted_date` datetime NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `ph_no` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientinformation`
--

INSERT INTO `patientinformation` (`patient_id`, `patient_name`, `doctor_id`, `gender`, `admitted_date`, `room_no`, `ph_no`, `address`) VALUES
(1, 'Sachin', '1Dr.Ramesh', 'Male', '2017-12-01 01:49:59', '1', '9876543210', ' nidasoshi');

-- --------------------------------------------------------

--
-- Table structure for table `roominformation`
--

CREATE TABLE IF NOT EXISTS `roominformation` (
  `room_no` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `room type` varchar(30) NOT NULL,
  PRIMARY KEY (`room_no`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roominformation`
--

INSERT INTO `roominformation` (`room_no`, `patient_id`, `room type`) VALUES
('1', '2', 'Normal'),
('2', '4', 'Normal');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewbillj`
--
CREATE TABLE IF NOT EXISTS `viewbillj` (
`Bill_no` int(50)
,`patient_id` int(15)
,`patient_name` varchar(30)
,`doctor_id` varchar(50)
,`Amount` varchar(50)
,`date` datetime
);
-- --------------------------------------------------------

--
-- Structure for view `viewbillj`
--
DROP TABLE IF EXISTS `viewbillj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbillj` AS select `b`.`Bill_no` AS `Bill_no`,`p`.`patient_id` AS `patient_id`,`p`.`patient_name` AS `patient_name`,`p`.`doctor_id` AS `doctor_id`,`b`.`Amount` AS `Amount`,`b`.`Date` AS `date` from (`billinformation` `b` join `patientinformation` `p` on((`b`.`Patient_no` = `p`.`patient_id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
