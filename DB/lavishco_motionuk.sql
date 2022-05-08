-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 09:52 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavishco_motionuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbt_sister_concern`
--

CREATE TABLE `dbt_sister_concern` (
  `intSisterID` int(11) NOT NULL,
  `strSisterConcernName` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isMain` enum('Main','Sub') NOT NULL DEFAULT 'Main',
  `strSisterConcernPhone` text NOT NULL,
  `strSisterConcernEmail` text NOT NULL,
  `strSisterConcernAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbt_sister_concern`
--

INSERT INTO `dbt_sister_concern` (`intSisterID`, `strSisterConcernName`, `slug`, `isMain`, `strSisterConcernPhone`, `strSisterConcernEmail`, `strSisterConcernAddress`) VALUES
(1, 'CARSIT', 'CARSIT', 'Main', '00', 'rezababu@gmail.com', 'rezababu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dbt_slider`
--

CREATE TABLE `dbt_slider` (
  `intSliderID` int(11) NOT NULL,
  `intSisterID` int(11) NOT NULL,
  `strSmallHeader` text NOT NULL,
  `strTopHeader` text NOT NULL,
  `strShortLink` text NOT NULL,
  `strDescription` longtext NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbt_slider`
--

INSERT INTO `dbt_slider` (`intSliderID`, `intSisterID`, `strSmallHeader`, `strTopHeader`, `strShortLink`, `strDescription`, `photo`) VALUES
(1, 1, 'Anglia Ruskin University - ARU', '', '', '', '202204282105.png'),
(2, 1, 'Aston University', '', '', '', '202204283297.png'),
(3, 1, 'Bangor University', '', '', '', '202204283217.png'),
(4, 1, 'Anglia Ruskin University - ARU', '', '', '', '202204282105.png'),
(5, 1, 'Aston University', '', '', '', '202204283297.png'),
(6, 1, 'Bangor University', '', '', '', '202204283217.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `usrId` int(11) NOT NULL,
  `usrFullName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usrEmail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `usrPassword` varchar(200) CHARACTER SET utf8 NOT NULL,
  `profilePic` text CHARACTER SET utf8 NOT NULL,
  `activation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `usrDate` date NOT NULL,
  `usrTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`usrId`, `usrFullName`, `usrEmail`, `usrPassword`, `profilePic`, `activation`, `usrDate`, `usrTime`) VALUES
(1, 'admin', 'rezababu@gmail.com', '937cba2ce604876e9e3fabe5509df601', '202204171150.png', '1', '2019-09-03', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `iCompanyId` int(11) NOT NULL,
  `tComapanyName` text CHARACTER SET utf8 NOT NULL,
  `strWhyWeAre` longtext NOT NULL,
  `website` varchar(200) NOT NULL,
  `sLogo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`iCompanyId`, `tComapanyName`, `strWhyWeAre`, `website`, `sLogo`) VALUES
(1, 'SHOMVABONA', '+8801670617942', 'https://shomvabona.com/', 'https://shomvabona.com/shomvabona_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `intSettingsID` int(11) NOT NULL,
  `strCompanyLogo` text CHARACTER SET latin1 NOT NULL,
  `strCompanyAddress` text CHARACTER SET latin1 NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `master_password` varchar(255) NOT NULL,
  `strHeaderEmail` text CHARACTER SET latin1 NOT NULL,
  `strHeaderPhone` text CHARACTER SET latin1 NOT NULL,
  `strMobileNumberStatus` enum('Show','Hide') NOT NULL,
  `strHomePageLayOut` enum('Single','Slider') NOT NULL,
  `strLogo` text CHARACTER SET latin1 NOT NULL,
  `strProjectComplated` int(11) NOT NULL,
  `strConsultants` int(11) NOT NULL,
  `strAwardsWining` int(11) NOT NULL,
  `strSatisfiedCustomers` int(11) NOT NULL,
  `strShortDescription` text CHARACTER SET latin1 NOT NULL,
  `date_format_id` int(11) NOT NULL,
  `currency_code` varchar(110) CHARACTER SET latin1 NOT NULL,
  `settings` text CHARACTER SET latin1 NOT NULL,
  `strTeamDescription` longtext NOT NULL,
  `strInstructorDescription` longtext NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `strCompanyFacebook` text NOT NULL,
  `strCompanyTwitter` text NOT NULL,
  `strCompanyWhatsapp` text NOT NULL,
  `strCompanyLinkedIn` text NOT NULL,
  `strCompanyAcronym` varchar(45) NOT NULL,
  `strCompanySlogan` text NOT NULL,
  `course_accreditation` varchar(255) NOT NULL,
  `membership` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `president_video` varchar(255) NOT NULL,
  `strOurInstructorPageStatus` enum('Show','Hide') NOT NULL DEFAULT 'Hide',
  `strContactInformation` text,
  `strPopupImage` varchar(255) DEFAULT NULL,
  `isShowPopup` enum('Yes','No') NOT NULL DEFAULT 'No',
  `strCompanyInstagram` text,
  `strCompanyYouTube` text,
  `strCompanyPinterest` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`intSettingsID`, `strCompanyLogo`, `strCompanyAddress`, `adminEmail`, `master_password`, `strHeaderEmail`, `strHeaderPhone`, `strMobileNumberStatus`, `strHomePageLayOut`, `strLogo`, `strProjectComplated`, `strConsultants`, `strAwardsWining`, `strSatisfiedCustomers`, `strShortDescription`, `date_format_id`, `currency_code`, `settings`, `strTeamDescription`, `strInstructorDescription`, `meta_keyword`, `meta_description`, `strCompanyFacebook`, `strCompanyTwitter`, `strCompanyWhatsapp`, `strCompanyLinkedIn`, `strCompanyAcronym`, `strCompanySlogan`, `course_accreditation`, `membership`, `provider`, `president_video`, `strOurInstructorPageStatus`, `strContactInformation`, `strPopupImage`, `isShowPopup`, `strCompanyInstagram`, `strCompanyYouTube`, `strCompanyPinterest`) VALUES
(1, 'GLOBAL ACADEMY OF PROFESSIONALS (GAP)', 'Zenith Tower, House: 8/A/1, Dhanmondi, Road no. 14, Dhaka  - 1209', 'rezababu@gmail.com', '', 'gapinuk@gmail.com', '+880 1791-981818', 'Show', 'Single', '202204288371.png', 0, 0, 0, 0, 'Coming Soon...', 0, '', 'general', '', '', 'Coming Soon...', 'GLOBAL ACADEMY OF PROFESSIONALS (GAP)', 'https://www.facebook.com/', '', 'https://api.whatsapp.com/send?phone=+447960272886', 'https://www.linkedin.com/', 'GAP', '', '', '', '', '', 'Hide', '', '202205085277.png', 'Yes', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://www.pinterest.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usr`
--

CREATE TABLE `tbl_usr` (
  `usrId` int(11) NOT NULL,
  `usrFullName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usrEmail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `usrUsername` varchar(255) NOT NULL,
  `usrPassword` varchar(200) CHARACTER SET utf8 NOT NULL,
  `usrZip` varchar(255) DEFAULT NULL,
  `usrMobileNumber` varchar(255) DEFAULT NULL,
  `usrGender` varchar(255) DEFAULT NULL,
  `usrDesignation` varchar(255) DEFAULT NULL,
  `usrPosting` varchar(255) DEFAULT NULL,
  `usrAddressOne` text,
  `usrCity` varchar(255) DEFAULT NULL,
  `usrCountry` varchar(45) NOT NULL,
  `profilePic` text CHARACTER SET utf8 NOT NULL,
  `activation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `usrDate` date NOT NULL,
  `usrTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `tbl_usr`
--

INSERT INTO `tbl_usr` (`usrId`, `usrFullName`, `usrEmail`, `usrUsername`, `usrPassword`, `usrZip`, `usrMobileNumber`, `usrGender`, `usrDesignation`, `usrPosting`, `usrAddressOne`, `usrCity`, `usrCountry`, `profilePic`, `activation`, `usrDate`, `usrTime`) VALUES
(1, 'Maruf Rahman', 'maruf.mokhlesh@gmail.com', 'maruf.mokhlesh@gmail.com', 'e932cf1f7fe2cbc3249f7b3cfc988f45', '1212', '+8801670617942', 'Male', 'Not Available', 'Not Available', '8th Floor, House 3B, Road 16A, Gulshan 1, Dhaka 1212', 'Dhaka', 'Bangladesh', '', '', '2022-04-17', '18:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `web_pages`
--

CREATE TABLE `web_pages` (
  `pageId` int(11) NOT NULL,
  `page_name` varchar(245) NOT NULL,
  `pageCoverPhoto` varchar(255) DEFAULT NULL,
  `pageHeader` text NOT NULL,
  `pageNote` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_pages`
--

INSERT INTO `web_pages` (`pageId`, `page_name`, `pageCoverPhoto`, `pageHeader`, `pageNote`) VALUES
(25, 'about_us', NULL, 'About Us', '<p>Coming Soon&hellip;&hellip;...</p>'),
(26, 'about_DBA_PPA', NULL, 'DBA-PPA', '<p>Coming Soon&hellip;&hellip;...</p>'),
(27, 'collaboration', NULL, 'Collaboration', '<p>Coming Soon&hellip;&hellip;...</p>'),
(28, 'research_topics', NULL, 'Research Topics', '<p>Coming Soon&hellip;&hellip;...</p>'),
(29, 'publications', NULL, 'Publications', '<p>Coming Soon&hellip;&hellip;...</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbt_sister_concern`
--
ALTER TABLE `dbt_sister_concern`
  ADD PRIMARY KEY (`intSisterID`);

--
-- Indexes for table `dbt_slider`
--
ALTER TABLE `dbt_slider`
  ADD PRIMARY KEY (`intSliderID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`usrId`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`iCompanyId`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`intSettingsID`);

--
-- Indexes for table `tbl_usr`
--
ALTER TABLE `tbl_usr`
  ADD PRIMARY KEY (`usrId`);

--
-- Indexes for table `web_pages`
--
ALTER TABLE `web_pages`
  ADD PRIMARY KEY (`pageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbt_sister_concern`
--
ALTER TABLE `dbt_sister_concern`
  MODIFY `intSisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbt_slider`
--
ALTER TABLE `dbt_slider`
  MODIFY `intSliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `usrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `iCompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `intSettingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_usr`
--
ALTER TABLE `tbl_usr`
  MODIFY `usrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_pages`
--
ALTER TABLE `web_pages`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
