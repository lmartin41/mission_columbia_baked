-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2012 at 05:00 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

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
  `DOB` datetime NOT NULL,
  `sex` varchar(6) NOT NULL,
  `address_one` varchar(30) DEFAULT NULL,
  `address_two` varchar(30) DEFAULT NULL,
  `ssn` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `apartment_number` int(6) DEFAULT NULL,
  `how_did_you_hear` text,
  `how_long_do_you_need` text,
  `regular_job` decimal(10,0) DEFAULT NULL,
  `food_stamps` decimal(10,0) DEFAULT NULL,
  `veterans_pension` decimal(10,0) DEFAULT NULL,
  `part_time_job` decimal(10,0) DEFAULT NULL,
  `social_security` decimal(10,0) DEFAULT NULL,
  `annuity_check` decimal(10,0) DEFAULT NULL,
  `child_support` decimal(10,0) DEFAULT NULL,
  `ssi_or_disability` decimal(10,0) DEFAULT NULL,
  `unemployment` decimal(10,0) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `DOB`, `sex`, `address_one`, `address_two`, `ssn`, `city`, `state`, `zip`, `phone`, `apartment_number`, `how_did_you_hear`, `how_long_do_you_need`, `regular_job`, `food_stamps`, `veterans_pension`, `part_time_job`, `social_security`, `annuity_check`, `child_support`, `ssi_or_disability`, `unemployment`, `when_next_check`, `pregnant`, `disabled`, `handicapped`, `stove`, `refrigerator`, `cell`, `cable`, `internet`, `model`, `isDeleted`, `created`, `modified`) VALUES
(110, 'test', 'test', '2012-10-11 00:00:00', 'a', '', '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(111, 'hasRelative', 'asdf', '2012-10-11 00:00:00', 'adsf', '', '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 01:11:18', '2012-10-11 01:12:46'),
(113, 'tester', 'tester', '2012-10-11 00:00:00', 'f', '', '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 14:29:25', '2012-10-11 14:29:25'),
(130, 'gggg', 'gggg', '0000-00-00 00:00:00', 'M', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 01:12:10', '2012-10-17 01:12:10'),
(131, 'mmmm', 'mm', '2001-01-01 00:00:00', 'M', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 01:20:56', '2012-10-17 01:20:56'),
(132, 'nhnhnhn', 'nhnhnh', '2001-01-01 00:00:00', 'M', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 01:22:05', '2012-10-17 01:22:05'),
(133, 'bgbgbg', 'bgbgb', '2012-01-01 00:00:00', 'M', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 01:24:34', '2012-10-17 01:24:34'),
(137, 'asdf', 'asdfa', '2000-01-01 00:00:00', 'M', NULL, NULL, NULL, 'asdfadfs', 'as', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 03:11:33', '2012-10-17 03:11:33'),
(138, 'withaddress', 'asdfsdf', '2001-01-01 00:00:00', 'M', NULL, NULL, NULL, 'asdfadf', 'ad', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-17 03:54:01', '2012-10-17 03:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `client_checklist`
--

CREATE TABLE IF NOT EXISTS `client_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `task1name` varchar(30) DEFAULT NULL,
  `task1comments` text,
  `task1isCompleted` tinyint(1) NOT NULL,
  `task2name` varchar(30) DEFAULT NULL,
  `task2comments` text,
  `task2isCompleted` tinyint(1) DEFAULT NULL,
  `task3name` varchar(30) DEFAULT NULL,
  `task3comments` text,
  `task3isDeleted` tinyint(1) DEFAULT NULL,
  `task4name` varchar(30) DEFAULT NULL,
  `task4comments` text,
  `task4isDeleted` tinyint(1) DEFAULT NULL,
  `task5name` varchar(30) DEFAULT NULL,
  `task5comments` text,
  `task5isDeleted` tinyint(1) DEFAULT NULL,
  `task6name` varchar(30) DEFAULT NULL,
  `task6comments` text,
  `task6isCompleted` tinyint(1) DEFAULT NULL,
  `task7name` varchar(30) DEFAULT NULL,
  `task7comments` text,
  `task7isCompleted` tinyint(1) DEFAULT NULL,
  `task8name` varchar(30) DEFAULT NULL,
  `task8comments` text,
  `task8isCompleted` tinyint(1) DEFAULT NULL,
  `task9name` varchar(30) NOT NULL,
  `task9comments` text,
  `task9isCompleted` tinyint(1) DEFAULT NULL,
  `task10name` varchar(30) DEFAULT NULL,
  `task10comments` text,
  `task10isCompleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `isCompleted` tinyint(1) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client_checklist`
--

INSERT INTO `client_checklist` (`id`, `client_id`, `task1name`, `task1comments`, `task1isCompleted`, `task2name`, `task2comments`, `task2isCompleted`, `task3name`, `task3comments`, `task3isDeleted`, `task4name`, `task4comments`, `task4isDeleted`, `task5name`, `task5comments`, `task5isDeleted`, `task6name`, `task6comments`, `task6isCompleted`, `task7name`, `task7comments`, `task7isCompleted`, `task8name`, `task8comments`, `task8isCompleted`, `task9name`, `task9comments`, `task9isCompleted`, `task10name`, `task10comments`, `task10isCompleted`, `created`, `modified`, `isCompleted`, `isDeleted`) VALUES
(1, 110, 'adsafs', 'adsfadf', 0, 'adsfasd', 'asdfads', 0, 'asdfasf', 'asdfasf', 0, 'adsfads', 'asdfadsf', 0, 'asdfas', 'adsfads', 0, 'adsfas', 'asdfadsf', 0, 'asdfas', 'asdfads', 0, 'adsadsf', 'asdfads', 0, 'asdfasd', 'asdfads', 0, 'asdfds', 'asdfadsf', 0, '2012-10-17 16:08:41', '2012-10-17 16:08:41', 0, NULL),
(2, 110, 'adfaf', 'asdfadsfs', 0, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '2012-10-17 16:18:54', '2012-10-17 16:18:54', NULL, NULL),
(3, 110, 'gggg', 'gggg', 0, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '2012-10-17 16:19:42', '2012-10-17 16:19:42', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `client_relations`
--

INSERT INTO `client_relations` (`id`, `client_id`, `first_name`, `last_name`, `relationship`, `DOB`, `sex`, `created`, `modified`) VALUES
(17, 110, 'adshah', 'adhadha', 'adfadf', '2012-10-11', 'f', '2012-10-11 00:33:17', '2012-10-11 00:33:17'),
(18, 110, 'adah', 'adhah', 'adf', '2012-10-11', 'f', '2012-10-11 00:33:23', '2012-10-11 00:33:23'),
(19, 111, 'adgg', 'adga', 'asdfa', '2012-10-11', 'adsf', '2012-10-11 01:11:24', '2012-10-11 01:37:00'),
(20, 111, 'agda', 'adgad', 'adsfa', '2012-10-11', 'f', '2012-10-11 01:34:27', '2012-10-11 01:34:27'),
(24, 110, 'agadg', 'asdfa', 'asdfadf', '2012-10-11', 'f', '2012-10-11 14:23:29', '2012-10-11 14:23:29'),
(25, 113, 'testerrelative', 'testerrelative', 'adgadg', '2012-10-11', 'f', '2012-10-11 14:29:53', '2012-10-11 14:29:53'),
(37, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:23', '2012-10-11 20:32:23'),
(38, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:44', '2012-10-11 20:32:44'),
(39, 110, 'asdgadgcccccc', 'asdga', 'adsgag', '2012-10-11', 'f', '2012-10-11 20:32:51', '2012-10-11 20:33:03'),
(40, 111, 'asdfadfcccc', 'ccc', 'ccc', '2012-10-11', 'ccc', '2012-10-11 20:40:34', '2012-10-11 20:40:33'),
(43, 133, 'ababa', 'ababab', 'ababab', '2012-10-17', 'f', '2012-10-17 01:25:18', '2012-10-17 01:25:18'),
(45, 110, 'gggg', 'gggg', 'gggg', '2012-10-17', 'f', '2012-10-17 15:37:15', '2012-10-17 15:37:15'),
(46, 111, 'didthiswork', 'asdf', 'adsfas', '2012-10-17', 'f', '2012-10-17 15:37:43', '2012-10-17 15:37:43');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_type`, `address_one`, `address_two`, `city`, `state`, `zip`, `contact`, `website`, `phone`, `phone_cell`, `phone_office`, `isDeleted`, `created`, `modified`) VALUES
(1, 'adaf', 'adgag', 'adgadg', 'adgasg', 'adgag', 'ad', 12345, 'agadgadg', '', 823, 823, 823, 0, '2012-10-11 20:03:17', '2012-10-11 20:03:17'),
(2, 'test', 'adsf', 'adsfa', 'asdfas', 'adsfa', 'ad', 12345, 'adsfadf', '', 0, NULL, NULL, 0, '2012-10-11 21:00:45', '2012-10-11 21:00:45'),
(3, 'ahwhnnnnnn', 'nnn', 'nnn', 'nn', 'nn', 'nn', 12345, 'nnnn', '', 1234125, NULL, NULL, 0, '2012-10-11 21:01:09', '2012-10-11 21:01:09'),
(4, 'fffff', 'fff', 'fff', 'ff', 'ff', 'ff', 12345, 'fff', '', 0, NULL, NULL, 0, '2012-10-11 21:02:27', '2012-10-11 21:02:27'),
(5, 'asdfad', 'adfa', 'adfa', 'adsf', 'adf', 'ad', 12345, 'asdfasdf', '', 0, NULL, NULL, 0, '2012-10-11 21:05:19', '2012-10-11 21:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(30) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `resource_status` text NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`organization_id`),
  KEY `agency_id_2` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_name`, `organization_id`, `resource_status`, `isDeleted`, `created`, `modified`) VALUES
(3, 'asdfaf', 4, 'asdfasf', 0, '2012-10-14 15:12:51', '2012-10-14 15:12:51'),
(5, 'test', 2, 'test', 0, '2012-10-17 16:32:38', '2012-10-17 16:32:38'),
(6, 'test2', 2, 'test2', 0, '2012-10-17 16:32:42', '2012-10-17 16:32:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1243 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `isSuperAdmin`, `organization_id`, `email`, `isDeleted`, `created`, `modified`) VALUES
(1238, 'samwise', '3d9803dc694c20a7e5b5cb40971efbb7caa2a484', 0, 0, 0, 'adsf@asd.com', 0, '2012-10-09 16:27:25', '2012-10-09 16:27:25'),
(1239, 'asdf', '2ef3549c14c8a30048fada9a7e680c18e36d1067', 0, 0, 0, 'asdf@asdf.com', 0, '2012-10-09 16:56:01', '2012-10-09 16:56:01'),
(1241, 'asdfadsf', '503e6f06e06c730eb11e9d77519f1820be64a52b', 0, 0, 0, 'as@as.com', 0, '2012-10-09 16:57:38', '2012-10-09 16:57:38'),
(1242, 'superAdmin', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 1, 0, 'super@super.com', 0, '2012-10-09 20:27:18', '2012-10-09 20:27:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_checklist`
--
ALTER TABLE `client_checklist`
  ADD CONSTRAINT `client_checklist_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `resource_uses_ibfk_4` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resource_uses_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
