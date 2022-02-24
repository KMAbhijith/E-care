-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 05:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-care`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `BL_id` int(11) NOT NULL,
  `BL_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`BL_id`, `BL_group`) VALUES
(1, 'A+'),
(2, 'AB+'),
(3, 'AB-'),
(4, 'B+'),
(5, 'B-'),
(6, 'O+'),
(7, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `S_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` int(11) NOT NULL,
  `Dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Dept_name`) VALUES
(1, 'Cardiology'),
(2, 'Dermetology'),
(3, 'ENT'),
(4, 'General Medicine'),
(8, 'Dentist'),
(9, 'Pediatric'),
(10, 'Gynaecology');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_id` int(11) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `D_name` varchar(50) NOT NULL,
  `D_pos` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `D_email` varchar(50) NOT NULL,
  `D_phone` bigint(10) NOT NULL,
  `D_license` varchar(10000) NOT NULL,
  `D_specialization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_id`, `Log_id`, `D_name`, `D_pos`, `Dept_id`, `D_email`, `D_phone`, `D_license`, `D_specialization_id`) VALUES
(6, 91, 'Jobin Jose', 'Senoir', 1, 'jobin1@gmail.com', 9090878765, 'Prototype.pdf', 1),
(7, 92, 'Nimisha James', 'junior', 10, 'nimisha@gmail.com', 7899877890, 'Prototype.pdf', 12),
(8, 93, 'Sam Mon', 'senoir', 1, 'sammon@gmail.com', 8907654321, 'office.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctoreducation`
--

CREATE TABLE `doctoreducation` (
  `D_edu_id` int(11) NOT NULL,
  `D_edu_qualification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctorhospitalhistory`
--

CREATE TABLE `doctorhospitalhistory` (
  `D_Hoswrk_id` int(11) NOT NULL,
  `D_Hoswrk_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labreport`
--

CREATE TABLE `labreport` (
  `L_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `L_testtype` varchar(50) NOT NULL,
  `L_result` varchar(50) NOT NULL,
  `L_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Log_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Utype_id` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Log_id`, `Username`, `Password`, `Utype_id`, `Status`) VALUES
(1, 'admin123', 'a43c27c2babefd68df8a694900f30a1c', 1, 1),
(77, 'Asdf1234', '39bb37cf36d3b29a9280d8a70a0eed42', 3, 1),
(78, 'Jilse123', '8bc58aefec2ef59169fad9e3a0e97736', 3, 1),
(79, 'joice123', '17c99f21749f2d75e539374109ac67f8', 3, 1),
(80, 'Asif1234', 'b93624c6810352e1b979d2f4b91a5202', 3, 1),
(81, 'Jobin123', '4b638af87593cb5448760e94655151f3', 3, 1),
(82, 'Jommesh1', '191ba80be03bda8f918ce7799e11430c', 3, 1),
(83, 'Tom12345', '7a9e3cef8b553fa41b6a6a3155d55a0d', 3, 1),
(91, 'jobindoc', '5cb1e0a28e5beb1da934ddf0869e2fba', 2, 1),
(92, 'Nimisha8', 'bf5e2e47d7aee8980ab748b37ad0e2d8', 2, 1),
(93, 'sammon21', 'f8effd736e48a4de2b5da1550728d6e4', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MedHis_id` int(10) NOT NULL,
  `MedHis_Hospital_id` int(10) NOT NULL,
  `P_id` int(11) NOT NULL,
  `Med_sympoms` varchar(500) NOT NULL,
  `MedHis_Hospital_treatment` varchar(500) NOT NULL,
  `MedHis_Hospital_Report` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicalreport`
--

CREATE TABLE `medicalreport` (
  `M_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `M_title` varchar(50) NOT NULL,
  `M_symptoms` varchar(500) NOT NULL,
  `M_diagnostic_report` varchar(10000) NOT NULL,
  `M_treatment` varchar(500) NOT NULL,
  `M_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mhospitals`
--

CREATE TABLE `mhospitals` (
  `MedHis_Hospital_id` int(11) NOT NULL,
  `HospitalName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_id` int(11) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `P_address` varchar(50) NOT NULL,
  `P_gender` varchar(20) NOT NULL,
  `P_dob` date NOT NULL,
  `P_email` varchar(50) NOT NULL,
  `P_phone` bigint(10) NOT NULL,
  `BL_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_id`, `Log_id`, `P_name`, `P_address`, `P_gender`, `P_dob`, `P_email`, `P_phone`, `BL_id`) VALUES
(21, 77, 'Abhijith', 'gsgs', 'Male', '2022-02-03', 'abhijith19999@gmail.com', 6363378755, 1),
(22, 78, 'jils', 'jilsebhavan', 'Male', '2022-02-04', 'jilse@gmail.com', 9876543222, 3),
(23, 79, 'joice', 'joicecvb', 'Male', '2019-01-04', 'joice@gmil.com', 9090909090, 3),
(24, 80, 'Asif', 'asif', 'Male', '2017-10-06', 'asif@gmail.com', 9878078978, 4),
(25, 81, 'jobin', 'jobindgdg', 'Male', '2013-03-03', 'jobin123@gmail.com', 8908908908, 5),
(26, 82, 'Jommesh', 'xyzsd', 'Male', '2005-02-17', 'jom@gmail.com', 7907897865, 6),
(27, 83, 'Tom', 'Tom villa', 'Male', '1999-01-01', 'tom@gmail.com', 8908909877, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profileimages`
--

CREATE TABLE `profileimages` (
  `Pro_id` int(11) NOT NULL,
  `Pro_pics` varchar(2000) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `Utype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimages`
--

INSERT INTO `profileimages` (`Pro_id`, `Pro_pics`, `Log_id`, `Utype_id`) VALUES
(6, 'sndoct3.jpg', 91, 2),
(7, 'doct2.jpg', 92, 2),
(8, 'doct1.jpg', 93, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `S_id` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `W_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`S_id`, `T_id`, `W_id`, `D_id`) VALUES
(2, 3, 2, 6),
(3, 3, 4, 6),
(4, 3, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `D_specialization_id` int(11) NOT NULL,
  `D_specializations` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`D_specialization_id`, `D_specializations`, `Dept_id`) VALUES
(1, 'Cardiac surgeon', 1),
(8, 'dermet', 2),
(9, 'ent b', 3),
(10, 'derm', 2),
(11, 'Gynecologic Oncology', 10),
(12, 'General Gynecology', 10),
(13, 'Pediatric Pulmonology', 9),
(14, 'otolaryngology ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `T_id` int(11) NOT NULL,
  `T_slot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`T_id`, `T_slot`) VALUES
(1, 'AN'),
(2, 'FN'),
(3, 'Full-day');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `Utype_id` int(11) NOT NULL,
  `Usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`Utype_id`, `Usertype`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'user ');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `W_id` int(11) NOT NULL,
  `W_days` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`W_id`, `W_days`) VALUES
(1, 'Sun'),
(2, 'Mon'),
(3, 'Tue'),
(4, 'Wed'),
(5, 'Thu'),
(6, 'Fri'),
(7, 'Sat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`BL_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `Log_id` (`Log_id`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `D_specialization_id` (`D_specialization_id`);

--
-- Indexes for table `doctoreducation`
--
ALTER TABLE `doctoreducation`
  ADD PRIMARY KEY (`D_edu_id`);

--
-- Indexes for table `doctorhospitalhistory`
--
ALTER TABLE `doctorhospitalhistory`
  ADD PRIMARY KEY (`D_Hoswrk_id`);

--
-- Indexes for table `labreport`
--
ALTER TABLE `labreport`
  ADD PRIMARY KEY (`L_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Log_id`),
  ADD KEY `Utype_id` (`Utype_id`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MedHis_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `MedHis_Hospital_id` (`MedHis_Hospital_id`);

--
-- Indexes for table `medicalreport`
--
ALTER TABLE `medicalreport`
  ADD PRIMARY KEY (`M_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `mhospitals`
--
ALTER TABLE `mhospitals`
  ADD PRIMARY KEY (`MedHis_Hospital_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `Log_id` (`Log_id`),
  ADD KEY `BL_id` (`BL_id`);

--
-- Indexes for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD PRIMARY KEY (`Pro_id`),
  ADD KEY `Log_id` (`Log_id`),
  ADD KEY `Utype_id` (`Utype_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `W_id` (`W_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`D_specialization_id`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`Utype_id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`W_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `BL_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctoreducation`
--
ALTER TABLE `doctoreducation`
  MODIFY `D_edu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctorhospitalhistory`
--
ALTER TABLE `doctorhospitalhistory`
  MODIFY `D_Hoswrk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labreport`
--
ALTER TABLE `labreport`
  MODIFY `L_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MedHis_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalreport`
--
ALTER TABLE `medicalreport`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhospitals`
--
ALTER TABLE `mhospitals`
  MODIFY `MedHis_Hospital_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profileimages`
--
ALTER TABLE `profileimages`
  MODIFY `Pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `D_specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `T_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `Utype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `W_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`S_id`) REFERENCES `schedule` (`S_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `doctor_ibfk_3` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `doctor_ibfk_5` FOREIGN KEY (`D_specialization_id`) REFERENCES `specializations` (`D_specialization_id`);

--
-- Constraints for table `labreport`
--
ALTER TABLE `labreport`
  ADD CONSTRAINT `labreport_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`),
  ADD CONSTRAINT `labreport_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`Utype_id`) REFERENCES `usertype` (`Utype_id`);

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`),
  ADD CONSTRAINT `medicalhistory_ibfk_2` FOREIGN KEY (`MedHis_Hospital_id`) REFERENCES `mhospitals` (`MedHis_Hospital_id`);

--
-- Constraints for table `medicalreport`
--
ALTER TABLE `medicalreport`
  ADD CONSTRAINT `medicalreport_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`),
  ADD CONSTRAINT `medicalreport_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`BL_id`) REFERENCES `bloodgroup` (`BL_id`);

--
-- Constraints for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD CONSTRAINT `profileimages_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `profileimages_ibfk_2` FOREIGN KEY (`Utype_id`) REFERENCES `login` (`Utype_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `timeslot` (`T_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`W_id`) REFERENCES `weekdays` (`W_id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `specializations`
--
ALTER TABLE `specializations`
  ADD CONSTRAINT `specializations_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
