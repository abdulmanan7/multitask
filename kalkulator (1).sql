-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2016 at 02:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kalkulator`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) unsigned NOT NULL,
  `file_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `file_name`) VALUES
(5, 'agb-solarvent.pdf'),
(12, 'SOLARvent_iQ_3_Prospekt.pdf'),
(14, 'ErP_Label.pdf'),
(17, 'KER_P_Speicher_Masszeichnungen_2016.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `attachment_link`
--

CREATE TABLE IF NOT EXISTS `attachment_link` (
  `id` int(11) unsigned NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `product_choice_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment_link`
--

INSERT INTO `attachment_link` (`id`, `attachment_id`, `product_choice_id`) VALUES
(1, 12, 1),
(2, 17, 1),
(3, 14, 1),
(4, 5, 1),
(5, 12, 2),
(6, 17, 2),
(7, 14, 2),
(8, 5, 2),
(9, 17, 3),
(10, 14, 3),
(11, 5, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `createdfiles`
--

INSERT INTO `createdfiles` (`id`, `offer_id`, `client_name`, `date`, `link_to_file`, `mail`, `street`, `plz`, `city`, `phone`) VALUES
(97, 'AK10030-09-13', 'Norbert Obenauf', '2013-09-19 19:18:46', 'offers/AK10030-09-13.pdf', 'Norbert.Obenauf@gmx.de', NULL, NULL, NULL, ''),
(105, 'AK10038-09-13', 'Thomas Weßling', '2013-09-20 19:14:32', 'offers/AK10038-09-13.pdf', 'thomasw9169@googlemail.com', NULL, NULL, NULL, ''),
(115, 'AK10000-10-13', 'Dirk Schaardt', '2013-10-01 21:48:05', 'offers/AK10000-10-13.pdf', 'krid_sch@web.de', NULL, NULL, NULL, ''),
(116, 'AK10001-10-13', 'gilles Ledorré', '2013-10-05 15:37:10', 'offers/AK10001-10-13.pdf', 'ledorregilles@free.fr', NULL, NULL, NULL, ''),
(117, 'AK10002-10-13', 'Hubert Lampert', '2013-10-07 13:05:25', 'offers/AK10002-10-13.pdf', 'lampert.hubert@gmx.de', NULL, NULL, NULL, ''),
(119, 'AK10004-10-13', 'Peter Kalkmann', '2013-10-10 19:30:50', 'offers/AK10004-10-13.pdf', 'info@peter-kalkmann.de', NULL, NULL, NULL, ''),
(120, 'AK10005-10-13', 'Manuela Rosner', '2013-10-16 10:55:52', 'offers/AK10005-10-13.pdf', 'rosner.manuela@freenet.de', NULL, NULL, NULL, ''),
(121, 'AK10006-10-13', 'Manuela Rosner', '2013-10-16 11:00:00', 'offers/AK10006-10-13.pdf', 'rosner.manuela@freenet.de', NULL, NULL, NULL, ''),
(122, 'AK10007-10-13', 'Manuela Rosner', '2013-10-16 11:05:23', 'offers/AK10007-10-13.pdf', 'rosner.manuela@freenet.de', NULL, NULL, NULL, ''),
(123, 'AK10008-10-13', 'Manuela Rosner', '2013-10-17 11:46:37', 'offers/AK10008-10-13.pdf', 'rosner.manuela@freenet.de', NULL, NULL, NULL, ''),
(124, 'AK10009-10-13', 'Markus Weber', '2013-10-27 09:20:08', 'offers/AK10009-10-13.pdf', 'dready2@arcor.de', NULL, NULL, NULL, ''),
(125, 'AK10010-10-13', 'Thomas Klaiber', '2013-10-28 20:35:15', 'offers/AK10010-10-13.pdf', 'infopost@thomasklaiber.de', NULL, NULL, NULL, ''),
(126, 'AK10011-10-13', 'Bernd Nolte', '2013-10-30 19:51:57', 'offers/AK10011-10-13.pdf', 'bernd-nolte@t-online.de', NULL, NULL, NULL, ''),
(127, 'AK10000-11-13', 'Kurt Heinzelmann', '2013-11-08 11:06:16', 'offers/AK10000-11-13.pdf', 'kurtfly@gmx.de', NULL, NULL, NULL, ''),
(128, 'AK10001-11-13', 'Kurt Heinzelmann', '2013-11-08 11:11:21', 'offers/AK10001-11-13.pdf', 'kurtfly@gmx.de', NULL, NULL, NULL, ''),
(129, 'AK10002-11-13', 'Enrico Hellmann', '2013-11-12 20:08:23', 'offers/AK10002-11-13.pdf', 'Enrico_Hellmann@t-online.de', NULL, NULL, NULL, ''),
(130, 'AK10003-11-13', 'Michael Weißlowski', '2013-11-15 13:13:51', 'offers/AK10003-11-13.pdf', 'm-weisslowski@t-online.de', NULL, NULL, NULL, ''),
(131, 'AK10004-11-13', 'Martin Fenzl ', '2013-11-17 11:16:12', 'offers/AK10004-11-13.pdf', 'fenzlm@me.com', NULL, NULL, NULL, ''),
(133, 'AK10006-11-13', 'Ludwig Roth', '2013-11-18 08:50:53', 'offers/AK10006-11-13.pdf', 'ludrot@web.de', NULL, NULL, NULL, ''),
(134, 'AK10007-11-13', 'Philipp Vieten', '2013-11-18 21:15:01', 'offers/AK10007-11-13.pdf', 'philippvieten@gmx.de', NULL, NULL, NULL, ''),
(135, 'AK10008-11-13', 'Philipp Vieten', '2013-11-19 18:26:40', 'offers/AK10008-11-13.pdf', 'Philippvieten@gmx.de', NULL, NULL, NULL, ''),
(136, 'AK10009-11-13', 'Annika Thiel', '2013-11-20 10:01:53', 'offers/AK10009-11-13.pdf', 'annika.thiel@onlinehome.de', NULL, NULL, NULL, ''),
(137, 'AK10010-11-13', 'Carsten Honerkamp', '2013-11-25 21:25:36', 'offers/AK10010-11-13.pdf', 'honerkamp@me.com', NULL, NULL, NULL, ''),
(138, 'AK10011-11-13', 'Josef Anzinger', '2013-11-26 20:54:03', 'offers/AK10011-11-13.pdf', 'josef.anzinger@redwater.info', NULL, NULL, NULL, ''),
(139, 'AK10012-11-13', 'Dr. Ivo Mai', '2013-11-29 19:23:47', 'offers/AK10012-11-13.pdf', 'ivomai@gmx.de', NULL, NULL, NULL, ''),
(141, 'AK10001-12-13', 'Daniela Strickert', '2013-12-02 08:58:57', 'offers/AK10001-12-13.pdf', 'danielastrickert@arcor.de', NULL, NULL, NULL, ''),
(142, 'AK10002-12-13', 'Bert Vorsatz', '2013-12-02 09:54:23', 'offers/AK10002-12-13.pdf', 'bert.vorsatz@googlemail.com', NULL, NULL, NULL, ''),
(143, 'AK10003-12-13', 'Manfred Nimbs', '2013-12-03 08:40:36', 'offers/AK10003-12-13.pdf', 'manfred@nimbs.de', NULL, NULL, NULL, ''),
(144, 'AK10004-12-13', 'Gitta König', '2013-12-04 08:08:36', 'offers/AK10004-12-13.pdf', 'gitta.koenig@gmx.net', NULL, NULL, NULL, ''),
(150, 'AK10005-12-13', 'Matthias Meier', '2013-12-23 20:35:26', 'offers/AK10005-12-13.pdf', 'matthiasmeier.ah@googlemail.com', NULL, NULL, NULL, ''),
(151, 'AK10000-01-14', 'Stefan Heimann', '2014-01-12 22:31:34', 'offers/AK10000-01-14.pdf', 'stefan.heimann@arcor.de', NULL, NULL, NULL, ''),
(152, 'AK10001-01-14', 'Huseyin KARAGOZ', '2014-01-22 12:55:36', 'offers/AK10001-01-14.pdf', 'info@reklammarket.de', NULL, NULL, NULL, ''),
(153, 'AK10000-02-14', 'Heidi Eckelmann', '2014-02-02 11:32:31', 'offers/AK10000-02-14.pdf', 'H.Eckelmann@t-online.de', NULL, NULL, NULL, ''),
(154, 'AK10001-02-14', 'Fabian Raffenberg', '2014-02-05 11:37:48', 'offers/AK10001-02-14.pdf', 'f.raffenberg@freenet.de', NULL, NULL, NULL, ''),
(155, 'AK10002-02-14', 'Michael Gahr', '2014-02-10 23:25:43', 'offers/AK10002-02-14.pdf', 'michael_gahr@gmx.net', NULL, NULL, NULL, ''),
(156, 'AK10003-02-14', 'Henry Müller', '2014-02-11 03:40:21', 'offers/AK10003-02-14.pdf', 'harry-mueller90@web.de', NULL, NULL, NULL, ''),
(158, 'AK10005-02-14', 'Klaus Kuhnt', '2014-02-16 11:41:22', 'offers/AK10005-02-14.pdf', 'klaus@aus-dem-schwarzwald.de', NULL, NULL, NULL, ''),
(159, 'AK10006-02-14', 'Franz Angerer', '2014-02-16 12:07:15', 'offers/AK10006-02-14.pdf', 'franz-angerer@t-online.de', NULL, NULL, NULL, ''),
(160, 'AK10007-02-14', 'Franz Angerer', '2014-02-18 17:21:38', 'offers/AK10007-02-14.pdf', 'franz-angerer@t-online.de', NULL, NULL, NULL, ''),
(168, 'AK10010-02-14', 'Rene Seidel', '2014-02-22 15:15:07', 'offers/AK10010-02-14.pdf', 'rene.seidel77@gmail.com', NULL, NULL, NULL, ''),
(170, 'AK10011-02-14', 'Ernst-Josef Mayer', '2014-02-26 22:21:20', 'offers/AK10011-02-14.pdf', 'erjo@gmx.de', NULL, NULL, NULL, ''),
(171, 'AK10000-03-14', 'Oliver Theerkorn ', '2014-03-05 19:38:44', 'offers/AK10000-03-14.pdf', 'otheerkorn@vodafone.de', NULL, NULL, NULL, ''),
(172, 'AK10001-03-14', 'Erkan Pehlivan', '2014-03-11 17:37:42', 'offers/AK10001-03-14.pdf', 'erkanp@web.de', NULL, NULL, NULL, ''),
(173, 'AK10002-03-14', 'Peter Sattler', '2014-03-11 19:18:49', 'offers/AK10002-03-14.pdf', 'peter.sattler.jun@gmail.com', NULL, NULL, NULL, ''),
(179, 'AK10003-03-14', 'Franz-Josef Kortmann', '2014-03-14 15:57:59', 'offers/AK10003-03-14.pdf', 'kortis110@t-online.de', NULL, NULL, NULL, ''),
(180, 'AK10004-03-14', 'Franz-Josef Kortmann', '2014-03-14 16:00:11', 'offers/AK10004-03-14.pdf', 'kortis110@t-online.de', NULL, NULL, NULL, ''),
(181, 'AK10005-03-14', 'Oliver Kampes', '2014-03-14 16:28:40', 'offers/AK10005-03-14.pdf', 'kampes@t-online.de', NULL, NULL, NULL, ''),
(182, 'AK10006-03-14', 'Reiner Fritz', '2014-03-20 10:24:50', 'offers/AK10006-03-14.pdf', 'reiner.fritz@gmx.de', NULL, NULL, NULL, ''),
(183, 'AK10007-03-14', 'Walter Stöhr', '2014-03-22 19:40:41', 'offers/AK10007-03-14.pdf', 'wasto1@web.de', NULL, NULL, NULL, ''),
(186, 'AK10008-03-14', 'walter giesel', '2014-03-31 02:15:45', 'offers/AK10008-03-14.pdf', 'w.giesel@web.de', NULL, NULL, NULL, ''),
(187, 'AK10009-03-14', 'Ronny Dämmerich', '2014-03-31 12:31:00', 'offers/AK10009-03-14.pdf', 'ronshoot@freenet.de', NULL, NULL, NULL, ''),
(190, 'AK10002-04-14', 'Bertram Kuban', '2014-04-06 11:14:53', 'offers/AK10002-04-14.pdf', 'bertram.kuban@gmx.de', NULL, NULL, NULL, ''),
(193, 'AK10005-04-14', 'Franz -. Josef Kortmann', '2014-04-15 07:23:40', 'offers/AK10005-04-14.pdf', 'kortis110@t-online.de', NULL, NULL, NULL, ''),
(195, 'AK10007-04-14', 'Alexander Grindler', '2014-04-27 21:01:57', 'offers/AK10007-04-14.pdf', 'alexander-grindler@gmx.de', NULL, NULL, NULL, ''),
(196, 'AK10008-04-14', 'Reiner Frritz', '2014-04-28 14:26:37', 'offers/AK10008-04-14.pdf', 'reiner.fritz@gmx.de', NULL, NULL, NULL, ''),
(198, 'AK10000-05-14', 'Alexander Meier', '2014-05-10 20:14:41', 'offers/AK10000-05-14.pdf', 'meier-aicha@web.de', NULL, NULL, NULL, ''),
(199, 'AK10001-05-14', 'Anton Schlaht', '2014-05-12 15:39:03', 'offers/AK10001-05-14.pdf', 'antonschlaht@hotmail.de', NULL, NULL, NULL, ''),
(201, 'AK10003-05-14', 'Sell', '2014-05-21 14:14:47', 'offers/AK10003-05-14.pdf', 'maindomus@yahoo.de', NULL, NULL, NULL, ''),
(202, 'AK10004-05-14', 'Norbert Magney', '2014-05-23 08:35:42', 'offers/AK10004-05-14.pdf', 'nomagney@hotmail.com', NULL, NULL, NULL, ''),
(204, 'AK10000-06-14', 'scholz christine', '2014-06-06 11:51:43', 'offers/AK10000-06-14.pdf', 'mw.casa@gmx.net', NULL, NULL, NULL, ''),
(205, 'AK10001-06-14', 'Andreas Burkhard', '2014-06-19 07:35:01', 'offers/AK10001-06-14.pdf', 'a.burkhard@arcor.de', NULL, NULL, NULL, ''),
(206, 'AK10002-06-14', 'Michael Kirschbaum', '2014-06-23 13:07:09', 'offers/AK10002-06-14.pdf', 'mkirschbaum@team-kirschbaum.de', NULL, NULL, NULL, ''),
(207, 'AK10003-06-14', 'Andreas Bonk', '2014-06-26 18:18:19', 'offers/AK10003-06-14.pdf', 'samirajo@web.de', NULL, NULL, NULL, ''),
(208, 'AK10004-06-14', 'Uwe Apetz', '2014-06-27 10:19:40', 'offers/AK10004-06-14.pdf', 'uweapetz@t-online.de', NULL, NULL, NULL, ''),
(210, 'AK10000-07-14', 'Rudolf Nohe', '2014-07-01 16:21:35', 'offers/AK10000-07-14.pdf', 'rudolf.nohe@guru.de', NULL, NULL, NULL, ''),
(212, 'AK10002-07-14', 'Roy Ebner', '2014-07-03 12:02:57', 'offers/AK10002-07-14.pdf', 'royebner@aol.com', NULL, NULL, NULL, ''),
(214, 'AK10004-07-14', 'Florian Filippini', '2014-07-09 13:10:06', 'offers/AK10004-07-14.pdf', 'florian_filippini@web.de', NULL, NULL, NULL, ''),
(215, 'AK10005-07-14', 'Axel', '2014-07-11 09:31:47', 'offers/AK10005-07-14.pdf', 'post@axelhess.com', NULL, NULL, NULL, ''),
(216, 'AK10006-07-14', 'Sergej Semler', '2014-07-12 19:48:15', 'offers/AK10006-07-14.pdf', 'Zersch89@web.de', NULL, NULL, NULL, ''),
(219, 'AK10008-07-14', 'Kai Woelke', '2014-07-24 13:41:46', 'offers/AK10008-07-14.pdf', 'kai.woelke@gmail.com', 'in der Schweiz 34a', '33449', 'Langenberg', ''),
(220, 'AK10009-07-14', 'Gerhard Fengler', '2014-07-29 17:52:13', 'offers/AK10009-07-14.pdf', 'gerhardfen@vodafone.de', 'Klessower Ehm-Welk Straße 11B', '03222', 'Lübbenau', ''),
(221, 'AK10010-07-14', 'Michael Kirschbaum', '2014-07-31 21:11:33', 'offers/AK10010-07-14.pdf', 'mkirschbaum@team-kirschbaum.de', 'Reichenbacherstraße 30', '73072', 'Donzdorf', ''),
(222, 'AK10000-08-14', 'Daniel Freigang', '2014-08-07 07:44:15', 'offers/AK10000-08-14.pdf', 'danielfreigang@gmx.de', 'Riemenäckerstrasse 19', '78054', 'Villingen-Schwenningen', '017676333470'),
(223, 'AK10001-08-14', 'Daniel Freigang', '2014-08-07 08:27:32', 'offers/AK10001-08-14.pdf', 'danielfreigang@gmx.de', 'Riemenäckerstrasse 19', '78054', 'Villingen-Schwenningen', '017676333470'),
(224, 'AK10002-08-14', 'Meike Körner', '2014-08-10 14:57:32', 'offers/AK10002-08-14.pdf', 'mekoer@web.de', 'Großingersheimer Weg 17', '71691', 'Freiberg', '01737337532'),
(225, 'AK10003-08-14', 'Klaus Gamrow', '2014-08-14 13:48:44', 'offers/AK10003-08-14.pdf', 'kgamrow@arcor.de', 'Kleebreite 5', '37130', 'Gleichen-Diemarden', '05517905956'),
(226, 'AK10004-08-14', 'Anita Höfler', '2014-08-19 07:01:19', 'offers/AK10004-08-14.pdf', 'Kaeferalex51@aol.com', 'Kilianstr.23', '63839 ', 'Kleinwallstadt', ''),
(227, 'AK10005-08-14', 'alexander höfler', '2014-08-20 08:11:37', 'offers/AK10005-08-14.pdf', 'kaeferalex51@aol.com', 'kilianstr.23', '63839', 'kleinwallstadt', ''),
(228, 'AK10006-08-14', 'abboud yacoub', '2014-08-29 09:35:40', 'offers/AK10006-08-14.pdf', 'abboud78@gmail.com', 'seestraße 65', '71638', 'ludwigsburg', ''),
(229, 'AK10007-08-14', 'Dominique Trouvain ', '2014-08-30 06:53:29', 'offers/AK10007-08-14.pdf', '911rsdoc@googlemail.com', 'Godenelterweg 23', '53474', 'Ahrweiler ', ''),
(230, 'AK10000-09-14', 'Ludger Brandenburg', '2014-09-01 09:00:38', 'offers/AK10000-09-14.pdf', 'l.brandenburg@web.de', 'Ossenberweg 8', '46569', 'Hünxe', ''),
(231, 'AK10001-09-14', 'heleen Zwebe', '2014-09-03 20:19:37', 'offers/AK10001-09-14.pdf', 'heleenzwebe@hotmail.com', 'am ehrenmal 5', '56694', 'medebach', ''),
(233, 'AK10003-09-14', 'Volker Elsner', '2014-09-06 11:51:30', 'offers/AK10003-09-14.pdf', 'me-at-solarvent@work-place.de', 'Altenburgweg 3', '97488', 'Stadtlauringen', '09724-360680'),
(234, 'AK10004-09-14', 'Volker Elsner', '2014-09-06 11:54:23', 'offers/AK10004-09-14.pdf', 'me-at-solarvent@work-place.de', 'Altenburgweg 3', '97488', 'Stadtlauringen', '09724-360680'),
(235, 'AK10005-09-14', 'Frank LUDWIG', '2014-09-10 16:33:24', 'offers/AK10005-09-14.pdf', 'post@comcare.de', 'Lauenstadt 4', '30982', 'Pattensden', ''),
(236, 'AK10006-09-14', 'Suntke Hagena', '2014-09-16 11:05:44', 'offers/AK10006-09-14.pdf', 'werbung@hagena.net', 'Karolinenstr. 10', '20357', 'Hamburg', '01777123577'),
(237, 'AK10007-09-14', 'Wolfgang Paßmann', '2014-09-22 08:38:15', 'offers/AK10007-09-14.pdf', 'wpass0815@web.de', 'Austraße 38', '65527', 'Niedernhausen', '06127-991331'),
(241, 'AK10008-09-14', 'Marcus Meier', '2014-09-27 14:51:47', 'offers/AK10008-09-14.pdf', 'marc13@gmx.de', 'Vossegge 26', '58456', 'Witten', ''),
(247, 'AK10000-10-14', 'Adrian Volland', '2014-10-04 20:42:57', 'offers/AK10000-10-14.pdf', 'AVolland@gmx.net', 'Hauptstr.84', '03246', 'Crinitz', ''),
(248, 'AK10001-10-14', 'Bernhard Neuhaus', '2014-10-06 08:32:44', 'offers/AK10001-10-14.pdf', 'bernhard.neuhaus@gmx.net', 'Auf´m Boom 42', '59872', 'Meschede-Visbeck', '02934 / 664'),
(249, 'AK10002-10-14', 'Bernhard Neuhaus', '2014-10-07 09:00:50', 'offers/AK10002-10-14.pdf', 'bernhard.neuhaus@gmx.net', 'Auf´m Boom 42', '59872', 'Meschede-Visbeck', '02934 / 664'),
(252, 'AK10003-10-14', 'Rich Gilbraith', '2014-10-15 11:22:47', 'offers/AK10003-10-14.pdf', 'gilbraith@web.de', 'Stahnsdorf', '14532', 'Stahnsdorf', '033296188402'),
(253, 'AK10004-10-14', 'Christoph Fröhlich', '2014-10-23 16:06:26', 'offers/AK10004-10-14.pdf', 'christoph-froehlich@online.de', 'Im Schloos 4a', '57223', 'Kreuztal', ''),
(254, 'AK10005-10-14', 'Edgar  Horstmann', '2014-10-27 13:12:36', 'offers/AK10005-10-14.pdf', 'edg.horstmann@online.de', 'Fichtenweg  6', '32457', 'Porta Westfalica', ''),
(255, 'AK10000-11-14', 'Johann Zechmeier', '2014-11-01 09:34:30', 'offers/AK10000-11-14.pdf', 'j-zechmeier@t-online.de', 'Am Schleicherberg 13', '92277', 'Hohenburg', ''),
(256, 'AK10001-11-14', 'Angela Bauer', '2014-11-02 00:58:49', 'offers/AK10001-11-14.pdf', 'NoTrix@spambog.de', 'Schönbuchstraße 20', '71032', 'Böblingen', ''),
(257, 'AK10002-11-14', 'M. Schäfer', '2014-11-11 19:12:26', 'offers/AK10002-11-14.pdf', 'kellife78@yahoo.de', 'Bärenburgweg 4', '91174', 'spalt', ''),
(258, 'AK10003-11-14', 'Bajrush Memaj', '2014-11-13 21:20:18', 'offers/AK10003-11-14.pdf', 'hrds@gmx.de', 'Bismarkstrasse 23', '73770', 'Denkendorf', ''),
(259, 'AK10004-11-14', 'Thomas Schollmeyer', '2014-11-16 16:51:44', 'offers/AK10004-11-14.pdf', 't.schollmeyer@gmx.de', 'Kleine Gasse 4', '99976', 'Beberstedt', ''),
(260, 'AK10005-11-14', 'Giovanni Cautillo', '2014-11-28 14:24:10', 'offers/AK10005-11-14.pdf', 'gcautillo@web.de', 'Haldenstr. 23', '71083', 'Oberjesingen', ''),
(261, 'AK10006-11-14', 'steeven bode', '2014-11-28 16:44:42', 'offers/AK10006-11-14.pdf', 'steeven.bode@t-online.de', 'steinbreite 55', '37520', 'osterode', ''),
(262, 'AK10007-11-14', 'Melanie Kübler', '2014-11-28 18:29:04', 'offers/AK10007-11-14.pdf', 'kueblertimo@web.de', 'Schurwaldstraße 24', '73660', 'urbach', ''),
(263, 'AK10008-11-14', 'Jens Knitter', '2014-11-30 07:36:57', 'offers/AK10008-11-14.pdf', 'ijknitter@gmx.de', 'Im deutschen Eck ', '66706', 'Perl', ''),
(264, 'AK10009-11-14', 'Jens Knitter', '2014-11-30 07:50:40', 'offers/AK10009-11-14.pdf', 'ijknitter@gmx.de', 'Im deutschen eck', '66706', 'Perl', ''),
(265, 'AK10010-11-14', 'jürgen müller', '2014-11-30 15:00:59', 'offers/AK10010-11-14.pdf', 'j.mueller255@web.de', 'neustraße.9', '54636', 'röhl', '0170-1934576'),
(266, 'AK10000-12-14', 'Michael Meene', '2014-12-08 13:08:30', 'offers/AK10000-12-14.pdf', 'michael@meene-home.de', 'Schäfereiberg 89', '38835', 'Lüttgenrode', ''),
(268, 'AK10002-12-14', 'Jens Breiing', '2014-12-12 21:35:26', 'offers/AK10002-12-14.pdf', 'jens.breiing@web.de', 'Hans-Peter-Feddersen-Str. 5', '25899', 'Niebüll', ''),
(269, 'AK10003-12-14', 'Philipp Harnack', '2014-12-19 07:42:08', 'offers/AK10003-12-14.pdf', 'philipp.harnack@gmail.com', 'Falkenweg 12 ', '71634 ', 'Ludwigsburg ', ''),
(271, 'AK10005-12-14', 'Steve Plötner', '2014-12-29 00:35:18', 'offers/AK10005-12-14.pdf', 'rentoelp@web.de', 'Ortstraße 53', '07338', 'Drognitz', ''),
(272, 'AK10006-12-14', 'Dominik Wichmann', '2014-12-31 13:01:11', 'offers/AK10006-12-14.pdf', 'Dominik.Wichmann0512@gmail.com', 'sorsumer Hauptstraße 12', '31139', 'Hildesheim', ''),
(275, 'AK10001-01-15', 'Edgar Börste', '2015-01-13 19:42:30', 'offers/AK10001-01-15.pdf', 'the.eddi@t-online.de', 'Schölling 28', '48308', 'Senden', ''),
(276, 'AK10002-01-15', 'rothmeier', '2015-01-14 18:39:49', 'offers/AK10002-01-15.pdf', 'g.rothmeier@gmx.net', 'ohserring ', '12619', 'berlin', ''),
(278, 'AK10004-01-15', 'Mathias Kielow', '2015-01-20 12:42:15', 'offers/AK10004-01-15.pdf', 'mkielow@yahoo.de', 'Grünlandstraße 6', '85604', 'Zorneding', '0160 / 36 90 740'),
(279, 'AK10005-01-15', 'Alexander Flammer', '2015-01-25 19:49:15', 'offers/AK10005-01-15.pdf', 'Alexf205@aol.com', 'Schießgasse 20', '72820', 'Sonnenbühl ', ''),
(281, 'AK10006-01-15', 'Andreas Müller', '2015-01-26 23:52:26', 'offers/AK10006-01-15.pdf', 'muelan2@gmail.com', 'Talstr. 69', '57520', 'Grünebach', ''),
(282, 'AK10007-01-15', 'Steffen Thiele', '2015-01-28 19:24:38', 'offers/AK10007-01-15.pdf', 'SteffenHN@gmx.de', 'Bonfelder Str. 50', '74078', 'Heilbronn', ''),
(284, 'AK10000-02-15', 'Norbert Magney', '2015-02-01 11:07:39', 'offers/AK10000-02-15.pdf', 'nomagney@hotmail.com', 'Kiricheneck 5', 'L-9990', 'WEISWAMPACH', '00352621219733'),
(285, 'AK10001-02-15', 'Arne Rösch', '2015-02-05 14:30:59', 'offers/AK10001-02-15.pdf', 'arne-roesch@web.de', 'Schulstraße 1a', '87490', 'Haldenwang', '08374 6037'),
(286, 'AK10002-02-15', 'Christian Haenel', '2015-02-07 21:34:57', 'offers/AK10002-02-15.pdf', 'christianhaenel@gmx.de', 'Zwerchsstr. 4', '71229', 'Leonberg', '0157 8624 1949'),
(288, 'AK10004-02-15', 'Ronald Barth', '2015-02-14 10:11:26', 'offers/AK10004-02-15.pdf', 'Barth.Ronald@gmx.de', 'Bahnhofstr. 31', '89547', 'Gussenstadt', ''),
(291, 'AK10007-02-15', 'Arno Dühr', '2015-02-21 20:09:21', 'offers/AK10007-02-15.pdf', 'famduehr@aol.com', 'Oberdorf 40', '66687', 'Wadern', ''),
(292, 'AK10008-02-15', 'Stefan Eichenberg', '2015-02-24 21:00:01', 'offers/AK10008-02-15.pdf', 'st.eichenberg@web.de', 'Jahnstr. 5', '37124', 'Rosdorf', '05509/920137'),
(294, 'AK10001-03-15', 'Manuel Schuster', '2015-03-06 21:38:54', 'offers/AK10001-03-15.pdf', 'Manuel.Schuster84@Googlemail.com', 'Raiffeisenring 103a', '48249', 'Dülmen', ''),
(295, 'AK10002-03-15', 'Norbert Wolf', '2015-03-09 13:04:43', 'offers/AK10002-03-15.pdf', 'norisi57@web.de', 'Am Sonnenhügel 13 ', '97705', 'Oehrbverg', '09747 8739901'),
(296, 'AK10003-03-15', 'Tino Prüger', '2015-03-23 21:04:49', 'offers/AK10003-03-15.pdf', 'kfztino@gmx.de', 'Herrengasse 10', '07646', 'Tröbnitz', ''),
(297, 'AK10004-03-15', 'Tino Prüger', '2015-03-23 21:18:02', 'offers/AK10004-03-15.pdf', 'kfztino@gmx.de', 'Herrengasse 10', '07646', 'Tröbnitz', ''),
(298, 'AK10005-03-15', 'Harald Lehmann', '2015-03-25 18:26:29', 'offers/AK10005-03-15.pdf', 'harlehmann@yahoo.de', 'Helenenstrasse 20', '45701', 'HERTEN', '02366 5896528'),
(299, 'AK10006-03-15', 'NIckler, Gabriele', '2015-03-27 14:21:48', 'offers/AK10006-03-15.pdf', 'G.Klaus1@gmx.net', 'Hardtweg', '72820', 'Sonnenbühl', ''),
(300, 'AK10007-03-15', 'tobias nehrkorn', '2015-03-28 15:55:39', 'offers/AK10007-03-15.pdf', 'tobiasnehrkorn@web.de', 'str.der freundschaft 1', '39387', 'oschersleben', '03940450328'),
(301, 'AK10000-04-15', 'Norbert MAGNEY', '2015-04-01 17:17:36', 'offers/AK10000-04-15.pdf', 'nomagney@hotmail.com', 'Kiricheneck 5', 'L-9990', 'WEISWAMPACH', ''),
(305, 'AK10004-04-15', 'Langenitz, MIke', '2015-04-17 09:44:03', 'offers/AK10004-04-15.pdf', 'm.langenitz@web.de', 'Am Hirtenberg 3', '37136', 'Göttingen', '05507/964143'),
(306, 'AK10005-04-15', 'Langenitz, Mike', '2015-04-17 10:44:04', 'offers/AK10005-04-15.pdf', 'm.langenitz@web.de', 'am Hirtenberg 3', '37136', 'göttingen', ''),
(307, 'AK10006-04-15', 'Armin Richter', '2015-04-18 17:40:54', 'offers/AK10006-04-15.pdf', 'armin.richter@gmx.de', 'Nostitzstraße 15', '10961', 'Berlin', '030-22496533'),
(310, 'AK10009-04-15', 'immanuel Kopsch', '2015-04-21 12:15:00', 'offers/AK10009-04-15.pdf', 'immanuel.kopsch@yahoo.de', 'kleine Kirchstr. 2', '55278', 'Uelversheim', '01748260416'),
(311, 'AK10010-04-15', 'Jörg Heinrichs', '2015-04-21 18:07:35', 'offers/AK10010-04-15.pdf', '00joerg@online.de', 'Süderstr. 7', '24994', 'Weesby', ''),
(312, 'AK10011-04-15', 'Peter Dovydenko', '2015-04-25 11:28:58', 'offers/AK10011-04-15.pdf', 'peter.dovydenko@freenet.de', 'am aggerberg 4', '51580', 'reichshof', ''),
(313, 'AK10012-04-15', 'chr. mayer', '2015-04-26 13:18:12', 'offers/AK10012-04-15.pdf', 'christian_robert.mayer@web.de', 'am reitfeld 8', '83417', 'kirchanschöring', ''),
(314, 'AK10000-05-15', 'sonja Hauschildt', '2015-05-04 10:45:12', 'offers/AK10000-05-15.pdf', 'immanuel.kopsch@yahoo.de', 'Kleine Kirchstr. 2', '55278', 'uelversheim', '01748260416'),
(315, 'AK10001-05-15', 'Atilla Uzun', '2015-05-08 10:58:38', 'offers/AK10001-05-15.pdf', 'Atilla.uzun@live.de', 'Schlossbuckel23', '93309', 'Kelheim', '00491716981176'),
(316, 'AK10002-05-15', 'Atilla Uzun', '2015-05-08 13:03:08', 'offers/AK10002-05-15.pdf', 'Atilla.uzun@live.de', 'Schlossbuckel23', '93309', 'Kelheim', '00491716981176'),
(317, 'AK10003-05-15', 'Atilla Uzun', '2015-05-11 10:31:06', 'offers/AK10003-05-15.pdf', 'Atilla.uzun@live.de', 'Schlossbuckel23', '93309', 'Kelheim', ''),
(318, 'AK10004-05-15', 'Harald Krumpholz', '2015-05-11 21:34:28', 'offers/AK10004-05-15.pdf', 'Euromotors@gmx.de', 'riedbachstrasse 1', '74385', 'Pleidelsheim', ''),
(319, 'AK10005-05-15', 'Wolfgang Friedrich', '2015-05-16 16:02:03', 'offers/AK10005-05-15.pdf', 'wgfrie@arcor.de', 'Dorfstr.', '08396', 'Waldenburg', ''),
(320, 'AK10006-05-15', 'Birgit Zocher', '2015-05-20 21:56:27', 'offers/AK10006-05-15.pdf', 'Sternschnuppe1345@web.de', 'Saulorn 7', '84323', 'Massing', '0049176-54996206'),
(321, 'AK10007-05-15', 'Austen Müller', '2015-05-28 18:35:02', 'offers/AK10007-05-15.pdf', 'austenmueller@gmx.de', 'Langener Landstraße', '27578', 'Bremerhaven ', ''),
(322, 'AK10008-05-15', 'Manuela Martin', '2015-05-29 08:59:57', 'offers/AK10008-05-15.pdf', 'manu11110@icloud.com', 'Dorfstraße 34', '37308', 'Schimberg', ''),
(324, 'AK10000-06-15', 'Manfred Dziedzicki', '2015-06-02 10:33:52', 'offers/AK10000-06-15.pdf', 'manni66@gmx.de', 'efferenweg 1', '50997', 'köln', '0223323483'),
(325, 'AK10001-06-15', 'Paul Sela', '2015-06-08 13:27:16', 'offers/AK10001-06-15.pdf', 'paul.sela@online.de', 'Theodor-Körner-Straße 3', '42853', 'Remscheid', ''),
(326, 'AK10002-06-15', 'Joachim Winkel', '2015-06-08 16:53:10', 'offers/AK10002-06-15.pdf', 'jowin100@web.de', 'Alte schulstrasse 11', '66129', 'Saarbrücken', ''),
(327, 'AK10003-06-15', 'peter christineke', '2015-06-08 18:53:31', 'offers/AK10003-06-15.pdf', 'peter.ch@online.de', 'Kirchhoffstr.', '47475', 'Kamp-Lintfort', ''),
(328, 'AK10004-06-15', 'Manuela Martin', '2015-06-10 09:41:37', 'offers/AK10004-06-15.pdf', 'manu11110@icloud.com', 'Dorfstraße 34', '37308', 'Rüstungen', ''),
(329, 'AK10005-06-15', 'Andreas Kohler', '2015-06-10 20:06:28', 'offers/AK10005-06-15.pdf', 'kohler.ak@gmail.com', 'Auf der Nudelburg', '87700', 'Memmingen', ''),
(330, 'AK10006-06-15', 'Alexander Keller', '2015-06-11 20:18:18', 'offers/AK10006-06-15.pdf', 'keller-a@gmx.de', 'Hasselstraße 38', '63762', 'Großostheim', '01631346213'),
(331, 'AK10007-06-15', 'Martin Heuser', '2015-06-21 18:00:50', 'offers/AK10007-06-15.pdf', 'martin_heuser@t-online.de', 'Auf dem Haidchen', '57581', 'Katzwinkel', ''),
(332, 'AK10008-06-15', 'Martin Heuser', '2015-06-21 18:04:53', 'offers/AK10008-06-15.pdf', 'martin_heuser@t-online.de', 'Auf dem Haidchen 11', '57581', 'Katzwinkel', ''),
(333, 'AK10000-07-15', 'Peter Glase', '2015-07-08 09:03:31', 'offers/AK10000-07-15.pdf', 'peter.glase@t-online.de', 'Fichtenweg 12 A', '14621', 'Schönwalde-Glien', ''),
(336, 'AK10003-07-15', 'Ronald Barth', '2015-07-11 10:11:00', 'offers/AK10003-07-15.pdf', 'Barth.Ronald@gmx.de', 'Bahnhofstr.31', '89547', 'Gussenstadt', '07323/4412'),
(337, 'AK10004-07-15', 'Ronald Barth', '2015-07-11 10:19:39', 'offers/AK10004-07-15.pdf', 'Barth.Ronald@gmx.de', 'Bahnhofstr.31', '89547', 'Gussenstadt', '07323/4412'),
(338, 'AK10005-07-15', 'Florian  Handrock', '2015-07-13 19:33:33', 'offers/AK10005-07-15.pdf', 'bowflorian@gmail.com', 'kapellenstr. 8', '66701', 'Beckingen ', '015771474284 '),
(340, 'AK10007-07-15', 'michael klemd', '2015-07-21 10:48:05', 'offers/AK10007-07-15.pdf', 'michael.klemd@gmx.de', 'finkenburg 10', '37127', 'meensen', '01706396615'),
(341, 'AK10008-07-15', 'Stefan Plobner', '2015-07-23 13:24:42', 'offers/AK10008-07-15.pdf', 's.plobner@kabelmail.de', 'Samuel-Schmidt-Str.13', '96450', 'Coburg', ''),
(342, 'AK10009-07-15', 'Frank Himmler', '2015-07-24 14:42:36', 'offers/AK10009-07-15.pdf', 'himbi2@gmx.de', 'Unterer Brühl 21', '79379', 'Müllheim', '(0160) 94994944'),
(343, 'AK10010-07-15', 'Dennis Bakir', '2015-07-25 18:23:20', 'offers/AK10010-07-15.pdf', 'dennis.bakir@gmx.net', 'Erbecksfeld 16', '45470', 'Mülheim', ''),
(344, 'AK10000-08-15', 'Jurij Bechtold', '2015-08-02 21:18:35', 'offers/AK10000-08-15.pdf', 'jurijbechtold@hotmail.de', 'Auf der Geist 4', '48165', 'Münster', '017670224924'),
(346, 'AK10002-08-15', 'Matthias nagel', '2015-08-12 08:36:52', 'offers/AK10002-08-15.pdf', 'kanzlei.priv@gmx.de', 'Mahrstr.4', '32457', 'Porta Westfalica', ''),
(347, 'AK10003-08-15', 'Dirk Bielstein', '2015-08-16 16:33:04', 'offers/AK10003-08-15.pdf', 'dbielstein@gmx.de', 'Goethestrasse 3a', '35423', 'Lich', ''),
(348, 'AK10004-08-15', 'Kei Schober', '2015-08-17 19:19:46', 'offers/AK10004-08-15.pdf', 'kei--@web.de', 'Richard-Schreyer-Str. 2', '09627', 'Bobritzsch', ''),
(349, 'AK10005-08-15', 'Nicole Fierek', '2015-08-21 09:25:23', 'offers/AK10005-08-15.pdf', 'nico.lino@web.de', 'Sebastian-Kneipp-Str. 67', '37217', 'Witzenhausen', '0173-2178386'),
(352, 'AK10008-08-15', 'Klaus Düßmann', '2015-08-24 21:13:04', 'offers/AK10008-08-15.pdf', 'kontakt@baumklaus.de', 'Im Brink 2', '28816', 'Stuhr', ''),
(353, 'AK10009-08-15', 'Martin Horstmann', '2015-08-26 08:15:07', 'offers/AK10009-08-15.pdf', 'martinhorstmann@gmx.net', 'Pommernstraße 1', '27612', 'Loxstedt', '0151/22983426'),
(354, 'AK10010-08-15', 'Lars Liebenow', '2015-08-26 16:00:36', 'offers/AK10010-08-15.pdf', 'heesweg@icloud.com', 'Am Kulenberg 1', '41849', 'Wassenberg', '0151 68413453'),
(355, 'AK10011-08-15', 'Lars Liebenow', '2015-08-26 16:07:56', 'offers/AK10011-08-15.pdf', '', 'Am Kulenberg 1', '', '', ''),
(357, 'AK10013-08-15', 'wolfgang Langer-Frech', '2015-08-28 12:37:09', 'offers/AK10013-08-15.pdf', 'hydrosolar@web.de', 'Bahnhofstr.31', '73107', 'Eschenbach', '01727601185'),
(358, 'AK10000-09-15', 'Kai Zwintscher', '2015-09-03 14:36:32', 'offers/AK10000-09-15.pdf', 'k.zwintscher@gmx.de', 'Binsenweg 33', '71229', 'Leonberg', '01794587021'),
(359, 'AK10001-09-15', 'Sander', '2015-09-10 06:16:33', 'offers/AK10001-09-15.pdf', 'Fritz-chris@web.de', 'keine', '87488', 'betzigau', ''),
(360, 'AK10002-09-15', 'Clemens Kimmig', '2015-09-11 15:30:25', 'offers/AK10002-09-15.pdf', 'clemens.kimmig@t-online.de', 'Farnweg 27', '77728', 'Oppenau', ''),
(361, 'AK10003-09-15', 'Stefan Arens', '2015-09-13 15:48:46', 'offers/AK10003-09-15.pdf', 'stefanarens@arens-architektur.de', 'Helmers Kamp 64', '48249', 'Dülmen', '01739774173'),
(362, 'AK10004-09-15', 'Sven Enterlein', '2015-09-15 09:10:31', 'offers/AK10004-09-15.pdf', 'gaststube@wirtshaus-harzklause.de', 'Schulstraße 3', '37431', 'Bad Lauterberg', '0151-25306430'),
(363, 'AK10005-09-15', 'Sven Enterlein', '2015-09-15 09:13:10', 'offers/AK10005-09-15.pdf', 'gaststube@wirtshaus-harzklause.de', 'Schulstraße 3', '37431', 'Bad Lauterberg', '0151-25306430'),
(364, 'AK10006-09-15', 'Dieter müller', '2015-09-18 08:57:41', 'offers/AK10006-09-15.pdf', 'dieter.e.mueller@gmail.com', 'Leiterbachstr. 18', '79761', 'Waldshut-Tiengen', ''),
(365, 'AK10007-09-15', 'Harald Krumpholz', '2015-09-18 20:56:53', 'offers/AK10007-09-15.pdf', 'euromotors@gmx.de', 'Riedbachstrasse 19', '74385', 'Pleidelsheim', '01636786811'),
(367, 'AK10009-09-15', 'Christoph Fröhlich', '2015-09-19 16:19:34', 'offers/AK10009-09-15.pdf', 'christoph-froehlich@online.de', 'Im Schloss 4a', '57223', 'Kreuztal', '02732 6077477'),
(368, 'AK10010-09-15', 'Stefan Leibig', '2015-09-21 10:14:18', 'offers/AK10010-09-15.pdf', 'schleicher3534@t-online.de', 'Georg- Goebel Str.1', '58809', 'Neuenrade', ''),
(369, 'AK10011-09-15', 'Stefan Leibig', '2015-09-21 10:14:27', 'offers/AK10011-09-15.pdf', 'schleicher3534@t-online.de', 'Georg- Goebel Str.1', '58809', 'Neuenrade', ''),
(370, 'AK10012-09-15', 'Dirk Kringe', '2015-09-21 17:12:06', 'offers/AK10012-09-15.pdf', 'dirkkringe@hotmail.de', 'Berlinerstr 23', '58566', 'Kierspe', '023596815'),
(371, 'AK10013-09-15', 'Reinhard Wirth', '2015-09-27 11:34:59', 'offers/AK10013-09-15.pdf', 'fam.wirth@mail.de', 'Fahrweg 6', '67822', 'Winterborn', '017695740151'),
(376, 'AK10000-10-15', 'Kai Ritter', '2015-10-18 19:49:21', 'offers/AK10000-10-15.pdf', 'kai-uwe.ritter@arcor.de', 'Saulheimer Weg 1', '55270', 'Bubenheim', ''),
(377, 'AK10001-10-15', 'Roman Messer', '2015-10-26 21:07:05', 'offers/AK10001-10-15.pdf', 'Roman@cnc-messer.de', 'Im Bergfeld 13', '75438', 'Knittlingen', '015120905591'),
(378, 'AK10002-10-15', 'Norbert Magney', '2015-10-29 07:27:06', 'offers/AK10002-10-15.pdf', 'nomagney@hotmail.com', 'Kiricheneck 5', 'L-9990', 'Weiswampach', ''),
(382, 'AK10003-11-15', 'Karl Reska', '2015-11-03 11:24:42', 'offers/AK10003-11-15.pdf', 'Karlreska@gmail.com', 'Rengershäuser str. 63', '34132', 'Kassel', '01520 3777555'),
(383, 'AK10004-11-15', 'herman justen', '2015-11-04 19:39:58', 'offers/AK10004-11-15.pdf', 'hjusten@web.de', 'thrasoltstr 27', '54439', 'aarburg', ''),
(384, 'AK10005-11-15', 'werner göckler', '2015-11-09 18:33:28', 'offers/AK10005-11-15.pdf', 'werner.goeckler@web.de', 'holunderweg 9', '89558', 'böhmenkirch', ''),
(385, 'AK10006-11-15', 'Karl-Heinz Hauck', '2015-11-09 19:01:24', 'offers/AK10006-11-15.pdf', 'karl-heinz@hauckonline.de', 'Zum Wasen 17 ', '35781', 'Weilburg', '0647195047'),
(387, 'AK10008-11-15', 'jochen klenk', '2015-11-14 13:18:50', 'offers/AK10008-11-15.pdf', 'jochen@webklenk.de', 'pappelweg 1', '71706', 'Markgröningen', ''),
(388, 'AK10009-11-15', 'Simon Hanschke', '2015-11-15 13:28:17', 'offers/AK10009-11-15.pdf', 'simonhanschke@googlemail.com', 'Badstraße 36', '73734', 'Esslingen', ''),
(390, 'AK10011-11-15', 'Stephan Heyer', '2015-11-16 17:40:25', 'offers/AK10011-11-15.pdf', 'stephan_heyer@web.de', 'Kolbeplatz 6', '33330', 'Gütersloh', ''),
(391, 'AK10012-11-15', 'Sven Wolf', '2015-11-21 02:24:18', 'offers/AK10012-11-15.pdf', 'sven.wolf.86@gmx.de', 'Niederlagstraße 5', '01589', 'Riesa', ''),
(392, 'AK10013-11-15', 'Sven', '2015-11-21 14:43:35', 'offers/AK10013-11-15.pdf', 'sven.wolf.86@gmx.de', 'Wolf', '01589', 'Riesa', ''),
(393, 'AK10014-11-15', 'Christian Schober', '2015-11-29 03:47:00', 'offers/AK10014-11-15.pdf', 'chrisschober@gmx.de', 'Pigagestr. 5', '68219', 'Mannheim', ''),
(394, 'AK10000-12-15', 'Rudolf Riedl', '2015-12-02 07:04:22', 'offers/AK10000-12-15.pdf', 'Rudolf.Riedl@yahoo.de', 'Lerchestraße  6', '93142', 'Maxhütte Haidhof', ''),
(395, 'AK10001-12-15', 'Immanuel Möbius', '2015-12-06 01:06:38', 'offers/AK10001-12-15.pdf', 'reg_immo@web.de', 'Taunusstraße 3', '65835', 'Liederbach', ''),
(396, 'AK10002-12-15', 'J. Raschke', '2015-12-06 10:57:06', 'offers/AK10002-12-15.pdf', 'Jraschke57@aol.com', 'Günzelburgstr.9', '89143', 'Blaubeuren', ''),
(397, 'AK10003-12-15', 'Martin Stehl', '2015-12-09 09:17:19', 'offers/AK10003-12-15.pdf', 'martinstehl@hotmail.de', 'Mühlweg 4', '61169', 'Niddatal', '01779597769'),
(398, 'AK10004-12-15', 'Martin Stehl', '2015-12-09 12:32:09', 'offers/AK10004-12-15.pdf', 'martinstehl@hotmail.de', 'Mühlweg 4', '61169', 'Assenheim ', ''),
(402, 'AK10008-12-15', 'Thilo Roschlau', '2015-12-15 10:27:55', 'offers/AK10008-12-15.pdf', 'thilo.roschlau@gmail.com', 'Heinrich-Baumann-Str 48', '70190', 'Stuttgart', '071127326681'),
(403, 'AK10009-12-15', 'Enrico Volkmar', '2015-12-29 11:38:11', 'offers/AK10009-12-15.pdf', 'enrico@volkmar.de', 'Silbergrund 17a', '98528', 'Suhl', ''),
(404, 'AK10000-01-16', 'Reiner Kemmler', '2016-01-04 10:05:55', 'offers/AK10000-01-16.pdf', 'kemmler@kabelbw.de', 'Auf dem Filz 11', '72820', 'Sonnenbühl', ''),
(405, 'AK10001-01-16', 'Reiner Kemmler', '2016-01-04 10:09:19', 'offers/AK10001-01-16.pdf', 'kemmler@kabelbw.de', 'Auf dem Filz 11', '72820', 'Sonnenbühl', ''),
(406, 'AK10002-01-16', 'Ronny Carl', '2016-01-04 20:47:50', 'offers/AK10002-01-16.pdf', 'ronny.carl73@googlemail.com', 'Vörn Enn 5', '18190', 'Vietow', ''),
(407, 'AK10003-01-16', 'Ronny Carl', '2016-01-04 20:47:52', 'offers/AK10003-01-16.pdf', 'ronny.carl73@googlemail.com', 'Vörn Enn 5', '18190', 'Vietow', ''),
(408, 'AK10004-01-16', 'Ronny Carl', '2016-01-04 20:48:47', 'offers/AK10004-01-16.pdf', 'ronny.carl73@googlemail.com', 'Vörn Enn 5', '18190', 'Vietow', '0162 6903837'),
(409, 'AK10005-01-16', 'Ronny Carl', '2016-01-04 20:53:13', 'offers/AK10005-01-16.pdf', 'ronny.carl73@googlemail.com', 'Vörn Enn 5', '18190', 'Vietow', '0162 6903837'),
(410, 'AK10006-01-16', 'Mario Lentz', '2016-01-06 10:46:39', 'offers/AK10006-01-16.pdf', 'mario.lentz@gmx.de', 'Arraserstrasse 24', '09326', 'Geringswalde', '01785427561'),
(411, 'AK10007-01-16', 'Stefan Esterle', '2016-01-08 21:01:19', 'offers/AK10007-01-16.pdf', 'Stefan.esterle@web.de', 'Herdgasse 1', '78147', 'vöhrenbach', '+4977279299360'),
(412, 'AK10008-01-16', 'Stefan Hecht', '2016-01-13 07:14:04', 'offers/AK10008-01-16.pdf', 'hecht-stefan@gmx.de', 'Schneiderberg 13', '84152', 'Mengkofen', '099516985330'),
(413, 'AK10009-01-16', 'Hartmut Römer', '2016-01-22 07:36:44', 'offers/AK10009-01-16.pdf', 'hartmut_roemer@t-online.de', 'Warbusch  3', '34474', 'Diemelstadt - Rhoden', ''),
(414, 'AK10010-01-16', 'Thomas Potyka', '2016-01-22 14:33:01', 'offers/AK10010-01-16.pdf', 'home@thomaspotyka.de', 'Unghauser Straße 40', '84489', 'Burghausen', ''),
(415, 'AK10011-01-16', 'Peter Gay', '2016-01-23 23:51:10', 'offers/AK10011-01-16.pdf', 'pginfo46@gmail.com', 'Jarrenwisch', '25764', 'Oesterwurth', ''),
(417, 'AK10013-01-16', 'Thomas Philipp', '2016-01-26 11:32:06', 'offers/AK10013-01-16.pdf', 'th.philipp@freenet.de', 'Am Pfaffenberg 15', '76831', 'Billigheim-Ingenheim', ''),
(418, 'AK10000-02-16', 'Robert Venzl', '2016-02-01 17:27:22', 'offers/AK10000-02-16.pdf', 'rvenzl@hotmail.de', 'Merksteig 46', '92637', 'Weiden', ''),
(419, 'AK10001-02-16', 'Robert Venzl', '2016-02-02 09:53:53', 'offers/AK10001-02-16.pdf', 'umscheid@solarvent.com', 'Merksteig 46', '92637', 'Weiden', ''),
(420, 'AK10002-02-16', 'Robert Venzl', '2016-02-02 10:00:28', 'offers/AK10002-02-16.pdf', 'rvenzl@hotmail.de', 'Merksteig 46', '92637', 'Weiden', ''),
(421, 'AK10003-02-16', 'Martin Riedl', '2016-02-03 09:58:38', 'offers/AK10003-02-16.pdf', 'martin.riedl1987@googlemail.com', 'Weiherhaus 5', '94344', 'Wiesenfelden', ''),
(423, 'AK10005-02-16', 'David Behrend', '2016-02-07 20:55:32', 'offers/AK10005-02-16.pdf', 'david.a.behrend@gmail.com', 'Hegelstraße 26', '60316', 'Frankfurt am Main', '06987207275'),
(425, 'AK10007-02-16', 'Sascha Ahnen', '2016-02-17 19:58:25', 'offers/AK10007-02-16.pdf', 'sascha@ahnen.com', 'Soironstarße 17', '68199', 'Mannheim', '0176 13399684'),
(426, 'AK10008-02-16', 'Enrico Müller', '2016-02-22 13:14:01', 'offers/AK10008-02-16.pdf', 'enrico.mueller.km@web.de', 'Neschwitzer Straße 59', '01917', 'Kamenz', '01776028792'),
(427, 'AK10009-02-16', 'Florian', '2016-02-24 07:06:34', 'offers/AK10009-02-16.pdf', 'f.isenberg85@gmail.com', 'Isenberg', '34439', 'Peckelsheim', '017620602878'),
(429, 'AK10000-03-16', 'Axel Neumann', '2016-03-02 12:11:26', 'offers/AK10000-03-16.pdf', 'neumann@cgws.de', 'Glasower Str. 51', '12051', 'Berlin', '01520-1726771'),
(430, 'AK10001-03-16', 'Axel Neumann', '2016-03-02 12:36:14', 'offers/AK10001-03-16.pdf', 'neumann@cgws.de', 'Glasower Str. 51', '12051', 'Berlin', '015201726771'),
(431, 'AK10002-03-16', 'Ursula Malburg', '2016-03-04 12:47:45', 'offers/AK10002-03-16.pdf', 'Tabakwaren-Malburg@t-online.de', 'Hauptstr. 15a', '66636', 'Tholey', '06853 8540500'),
(432, 'AK10003-03-16', 'Edgar Boehm', '2016-03-11 07:48:52', 'offers/AK10003-03-16.pdf', 'boehm.einbeck@t-online.de', 'Eschenstr. 37', '37574', 'Einbeck', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `company_id`, `name`, `description`) VALUES
(1, 1, 'admin', 'Administrator'),
(2, 1, 'members', 'General User');

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

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `valid_until`, `price`) VALUES
(1, 'Sonderaktion - 400 Euro Herbstrabatt - gültig bis zum 30.10.2015', 'Trennen Sie sich von Ihrer alten unwirtschaftlichen Heizung und erneuern Sie jetzt im "Goldenen Oktober" Ihre Heizung. <br /><br />\r\nAlle unsere Kunden, die sich bis zum 30. Oktober für eine neue SOLARvent iQ 3.0 Pelletheizung mit Zubehör entscheiden, erhalten einen Sonderrabatt in Höhe von 400 EUR*. <br /><br />Wir benötigen Ihren schriftlichen Auftrag (Bestellung) bis zum Stichtag eingehend per Fax, eMail oder Post. <br /><br />* Entspricht 336,13 EUR + 19 % MwSt. = 400 EUR.\r\n<br /><br />\r\nHinweis: Bitte reservieren Sie rechtzeitig Ihre neue Heizung, das einmalige Sonderangebot ist auf unseren Lagerbestand begrenzt!', '2015-10-30', -336.13);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `skonto` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `skonto`) VALUES
(1, '-5% Skt. Vorkasse (40% Auftrag, 60% 10 Tage vor Lieferung)', 0.05),
(3, '-3% Skt. Paypal (40% Auftrag, 60% 10 Tage vor Lieferung)', 0.03),
(4, '-0% Skt. (Am Liefertag per Bankbürgschaft oder Nachnahme)', 0);

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

--
-- Dumping data for table `pdf_headings`
--

INSERT INTO `pdf_headings` (`id`, `heading_id`, `content`, `about`) VALUES
(1, 1, 'vielen Dank für Ihr Interesse an unserem innovativen Pelletheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Pelletheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- 5,7" Farbtouchpanel\r\n- Viel breiterer Modulationsbereich dank Partitionsbrenner von 4,7 bis max. 30 kW nur per Software-Key aktivierbar\r\n- Beste Staubwerte im Vergleich (DE, AT)\r\n- Fernzugriff via VNC und demnächst via Webbrowser my.iqtouch.de\r\n- Option e-Metering Paket für absolute Kontrolle der Wärme- und Stromversorgung\r\n- Fernwartung und Support 365 Tage - direkt durch den Hersteller (5 Jahre)\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Pelletmaulwurf-Saugsystem - weniger Aufwand und mehr Platz im Pelletlager\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'iQ 3.0 Pelletheizung als Selbstbausatz - 20 % Selbstbaurabatt + BafA-Förderinfo'),
(2, 2, 'vielen Dank für Ihr Interesse an unserem innovativen Pelletheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Pelletheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- 5,7" Farbtouchpanel\r\n- Viel breiterer Modulationsbereich dank Partitionsbrenner von 4,7 bis max. 30 kW nur per Software-Key aktivierbar\r\n- Beste Staubwerte im Vergleich (DE, AT)\r\n- Fernzugriff via VNC und demnächst via Webbrowser my.iqtouch.de\r\n- Option e-Metering Paket für absolute Kontrolle der Wärme- und Stromversorgung\r\n- Fernwartung und Support 365 Tage - direkt durch den Hersteller (5 Jahre)\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Pelletmaulwurf-Saugsystem - weniger Aufwand und mehr Platz im Pelletlager\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'iQ 3.0 Pelletheizung als Selbstbausatz - 20 % Selbstbaurabatt'),
(3, 3, 'vielen Dank für Ihr Interesse an unserem innovativen Pellet-/ und Solarheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Pellet-/ und Solarheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- 5,7" Farbtouchpanel\r\n- Viel breiterer Modulationsbereich dank Partitionsbrenner von 4,7 bis max. 30 kW nur per Software-Key aktivierbar\r\n- Beste Staubwerte im Vergleich (DE, AT)\r\n- Fernzugriff via VNC und demnächst via Webbrowser my.iqtouch.de\r\n- Option e-Metering Paket für absolute Kontrolle der Wärme- und Stromversorgung\r\n- Fernwartung und Support 365 Tage - direkt durch den Hersteller (5 Jahre)\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Pelletmaulwurf-Saugsystem - weniger Aufwand und mehr Platz im Pelletlager\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'iQ 3.0 Pelletheizung + Solaranlage als Selbstbausatz - 20 % Selbstbaurabatt + BafA-Förderinfo'),
(4, 4, 'vielen Dank für Ihr Interesse an unserem innovativen Pellet-/ und Solarheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Pellet-/ und Solarheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- 5,7" Farbtouchpanel\r\n- Viel breiterer Modulationsbereich dank Partitionsbrenner von 4,7 bis max. 30 kW nur per Software-Key aktivierbar\r\n- Beste Staubwerte im Vergleich (DE, AT)\r\n- Fernzugriff via VNC und demnächst via Webbrowser my.iqtouch.de\r\n- Option e-Metering Paket für absolute Kontrolle der Wärme- und Stromversorgung\r\n- Fernwartung und Support 365 Tage - direkt durch den Hersteller (5 Jahre)\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Pelletmaulwurf-Saugsystem - weniger Aufwand und mehr Platz im Pelletlager\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'iQ 3.0 Pelletheizung + Solaranlage als Selbstbausatz - 20 % Selbstbaurabatt'),
(5, 5, 'vielen Dank für Ihr Interesse an unserem Solarheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Solarheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'Solaranlage als Selbstbausatz - 20 % Selbstbaurabatt + BafA-Förderinfo'),
(6, 6, 'vielen Dank für Ihr Interesse an unserem Solarheizsystem. Anbei senden wir Ihnen heute unser komplettes Selbstbauangebot. Sie würden für die nachfolgende Anlage nach den aktuellen Förderrichtlinien, welche ab dem 01.04.2015 gültig sind, {Gesamtförderung} EUR staatliche BafA-Förderug erhalten. \r\n\r\nNach Abzug aller Rabatte & Förderung sowie - {Skonto} % Skonto ergibt sich für Sie eine Nettoinvestition von {Nettoinvestitionssumme} EUR inkl. MwSt. zzgl. Montage und Installationsmaterial. Sie erhalten hierfür ein erstklassiges energiesparendes Solarheizsystem. Wir freuen uns, auch Sie bald vielleicht als unseren neuen Kunden begrüßen zu dürfen. Für weitere Fragen stehen wir Ihnen gerne jederzeit zur Verfügung - rufen Sie uns einfach an - ich berate Sie gerne persönlich.\r\n\r\nVorteile gegenüber den meisten Mitbewerbern:\r\n\r\n- Unterstützung bei der Beantragung der BAFA-Förderung (ausgefüllte Anträge)\r\n- Deutsche Qualitätstechnik - seit 21 Jahre am Markt tätig\r\n- In Summe günstiger - da direkt ab Werk !', 'Solaranlage als Selbstbausatz - 20 % Selbstbaurabatt');

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

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `step`, `name`, `description`, `art_nr`, `price`, `funding`, `power`, `selected`, `funding_new`, `available_for`) VALUES
(10, 1, ' Keine Auswahl', '', '', 0, 0, 10, 0, 0, 3),
(11, 1, 'SOLARvent iQ 3.0 Pelletkessel 15 kW', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 150 4,7 bis 15,6 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. ', 'AGK-SET-IQ150', 8678.4, 3000, 1, 1, 0, 2),
(12, 1, 'SOLARvent iQ 3.0 Pelletkessel 20 kW', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 200 4,7 bis 20 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. ', 'AGK-SET-IQ200', 8878.4, 3000, 1, 0, 0, 2),
(13, 1, 'SOLARvent iQ 3.0 Pelletkessel 30 kW', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 270 4,7 bis 30 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set.', 'AGK-SET-IQ270', 9078.4, 3000, 2, 0, 0, 0),
(20, 2, 'Keine Auswahl', '', '', 0, 0, 0, 0, 0, 3),
(21, 2, 'Handbefüllung des 250 Liter Zwischenbehälters', 'Standardmäßig kann man den Pelletzwischenbehälter der Heizung auch per Sackware (Handfüllung) befüllen. Der Behälter hat ein Fassungsvolumen von ca. 250 Liter was rund 180 kg Pellets entspricht. ', 'AGK-MANBEF', 0, 0, 10, 0, 0, 3),
(22, 2, 'Selbstbau Kellerlager mit Pelletmaulwurf und Saugsystem', 'bestehend aus: 12,5 m Pelletsaugschlauch, Saugaustragungsystem, Schellinger Pellet-Maulwurf Komplettset für Selbstbau-Kellerlager inkl. Einblasstutzenset "gerade" mit Prallschutzmatte zur einfachen Befüllung durch Silo-LKW.', 'AGK-SET-MAULWURF', 1555.19, 0, 0, 1, 0, 0),
(23, 2, 'Maulwurftank Silo mit 3,7 t Inhalt mit Saugsystem', 'bestehend aus: 10m Pelletsaugschlauch, Saugaustragungsystem, Komplettset Pellet-Maulwurftank Typ S LxBxH = 189x189x205 cm inkl. Silo, Maulwurf, Einblasstutzen zur einfachen Befüllung durch Silo-LKW.', 'AGK-SET-MW-TANK-S', 3129.52, 0, 0, 0, 0, 3),
(24, 2, 'Maulwurftank Silo mit 5,0 t Inhalt mit Saugsystem', 'bestehend aus: 10m Pelletsaugschlauch, Saugaustragungsystem, Komplettset Pellet-Maulwurftank Typ M LxBxH = 217x217x205 cm inkl. Silo, Maulwurf, Einblasstutzen zur einfachen Befüllung durch Silo-LKW.', 'AGK-SET-MW-TANK-M', 3209.52, 0, 0, 0, 0, 3),
(25, 2, 'Maulwurftank Silo mit 6,5 t Inhalt mit Saugsystem', 'bestehend aus: 10m Pelletsaugschlauch, Saugaustragungsystem, Komplettset Pellet-Maulwurftank Typ L LxBxH = 248x248x205 cm inkl. Silo, Maulwurf, Einblasstutzen zur einfachen Befüllung durch Silo-LKW.', 'AGK-SET-MW-TANK-L', 3345.52, 0, 0, 0, 0, 3),
(26, 2, 'Selbstbau Kellerlager mit Lagerraumschnecke und Saugsystem', 'bestehend aus: 10m Pelletsaugschlauch, Saugaustragungsystem, bis 3 m Lagerraumschnecke für Selbstbau-Kellerlager, Einblasstutzenset mit Prallschutzmatte zur einfachen Befüllung durch Silo-LKW.', 'AGK-SET-SCHNECKE', 1030.8, 0, 0, 0, 0, 3),
(30, 3, 'Keine Auswahl', '', '', 0, 0, 10, 0, 0, 3),
(31, 3, 'Solaranlage mit 5 Kollektoren 10,3 m² (bis ca. 105 m² beheizte Wohnfläche)', 'bestehend aus: 5 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 25 Liter, Solarflüssigkeit 53 kg und Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-5', 3058.25, 2000, 1, 1, 0, 2),
(32, 3, 'Solaranlage mit 6 Kollektoren 12,3 m² (bis ca. 125 m² beheizte Wohnfläche)', 'bestehend aus: 6 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 33 Liter, Solarflüssigkeit 53 kg und Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-6', 3534.25, 2000, 2, 0, 0, 2),
(33, 3, 'Solaranlage mit 7 Kollektoren 14,4 m² (bis ca. 145 m² beheizte Wohnfläche)', 'bestehend aus: 7 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 33 Liter, Solarflüssigkeit 53 kg und Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-7', 3928.65, 2100, 2, 0, 0, 2),
(34, 3, 'Solaranlage mit 8 Kollektoren 16,4 m² (bis ca. 165 m² beheizte Wohnfläche)', 'bestehend aus: 8 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 50 Liter, Solarflüssigkeit 53 kg und Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-8', 4459.05, 2380, 3, 0, 0, 2),
(40, 4, 'Keine Auswahl', '', '', 0, 0, 10, 0, 0, 3),
(41, 4, 'Standardsystem ohne Puffer: 1 Heizkreis, 1 Brauchwasserspeicher', 'bestehend aus: Steuerelektronik für 1 Heizkreis und 1 Brauchwasserspeicher, 2 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit 25-6 ErP ready Hocheffizienzpumpe, 1 Brauchwasserladegruppe mit ErP ready Hocheffizienzpumpe 25-4, Ausdehnungsgefäß 100 Liter, Brauchwasserspeicher S 200-PU, 200 Liter. Bereitschaftswärmeaufwand: 1,37 kWh/24h, Wärmeverlust: 57,0 W, Energieeffizienzklasse: B. Achtung: Nur möglich wenn keine Solaranlage angeschlossen werden soll !', 'AGK-SET-WV-1-HK-BW', 1616.17, 0, 0, 0, 0, 0),
(42, 4, 'Standardsystem ohne Puffer: 2 Heizkreise, 1 Brauchwasserspeicher ', 'bestehend aus: Steuerelektronik für 2 Heizkreise und 1 Brauchwasserspeicher, 3 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit 25-6 ErP ready Hocheffizienzpumpe, 1 Brauchwasserladegruppe mit ErP ready Hocheffizienzpumpe 25-4, Ausdehnungsgefäß 100 Liter, Brauchwasserspeicher S 200-PU, 200 Liter. Bereitschaftswärmeaufwand: 1,37 kWh/24h, Wärmeverlust: 57,0 W, Energieeffizienzklasse: B. Achtung: Nur möglich wenn keine Solaranlage angeschlossen werden soll !', 'AGK-SET-WV-2-HK-BW', 2129.46, 0, 0, 0, 0, 0),
(43, 4, 'Kombipuffersystem 800 Liter: für 1 Heizkreis und Brauchwasser', 'bestehend aus: Steuerelektronik für 1 Heizkreis, 1 Brauchwasser- und Pufferspeicher, 4 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 100 Liter, Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 800 Liter mit Solaroption und 2 Tauchhülsen. ', 'AGK-SET-WV-3-HK-KPS', 2550.24, 500, 1, 1, 500, 2),
(44, 4, 'Kombipuffersystem 800 Liter: für 2 Heizkreise und Brauchwasser', 'bestehend aus: Steuerelektronik für 2 Heizkreise, 1 Brauchwasser- und Pufferspeicher, 5 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 100 Liter, Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 800 Liter mit Solaroption und 2 Tauchhülsen.', 'AGK-SET-WV-4-HK-KPS', 3063.53, 500, 1, 0, 500, 2),
(45, 4, 'Kombipuffersystem 1.000 Liter: für 1 Heizkreis und Brauchwasser', 'bestehend aus: Steuerelektronik für 1 Heizkreis, 1 Brauchwasser- und Pufferspeicher, 4 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 100 Liter, Hygiene-Kombipufferspeicher KER 1.000 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, Bereitschaftswärmeaufwand: 2,92 kWh/24h, Wärmeverlust: 121,7 W, Energieeffizienzklasse: C, 1.000 Liter mit Solaroption und 2 Tauchhülsen.', 'AGK-SET-WV-5-HK-KPS', 2619.6, 500, 2, 0, 500, 2),
(46, 4, 'Kombipuffersystem 1.000 Liter: für 2 Heizkreise und Brauchwasser', 'bestehend aus: Steuerelektronik für 2 Heizkreise, 1 Brauchwasser- und Pufferspeicher, 5 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 100 Liter, Hygiene-Kombipufferspeicher KER 1.000 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, Bereitschaftswärmeaufwand: 2,92 kWh/24h, Wärmeverlust: 121,7 W, Energieeffizienzklasse: C, 1.000 Liter mit Solaroption und 2 Tauchhülsen.', 'AGK-SET-WV-6-HK-KPS', 3132.89, 500, 2, 0, 500, 2),
(50, 5, 'Keine Auswahl', '', '', 0, 0, 10, 0, 0, 3),
(51, 5, 'Kurze Verbindungsleitung (1 m Rohr, 1 Bogen 0-90°)', 'bestehend aus: 1 Stück Kesselanschlussadapter iQ 3.0 mit Dichtsatz und Klemmband, 1 Stück 0-90° einstellbare Reinigungswinkel, 1 Stück 130er einwandiges VA Abgasrohr, 1 Stück Isolierschale aus 25 mm Mineralwolle, 2 Stück Klemmband.', 'AGK-SET-1-AVL-EW', 153.3, 0, 0, 1, 0, 3),
(52, 5, 'Lange Verbindungsleitung (2 m Rohr, 2 Bögen 0-90°)', 'bestehend aus: 1 Stück Kesselanschlussadapter iQ 3.0 mit Dichtsatz und Klemmband, 2 Stück 0-90° einstellbare Reinigungswinkel, 2 Stück 130er einwandiges VA Abgasrohr, 2 Stück Isolierschale aus 25 mm Mineralwolle, 4 Stück Klemmband.', 'AGK-SET-2-AVL-EW', 236.55, 0, 0, 0, 0, 3),
(60, 6, 'Keine Auswahl', '', '', 0, 0, 10, 0, 0, 3),
(61, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 130 - 7m', 'bestehend aus: Abgassystem Grundpaket  Ø 130 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 5 Stück Längenelement 1 m, 5 Stück Isolierschale 25 mm.', 'AGK-SET-1-EW-130-7', 638.64, 0, 1, 1, 0, 3),
(62, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 130 - 9m', 'bestehend aus: Abgassystem Grundpaket  Ø 130 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 7 Stück Längenelement 1 m, 7 Stück Isolierschale 25 mm.', 'AGK-SET-2-EW-130-9', 736.46, 0, 1, 0, 0, 3),
(63, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 130 - 11m', 'bestehend aus: Abgassystem Grundpaket Ø 130 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 9 Stück Längenelement 1 m, 9 Stück Isolierschale 25 mm, 1 Stück Montageschelle.', 'AGK-SET-3-EW-130-11', 846.69, 0, 1, 0, 0, 3),
(64, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 140 - 7m', 'bestehend aus: Abgassystem Grundpaket Ø 140 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 5 Stück Längenelement 1 m, 5 Stück Isolierschale 25 mm.', 'AGK-SET-4-EW-140-7', 668.78, 0, 2, 0, 0, 3),
(65, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 140 - 9m', 'bestehend aus: Abgassystem Grundpaket Ø 140 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 7 Stück Längenelement 1 m, 7 Stück Isolierschale 25 mm.', 'AGK-SET-5-EW-140-9', 775.23, 0, 2, 0, 0, 3),
(66, 6, 'Schornsteinsanierungssystem Edelstahl Einzugsrohr Ø 140 - 11m', 'bestehend aus: Abgassystem Grundpaket Ø 140 mm (Kondensatpfanne, Reinigungselement mit Putztürchen, T-Stück 87° mit Abgang 130 mm für Kesselanschluss, Längenelement 0,25 m, Kopfabdeckung mit Wetterkragen, 3 Stück Montageschellen) Zugregleranschluss T-Stück, Zugregler 10 Pa, 9 Stück Längenelement 1 m, 9 Stück Isolierschale 25 mm, 1 Stück Montageschelle.', 'AGK-SET-6-EW-140-11', 894.55, 0, 2, 0, 0, 3),
(67, 6, 'Edelstahl-Außenschornstein doppelwandig isoliert Ø 130 - 7m', 'bestehend aus: Konsolenbleche, Grundplatte mit Kondensatablauf, Reinigungselement, witterungsgeschützter Zugbegrenzer, T-Anschluss, Längenelement 500 mm mit Wandfutter, Wetterkragen, 6x Längenelemente, Wandabstandshalter, Deckenblende 1-65°, Sparrenhalter, Dachdurchführung 36-45° inkl. Bleirand und Wettergragen, Mündungsabschluss.', 'AGK-SET-1-DW-130-7', 1472.62, 0, 1, 0, 0, 3),
(68, 6, 'Edelstahl-Außenschornstein doppelwandig isoliert Ø 130 - 9m', 'bestehend aus: Konsolenbleche, Grundplatte mit Kondensatablauf, Reinigungselement, witterungsgeschützter Zugbegrenzer, T-Anschluss, Längenelement 500 mm mit Wandfutter, Wetterkragen, 8x Längenelemente, 2x Wandabstandshalter, Deckenblende 1-65°, Sparrenhalter, Dachdurchführung 36-45° inkl. Bleirand und Wettergragen, Mündungsabschluss.', 'AGK-SET-2-DW-130-9', 1671, 0, 1, 0, 0, 3),
(69, 6, 'Edelstahl-Außenschornstein doppelwandig isoliert Ø 130 - 11m', 'bestehend aus: Konsolenbleche, Grundplatte mit Kondensatablauf, Reinigungselement, witterungsgeschützter Zugbegrenzer, T-Anschluss, Längenelement 500 mm mit Wandfutter, Wetterkragen, 10x Längenelemente, 3x Wandabstandshalter, Deckenblende 1-65°, Sparrenhalter, Dachdurchführung 36-45° inkl. Bleirand und Wettergragen, Mündungsabschluss.', 'AGK-SET-3-DW-130-11', 1869.4, 0, 1, 0, 0, 3),
(70, 1, 'SOLARvent iQ 3.0 Pelletkessel 15 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 150 4,7 bis 15,6 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ150-PF', 9438.4, 0, 1, 0, 3000, 1),
(71, 1, 'SOLARvent iQ 3.0 Pelletkessel 20 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 200 4,7 bis 20 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ200-PF', 9638.4, 0, 1, 0, 3000, 1),
(72, 1, 'SOLARvent iQ 3.0 Pelletkessel 30 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 270 4,7 bis 30 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ270-PF', 9838.4, 0, 2, 0, 3000, 1),
(73, 4, 'Kombipuffer-Kaskadensystem: 1.600 Liter für 1 Heizkreis und Brauchwasser', 'bestehend aus: Steuerelektronik für 1 Heizkreis, 1 Brauchwasser- und Pufferspeicher, 4 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 150 Liter, 1 Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 800 Liter mit Solaroption + 1 Puffererweiterung P.800 - 800 Liter jeweils mit Solaroption (beide Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 3 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-7-HK-KPS', 3462.8, 500, 3, 0, 500, 2),
(74, 4, 'Kombipuffer-Kaskadensystem: 1.600 Liter für 2 Heizkreise und Brauchwasser', 'bestehend aus: Steuerelektronik für 2 Heizkreise, 1 Brauchwasser- und Pufferspeicher, 5 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 150 Liter, 1 Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 800 Liter mit Solaroption + 1 Puffererweiterung P.800 - 800 Liter jeweils mit Solaroption (beide Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 3 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-8-HK-KPS', 3976.09, 500, 3, 0, 500, 2),
(75, 4, 'Kombipuffer-Kaskadensystem: 2.000 Liter für 1 Heizkreis und Brauchwasser', 'bestehend aus: Steuerelektronik für 1 Heizkreis, 1 Brauchwasser- und Pufferspeicher, 4 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 200 Liter, 1 Hygiene-Kombipufferspeicher KER 1.000 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 1.000 Liter mit Solaroption + 1 Puffererweiterung P.1000 - 1.000 Liter jeweils mit Solaroption (beide Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,92 kWh/24h, Wärmeverlust: 121,7 W, Energieeffizienzklasse: C, 3 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-9-HK-KPS', 3655.92, 500, 4, 0, 500, 2),
(76, 4, 'Kombipuffer-Kaskadensystem: 2.000 Liter für 2 Heizkreise und Brauchwasser', 'bestehend aus: Steuerelektronik für 2 Heizkreise, 1 Brauchwasser- und Pufferspeicher, 5 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 200 Liter, 1 Hygiene-Kombipufferspeicher KER 1.000 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 1.000 Liter mit Solaroption + 1 Puffererweiterung P.1000 - 1.000 Liter jeweils mit Solaroption (beide Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,92 kWh/24h, Wärmeverlust: 121,7 W, Energieeffizienzklasse: C, 3 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-10-HK-KPS', 4169.21, 500, 4, 0, 500, 2),
(77, 4, 'Kombipuffer-Kaskadensystem: 2.400 Liter für 1 Heizkreis und Brauchwasser', 'bestehend aus: Steuerelektronik für 1 Heizkreis, 1 Brauchwasser- und Pufferspeicher, 4 Kabelfühler, 1 Außenfühler, 1 witterungsgeführte Heizkreis-Pumpengruppe mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 300 Liter, 1 Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 800 Liter mit Solaroption + 2 Puffererweiterung P.800 - 800 Liter jeweils mit Solaroption (alle 3 Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 6 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-11-HK-KPS', 4364.48, 500, 5, 0, 500, 2),
(78, 4, 'Kombipuffer-Kaskadensystem: 2.400 Liter für 2 Heizkreise und Brauchwasser', 'bestehend aus: Steuerelektronik für 2 Heizkreise, 1 Brauchwasser- und Pufferspeicher, 5 Kabelfühler, 1 Außenfühler, 2 witterungsgeführte Heizkreis-Pumpengruppen mit ErP ready Hocheffizienzpumpe 25-6, 1 Pufferspeicherladegruppe mit ErP ready Hocheffizienzpumpe 25-6, Ausdehnungsgefäß 300 Liter, 1 Hygiene-Kombipufferspeicher KER 800 mit 100 mm abnehmbarer ErP-Ökoline Isolierung, 800 Liter mit Solaroption + 2 Puffererweiterung P.800 - 800 Liter jeweils mit Solaroption (alle 3 Speicher mit abnehmbarer ERP-Isolierung, je Speicher Bereitschaftswärmeaufwand: 2,49 kWh/24h, Wärmeverlust: 103,8 W, Energieeffizienzklasse: C, 6 Speicherverbinder und 2 Tauchhülsen.', 'AGK-SET-WV-12-HK-KPS', 4877.77, 500, 5, 0, 500, 2),
(79, 3, 'Solaranlage mit 9 Kollektoren 18,5 m² (bis ca. 185 m² beheizte Wohnfläche)', 'bestehend aus: \r\n9 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 50 Liter, Solarflüssigkeit 53 kg, Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-9', 5111.85, 2660, 3, 0, 0, 2),
(80, 3, 'Solaranlage mit 10 Kollektoren 20,5 m² (bis ca. 210 m² beheizte Wohnfläche)', 'bestehend aus: \r\n10 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 50 Liter, Solarflüssigkeit 53 kg, Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-10', 5370.25, 2940, 4, 0, 0, 2),
(81, 3, 'Solaranlage mit 11 Kollektoren 22,6 m² (bis ca. 230 m² beheizte Wohnfläche)', 'bestehend aus: \r\n11 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 80 Liter, Solarflüssigkeit 64 kg, Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-11', 5900.65, 3220, 4, 0, 0, 2),
(82, 3, 'Solaranlage mit 12 Kollektoren 24,6 m² (bis ca. 250 m² beheizte Wohnfläche)', 'bestehend aus: \r\n12 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 80 Liter, Solarflüssigkeit 64 kg, Brauchwassermischer als Verbrühungsschutz.', 'AGK-SET-SOLAR-12', 6335.85, 3500, 4, 0, 0, 2),
(83, 3, 'Solaranlage mit 13 Kollektoren 26,7 m² (bis ca. 270 m² beheizte Wohnfläche)', 'bestehend aus: \r\n13 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 80 Liter, Solarflüssigkeit 84 kg, Brauchwassermischer als Verbrühungsschutz und zusätzlicher, externer Microblasenluftabscheider 3/4" IG.', 'AGK-SET-SOLAR-13', 7138.25, 3780, 5, 0, 0, 2),
(84, 3, 'Solaranlage mit 14 Kollektoren 28,7 m² (bis ca. 290 m² beheizte Wohnfläche)', 'bestehend aus: \r\n14 Hochleistungsflachkollektoren, Ziegeldachbefestigungspaket, Flexrohranschluss-Set mit Isolierung, 2 Strang Solarstation mit ErP ready Hocheffizienzpumpe, Solar-Steuerelektronik mit Drehzahlregelung für IQtouch Pelletheizung, Kollektorfühler, Speicherfühler, Solar Ausdehnungsgefäß 80 Liter, Solarflüssigkeit 84 kg, Brauchwassermischer als Verbrühungsschutz und zusätzlicher, externer Microblasenluftabscheider 3/4" IG.', 'AGK-SET-SOLAR-14', 7559.85, 4060, 5, 0, 0, 2),
(85, 1, 'SOLARvent iQ 3.0 Pelletkessel 15 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 150 4,7 bis 15,6 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ150-PF', 9760.75, 4500, 1, 0, 0, 0),
(86, 1, 'SOLARvent iQ 3.0 Pelletkessel 20 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 200 4,7 bis 20 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ200-PF', 9958.75, 4500, 1, 0, 0, 0),
(87, 1, 'SOLARvent iQ 3.0 Pelletkessel 30 kW + Partikelabscheider', 'bestehend aus: iQ 3.0 Touch-Pelletheizung IQ 270 4,7 bis 30 kW, Internet-Fernzugriff und 5 Jahre Fernwartung, Rücklaufanhebung mit ErP ready Hocheffizienzpumpe und Kesselanschluss-Set. >>> Zusätzlich inklusive Partikelabscheider - damit Sie die Innovationsförderung der BafA in Anspruch nehmen können !!!', 'AGK-SET-IQ270-PF', 10160.8, 4500, 2, 0, 0, 0);

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

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `name`, `step_id`, `tooltip`) VALUES
(1, 'Pellet-Zentralheizung', 1, 'Welche Nennwärmeleistung benötigen Sie für Ihr Haus?<br>\r\nAls Faustformel gilt für ein EFH aus:<br>\r\nBJ 1978 ca. 100W/m²<br>\r\nBJ 1984-94 ca 75 W/m²<br>\r\nBJ ab 1995 ca. 60 W/m²<br>\r\nbeheizte Wohnfläche.<br>\r\nBeispiel: Haus von 1978 mit 150 m² beheizter Wohnfläche benötigt 150 m² x 100 W/m² = 15.000 W was einem 15 kW Kessel entspricht. Den genauen Wärmebedarf kann auch ein Energieberater ermitteln.'),
(2, 'Pelletlagerraum / Pelletsilo', 2, 'Es gibt verschiedene Möglichkeiten der Brennstoffzuführung bzw. Lagerung. Die Basis ist immer die Handbefüllung des 250 Liter fassenden Zwischenbehälters. Die meisten Kunden entscheiden sich für die automatische Befüllung über einen Pelletmaulwurf im Selbstbau-Kellerlager.'),
(3, 'Solaranlage für Warmwasser- und Heizungsunterstützung', 3, 'Alle hier angebotenen Anlagen eignen sich zur Heizungsunterstützung und Brauchwasser-erwärmung. Für ein Wohnhaus mit 100 m² Wohnfläche empfehlen wir mind. 5 Kollektoren. (Beispiel: Je 10 qm beheizte Wohnfläche = 1 qm Kollektorfläche) \r\n\r\nAb 5 Kollektoren ist eine BafA-Förderung möglich.'),
(4, 'Komplette Wärmeverteilung inklusive Wärmespeicher', 4, 'Wenn unter Titel 3 eine Solaranlage ausgewählt wurde, muss hier ein System mit Pufferspeicher gewählt werden. <br>\r\nWir empfehlen folgende Kollektor / Pufferkombinationen: <br>\r\n5 Kollektoren = 800 Liter<br>\r\n6 / 7 Kollektoren = 1.000 Liter<br>\r\n8 / 9 Kollektoren = 1.600 Liter<br>\r\n10 - 12 Kollektoren = 2.000 Liter<br>\r\n13 / 14 Kollektoren = 2.400 Liter<br> Grundsätzlich ist es sinnvoll, auch ohne Solaranlage einen Kombipufferspeicher zu verwenden, da hierdurch später jederzeit eine effiziente Solaranlage nachgerüstet werden kann. Weiter muss der Kessel durch den Puffer nicht so häufig takten (geringere Zündhäufigkeit).'),
(5, 'Abgasverbindungsleitung zwischen Kessel und Schornstein', 5, 'Wählen Sie eine Abgasverbindung vom Kessel zum Schornstein aus. Ist der Schornsteinan-schluss direkt hinter der Heizung genügt 1m. Ist dieser neben der Heizung benötigt man i.d.R. 2 m und zwei Bögen.'),
(6, 'Schornsteinsanierung oder Edelstahl Außenschornsteinanlage', 6, 'Bis zu einer Kesselleistung von 20 kW ist ein Ø von 130 mm ausreichend. Ab 30 kW empfehlen wir einen Ø von 140 mm.\r\n\r\nWenn Sie einen gemauerten Schornstein nutzen können, dann wählen Sie bitte das Schornsteinsanierungs-system, wenn Sie keinen Schornstein haben, und einen Außenschornstein am Gebäude montieren wollen, dann wählen Sie bitte  einen Edelstahlschornstein doppelwandig in der gewünschten Länge.');

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

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `name`, `attn_name`, `email`, `address1`, `address2`, `city`, `state`, `country`, `postcode`, `phone`, `fax`, `registration_no`, `VAT_no`, `logo`) VALUES
(1, 'Al-muslim High school ghari Qamar deen', 'ECKOOL', 'eckool@eckool.com', 'Peshawar', NULL, '', '', '', '', NULL, NULL, NULL, NULL, 'assets/img/logo.png'),
(2, 'Khan bacha model school', NULL, 'khan@khan.com', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, 'assets/img/logo.png'),
(3, 'Khan bacha model school', NULL, 'khan@khan.com', '', NULL, '', '', '', '', NULL, NULL, NULL, NULL, 'assets/img/logo.png');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, 1, 0x32313330373036343333, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, 1, 0x32313330373036343333, 'admin', '$2y$08$oJS8/132sr1rb7wNjr3dq.Uwcfi.Ca86h4ix57L7VWuoned1ggG.K', '', 'admin', '', NULL, NULL, NULL, 1268889823, 1458992444, 1, 'Admin', 'istrator', 'ADMIN', '00');

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
  MODIFY `att_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `createdfiles`
--
ALTER TABLE `createdfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=433;
--
-- AUTO_INCREMENT for table `email_att`
--
ALTER TABLE `email_att`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
