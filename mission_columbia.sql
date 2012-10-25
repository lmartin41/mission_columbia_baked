-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 03:42 PM
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

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `DOB`, `sex`, `address_one`, `address_two`, `ssn`, `city`, `state`, `zip`, `phone`, `apartment_number`, `how_did_you_hear`, `how_long_do_you_need`, `regular_job`, `food_stamps`, `veterans_pension`, `part_time_job`, `social_security`, `annuity_check`, `child_support`, `ssi_or_disability`, `unemployment`, `when_next_check`, `pregnant`, `disabled`, `handicapped`, `stove`, `refrigerator`, `cell`, `cable`, `internet`, `model`, `isDeleted`, `created`, `modified`) VALUES
(110, 'Bob', 'Roberts', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(140, 'Thom', 'Yorke', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(141, 'Claudio', 'Sanchez', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(142, 'Morgan', 'Kibby', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(143, 'John', 'Lennon', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(144, 'David', 'Portner', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(145, 'Anthony', 'Gonzalez', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(146, 'Yann', 'Gonzalez', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(147, 'Loic', 'Maurin', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(148, 'Jordan', 'Lawlor', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(149, 'Ian', 'Young', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(150, 'Damon', 'Albarn', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(151, 'David', 'Grohl', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19'),
(152, 'Eddie', 'Vedder', '2012-10-11 00:00:00', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Friends', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-10-11', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '2012-10-11 00:33:06', '2012-10-11 14:23:19');

--
-- Dumping data for table `client_checklist`
--

INSERT INTO `client_checklist` (`id`, `client_id`, `task1name`, `task1comments`, `task1isCompleted`, `task2name`, `task2comments`, `task2isCompleted`, `task3name`, `task3comments`, `task3isDeleted`, `task4name`, `task4comments`, `task4isDeleted`, `task5name`, `task5comments`, `task5isDeleted`, `task6name`, `task6comments`, `task6isCompleted`, `task7name`, `task7comments`, `task7isCompleted`, `task8name`, `task8comments`, `task8isCompleted`, `task9name`, `task9comments`, `task9isCompleted`, `task10name`, `task10comments`, `task10isCompleted`, `created`, `modified`, `isCompleted`, `isDeleted`) VALUES
(1, 110, 'adsafs', 'adsfadf', 0, 'adsfasd', 'asdfads', 0, 'asdfasf', 'asdfasf', 0, 'adsfads', 'asdfadsf', 0, 'asdfas', 'adsfads', 0, 'adsfas', 'asdfadsf', 0, 'asdfas', 'asdfads', 0, 'adsadsf', 'asdfads', 0, 'asdfasd', 'asdfads', 0, 'asdfds', 'asdfadsf', 0, '2012-10-17 16:08:41', '2012-10-17 16:08:41', 0, NULL),
(2, 110, 'adfaf', 'asdfadsfs', 0, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '2012-10-17 16:18:54', '2012-10-17 16:18:54', NULL, NULL),
(3, 110, 'gggg', 'gggg', 0, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '2012-10-17 16:19:42', '2012-10-17 16:19:42', NULL, NULL);

--
-- Dumping data for table `client_relations`
--

INSERT INTO `client_relations` (`id`, `client_id`, `first_name`, `last_name`, `relationship`, `DOB`, `sex`, `created`, `modified`) VALUES
(17, 110, 'adshah', 'adhadha', 'adfadf', '2012-10-11', 'f', '2012-10-11 00:33:17', '2012-10-11 00:33:17'),
(18, 110, 'adah', 'adhah', 'adf', '2012-10-11', 'f', '2012-10-11 00:33:23', '2012-10-11 00:33:23'),
(24, 110, 'agadg', 'asdfa', 'asdfadf', '2012-10-11', 'f', '2012-10-11 14:23:29', '2012-10-11 14:23:29'),
(37, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:23', '2012-10-11 20:32:23'),
(38, 110, 'adsgadg', 'adgag', 'adsgagd', '2012-10-11', 'f', '2012-10-11 20:32:44', '2012-10-11 20:32:44'),
(39, 110, 'asdgadgcccccc', 'asdga', 'adsgag', '2012-10-11', 'f', '2012-10-11 20:32:51', '2012-10-11 20:33:03'),
(45, 110, 'gggg', 'gggg', 'gggg', '2012-10-17', 'f', '2012-10-17 15:37:15', '2012-10-17 15:37:15');

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_type`, `address_one`, `address_two`, `city`, `state`, `zip`, `contact`, `website`, `phone`, `phone_cell`, `phone_office`, `isDeleted`, `created`, `modified`) VALUES
(2, 'Mission Columbia', 'Faith Based Resource', '2723 Ashland Rd.', NULL, 'Columbia', 'SC', 29210, 'Mission Columbia', 'http://www.missioncolumbia.org', 0, NULL, NULL, 0, '2012-10-11 21:00:45', '2012-10-11 21:00:45'),
(4, 'CCM C.O.O.L Youth Outreach Min', 'Faith Based Resource', '1631 Auburn Street', NULL, 'Columbia', 'SC', 29204, 'Angela Cantrell', 'http://christcentralministries', 2147483647, NULL, NULL, 0, '2012-10-11 21:02:27', '2012-10-11 21:02:27'),
(6, 'Lexington Interfaith Community', 'Faith Based Resource', '216 Harmon Street', NULL, 'Lexington', 'SC', 30303, 'LICS', 'http://www.licssc.org/', 0, NULL, NULL, 0, '2012-10-25 02:22:03', '2012-10-25 02:22:03');

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_name`, `organization_id`, `resource_status`, `isDeleted`, `created`, `modified`) VALUES
(3, 'asdfaf', 4, 'asdfasf', 0, '2012-10-14 15:12:51', '2012-10-14 15:12:51'),
(5, 'Counseling', 2, 'Active', 0, '2012-10-17 16:32:38', '2012-10-17 16:32:38'),
(6, 'Counseling', 6, 'Active', 0, '2012-10-17 16:32:42', '2012-10-17 16:32:42'),
(7, 'Mentoring', 2, 'Active', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Dumping data for table `resource_uses`
--

INSERT INTO `resource_uses` (`id`, `client_id`, `resource_id`, `date`, `comments`, `created`, `modified`) VALUES
(9, 110, 3, '2012-10-17 00:00:00', 'testing', '2012-10-17 05:26:17', '2012-10-17 05:26:17'),
(11, 110, 3, '2012-10-17 00:00:00', 'very good resuorce use', '2012-10-17 15:35:37', '2012-10-17 15:35:37'),
(12, 110, 3, '2012-10-17 00:00:00', 'another good resource use', '2012-10-17 15:35:44', '2012-10-17 15:35:44');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`, `isSuperAdmin`, `organization_id`, `email`, `isDeleted`, `created`, `modified`) VALUES
(1242, 'superAdmin', '81875d7a3a96bd9f69b2a358c0a3414259446b3a', 0, 1, 0, 'super@super.com', 0, '2012-10-09 20:27:18', '2012-10-09 20:27:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
