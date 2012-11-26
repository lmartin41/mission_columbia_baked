-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2012 at 07:13 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mission_columbia`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `address_one` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `apartment_number` int(6) DEFAULT NULL,
  `how_did_you_hear` text,
  `how_long_do_you_need` text,
  `regular_job` varchar(30) DEFAULT NULL,
  `food_stamps` varchar(30) DEFAULT NULL,
  `veterans_pension` varchar(30) DEFAULT NULL,
  `part_time_job` varchar(30) DEFAULT NULL,
  `social_security` varchar(30) DEFAULT NULL,
  `annuity_check` varchar(30) DEFAULT NULL,
  `child_support` varchar(30) DEFAULT NULL,
  `ssi_or_disability` varchar(30) DEFAULT NULL,
  `unemployment` varchar(30) DEFAULT NULL,
  `when_next_check` date DEFAULT NULL,
  `pregnant` tinyint(1) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT NULL,
  `handicapped` tinyint(1) DEFAULT NULL,
  `stove` tinyint(1) DEFAULT NULL,
  `refrigerator` tinyint(1) DEFAULT NULL,
  `cell` tinyint(1) DEFAULT NULL,
  `cable` tinyint(1) DEFAULT NULL,
  `internet` tinyint(1) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `acceptedChrist` tinyint(1) DEFAULT NULL,
  `dedicatedChrist` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `DOB`, `sex`, `address_one`, `city`, `state`, `zip`, `phone`, `apartment_number`, `how_did_you_hear`, `how_long_do_you_need`, `regular_job`, `food_stamps`, `veterans_pension`, `part_time_job`, `social_security`, `annuity_check`, `child_support`, `ssi_or_disability`, `unemployment`, `when_next_check`, `pregnant`, `disabled`, `handicapped`, `stove`, `refrigerator`, `cell`, `cable`, `internet`, `model`, `isDeleted`, `acceptedChrist`, `dedicatedChrist`, `created`, `modified`) VALUES
(110, 'Bob', 'Roberts', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(140, 'Thom', 'Yorke', '0000-00-00', 'M', NULL, '', '', NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-28 23:21:11'),
(141, 'Claudio', 'Sanchez', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(142, 'Morgan', 'Kibby', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(143, 'John', 'Lennon', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(144, 'David', 'Portner', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(145, 'Anthony', 'Gonzalez', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(146, 'Yann', 'Gonzalez', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(147, 'Loic', 'Maurin', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(148, 'Jordan', 'Lawlor', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(149, 'Ian', 'Young', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(150, 'Damon', 'Albarn', '1999-01-01', 'M', '', '', 'Alaska', 12345, '', NULL, 'Friends', 'Unknown', '1200', '', '', '', '', '', '', '', '', '2012-12-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '2012-10-11 00:33:06', '2012-11-23 16:44:06'),
(151, 'David', 'Grohl', '2012-10-11', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(152, 'Eddie', 'Vedder', '2000-01-01', 'M', NULL, '11', 'af', 12345, '2058239533', 11, 'Friends', 'Unknown', '11', '11', '11', '11', '11', '11', '11', '11', '11', '2012-10-11', 1, 1, 1, 1, 1, 1, 1, 1, 'chevy', 0, NULL, NULL, '2012-10-11 00:33:06', '2012-10-28 22:02:43'),
(153, 'Steven', 'Smith', '1965-01-01', 'M', '2434 Main Street', 'Columbia ', 'South Dakota', 29210, '803', NULL, '', '', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-30 16:10:33', '2012-10-30 16:10:33'),
(154, 'Steven', 'Smith', '1965-01-01', 'M', '2434 Main Street', 'Columbia ', 'South Dakota', 29210, '803', NULL, '', '', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, NULL, NULL, '2012-10-30 16:10:58', '2012-10-30 16:10:58'),
(158, 'ver', 'ver', '2008-03-05', 'M', '', '', '', NULL, NULL, NULL, '', '', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', '$0.00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, '2012-11-06 15:06:13', '2012-11-06 15:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `client_checklists`
--

CREATE TABLE IF NOT EXISTS `client_checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `checklist_name` varchar(30) NOT NULL,
  `checklist_description` text,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `client_checklists`
--

INSERT INTO `client_checklists` (`id`, `client_id`, `checklist_name`, `checklist_description`, `isCompleted`, `isDeleted`, `created`, `modified`) VALUES
(12, 110, 'test', 'test', NULL, NULL, '2012-10-30 03:56:03', '2012-11-03 20:13:14'),
(13, 110, 'test2', 'test2', NULL, NULL, '2012-10-30 03:56:42', '2012-10-30 03:56:42'),
(15, 110, 'test', 'test', NULL, NULL, '2012-10-30 03:59:20', '2012-10-30 03:59:20'),
(18, 110, 'test', 'test', NULL, NULL, '2012-10-30 04:03:42', '2012-10-30 04:03:42'),
(19, 110, 'test', 'test', 1, 1, '2012-10-30 04:03:50', '2012-11-03 19:50:53'),
(20, 153, 'Attend Bible Study', '\r\n', NULL, NULL, '2012-10-30 16:19:18', '2012-10-30 16:19:18'),
(21, 154, 'Referal to X', 'blah', NULL, NULL, '2012-10-30 16:52:48', '2012-10-30 16:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `client_checklist_tasks`
--

CREATE TABLE IF NOT EXISTS `client_checklist_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_checklist_id` int(11) NOT NULL,
  `task_name` varchar(30) NOT NULL,
  `task_description` varchar(30) NOT NULL,
  `comments` text,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_checklist_id` (`client_checklist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `client_checklist_tasks`
--

INSERT INTO `client_checklist_tasks` (`id`, `client_checklist_id`, `task_name`, `task_description`, `comments`, `isCompleted`, `isDeleted`, `created`, `modified`) VALUES
(27, 19, 'testing2', 'testing2', 'testing', NULL, NULL, '2012-10-30 04:20:02', '2012-10-30 04:23:19'),
(28, 21, 'callx', 'bal', 'hasdf', NULL, NULL, '2012-10-30 16:53:02', '2012-10-30 16:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `client_relations`
--

CREATE TABLE IF NOT EXISTS `client_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `relationship` varchar(20) NOT NULL COMMENT '(as in daughter, mother, son, sister, etc.)',
  `DOB` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `whatVerification` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `client_relations`
--

INSERT INTO `client_relations` (`id`, `client_id`, `first_name`, `last_name`, `relationship`, `DOB`, `sex`, `isVerified`, `whatVerification`, `created`, `modified`) VALUES
(17, 110, 'adshah', 'adhadha', 'adfadf', '2012-10-11', 'f', 0, '', '2012-10-11 00:33:17', '2012-10-11 00:33:17'),
(18, 110, 'adah', 'adhah', 'adf', '2012-10-11', 'f', 0, '', '2012-10-11 00:33:23', '2012-10-11 00:33:23'),
(24, 110, 'agadg', 'asdfa', 'asdfadf', '2012-10-11', 'f', 0, '', '2012-10-11 14:23:29', '2012-10-11 14:23:29'),
(37, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', 0, '', '2012-10-11 20:32:23', '2012-10-11 20:32:23'),
(38, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', 0, '', '2012-10-11 20:32:44', '2012-10-11 20:32:44'),
(39, 154, 'Donna', 'Smith', 'Child', '1992-10-30', 'F', 0, '', '2012-10-30 16:12:26', '2012-10-30 16:12:26'),
(42, 158, 'test', 'test', 'test', '1997-01-01', 'M', 1, 'test', '2012-11-06 15:37:03', '2012-11-06 15:37:03'),
(45, 150, 'test', 'test', 'test', '2001-01-01', 'M', 0, '', '2012-11-12 19:58:45', '2012-11-12 19:58:45'),
(47, 150, 'test2', 'test', 'test', '2000-01-01', 'M', 0, '', '2012-11-24 00:33:50', '2012-11-24 00:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `feedback` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `feedback`, `created`, `modified`) VALUES
(10, 1242, 'test', '2012-11-23 18:48:17', '2012-11-23 18:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `field_type` varchar(30) NOT NULL,
  `data_stored` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `org_id` (`org_id`,`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loggers`
--

CREATE TABLE IF NOT EXISTS `loggers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `loggers`
--

INSERT INTO `loggers` (`id`, `user_id`, `controller`, `action`, `description`, `created`, `modified`) VALUES
(60, 1242, 'Prayer Requests', 'add', 'Added Prayer Request', '2012-11-23 00:00:00', '2012-11-23 21:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `lookups`
--

CREATE TABLE IF NOT EXISTS `lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `org_id` (`org_id`,`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(30) NOT NULL,
  `address_one` varchar(30) NOT NULL,
  `address_two` varchar(30) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `website` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `phone_cell` varchar(20) DEFAULT NULL,
  `phone_office` varchar(20) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `org_name` (`org_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `address_one`, `address_two`, `city`, `state`, `zip`, `contact`, `website`, `phone`, `phone_cell`, `phone_office`, `isDeleted`, `created`, `modified`) VALUES
(2, 'Mission Columbia', '2723 Ashland Rd.', '', 'Columbia', 'South Carolina', '29210', 'Mission Columbia', 'http://www.missioncolumbia.org', '12345678', NULL, NULL, 0, '2012-10-11 21:00:45', '2012-11-08 02:01:19'),
(4, 'CCM C.O.O.L Youth Outreach Min', '1631 Auburn Street', '', 'Columbia', 'So', '29204', 'Angela Cantrell', 'http://christcentralministries', '2147483647', NULL, NULL, 0, '2012-10-11 21:02:27', '2012-11-06 21:30:39'),
(6, 'Lexington Interfaith Community', '216 Harmon Street', NULL, 'Lexington', 'SC', '30303', 'LICS', 'http://www.licssc.org/', '0', NULL, NULL, 0, '2012-10-25 02:22:03', '2012-10-25 02:22:03'),
(7, 'Transitions', 'test', 'test', 'Columbia', 'SC', '12345', 'TransitionsStaff', '', '123', NULL, NULL, 0, '2012-10-30 02:56:06', '2012-10-30 02:56:06'),
(8, 'Salvation Army', '1 Columbia St', '', 'Columbia', 'Alaska', '29201', 'Jane Doe', '', '80312345', NULL, NULL, 0, '2012-10-30 16:08:05', '2012-11-08 01:42:40'),
(13, 'test', 'test', '', 'test', 'Arkansas', '12345', 'test', '', '205-823-9533', '205-823-9533', '205-823-9533', 0, '2012-11-12 21:55:15', '2012-11-12 21:55:15'),
(14, 'HomeLee', '1257 Buckhead Circle', '', 'Birmingham', 'Alabama', '35216', 'Lee', '', '205-823-9533', '', '', 0, '2012-11-15 04:35:49', '2012-11-15 04:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prayer_requests`
--

CREATE TABLE IF NOT EXISTS `prayer_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `request` text NOT NULL,
  `comments` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `org_id` (`organization_id`),
  KEY `org_name` (`organization_id`),
  KEY `org_name_2` (`organization_id`),
  KEY `org_id_2` (`organization_id`),
  KEY `org_id_3` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `prayer_requests`
--

INSERT INTO `prayer_requests` (`id`, `client_id`, `organization_id`, `request`, `comments`, `created`, `modified`) VALUES
(19, 150, 2, 'test', 'test', '2012-11-23 21:36:00', '2012-11-23 21:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(30) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `resource_type` varchar(30) DEFAULT NULL,
  `inventory` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `resource_status` text NOT NULL,
  `street_address` varchar(60) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`organization_id`),
  KEY `agency_id_2` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_name`, `organization_id`, `resource_type`, `inventory`, `description`, `resource_status`, `street_address`, `city`, `state`, `zip`, `isDeleted`, `created`, `modified`) VALUES
(3, 'MCResource', 4, NULL, '', '', 'good', 'test', 'test', 'South Carolina', 'test', 0, '2012-10-14 15:12:51', '2012-11-06 23:08:27'),
(5, 'Counseling', 2, NULL, '', '', 'Active', 'test', 'test2', 'South Carolina', 'test2', 0, '2012-10-17 16:32:38', '2012-11-06 23:08:36'),
(6, 'Counseling', 6, NULL, '', '', 'Active', 'test', 'test3', 'South Carolina', 'test3', 0, '2012-10-17 16:32:42', '2012-11-06 23:08:44'),
(7, 'Mentoring', 2, NULL, '', '', 'Active', 'test', 'test4', 'South Carolina', 'test4', 0, '0000-00-00 00:00:00', '2012-11-06 23:08:51'),
(8, 'other', 2, NULL, '', '', 'hjklj', 'test', 'test5', 'South Carolina', 'test5', 0, '2012-10-30 16:54:38', '2012-11-06 23:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `resource_types`
--

CREATE TABLE IF NOT EXISTS `resource_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resource_uses`
--

CREATE TABLE IF NOT EXISTS `resource_uses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `resource_id` (`resource_id`),
  KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `resource_uses`
--

INSERT INTO `resource_uses` (`id`, `client_id`, `resource_id`, `date`, `comments`, `created`, `modified`) VALUES
(9, 110, 3, '2012-10-17', 'testing', '2012-10-17 05:26:17', '2012-10-17 05:26:17'),
(11, 110, 3, '2012-10-17', 'very good resuorce use', '2012-10-17 15:35:37', '2012-10-17 15:35:37'),
(12, 110, 3, '2012-10-17', 'another good resource use', '2012-10-17 15:35:44', '2012-10-17 15:35:44'),
(13, 154, 3, '2012-10-30', 'Referred to Oliver Gospel Mission', '2012-10-30 16:15:01', '2012-10-30 16:15:01'),
(17, 150, 5, '2012-11-12', 'test', '2012-11-12 23:14:34', '2012-11-12 23:14:34'),
(19, 110, 5, '2012-11-14', 'good', '2012-11-14 00:00:00', '2012-11-14 00:00:00'),
(23, 150, 3, '2012-11-23', 'test', '2012-11-23 17:50:40', '2012-11-23 17:50:40'),
(26, 150, 3, '2012-11-24', 'test', '2012-11-24 00:48:35', '2012-11-24 00:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE IF NOT EXISTS `tips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `controller` varchar(25) NOT NULL,
  `view` varchar(25) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `tip` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `organization` (`organization_id`,`controller`,`view`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique Identifier',
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isSuperAdmin` tinyint(1) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `agency_id` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1249 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `isSuperAdmin`, `organization_id`, `email`, `isDeleted`, `created`, `modified`) VALUES
(1242, 'superAdmin', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 1, 2, 'super@super.com', 0, '2012-10-09 20:27:18', '2012-10-09 20:27:18'),
(1243, 'samwise', '3d9803dc694c20a7e5b5cb40971efbb7caa2a484', 0, 0, 2, 'samwise@gamgee.com', 0, '2012-10-28 14:37:19', '2012-10-28 14:37:19'),
(1244, 'test', 'a7746697619109350a68d7b0371a3d89cb249fc5', 0, 0, 2, 'test@test.com', 1, '2012-10-30 02:32:58', '2012-10-30 02:32:58'),
(1245, 'username', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 0, 2, 'user@pass.com', 0, '2012-10-30 02:53:27', '2012-10-30 02:53:27'),
(1246, 'msmith3', '22fd753a924a076e55cd1dc6ea79afb0b60eab2a', 0, 0, 2, 'msmith@gmail.com', 1, '2012-10-30 16:06:45', '2012-10-30 16:06:45'),
(1247, 'test2', '4a6f2b6af8b83d1be7d566dafc8d8a74ebabdbbc', 0, 0, 2, 'test@test.com', 0, '2012-11-12 21:37:38', '2012-11-12 21:37:38'),
(1248, 'salvation', 'a5923dae331a787577346eb5dd104609b45c6327', 0, 0, 8, 'salvation@army.com', 0, '2012-11-24 00:45:52', '2012-11-24 00:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_information_form`
--

CREATE TABLE IF NOT EXISTS `volunteer_information_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `street_address` varchar(60) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `zip` varchar(11) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `work_phone` varchar(20) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `emergency_name` varchar(30) DEFAULT NULL,
  `emergency_relationship` varchar(30) DEFAULT NULL,
  `emergency_home_phone` varchar(20) DEFAULT NULL,
  `emergency_work_phone` varchar(20) DEFAULT NULL,
  `emergency_cell_phone` varchar(20) DEFAULT NULL,
  `emergency_street_address` varchar(60) DEFAULT NULL,
  `emergency_city` varchar(30) DEFAULT NULL,
  `emergency_state` varchar(20) DEFAULT NULL,
  `emergency_zip` varchar(11) DEFAULT NULL,
  `emergency2_name` varchar(30) DEFAULT NULL,
  `emergency2_relationship` varchar(30) DEFAULT NULL,
  `emergency2_home_phone` varchar(20) DEFAULT NULL,
  `emergency2_work_phone` varchar(20) DEFAULT NULL,
  `emergency2_cell_phone` varchar(20) DEFAULT NULL,
  `emergency2_street_address` varchar(60) DEFAULT NULL,
  `emergency2_city` varchar(30) DEFAULT NULL,
  `emergency2_state` varchar(20) DEFAULT NULL,
  `emergency2_zip` varchar(11) DEFAULT NULL,
  `allergies` text,
  `date` date NOT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `volunteer_information_form`
--

INSERT INTO `volunteer_information_form` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `street_address`, `city`, `state`, `zip`, `home_phone`, `work_phone`, `cell_phone`, `email`, `emergency_name`, `emergency_relationship`, `emergency_home_phone`, `emergency_work_phone`, `emergency_cell_phone`, `emergency_street_address`, `emergency_city`, `emergency_state`, `emergency_zip`, `emergency2_name`, `emergency2_relationship`, `emergency2_home_phone`, `emergency2_work_phone`, `emergency2_cell_phone`, `emergency2_street_address`, `emergency2_city`, `emergency2_state`, `emergency2_zip`, `allergies`, `date`, `isDeleted`, `created`, `modified`) VALUES
(5, 1244, 'test2', 'test2', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2012-11-06', NULL, '2012-11-06 20:24:52', '2012-11-06 20:26:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_checklists`
--
ALTER TABLE `client_checklists`
  ADD CONSTRAINT `client_checklists_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_checklist_tasks`
--
ALTER TABLE `client_checklist_tasks`
  ADD CONSTRAINT `client_checklist_tasks_ibfk_1` FOREIGN KEY (`client_checklist_id`) REFERENCES `client_checklists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_relations`
--
ALTER TABLE `client_relations`
  ADD CONSTRAINT `client_relations_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `loggers`
--
ALTER TABLE `loggers`
  ADD CONSTRAINT `loggers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prayer_requests`
--
ALTER TABLE `prayer_requests`
  ADD CONSTRAINT `prayer_requests_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `resource_uses`
--
ALTER TABLE `resource_uses`
  ADD CONSTRAINT `resource_uses_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resource_uses_ibfk_4` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `volunteer_information_form`
--
ALTER TABLE `volunteer_information_form`
  ADD CONSTRAINT `volunteer_information_form_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
