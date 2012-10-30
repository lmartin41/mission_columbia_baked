-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2012 at 03:48 AM
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
  `address_two` varchar(30) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ssn` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `DOB`, `sex`, `address_one`, `address_two`, `city`, `state`, `zip`, `phone`, `apartment_number`, `how_did_you_hear`, `how_long_do_you_need`, `regular_job`, `food_stamps`, `veterans_pension`, `part_time_job`, `social_security`, `annuity_check`, `child_support`, `ssi_or_disability`, `unemployment`, `when_next_check`, `pregnant`, `disabled`, `handicapped`, `stove`, `refrigerator`, `cell`, `cable`, `internet`, `model`, `isDeleted`, `created`, `modified`, `ssn`) VALUES
(110, 'Bob', 'Roberts', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(140, 'Thom', 'Yorke', '0000-00-00', 'M', NULL, '', '', '', NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-28 23:21:11', ''),
(141, 'Claudio', 'Sanchez', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(142, 'Morgan', 'Kibby', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(143, 'John', 'Lennon', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(144, 'David', 'Portner', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(145, 'Anthony', 'Gonzalez', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(146, 'Yann', 'Gonzalez', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(147, 'Loic', 'Maurin', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(148, 'Jordan', 'Lawlor', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(149, 'Ian', 'Young', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(150, 'Damon', 'Albarn', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(151, 'David', 'Grohl', '2012-10-11', 'M', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19', ''),
(152, 'Eddie', 'Vedder', '2000-01-01', 'M', NULL, '', '11', 'af', 12345, 2058239533, 11, 'Friends', 'Unknown', '11', '11', '11', '11', '11', '11', '11', '11', '11', '2012-10-11', 1, 1, 1, 1, 1, 1, 1, 1, 'chevy', 0, '2012-10-11 00:33:06', '2012-10-28 22:02:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_checklists`
--

CREATE TABLE IF NOT EXISTS `client_checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `checklist_name` varchar(30) DEFAULT NULL,
  `checklist_description` text NOT NULL,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `client_checklists`
--

INSERT INTO `client_checklists` (`id`, `client_id`, `checklist_name`, `checklist_description`, `isCompleted`, `isDeleted`, `created`, `modified`) VALUES
(1, 110, NULL, '', NULL, NULL, '2012-10-28 17:26:51', '2012-10-28 17:26:51'),
(2, 110, NULL, '', NULL, NULL, '2012-10-28 17:33:07', '2012-10-28 17:33:07'),
(3, 110, NULL, '', NULL, NULL, '2012-10-28 17:33:33', '2012-10-28 17:33:33'),
(4, 110, NULL, '', NULL, NULL, '2012-10-28 17:34:18', '2012-10-28 17:34:18'),
(5, 110, NULL, '', NULL, NULL, '2012-10-28 18:15:40', '2012-10-28 18:15:40'),
(6, 110, NULL, '', NULL, NULL, '2012-10-28 19:04:49', '2012-10-28 19:04:49'),
(7, 110, NULL, '', NULL, NULL, '2012-10-28 19:04:58', '2012-10-28 19:04:58'),
(8, 110, NULL, '', NULL, NULL, '2012-10-30 03:28:39', '2012-10-30 03:28:39'),
(9, 140, NULL, '', NULL, NULL, '2012-10-30 03:29:05', '2012-10-30 03:29:05');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `client_checklist_tasks`
--

INSERT INTO `client_checklist_tasks` (`id`, `client_checklist_id`, `task_name`, `task_description`, `comments`, `isCompleted`, `isDeleted`, `created`, `modified`) VALUES
(15, 1, 'test', 'test', '', NULL, NULL, '2012-10-28 18:32:37', '2012-10-28 18:32:37'),
(16, 1, 'test2', 'test2', '', NULL, NULL, '2012-10-28 18:32:41', '2012-10-28 18:32:41'),
(17, 1, 'test4', 'test4', '', NULL, NULL, '2012-10-28 18:34:14', '2012-10-28 18:34:14'),
(18, 1, 'test6', 'test6', '', NULL, NULL, '2012-10-28 18:36:18', '2012-10-28 18:36:18'),
(19, 1, 'test6', 'test6', '', NULL, NULL, '2012-10-28 18:36:25', '2012-10-28 18:36:25'),
(20, 1, 'test7', 'test7', '', NULL, NULL, '2012-10-28 18:37:16', '2012-10-28 18:37:16'),
(21, 1, 'test10', 'test10', '', NULL, NULL, '2012-10-28 18:38:13', '2012-10-28 18:38:13'),
(22, 7, 'task7', 'tesasdfasf', '', NULL, NULL, '2012-10-28 19:05:15', '2012-10-28 19:05:15'),
(23, 7, 'task7adsfad', 'tesasdfasfasdf', '', NULL, NULL, '2012-10-28 19:05:19', '2012-10-28 19:05:19'),
(24, 9, 'fill out 1 applications', 'null', '', NULL, NULL, '2012-10-30 03:29:22', '2012-10-30 03:29:22'),
(25, 9, 'test2', 'test2', '', NULL, NULL, '2012-10-30 03:29:29', '2012-10-30 03:29:29');

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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `client_relations`
--

INSERT INTO `client_relations` (`id`, `client_id`, `first_name`, `last_name`, `relationship`, `DOB`, `sex`, `created`, `modified`) VALUES
(17, 110, 'adshah', 'adhadha', 'adfadf', '2012-10-11', 'f', '2012-10-11 00:33:17', '2012-10-11 00:33:17'),
(18, 110, 'adah', 'adhah', 'adf', '2012-10-11', 'f', '2012-10-11 00:33:23', '2012-10-11 00:33:23'),
(24, 110, 'agadg', 'asdfa', 'asdfadf', '2012-10-11', 'f', '2012-10-11 14:23:29', '2012-10-11 14:23:29'),
(37, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:23', '2012-10-11 20:32:23'),
(38, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:44', '2012-10-11 20:32:44');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(30) NOT NULL,
  `org_type` varchar(20) NOT NULL COMMENT 'as in legal, health, other, etc.',
  `address_one` varchar(30) NOT NULL,
  `address_two` varchar(30) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(11) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `website` varchar(30) DEFAULT NULL,
  `phone` int(20) NOT NULL,
  `phone_cell` int(20) DEFAULT NULL,
  `phone_office` int(20) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_type`, `address_one`, `address_two`, `city`, `state`, `zip`, `contact`, `website`, `phone`, `phone_cell`, `phone_office`, `isDeleted`, `created`, `modified`) VALUES
(2, 'Mission Columbia', 'Faith Based Resource', '2723 Ashland Rd.', NULL, 'Columbia', 'SC', 29210, 'Mission Columbia', 'http://www.missioncolumbia.org', 0, NULL, NULL, 0, '2012-10-11 21:00:45', '2012-10-11 21:00:45'),
(4, 'CCM C.O.O.L Youth Outreach Min', 'Faith Based Resource', '1631 Auburn Street', NULL, 'Columbia', 'SC', 29204, 'Angela Cantrell', 'http://christcentralministries', 2147483647, NULL, NULL, 0, '2012-10-11 21:02:27', '2012-10-11 21:02:27'),
(6, 'Lexington Interfaith Community', 'Faith Based Resource', '216 Harmon Street', NULL, 'Lexington', 'SC', 30303, 'LICS', 'http://www.licssc.org/', 0, NULL, NULL, 0, '2012-10-25 02:22:03', '2012-10-25 02:22:03'),
(12, 'Grove Place', 'Residence Assistance', '', '495 Columbia Ave', 'Columbia', 'SC', 30303, 'Rick Jones', NULL, 2147483647, NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(30) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `resource_status` text NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`organization_id`),
  KEY `agency_id_2` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_name`, `organization_id`, `inventory`, `description`, `resource_status`, `isDeleted`, `created`, `modified`) VALUES
(3, 'MCResource', 4, '', '', 'good', 0, '2012-10-14 15:12:51', '2012-10-30 02:30:23'),
(5, 'Counseling', 2, '', '', 'Active', 0, '2012-10-17 16:32:38', '2012-10-17 16:32:38'),
(6, 'Counseling', 6, '', '', 'Active', 0, '2012-10-17 16:32:42', '2012-10-17 16:32:42'),
(7, 'Mentoring', 2, '', '', 'Active', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resource_uses`
--

CREATE TABLE IF NOT EXISTS `resource_uses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comments` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `resource_id` (`resource_id`),
  KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `resource_uses`
--

INSERT INTO `resource_uses` (`id`, `client_id`, `resource_id`, `date`, `comments`, `created`, `modified`) VALUES
(9, 110, 3, '2012-10-17 00:00:00', 'testing', '2012-10-17 05:26:17', '2012-10-17 05:26:17'),
(11, 110, 3, '2012-10-17 00:00:00', 'very good resuorce use', '2012-10-17 15:35:37', '2012-10-17 15:35:37'),
(12, 110, 3, '2012-10-17 00:00:00', 'another good resource use', '2012-10-17 15:35:44', '2012-10-17 15:35:44');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1247 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `isSuperAdmin`, `organization_id`, `email`, `isDeleted`, `created`, `modified`) VALUES
(1242, 'superAdmin', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 1, 2, 'super@super.com', 0, '2012-10-09 20:27:18', '2012-10-09 20:27:18'),
(1243, 'samwise', '3d9803dc694c20a7e5b5cb40971efbb7caa2a484', 0, 0, 2, 'samwise@gamgee.com', 0, '2012-10-28 14:37:19', '2012-10-28 14:37:19'),
(1244, 'test', 'a7746697619109350a68d7b0371a3d89cb249fc5', 0, 0, 2, 'test@test.com', 1, '2012-10-30 02:32:58', '2012-10-30 02:32:58'),
(1246, 'username', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 0, 2, 'username@username.com', 0, '2012-10-30 03:09:02', '2012-10-30 03:09:02');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
