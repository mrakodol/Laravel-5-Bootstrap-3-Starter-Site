-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2015 at 06:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `l5start`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-02-05 04:19:21', '2015-02-05 04:19:21'),
(2, 2, 2, '2015-02-05 04:19:21', '2015-02-05 04:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `position`, `name`, `lang_code`, `icon`, `user_id`, `user_id_edited`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'English', 'en', 'icon_flag_gb.gif', NULL, NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21', NULL),
(2, NULL, 'Српски', 'sr', 'icon_flag_sr.gif', NULL, NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21', NULL),
(3, NULL, 'Bosanski', 'bs', 'icon_flag_bs.gif', NULL, NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_reminders_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_16_115128_entrust_setup_tables', 1),
('2014_10_16_115550_entrust_permissions', 1),
('2014_10_18_195027_create_language_table', 1),
('2014_10_18_225005_create_news_categorys_table', 1),
('2014_10_18_225505_create_news_table', 1),
('2014_10_18_225928_create_photo_album_table', 1),
('2014_10_18_230227_create_video_album_table', 1),
('2014_10_18_231619_create_photo_table', 1),
('2014_10_18_232019_create_video_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `newscategory_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `language_id`, `position`, `user_id`, `user_id_edited`, `newscategory_id`, `title`, `slug`, `introduction`, `content`, `source`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 1, 'Cras egestas non arcu quis facilisis', NULL, 'Cras egestas non arcu quis facilisis. Etiam scelerisque felis a ante \r\n		vehicula dignissim. Nunc nulla erat, placerat in ipsum efficitur, efficitur volutpat enim. \r\n		In nec lobortis sapien. Maecenas quis nunc molestie, ultrices magna nec, cursus risus. \r\n		Fusce viverra urna at blandit dignissim. Duis id porta augue, vel tempor enim. Ut eu orci dolor. ', 'Quisque congue sed mauris sit amet fringilla. Pellentesque a justo mollis, \r\n		laoreet felis vehicula, elementum urna. Proin a nisl nec lorem mollis malesuada. Suspendisse sollicitudin \r\n		volutpat elementum. Mauris luctus egestas justo, nec tincidunt est luctus a. Aenean a convallis sem. \r\n		Aenean quis lorem efficitur, rutrum libero eu, efficitur nunc. Praesent eu metus pellentesque, mollis \r\n		dui eget, interdum elit. Nulla tempus tristique eros, ut mattis leo sagittis at. Curabitur rutrum tellus \r\n		eu ex egestas, et dapibus lacus sodales. Maecenas facilisis tortor vitae neque vehicula, feugiat commodo \r\n		nulla pulvinar. Maecenas porttitor mauris enim, sed condimentum enim varius vel. Nulla dapibus velit a \r\n		luctus malesuada. Nam eleifend felis et porta semper. Proin blandit sem augue, in venenatis augue ultricies \r\n		vitae. Nulla eu purus tellus.\n\rCras tempus mauris sed arcu euismod, eget ultrices nisi lobortis. Etiam \r\n		tincidunt erat nunc, ut pretium turpis mollis et. Fusce feugiat, lectus id imperdiet rutrum, justo urna \r\n		finibus libero, eget dignissim erat lorem sed neque. Curabitur non nisl facilisis, venenatis risus vel, \r\n		commodo augue. Cras eget nisl dictum, sodales turpis eu, blandit lectus. Duis mattis est ac mi pretium \r\n		tristique vitae non magna. Aenean dictum quis neque a volutpat. Integer convallis purus in enim tempor \r\n		pretium. Sed sit amet diam et purus porta luctus. Sed pretium, lorem ut sodales maximus, nisl arcu \r\n		tristique odio, nec posuere mauris metus ac justo. Pellentesque ut volutpat purus. Nulla vel ornare libero. \r\n		Sed metus massa, blandit eu lorem eu, finibus ornare arcu. Proin sagittis eu turpis sit amet scelerisque. \r\n		Phasellus nec libero eu ipsum congue consectetur. Quisque id mattis nisl, ac porta sapien. Nulla lobortis,\r\n		turpis at scelerisque finibus, augue neque laoreet diam, in facilisis lacus purus at libero. Ut libero \r\n		sapien, laoreet nec lorem suscipit, efficitur tincidunt elit. Quisque mi libero, volutpat eu convallis nec, \r\n		semper at nulla. Sed hendrerit rhoncus nulla sit amet vestibulum. Vestibulum ante ipsum primis in faucibus \r\n		orci luctus et ultrices posuere cubilia Curae; Suspendisse diam neque, dignissim non metus maximus, \r\n		suscipit faucibus magna. Aenean sodales elit enim, eu laoreet dui vulputate ac. Donec sagittis dignissim \r\n		tortor, vitae dignissim dolor ultricies eu. Vivamus rutrum vestibulum auctor. Aliquam eu orci ligula. \r\n		Quisque at ligula ex. Suspendisse in ante eget turpis sollicitudin lobortis tincidunt sed nibh. Phasellus \r\n		elementum nibh vitae rutrum porta. Pellentesque vitae vestibulum purus. Curabitur placerat mattis tempor.', NULL, NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21'),
(2, 1, NULL, 1, NULL, 1, 'Fusce vel turpis ultricies', NULL, 'Duis posuere cursus arcu, consectetur tincidunt turpis vulputate eu. \r\n		Integer venenatis consequat turpis sit amet bibendum. Nulla nibh ex, semper nec sem sed, consectetur \r\n		tincidunt metus. Aliquam mollis condimentum magna id tincidunt. Suspendisse pellentesque placerat \r\n		accumsan. Sed a turpis lacus. Donec luctus lorem a turpis scelerisque tincidunt. Etiam at tellus \r\n		sed erat elementum dictum. In sit amet nulla mattis, placerat erat non, vehicula metus. Morbi nulla \r\n		sapien, sollicitudin non vulputate et, sodales in nisi. Donec sapien dolor, tincidunt sed ultricies \r\n		in, ultrices sit amet ante. ', 'Quisque congue sed mauris sit amet fringilla. Pellentesque a justo mollis, \r\n		laoreet felis vehicula, elementum urna. Proin a nisl nec lorem mollis malesuada. Suspendisse sollicitudin \r\n		volutpat elementum. Mauris luctus egestas justo, nec tincidunt est luctus a. Aenean a convallis sem. \r\n		Aenean quis lorem efficitur, rutrum libero eu, efficitur nunc. Praesent eu metus pellentesque, mollis \r\n		dui eget, interdum elit. Nulla tempus tristique eros, ut mattis leo sagittis at. Curabitur rutrum tellus \r\n		eu ex egestas, et dapibus lacus sodales. Maecenas facilisis tortor vitae neque vehicula, feugiat commodo \r\n		nulla pulvinar. Maecenas porttitor mauris enim, sed condimentum enim varius vel. Nulla dapibus velit a \r\n		luctus malesuada. Nam eleifend felis et porta semper. Proin blandit sem augue, in venenatis augue ultricies \r\n		vitae. Nulla eu purus tellus.\n\rCras tempus mauris sed arcu euismod, eget ultrices nisi lobortis. Etiam \r\n		tincidunt erat nunc, ut pretium turpis mollis et. Fusce feugiat, lectus id imperdiet rutrum, justo urna \r\n		finibus libero, eget dignissim erat lorem sed neque. Curabitur non nisl facilisis, venenatis risus vel, \r\n		commodo augue. Cras eget nisl dictum, sodales turpis eu, blandit lectus. Duis mattis est ac mi pretium \r\n		tristique vitae non magna. Aenean dictum quis neque a volutpat. Integer convallis purus in enim tempor \r\n		pretium. Sed sit amet diam et purus porta luctus. Sed pretium, lorem ut sodales maximus, nisl arcu \r\n		tristique odio, nec posuere mauris metus ac justo. Pellentesque ut volutpat purus. Nulla vel ornare libero. \r\n		Sed metus massa, blandit eu lorem eu, finibus ornare arcu. Proin sagittis eu turpis sit amet scelerisque. \r\n		Phasellus nec libero eu ipsum congue consectetur. Quisque id mattis nisl, ac porta sapien. Nulla lobortis,\r\n		turpis at scelerisque finibus, augue neque laoreet diam, in facilisis lacus purus at libero. Ut libero \r\n		sapien, laoreet nec lorem suscipit, efficitur tincidunt elit. Quisque mi libero, volutpat eu convallis nec, \r\n		semper at nulla. Sed hendrerit rhoncus nulla sit amet vestibulum. Vestibulum ante ipsum primis in faucibus \r\n		orci luctus et ultrices posuere cubilia Curae; Suspendisse diam neque, dignissim non metus maximus, \r\n		suscipit faucibus magna. Aenean sodales elit enim, eu laoreet dui vulputate ac. Donec sagittis dignissim \r\n		tortor, vitae dignissim dolor ultricies eu. Vivamus rutrum vestibulum auctor. Aliquam eu orci ligula. \r\n		Quisque at ligula ex. Suspendisse in ante eget turpis sollicitudin lobortis tincidunt sed nibh. Phasellus \r\n		elementum nibh vitae rutrum porta. Pellentesque vitae vestibulum purus. Curabitur placerat mattis tempor.', NULL, NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21'),
(3, 1, NULL, 1, NULL, 1, 'Donec ligula sem, facilisis ac tristique et, imperdiet nec nisi', NULL, 'Cras egestas non arcu quis facilisis. Etiam scelerisque felis a ante \r\n		vehicula dignissim. Nunc nulla erat, placerat in ipsum efficitur, efficitur volutpat enim. \r\n		In nec lobortis sapien. Maecenas quis nunc molestie, ultrices magna nec, cursus risus. \r\n		Fusce viverra urna at blandit dignissim. Duis id porta augue, vel tempor enim. Ut eu orci dolor. ', 'Quisque congue sed mauris sit amet fringilla. Pellentesque a justo mollis, \r\n		laoreet felis vehicula, elementum urna. Proin a nisl nec lorem mollis malesuada. Suspendisse sollicitudin \r\n		volutpat elementum. Mauris luctus egestas justo, nec tincidunt est luctus a. Aenean a convallis sem. \r\n		Aenean quis lorem efficitur, rutrum libero eu, efficitur nunc. Praesent eu metus pellentesque, mollis \r\n		dui eget, interdum elit. Nulla tempus tristique eros, ut mattis leo sagittis at. Curabitur rutrum tellus \r\n		eu ex egestas, et dapibus lacus sodales. Maecenas facilisis tortor vitae neque vehicula, feugiat commodo \r\n		nulla pulvinar. Maecenas porttitor mauris enim, sed condimentum enim varius vel. Nulla dapibus velit a \r\n		luctus malesuada. Nam eleifend felis et porta semper. Proin blandit sem augue, in venenatis augue ultricies \r\n		vitae. Nulla eu purus tellus.\n\rCras tempus mauris sed arcu euismod, eget ultrices nisi lobortis. Etiam \r\n		tincidunt erat nunc, ut pretium turpis mollis et. Fusce feugiat, lectus id imperdiet rutrum, justo urna \r\n		finibus libero, eget dignissim erat lorem sed neque. Curabitur non nisl facilisis, venenatis risus vel, \r\n		commodo augue. Cras eget nisl dictum, sodales turpis eu, blandit lectus. Duis mattis est ac mi pretium \r\n		tristique vitae non magna. Aenean dictum quis neque a volutpat. Integer convallis purus in enim tempor \r\n		pretium. Sed sit amet diam et purus porta luctus. Sed pretium, lorem ut sodales maximus, nisl arcu \r\n		tristique odio, nec posuere mauris metus ac justo. Pellentesque ut volutpat purus. Nulla vel ornare libero. \r\n		Sed metus massa, blandit eu lorem eu, finibus ornare arcu. Proin sagittis eu turpis sit amet scelerisque. \r\n		Phasellus nec libero eu ipsum congue consectetur. Quisque id mattis nisl, ac porta sapien. Nulla lobortis,\r\n		turpis at scelerisque finibus, augue neque laoreet diam, in facilisis lacus purus at libero. Ut libero \r\n		sapien, laoreet nec lorem suscipit, efficitur tincidunt elit. Quisque mi libero, volutpat eu convallis nec, \r\n		semper at nulla. Sed hendrerit rhoncus nulla sit amet vestibulum. Vestibulum ante ipsum primis in faucibus \r\n		orci luctus et ultrices posuere cubilia Curae; Suspendisse diam neque, dignissim non metus maximus, \r\n		suscipit faucibus magna. Aenean sodales elit enim, eu laoreet dui vulputate ac. Donec sagittis dignissim \r\n		tortor, vitae dignissim dolor ultricies eu. Vivamus rutrum vestibulum auctor. Aliquam eu orci ligula. \r\n		Quisque at ligula ex. Suspendisse in ante eget turpis sollicitudin lobortis tincidunt sed nibh. Phasellus \r\n		elementum nibh vitae rutrum porta. Pellentesque vitae vestibulum purus. Curabitur placerat mattis tempor.', NULL, NULL, '2015-02-05 04:19:22', '2015-02-05 04:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `language_id`, `position`, `user_id`, `user_id_edited`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 'Lorem Ipsum', NULL, '2015-02-05 04:19:21', '2015-02-05 04:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'manage_language', 'Manage languages', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'manage_news_category', 'Manage news category', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'manage_news', 'Manage news', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'manage_video_album', 'Manage video album', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'manage_video', 'Manage video', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'manage_photo_album', 'Manage photo album', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'manage_photo', 'Manage photo', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'manage_users', 'Manage users', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'manage_roles', 'Manage roles', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `photo_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_album`
--

CREATE TABLE IF NOT EXISTS `photo_album` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folderid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, '2015-02-05 04:19:21', '2015-02-05 04:19:21'),
(2, 'comment', 0, '2015-02-05 04:19:21', '2015-02-05 04:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@admin.com', '$2y$10$XAZAy//W8xYS1pfYMVV02.zwniXdFmJ/fhFVPujVE5rqkuI70QuFa', '97ad196655df26b4b681205d938e3378', NULL, 1, '2015-02-05 04:19:20', '2015-02-05 04:19:20'),
(2, 'Test User', 'user@user.com', '$2y$10$RAaubKglJJZbFPg1eC9o3u/JX/ZJjqDd.VuuU.U5ecQrDPDqw/.x.', '4299c4c7487b0c32d26ed222804f1080', NULL, 1, '2015-02-05 04:19:21', '2015-02-05 04:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_album_id` int(10) unsigned DEFAULT NULL,
  `album_cover` tinyint(1) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_album`
--

CREATE TABLE IF NOT EXISTS `video_album` (
`id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `folderid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
 ADD PRIMARY KEY (`id`), ADD KEY `assigned_roles_user_id_index` (`user_id`), ADD KEY `assigned_roles_role_id_index` (`role_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `language_name_unique` (`name`), ADD UNIQUE KEY `language_lang_code_unique` (`lang_code`), ADD KEY `language_user_id_foreign` (`user_id`), ADD KEY `language_user_id_edited_foreign` (`user_id_edited`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `news_language_id_foreign` (`language_id`), ADD KEY `news_user_id_foreign` (`user_id`), ADD KEY `news_user_id_edited_foreign` (`user_id_edited`), ADD KEY `news_newscategory_id_foreign` (`newscategory_id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
 ADD PRIMARY KEY (`id`), ADD KEY `news_category_language_id_foreign` (`language_id`), ADD KEY `news_category_user_id_foreign` (`user_id`), ADD KEY `news_category_user_id_edited_foreign` (`user_id_edited`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`), ADD UNIQUE KEY `permissions_display_name_unique` (`display_name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_role_permission_id_index` (`permission_id`), ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`id`), ADD KEY `photo_language_id_foreign` (`language_id`), ADD KEY `photo_photo_album_id_foreign` (`photo_album_id`), ADD KEY `photo_user_id_foreign` (`user_id`), ADD KEY `photo_user_id_edited_foreign` (`user_id_edited`);

--
-- Indexes for table `photo_album`
--
ALTER TABLE `photo_album`
 ADD PRIMARY KEY (`id`), ADD KEY `photo_album_language_id_foreign` (`language_id`), ADD KEY `photo_album_user_id_foreign` (`user_id`), ADD KEY `photo_album_user_id_edited_foreign` (`user_id_edited`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`), ADD KEY `video_language_id_foreign` (`language_id`), ADD KEY `video_video_album_id_foreign` (`video_album_id`), ADD KEY `video_user_id_foreign` (`user_id`), ADD KEY `video_user_id_edited_foreign` (`user_id_edited`);

--
-- Indexes for table `video_album`
--
ALTER TABLE `video_album`
 ADD PRIMARY KEY (`id`), ADD KEY `video_album_language_id_foreign` (`language_id`), ADD KEY `video_album_user_id_foreign` (`user_id`), ADD KEY `video_album_user_id_edited_foreign` (`user_id_edited`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_album`
--
ALTER TABLE `photo_album`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_album`
--
ALTER TABLE `video_album`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `language`
--
ALTER TABLE `language`
ADD CONSTRAINT `language_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `language_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `news_newscategory_id_foreign` FOREIGN KEY (`newscategory_id`) REFERENCES `news_category` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `news_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `news_category`
--
ALTER TABLE `news_category`
ADD CONSTRAINT `news_category_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `news_category_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `news_category_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
ADD CONSTRAINT `photo_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `photo_photo_album_id_foreign` FOREIGN KEY (`photo_album_id`) REFERENCES `photo_album` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photo_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `photo_album`
--
ALTER TABLE `photo_album`
ADD CONSTRAINT `photo_album_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `photo_album_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `photo_album_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
ADD CONSTRAINT `video_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `video_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `video_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `video_video_album_id_foreign` FOREIGN KEY (`video_album_id`) REFERENCES `video_album` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `video_album`
--
ALTER TABLE `video_album`
ADD CONSTRAINT `video_album_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
ADD CONSTRAINT `video_album_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
ADD CONSTRAINT `video_album_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
