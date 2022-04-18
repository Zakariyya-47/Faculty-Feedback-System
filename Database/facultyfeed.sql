-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 09:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultyfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  `CategoryDescription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `CategoryDescription`) VALUES
(1, 'Learning Environment', 'Learning Environment'),
(2, 'Lectures', 'Lectures'),
(3, 'Student Wellbeing ', 'Student Wellbeing '),
(4, 'School Infrastructure', 'School Infrastructure'),
(8, 'zaza', 'za');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `Content` varchar(45) NOT NULL,
  `CommentSubmissionDate` date NOT NULL,
  `Ideas_IdeaID` int(11) NOT NULL,
  `Ideas_Staff_StaffID` int(11) NOT NULL,
  `anonymous` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `Content`, `CommentSubmissionDate`, `Ideas_IdeaID`, `Ideas_Staff_StaffID`, `anonymous`) VALUES
(1, 'Yeah, Excellent Idea', '2022-04-23', 1, 3, 1),
(2, 'pathetic', '2022-04-06', 1, 5, 0),
(3, 'dfdsfsdf', '0000-00-00', 1, 1, 0),
(4, 'test', '0000-00-00', 1, 1, 1),
(5, 'test', '0000-00-00', 1, 1, 0),
(6, 'za', '0000-00-00', 1, 2, 1),
(7, 'zaza', '0000-00-00', 2, 2, 1),
(8, 'asasa', '0000-00-00', 5, 2, 1),
(9, 'sda', '0000-00-00', 6, 2, 0),
(10, 'tesr2', '0000-00-00', 6, 2, 0),
(11, 'zaza', '0000-00-00', 74, 2, 0),
(12, 'new idea', '0000-00-00', 74, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `DateID` int(11) NOT NULL,
  `closureDate` date DEFAULT NULL,
  `FinalClosureDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`DateID`, `closureDate`, `FinalClosureDate`) VALUES
(3, '2022-04-28', '2022-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepName` varchar(45) DEFAULT NULL,
  `Cordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepName`, `Cordinator`) VALUES
(1, 'Finance', 6),
(2, 'Computing', 5),
(3, 'Math', 7),
(5, 'New', 5),
(6, 'new2', 29);

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `IdeaID` int(11) NOT NULL,
  `Categories_CategoryID` int(11) DEFAULT NULL,
  `Staff_StaffID` int(11) NOT NULL,
  `Idea` varchar(1000) NOT NULL,
  `anonymous` tinyint(1) NOT NULL,
  `file_name` varchar(244) DEFAULT NULL,
  `Downvotes` int(255) NOT NULL,
  `Upvotes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`IdeaID`, `Categories_CategoryID`, `Staff_StaffID`, `Idea`, `anonymous`, `file_name`, `Downvotes`, `Upvotes`) VALUES
(1, 1, 1, 'Require Smart Boards', 1, NULL, 43, 4),
(2, 2, 1, 'We need more books', 0, NULL, 2, 4),
(3, 3, 2, 'Fix the front door', 0, NULL, 32, 4),
(4, 4, 3, '23d', 0, NULL, 34, 4),
(5, 4, 2, '23d', 0, NULL, 4, 4),
(6, 4, 2, '23d', 0, NULL, 3, 4),
(57, 3, 2, 'sadsada', 1, 'alkahafA3 (1).png', 44, 4),
(58, 3, 2, 'sadsada', 1, 'alkahafA3.png', 44, 33),
(59, 4, 5, 'zdsfsfs', 1, 'ZAK.png', 5, 4),
(60, 4, 2, 'zdsfsfs', 1, 'ZAK.png', 1, 43),
(61, 4, 2, 'Upgrade IT lab', 0, NULL, 44, 4),
(62, 4, 6, 'Need more eqipment', 0, NULL, 5, 4),
(63, 4, 2, 'Need a science lab', 0, NULL, 32, 4),
(72, 1, 2, 'More sports activities', 0, NULL, 44, 4),
(73, 1, 4, 'Students need to be awarded', 0, NULL, 11, 3),
(74, 1, 7, 'We need more teacers', 0, NULL, 55, 4),
(76, 1, 2, 'vcb', 1, 'Concept map template - Color.png', 0, 0),
(77, 4, 1, 'ssssss', 0, 'COMP1640_Group1_Report.pdf', 0, 0),
(78, 1, 1, 'ffd', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Staff_StaffID` int(11) NOT NULL,
  `Role` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Staff_StaffID`, `Role`, `Username`, `Password`) VALUES
(1, 'Lecturer', 'user', 'user'),
(2, 'Admin', 'admin', 'admin'),
(3, 'QA Cordinator', 'cordinator', 'cordinator'),
(4, 'Assurance Manager', 'manager', 'manager'),
(5, 'QA Cordinator', 'QA', 'qa'),
(6, 'QA Cordinator', 'QA', 'qa'),
(7, 'QA Cordinator', 'QA', 'qa'),
(29, 'Administrator', 'user', 'user'),
(30, 'Quality Assurance Manager', 'zak', 'zak'),
(31, 'Administrator', 'user', 'user'),
(35, 'Regular Staff', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `LastName`, `Email`, `DepartmentID`) VALUES
(1, 'John', 'Banda', 'z.deedat47@gmail.com', 1),
(2, 'Jane', 'Parker', 'z.deedat47@gmail.com', 3),
(3, 'Jacob', 'Zulu', 'z.deedat47@gmail.com', 1),
(4, 'Sam', 'Par', 'z.deedat47@gmail.com', 1),
(5, 'Shaan', 'Patel', 'z.deedat47@gmail.com', 1),
(6, 'Bob', 'Heckter', 'z.deedat47@gmail.com', 3),
(7, 'Barry', 'Williams', 'z.deedat47@gmail.com', 2),
(29, 'Zakaria', '(MS9656)', 'z.deedat47@gmail.com', 5),
(30, 'Zaid', 'Daud', 'z.deedat47@gmail.com', 3),
(31, 'Zakariyya', 'Deedat', 'z.deedat47@gmail.com', 1),
(35, 'Zakaria', '(MS9656)', 'z.deedat47@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffdept`
--

CREATE TABLE `staffdept` (
  `Staff_StaffID` int(11) NOT NULL,
  `Department_DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffdept`
--

INSERT INTO `staffdept` (`Staff_StaffID`, `Department_DepartmentID`) VALUES
(1, 2),
(2, 3),
(3, 3),
(4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `fk_whos_idea` (`Ideas_IdeaID`),
  ADD KEY `fk_whos_comment` (`Ideas_Staff_StaffID`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`DateID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD KEY `fk_Dept_Cordinator` (`Cordinator`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`IdeaID`) USING BTREE,
  ADD KEY `fk_Ideas_Categories` (`Categories_CategoryID`),
  ADD KEY `fk_Ideas_Faculty1` (`Staff_StaffID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Staff_StaffID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `staffdept`
--
ALTER TABLE `staffdept`
  ADD PRIMARY KEY (`Staff_StaffID`,`Department_DepartmentID`),
  ADD KEY `fk_FacultyDept_Department1` (`Department_DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
  MODIFY `DateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `IdeaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Staff_StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_whos_comment` FOREIGN KEY (`Ideas_Staff_StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_whos_idea` FOREIGN KEY (`Ideas_IdeaID`) REFERENCES `ideas` (`IdeaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_Dept_Cordinator` FOREIGN KEY (`Cordinator`) REFERENCES `staff` (`StaffID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `fk_Ideas_Categories` FOREIGN KEY (`Categories_CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ideas_Faculty1` FOREIGN KEY (`Staff_StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_Roles_Staff1` FOREIGN KEY (`Staff_StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staffdept`
--
ALTER TABLE `staffdept`
  ADD CONSTRAINT `fk_FacultyDept_Department1` FOREIGN KEY (`Department_DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FacultyDept_Faculty1` FOREIGN KEY (`Staff_StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
