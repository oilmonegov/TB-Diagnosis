-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 10:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbexpertsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_report`
--

CREATE TABLE `diagnosis_report` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_biodata_id` int(11) UNSIGNED NOT NULL,
  `swollen_lymph_node` varchar(20) NOT NULL,
  `breast_abnormal` varchar(20) NOT NULL,
  `rale_breath` varchar(20) NOT NULL,
  `cough` varchar(20) NOT NULL,
  `hemoptysis` varchar(20) NOT NULL,
  `chest_pain` varchar(20) NOT NULL,
  `fever` varchar(20) NOT NULL,
  `weight_loss` varchar(20) NOT NULL,
  `night_sweat` varchar(20) NOT NULL,
  `lost_appetite` varchar(20) NOT NULL,
  `fatigue` varchar(20) NOT NULL,
  `hiv` varchar(20) NOT NULL,
  `chest_radiography` varchar(20) NOT NULL,
  `tuberculin_skin_test` varchar(20) NOT NULL,
  `blood_test` varchar(20) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis_report`
--

INSERT INTO `diagnosis_report` (`id`, `patient_biodata_id`, `swollen_lymph_node`, `breast_abnormal`, `rale_breath`, `cough`, `hemoptysis`, `chest_pain`, `fever`, `weight_loss`, `night_sweat`, `lost_appetite`, `fatigue`, `hiv`, `chest_radiography`, `tuberculin_skin_test`, `blood_test`, `remark`, `date`) VALUES
(21, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Negative', 'Negative', 'Negative', 'Negative', 'Risk is low! No TB detected.', '2017-08-16 07:15:33'),
(20, 1, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Negative', 'Negative', 'Negative', 'Negative', 'Risk is low! No TB detected.', '2017-08-16 07:13:25'),
(19, 1, 'No', 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'No', 'Negative', 'Positive', 'Positive', 'Negative', 'Patient does not have tuberculosis.', '2017-08-15 23:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `patient_biodata`
--

CREATE TABLE `patient_biodata` (
  `patient_id` int(11) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `othernames` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `blood_group` char(2) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_biodata`
--

INSERT INTO `patient_biodata` (`patient_id`, `surname`, `othernames`, `address`, `mobile_number`, `birth_date`, `sex`, `marital_status`, `blood_group`, `registration_date`) VALUES
(1, 'Okoro', 'Paul', '12 3kjfkhjkjlagos', '08030540611', '2000-12-12', 'M', 'Single', 'O-', '2017-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othernames` varchar(50) NOT NULL,
  `last_login_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `surname`, `othernames`, `last_login_time`) VALUES
(1, 'udochukwu', '$2y$10$Da7inszyj9um60Y2ajQUSe43MitJO/MxLibc9aWU7KgfWttrx.b5i', 'Prince', 'Udochukwu', '2017-08-16 11:38:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_biodata_id` (`patient_biodata_id`);

--
-- Indexes for table `patient_biodata`
--
ALTER TABLE `patient_biodata`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patient_id_UNIQUE` (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `patient_biodata`
--
ALTER TABLE `patient_biodata`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
