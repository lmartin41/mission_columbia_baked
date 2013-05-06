-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2013 at 10:37 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET FOREIGN_KEY_CHECKS=0;
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

DROP TABLE IF EXISTS `acos`;
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

DROP TABLE IF EXISTS `aros`;
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

DROP TABLE IF EXISTS `aros_acos`;
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

DROP TABLE IF EXISTS `clients`;
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
  `apartment_number` varchar(10) DEFAULT NULL,
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
  `comments` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_checklists`
--

DROP TABLE IF EXISTS `client_checklists`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_checklist_tasks`
--

DROP TABLE IF EXISTS `client_checklist_tasks`;
CREATE TABLE IF NOT EXISTS `client_checklist_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_checklist_id` int(11) NOT NULL,
  `task_name` varchar(30) NOT NULL,
  `task_description` varchar(30) NOT NULL,
  `comments` text,
  `isCompleted` tinyint(1) DEFAULT '0',
  `isDeleted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_checklist_id` (`client_checklist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_relations`
--

DROP TABLE IF EXISTS `client_relations`;
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
  `isDeleted` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `feedback` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `table_ref` varchar(30) NOT NULL,
  `field_name` varchar(30) NOT NULL,
  `field_type` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `org_id` (`organization_id`,`table_ref`(1))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `field_instances`
--

DROP TABLE IF EXISTS `field_instances`;
CREATE TABLE IF NOT EXISTS `field_instances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fields_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `field_value` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `client_id_2` (`client_id`),
  KEY `resource_id` (`resource_id`),
  KEY `fields_id` (`fields_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `loggers`
--

DROP TABLE IF EXISTS `loggers`;
CREATE TABLE IF NOT EXISTS `loggers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `controller` varchar(20) DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `description` text,
  `created` date NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

-- --------------------------------------------------------

--
-- Table structure for table `lookups`
--

DROP TABLE IF EXISTS `lookups`;
CREATE TABLE IF NOT EXISTS `lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `table_reference` varchar(30) NOT NULL,
  `field_name` varchar(30) NOT NULL,
  `custom_name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
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
-- Table structure for table `prayer_requests`
--

DROP TABLE IF EXISTS `prayer_requests`;
CREATE TABLE IF NOT EXISTS `prayer_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `request` text NOT NULL,
  `date` date DEFAULT NULL,
  `comments` text,
  `isDeleted` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `org_id` (`organization_id`),
  KEY `org_name` (`organization_id`),
  KEY `org_name_2` (`organization_id`),
  KEY `org_id_2` (`organization_id`),
  KEY `org_id_3` (`organization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(30) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `resource_type_id` int(11) DEFAULT NULL,
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
  KEY `agency_id_2` (`organization_id`),
  KEY `resource_type_id` (`resource_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `resource_types`
--

DROP TABLE IF EXISTS `resource_types`;
CREATE TABLE IF NOT EXISTS `resource_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `resource_uses`
--

DROP TABLE IF EXISTS `resource_uses`;
CREATE TABLE IF NOT EXISTS `resource_uses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` text,
  `isDeleted` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `resource_id` (`resource_id`),
  KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

DROP TABLE IF EXISTS `tips`;
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

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1250 ;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_information_form`
--

DROP TABLE IF EXISTS `volunteer_information_form`;
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
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `field_instances`
--
ALTER TABLE `field_instances`
  ADD CONSTRAINT `field_instances_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_instances_ibfk_4` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_instances_ibfk_5` FOREIGN KEY (`fields_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loggers`
--
ALTER TABLE `loggers`
  ADD CONSTRAINT `loggers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lookups`
--
ALTER TABLE `lookups`
  ADD CONSTRAINT `lookups_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prayer_requests`
--
ALTER TABLE `prayer_requests`
  ADD CONSTRAINT `prayer_requests_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`resource_type_id`) REFERENCES `resource_types` (`id`);

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
