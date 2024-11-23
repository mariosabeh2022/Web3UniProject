-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 06:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IDA` int(4) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(80) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IDA`, `FirstName`, `MiddleName`, `LastName`, `Username`, `Email`, `Password`) VALUES
(4, 'Anna-theresa', 'jean', 'maroun', 'Anna-theresaJean.Maroun33', 'Anna-theresaJean.Maroun33@gmail.com', 'st.XAl5eXdzD2'),
(5, 'Aref', '.', 'Hamade', 'Aref..Hamade100', 'Aref..Hamade100@gmail.com', 'sttXOo1dpYgHA'),
(3, 'Elie', 'George', 'Nahed', 'ElieGeorge.Nahed97', 'ElieGeorge.Nahed97@gmail.com', 'stvk6RsOLVmCQ'),
(2, 'Mario', 'Bernard', 'Sabeh', 'MarioBernard.Sabeh51', 'MarioBernard.Sabeh51@gmail.com', 'stkavFVqcaGrA'),
(44, 'testing', 'sanitizing', '1', 'TestingSanitizing.184', 'TestingSanitizing.184@gmail.com', 'stsy/R1c4hQjE'),
(34, 'Tony', 'charbel', 'maalouf', 'TonyCharbel.Maalouf98', 'TonyCharbel.Maalouf98@gmail.com', 'stqADCf8M2Ao.');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseCode` varchar(6) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Credits` int(3) DEFAULT NULL,
  `IDA` int(4) NOT NULL,
  `IDD` int(4) NOT NULL,
  `CodeD` varchar(10) NOT NULL,
  `CodeSemester` varchar(6) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseCode`, `Name`, `Credits`, `IDA`, `IDD`, `CodeD`, `CodeSemester`, `Year`) VALUES
('Buis1', 'introduction', 50, 2, 31, 'LFP103', '1', 2024),
('Buis2', 'Research', 160, 2, 30, 'LFP103', '1', 2024),
('CP200', 'Routes', 200, 2, 32, 'TGDC10', '1', 2024),
('CTR500', 'Planning for projects', 224, 5, 39, 'TGDC10', '1', 2024),
('FYP12', 'Project', 220, 2, 31, 'LFP103', '1', 2024),
('GDR210', 'Beton', 300, 5, 37, 'TGDC10', '1', 2024),
('HTP100', 'Interior_painting', 250, 2, 37, 'TGDC10', '1', 2024),
('LG102', 'Buisiness management', 180, 3, 31, 'LFP103', '1', 2025),
('LGD300', 'Concepts et Bases', 200, 3, 30, 'LFP103', '1', 2025),
('MVA10', 'Bases', 120, 2, 32, 'LGA1013', '1', 2024),
('NFA006', 'Graphes', 180, 2, 38, 'LGA1013', '1', 2024),
('NFA007', 'Cyberstructure', 144, 2, 33, 'LGA1013', '1', 2024),
('UTC502', 'System(2)', 130, 2, 33, 'LGA1013', '1', 2024),
('UTC504', 'Sys_information', 166, 2, 36, 'LGA1013', '1', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `coursehistory`
--

CREATE TABLE `coursehistory` (
  `CourseCode` varchar(6) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Credits` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creates`
--

CREATE TABLE `creates` (
  `IDA` int(4) NOT NULL,
  `CreatesIDA` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `creates`
--

INSERT INTO `creates` (`IDA`, `CreatesIDA`) VALUES
(34, 2),
(44, 3);

-- --------------------------------------------------------

--
-- Table structure for table `diploma`
--

CREATE TABLE `diploma` (
  `CodeD` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `IDA` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diploma`
--

INSERT INTO `diploma` (`CodeD`, `Name`, `IDA`) VALUES
('LFP103', 'Business', 1),
('LGA1013', 'Computer science', 1),
('TGDC10', 'Civil', 2);

-- --------------------------------------------------------

--
-- Table structure for table `diplomahistory`
--

CREATE TABLE `diplomahistory` (
  `CodeD` varchar(10) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `IDD` int(4) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(80) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `IDA` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`IDD`, `FirstName`, `MiddleName`, `LastName`, `Username`, `Email`, `Password`, `IDA`) VALUES
(30, 'Anthony', '-', 'Raad', 'Anthony-.Raad19', 'Anthony-.Raad19@gmail.com', 'stUst9nU3fYyU', 4),
(36, 'Eddy', 'Marc', 'Mrad', 'EddyMarc.Mrad55', 'EddyMarc.Mrad55@gmail.com', 'stNBmqa0Ivb9I', 3),
(37, 'Ghady', 'yousef', 'saliba', 'GhadyYousef.Saliba74', 'GhadyYousef.Saliba74@gmail.com', 'stbGTOu.3fIOc', 3),
(39, 'Jaqueline', 'rodrigue', 'hajj', 'JaquelineRodrigue.Hajj62', 'JaquelineRodrigue.Hajj62@gmail.com', 'stfbejkbc7xfA', 5),
(31, 'Layale', '-', 'Assaf', 'Layale-.Assaf81', 'Layale-.Assaf81@gmail.com', 'sthFAt.S3jR3o', 4),
(33, 'Marie-rose', '-', 'atallah', 'Marie-rose-.Atallah27', 'Marie-rose-.Atallah27@gmail.com', 'styWE4gp5SoaY', 2),
(32, 'Richard', 'Assad', 'Kamel', 'RichardAssad.Kamel56', 'RichardAssad.Kamel56@gmail.com', 'stxmH4vmiYYJ2', 5),
(38, 'Rita', 'jean', 'zouein', 'RitaJean.Zouein22', 'RitaJean.Zouein22@gmail.com', 'ste4QQanfNets', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `IDS` int(4) NOT NULL,
  `CourseCode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`IDS`, `CourseCode`) VALUES
(25, 'GDR210'),
(25, 'MVA10'),
(27, 'CP200'),
(28, 'LGD300'),
(28, 'MVA10'),
(29, 'MVA10'),
(29, 'NFA007'),
(29, 'UTC502'),
(29, 'UTC504');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ECode` varchar(7) NOT NULL,
  `EName` varchar(50) NOT NULL,
  `CourseCode` varchar(6) NOT NULL,
  `IDD` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ECode`, `EName`, `CourseCode`, `IDD`) VALUES
('CP200E', 'Examen Routes', 'CP200', 32),
('CTR500E', 'Plan for a highway project', 'CTR500', 39),
('LGD300E', 'Concept et bases examen', 'LGD300', 30),
('MVA10E', 'Math', 'MVA10', 32),
('NFA007E', 'Reseaux et communication', 'NFA007', 33),
('UCT504E', 'SYS', 'UTC504', 36),
('UTC502E', 'System', 'UTC502', 33),
('UTC504E', 'Ordonnancement', 'UTC504', 36);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `IDD` int(4) NOT NULL,
  `IDS` int(4) NOT NULL,
  `ECode` varchar(7) NOT NULL,
  `Grade` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`IDD`, `IDS`, `ECode`, `Grade`) VALUES
(30, 29, 'LGD300E', 14.0),
(30, 28, 'LGD300E', 16.0),
(32, 25, 'MVA10E', 12.0),
(32, 28, 'MVA10E', 14.0),
(36, 29, 'UCT504E', 16.0);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` int(4) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(80) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Role` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `CodeSemester` varchar(6) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`CodeSemester`, `Year`) VALUES
('1', 2024),
('1', 2025),
('2', 2024),
('2', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `IDS` int(4) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(80) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `IDA` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`IDS`, `FirstName`, `MiddleName`, `LastName`, `Username`, `Email`, `Password`, `IDA`) VALUES
(27, 'Anna-theresa', 'jean', 'maroun', 'Anna-theresaJean.Maroun70', 'Anna-theresaJean.Maroun70@gmail.com', 'st4E/itXPENqc', 3),
(29, 'Aref', '-', 'Hamade', 'Aref-.Hamade42', 'Aref-.Hamade42@gmail.com', 'strnKPiuFNxL.', 4),
(28, 'Elie', 'George', 'Nahed', 'ElieGeorge.Nahed15', 'ElieGeorge.Nahed15@gmail.com', 'stR3lK71DZ1Fc', 4),
(25, 'Mario', 'Bernard', 'Sabeh', 'MarioBernard.Sabeh54', 'MarioBernard.Sabeh54@gmail.com', 'stNhwjJd4.SI2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Username` varchar(80) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Role` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `MiddleName`, `LastName`, `Username`, `Email`, `Password`, `Role`) VALUES
(1, 'initial', 'initial', 'initial', 'initial123', 'initial123@gmail.com', 'initial123@gmail.com', 'Admin'),
(2, 'Mario', 'Bernard', 'Sabeh', 'MarioBernard.Sabeh51', 'MarioBernard.Sabeh51@gmail.com', 'stkavFVqcaGrA', 'Admin'),
(3, 'Elie', 'George', 'Nahed', 'ElieGeorge.Nahed97', 'ElieGeorge.Nahed97@gmail.com', 'stvk6RsOLVmCQ', 'Admin'),
(4, 'Anna-theresa', 'jean', 'maroun', 'Anna-theresaJean.Maroun33', 'Anna-theresaJean.Maroun33@gmail.com', 'st.XAl5eXdzD2', 'Admin'),
(5, 'Aref', '.', 'Hamade', 'Aref..Hamade100', 'Aref..Hamade100@gmail.com', 'sttXOo1dpYgHA', 'Admin'),
(25, 'Mario', 'Bernard', 'Sabeh', 'MarioBernard.Sabeh54', 'MarioBernard.Sabeh54@gmail.com', 'stNhwjJd4.SI2', 'Student'),
(26, 'Elie', 'George', 'Nahed', 'ElieGeorge.Nahed73', 'ElieGeorge.Nahed73@gmail.com', 'stUYUtPZyaUwM', 'Student'),
(27, 'Anna-theresa', 'jean', 'maroun', 'Anna-theresaJean.Maroun70', 'Anna-theresaJean.Maroun70@gmail.com', 'st4E/itXPENqc', 'Student'),
(28, 'Elie', 'George', 'Nahed', 'ElieGeorge.Nahed15', 'ElieGeorge.Nahed15@gmail.com', 'stR3lK71DZ1Fc', 'Student'),
(29, 'Aref', '-', 'Hamade', 'Aref-.Hamade42', 'Aref-.Hamade42@gmail.com', 'strnKPiuFNxL.', 'Student'),
(30, 'Anthony', '-', 'Raad', 'Anthony-.Raad19', 'Anthony-.Raad19@gmail.com', 'stUst9nU3fYyU', 'Doctor'),
(31, 'Layale', '-', 'Assaf', 'Layale-.Assaf81', 'Layale-.Assaf81@gmail.com', 'sthFAt.S3jR3o', 'Doctor'),
(32, 'Richard', 'Assad', 'Kamel', 'RichardAssad.Kamel56', 'RichardAssad.Kamel56@gmail.com', 'stxmH4vmiYYJ2', 'Doctor'),
(33, 'Marie-rose', '-', 'atallah', 'Marie-rose-.Atallah27', 'Marie-rose-.Atallah27@gmail.com', 'styWE4gp5SoaY', 'Doctor'),
(34, 'Tony', 'charbel', 'maalouf', 'TonyCharbel.Maalouf98', 'TonyCharbel.Maalouf98@gmail.com', 'stkavFVqcaGrA', 'Admin'),
(36, 'Eddy', 'Marc', 'Mrad', 'EddyMarc.Mrad55', 'EddyMarc.Mrad55@gmail.com', 'stNBmqa0Ivb9I', 'Doctor'),
(37, 'Ghady', 'yousef', 'saliba', 'GhadyYousef.Saliba74', 'GhadyYousef.Saliba74@gmail.com', 'stbGTOu.3fIOc', 'Doctor'),
(38, 'Rita', 'jean', 'zouein', 'RitaJean.Zouein22', 'RitaJean.Zouein22@gmail.com', 'ste4QQanfNets', 'Doctor'),
(39, 'Jaqueline', 'rodrigue', 'hajj', 'JaquelineRodrigue.Hajj62', 'JaquelineRodrigue.Hajj62@gmail.com', 'stfbejkbc7xfA', 'Doctor'),
(40, 'testing', 'testing', 'testing', 'TestingTesting.Testing42', 'TestingTesting.Testing42@gmail.com', 'st/ImebEBHWx.', 'Student'),
(41, 'doc', 'doc', 'doc', 'DocDoc.Doc26', 'DocDoc.Doc26@gmail.com', 'stTaE9utYh8uo', 'Doctor'),
(43, 'test', 'test1', 't', 'TestTest1.T46', 'TestTest1.T46@gmail.com', 'st1zh33Fr/2ng', 'Student'),
(44, 'testing', 'sanitizing', '1', 'TestingSanitizing.184', 'TestingSanitizing.184@gmail.com', 'stsy/R1c4hQjE', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `IDA` (`IDA`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseCode`),
  ADD UNIQUE KEY `CourseCode` (`CourseCode`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `IDA` (`IDA`),
  ADD KEY `IDD` (`IDD`),
  ADD KEY `CodeD` (`CodeD`),
  ADD KEY `CodeSemester` (`CodeSemester`,`Year`);

--
-- Indexes for table `coursehistory`
--
ALTER TABLE `coursehistory`
  ADD PRIMARY KEY (`CourseCode`),
  ADD UNIQUE KEY `CourseCode` (`CourseCode`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `creates`
--
ALTER TABLE `creates`
  ADD PRIMARY KEY (`IDA`);

--
-- Indexes for table `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`CodeD`);

--
-- Indexes for table `diplomahistory`
--
ALTER TABLE `diplomahistory`
  ADD PRIMARY KEY (`CodeD`),
  ADD UNIQUE KEY `CodeD` (`CodeD`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `IDD` (`IDD`),
  ADD KEY `IDA` (`IDA`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`IDS`,`CourseCode`),
  ADD KEY `enroll_ibfk_2` (`CourseCode`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ECode`),
  ADD UNIQUE KEY `ECode` (`ECode`),
  ADD UNIQUE KEY `EName` (`EName`),
  ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD KEY `grades_ibfk_1` (`IDD`),
  ADD KEY `grades_ibfk_2` (`IDS`),
  ADD KEY `grades_ibfk_3` (`ECode`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`CodeSemester`,`Year`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `IDS` (`IDS`),
  ADD KEY `IDA` (`IDA`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`IDA`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`IDA`) REFERENCES `users` (`ID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`IDA`) REFERENCES `admin` (`IDA`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`IDD`) REFERENCES `doctor` (`IDD`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`CodeD`) REFERENCES `diploma` (`CodeD`),
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`CodeSemester`,`Year`) REFERENCES `semester` (`CodeSemester`, `Year`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`IDD`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`IDA`) REFERENCES `admin` (`IDA`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`IDS`) REFERENCES `student` (`IDS`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`CourseCode`) REFERENCES `course` (`CourseCode`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`CourseCode`) REFERENCES `course` (`CourseCode`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`IDD`) REFERENCES `doctor` (`IDD`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`IDS`) REFERENCES `student` (`IDS`),
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`ECode`) REFERENCES `exam` (`ECode`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`IDS`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`IDA`) REFERENCES `admin` (`IDA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
