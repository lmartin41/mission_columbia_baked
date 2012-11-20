-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2012 at 03:38 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1248 ;

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
