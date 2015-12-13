-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for project
DROP DATABASE IF EXISTS `project`;
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `project`;


-- Dumping structure for table project.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `page` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table project.menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id`, `name`, `position`, `page`) VALUES
	(1, 'Schedule a remote', 1, 'scheduleremote.php'),
	(2, 'View remotes', 2, 'viewremotes.php'),
	(3, 'Report', 3, 'report.php'),
	(4, 'View All Remotes', 4, 'allremotes.php'),
	(5, 'Logout', 5, 'logout.php');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table project.problems
DROP TABLE IF EXISTS `problems`;
CREATE TABLE IF NOT EXISTS `problems` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `problem` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `symptoms` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `solution` varchar(1000) NOT NULL,
  `tools` varchar(1000) NOT NULL,
  `added_by` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table project.problems: ~3 rows (approximately)
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
REPLACE INTO `problems` (`id`, `problem`, `os`, `symptoms`, `description`, `solution`, `tools`, `added_by`) VALUES
	(5, 'infection', 'Windows 7', 'slow performance', '', 'removed javascript hidden keys', 'registry dumper', 0),
	(6, 'info', 'win 10', 'customer', '', 'change the computer', 'hammer and machine gun', 0),
	(7, 'Unknown rootkit chinese javascript hidden registry', 'All OS', 'Slow performance, SH can\'t remove it.', 'There is a javascript key in the run key, which is hidden and can not be removed using SH. Also this key can not be seen using the regedit.', 'First disable PowerShell by renaming the main .exe files render them unusable.\r\n\r\nUse RegistryDumper in order to scan the following keys:\r\n\r\nHKCU\\Software\\Microsoft\\Internet Explorer\\Main\\FeatureControl\\ \r\n\r\nHKLM\\SOFTWARE\\Wow6432Node\\Microsoft\\Internet Explorer\\Main\\FeatureControl keys.\r\n\r\nHKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Run\r\nHKLM\\Software\\Wow6432Node\\Microsoft\\Windows\\CurrentVersion\\Run\r\n\r\nHKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\Run\r\n\r\nHKLM\\SOFTWARE\\Wow6432Node\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\Run\r\n\r\nYou can check these in the scan log or support log:\r\n\r\nHKCU\\software\\\'random number+letters\'\r\nHKLM\\software\\Wow6432Node\\\'random number+letters\'', 'RegistryDumper + mine scripts for disabling PowerShell.', 1);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;


-- Dumping structure for table project.remotes
DROP TABLE IF EXISTS `remotes`;
CREATE TABLE IF NOT EXISTS `remotes` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(50) NOT NULL,
  `zone` varchar(30) NOT NULL,
  `bgtime` varchar(50) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `problem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- Dumping data for table project.remotes: ~49 rows (approximately)
/*!40000 ALTER TABLE `remotes` DISABLE KEYS */;
REPLACE INTO `remotes` (`id`, `user_id`, `email`, `date`, `time`, `zone`, `bgtime`, `done`, `problem`) VALUES
	(52, 5, 'testis@r', '2015-08-15', '00:00', 'est', '00:00', 1, 'er'),
	(76, 1, 'cha@gmail.com', '2015-08-25', '13:00', 'EST\\EDT', '20:00', 1, 'DNSunlocker'),
	(82, 1, 'co@outlook.com', '2015-08-27', '20:00', 'Nederlands', '21:00', 1, 'PC shutsdown'),
	(83, 1, 'gy@hotmail.com', '2015-08-31', '17:00', 'EST\\EDT', '00:00', 1, 'HKCU\\SOFTWARE\\Microsoft\\Internet Explorer\\LowRegistry\\IEShims\\NormalizedPaths::C:\\Users\\geraldine\\$RECYCLE.BIN'),
	(84, 1, 'mar1@gmail.com', '2015-09-01', '13:00', 'EST\\EDT', '20:00', 1, 'yahoo redirect'),
	(85, 1, 'dp@tdcadsl.dk', '2015-09-01', '14:00', 'EST\\EDT', '21:00', 1, 'dns unlocker'),
	(86, 1, 'gl@comcast.net', '2015-09-01', '19:00', 'GMT', '22:00', 1, 'unremoved stuff'),
	(87, 1, 'dip@tdcadsl.dk', '2015-09-07', '14:00', 'EST\\EDT', '21:00', 1, 'DNS Unlocker'),
	(88, 1, 'nian@talktalk.net', '2015-09-08', '21:30', 'GMT/BST', '23:30', 1, 'DNS Unlocker'),
	(89, 1, 'ke4@yahoo.com', '2015-09-15', '13:00', 'EST\\EDT', '20:00', 1, 's.yimg.com removal'),
	(90, 2, 'aa@fd.vv', '2015-09-02', '15:00', 'EST\\EDT', '16:00', 0, 'fty'),
	(91, 6, 'st@hotmail.co.uk', '09/16/15', '18:30', 'GMT', '21:30', 1, 'Ebay black screen'),
	(92, 6, 'dme@aol.com', '09/17/15', '1PM', 'EST', '20:00', 1, 'something running that is audio'),
	(93, 1, 's@hotmail.com', '2015-09-23', '19:00', 'EST\\EDT', '02:00', 1, 'CTB locker'),
	(94, 8, 'dr@tdcadsl.dk', '2015-09-22', '16:00', 'EST\\EDT', '19:00', 1, 'gyhfghf'),
	(95, 8, 'test@ttt', '2015-09-22', '15:00', 'EST\\EDT', '16:00', 1, 'efgdgfd'),
	(96, 8, 'gaial@comcast.net', '2015-09-24', '16:04', 'EST\\EDT', '16:04', 1, 'retgteg'),
	(97, 6, 'g@geowhe.com', '09/24/15', '1:30PM', 'EST', '20:30', 1, 'Boot problem.'),
	(98, 1, 'ricod@yahoo.com', '2015-09-28', '17:00', 'EST\\EDT', '00:00', 1, 'dnsapi.dll'),
	(99, 6, 'stu@hotmail.co.uk', '09/30/15', '7PM', 'GMT', '10PM', 1, 'Ebay black screen continues'),
	(100, 6, 'dk3@hotmail.com', '09/29/15', '2PM', 'EST', '9PM', 1, 'DNS Unlocker.'),
	(101, 1, 'Jn@ampmprinting.com', '2015-09-29', '11:00', 'PST', '21:00', 1, 'browaser popups probably dnsapi.dll\r\n\r\ncall 818-652-4040'),
	(102, 6, 'Be2@yahoo.com', '10/05/15', '1PM', 'CST', '9PM', 1, 'Lasuperba'),
	(103, 6, 'kd@online.no', '10/05/15', '9PM', 'GMT', '12AM', 1, 'DNS Unlocker'),
	(104, 1, 'cht@gmail.com', '2015-10-05', '11:00', 'PST', '21:00', 1, '"Forged File Infected Rootkit."'),
	(105, 6, 'tho@gmail.com', '10/12/15', '7:30PM', 'EST', '2:30AM', 1, 'Browser shit'),
	(106, 6, 'glo@hotmail.com', '10/13/15', '7AM ', 'AEDT', '11PM', 1, 'dns unlocker'),
	(108, 8, 'tri@hdf.bb', '2015-10-15', '14:22', 'EST\\EDT', '17:05', 1, 'tyu'),
	(110, 1, 'ct@students.poly.edu', '2015-10-15', '14:00', 'EST\\EDT', '21:00', 1, 'dnsapi and bdriver.sys'),
	(111, 1, 'ct01@students.poly.edu', '2015-10-22', '19:00', 'EST/EDT', '02:00', 1, 'dnsapi and bdriver.sys'),
	(112, 8, 'test@ttt333333', '2015-10-15', '15:03', 'Nederlands', '15:03', 1, 'sdfsdfsd 3'),
	(113, 1, 'ivd@att.net', '2015-10-31', '14:00', 'EST\\EDT', '21:00', 1, 'Waiting for feedback! about_blank, SH crashes, other Browser related problems.'),
	(114, 1, 'gl@yahoo.fr', '2015-10-20', '14:00', 'EST\\EDT', '21:00', 1, 'no such interface'),
	(115, 8, 'sds@cg.df', '2015-10-21', '14:03', 'rtg', '04:04', 1, 'ssdfsdf'),
	(116, 8, 'vg@gfg', '2015-10-21', '15:00', 'GMT', '16:00', 1, 'ghgh fsdgdsfg'),
	(117, 1, 'gli@yahoo.fr', '2015-10-22', '14:00', 'EST\\EDT', '21:00', 1, 'no such interface in other accounts'),
	(118, 8, 'ct1@students.poly.edu', '2015-10-21', '19:00', 'EST\\EDT', '02:00', 1, 'ghdfhg yhjhg'),
	(122, 1, 'test@ttt', '2015-10-27', '16:10', 'EST\\EDT', '17:10', 1, 'ghkjghj ÑÐ´Ñ€Ñ„Ð³Ñ dfsd'),
	(123, 6, 'r7@dodo.com.au', '10/26/15', '9:30AM', 'Australian', '1AM', 1, 'mshta javascript'),
	(124, 1, 'test@ttt', '2015-10-29', '19:07', 'gg', '19:07', 1, '7giuk'),
	(127, 1, 'test@ttt666', '2015-10-31', '20:08', 'PST', '20:08', 1, 'hhjkh'),
	(128, 1, 'ivd@att.net', '2015-10-29', '14:00', 'EST\\EDT', '20:00', 1, 'about_blank when trying to print bank statement online.\r\n\r\nNote: 91 years old, can\'t run the tool.'),
	(129, 8, 'dftgd@sad', '2015-10-31', '17:00', 'EST\\EDT', '20:00', 1, 'xdfsfs 667'),
	(130, 8, 'ct1@students.poly.edu', '2015-12-05', '15:00', 'EST\\EDT', '15:00', 1, 'sdgfsdfsdfsdfsdfsdfdsfsd sdf sdf f sdfsd\r\n\r\nertertert\r\nret43trt ert'),
	(131, 8, 'test@ttt34234234', '2015-12-05', '15:33', '342', '16:45', 1, 'rfdegdgd'),
	(132, 8, 'test@ttt322222', '2015-12-31', '13:01', 'rt', '14:02', 1, 'sdfsdf'),
	(133, 8, 'test@ttt6666', '2015-11-02', '17:06', 'EST\\EDT', '18:07', 3, 'fyhj'),
	(134, 1, 'test@tttdfsdfsd', '2015-11-28', '15:03', 'EST\\EDT', '15:03', 1, 'dsfsdfs'),
	(135, 6, 'test@test.com', '11/05/15', '3PM', 'EST', '10PM', 1, 'Test');
/*!40000 ALTER TABLE `remotes` ENABLE KEYS */;


-- Dumping structure for table project.report
DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `vmails` tinyint(1) NOT NULL,
  `calls` int(11) NOT NULL,
  `remotes` int(11) NOT NULL,
  `sl` tinyint(1) NOT NULL,
  `mails` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- Dumping data for table project.report: ~32 rows (approximately)
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
REPLACE INTO `report` (`id`, `user_id`, `vmails`, `calls`, `remotes`, `sl`, `mails`, `date`, `time`) VALUES
	(1, 1, 0, 2, 1, 0, 0, '2015-10-28', '02:16:25'),
	(3, 2, 1, 1, 0, 1, 0, '0000-00-00', '21:55:04'),
	(4, 3, 0, 1, 10, 1, 1, '0000-00-00', '21:55:03'),
	(5, 5, 0, 0, 0, 0, 0, '0000-00-00', '21:54:57'),
	(6, 6, 0, 2, 0, 0, 1, '0000-00-00', '21:54:53'),
	(7, 7, 0, 1, 0, 0, 1, '0000-00-00', '21:54:54'),
	(8, 8, 1, 2, 3, 1, 1, '2015-10-26', '01:54:55'),
	(9, 9, 0, 0, 0, 0, 0, '0000-00-00', '21:54:50'),
	(12, 10, 0, 0, 0, 0, 0, '2015-10-27', '21:16:08'),
	(28, 11, 0, 0, 0, 0, 0, '2015-10-27', '22:57:12'),
	(64, 16, 0, 0, 0, 0, 0, '2015-10-27', '17:57:50'),
	(65, 16, 0, 0, 0, 0, 0, '2015-10-28', '18:26:23'),
	(72, 8, 0, 66, 0, 0, 0, '2015-10-28', '14:47:12'),
	(74, 8, 1, 66, 66, 1, 1, '2015-10-29', '15:23:45'),
	(75, 1, 0, 3, 2, 0, 1, '2015-10-29', '15:33:52'),
	(76, 1, 1, 0, 0, 1, 1, '2015-11-01', '13:00:44'),
	(77, 8, 1, 11, 2, 1, 1, '2015-10-30', '15:29:39'),
	(78, 1, 0, 0, 0, 1, 1, '2015-11-02', '13:02:25'),
	(79, 8, 1, 2, 2, 1, 1, '2015-10-31', '13:12:21'),
	(80, 8, 0, 1, 666, 0, 0, '2015-11-02', '23:30:51'),
	(81, 1, 0, 0, 0, 0, 1, '2015-11-03', '13:00:47'),
	(82, 8, 0, 0, 0, 0, 0, '2015-11-03', '17:11:03'),
	(83, 6, 0, 2, 0, 0, 1, '2015-11-03', '20:03:52'),
	(84, 1, 0, 1, 0, 0, 1, '2015-11-04', '13:04:33'),
	(85, 8, 0, 0, 0, 0, 0, '2015-11-04', '19:26:29'),
	(86, 6, 0, 3, 1, 0, 1, '2015-11-04', '16:06:45'),
	(87, 1, 0, 1, 0, 0, 1, '2015-11-05', '13:05:25'),
	(88, 8, 0, 0, 0, 0, 0, '2015-11-05', '19:11:11'),
	(89, 6, 0, 2, 2, 0, 0, '2015-11-05', '13:52:17'),
	(90, 8, 0, 0, 0, 0, 0, '2015-11-05', '00:02:06'),
	(91, 1, 1, 1, 0, 0, 1, '2015-11-08', '13:02:15'),
	(92, 7, 0, 0, 0, 0, 0, '2015-11-08', '13:06:45'),
	(93, 6, 1, 1, 0, 0, 1, '2015-11-08', '16:30:07'),
	(94, 8, 0, 0, 0, 0, 0, '2015-11-08', '00:38:53');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;


-- Dumping structure for table project.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table project.users: ~12 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `adm`) VALUES
	(1, 'drobe', '40518551c96582a906707c7b63429958', 1),
	(2, 'test', '202cb962ac59075b964b07152d234b70', 0),
	(3, 'test2', '202cb962ac59075b964b07152d234b70', 0),
	(4, 'test4', '289dff07669d7a23de0ef88d2f7129e7', 0),
	(5, 'test5', '202cb962ac59075b964b07152d234b70', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
