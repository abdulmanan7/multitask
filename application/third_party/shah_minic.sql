-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2016 at 01:28 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shah_minic`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) unsigned NOT NULL,
  `file_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachment_link`
--

CREATE TABLE IF NOT EXISTS `attachment_link` (
  `id` int(11) unsigned NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `product_choice_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_email_detail`
--

CREATE TABLE IF NOT EXISTS `att_email_detail` (
  `att_detail_id` int(11) NOT NULL,
  `att_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `pdf_path` varchar(200) NOT NULL,
  `thumb_path` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bitrix_log`
--

CREATE TABLE IF NOT EXISTS `bitrix_log` (
  `id` mediumint(6) NOT NULL,
  `status_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `status_message` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `createdfiles`
--

CREATE TABLE IF NOT EXISTS `createdfiles` (
  `id` int(11) NOT NULL,
  `offer_id` varchar(20) NOT NULL,
  `client_name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link_to_file` text NOT NULL,
  `mail` varchar(50) NOT NULL,
  `street` varchar(200) DEFAULT NULL,
  `plz` varchar(15) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=433 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_att`
--

CREATE TABLE IF NOT EXISTS `email_att` (
  `att_id` int(11) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `nachname` varchar(100) NOT NULL,
  `strabe_nr` varchar(100) NOT NULL,
  `PLZ` varchar(50) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `land` varchar(20) NOT NULL,
  `bauobjektadress` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `baujahr_hous` varchar(20) NOT NULL,
  `baujahr_alte_heizung` varchar(20) NOT NULL,
  `brennstoff` varchar(20) NOT NULL,
  `verbrauch` varchar(20) NOT NULL,
  `einheit` varchar(20) NOT NULL,
  `leistung_heizung_alt` varchar(40) NOT NULL,
  `wohnflache` varchar(20) NOT NULL,
  `personen` varchar(10) NOT NULL,
  `warmedammung` varchar(10) NOT NULL,
  `warmebedarf_neu` varchar(10) NOT NULL,
  `beschreibung` varchar(1000) NOT NULL,
  `anfragedatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `valid_until` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `skonto` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_headings`
--

CREATE TABLE IF NOT EXISTS `pdf_headings` (
  `id` int(11) unsigned NOT NULL,
  `heading_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `art_nr` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `funding` float NOT NULL,
  `power` int(11) NOT NULL DEFAULT '0',
  `selected` int(11) NOT NULL DEFAULT '0',
  `funding_new` float NOT NULL,
  `available_for` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` mediumint(4) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_title` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `VAT_no` varchar(50) DEFAULT NULL,
  `attn_name` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `post_code` varchar(20) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `step_id` int(11) NOT NULL,
  `tooltip` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE IF NOT EXISTS `tblcompany` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attn_name` varchar(60) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `address1` varchar(512) NOT NULL,
  `address2` varchar(512) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `registration_no` varchar(60) DEFAULT NULL,
  `VAT_no` varchar(60) DEFAULT NULL,
  `logo` varchar(256) NOT NULL DEFAULT 'assets/img/logo.png'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachment_link`
--
ALTER TABLE `attachment_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_email_detail`
--
ALTER TABLE `att_email_detail`
  ADD PRIMARY KEY (`att_detail_id`);

--
-- Indexes for table `createdfiles`
--
ALTER TABLE `createdfiles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `offer_id` (`offer_id`);

--
-- Indexes for table `email_att`
--
ALTER TABLE `email_att`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_headings`
--
ALTER TABLE `pdf_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `attachment_link`
--
ALTER TABLE `attachment_link`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `att_email_detail`
--
ALTER TABLE `att_email_detail`
  MODIFY `att_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `createdfiles`
--
ALTER TABLE `createdfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=433;
--
-- AUTO_INCREMENT for table `email_att`
--
ALTER TABLE `email_att`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pdf_headings`
--
ALTER TABLE `pdf_headings`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
