DROP DATABASE IF EXISTS `project`;
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `project`;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `page` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
