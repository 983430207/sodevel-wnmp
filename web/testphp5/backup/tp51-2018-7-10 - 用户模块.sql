# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: tp51
# Generation Time: 2018-07-10 07:32:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned NOT NULL,
  `delete_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;

INSERT INTO `admin_user` (`id`, `username`, `password`, `create_time`, `update_time`, `delete_time`)
VALUES
	(1,'admin888','$2y$10$6jgQLuVTYscLKH/ll0Ro3O09xGdX0MFpuRMZTTiBqrBGw0x9nBaHW',0,1530778054,NULL),
	(2,'admin1','$2y$10$GK..7kuzcJ2hqiQtFdFotu4kOEWzHNF.Hljo.kzvuYFhNJBt/26r2',1530774912,1530774912,NULL),
	(3,'123','$2y$10$02cl5ufNRVzW5YHHUXcJ0O91sib8..am6acffJgzhjGhqhoAJ8b7i',1530774930,1530774930,NULL),
	(4,'111','$2y$10$cfKLV52N8pCsTP/W9oifM.jJ3j2t3k4nJdhrXSi17qe1l01zR7yae',1530774983,1530780733,1530780733),
	(5,'333','$2y$10$fgqo9z/Y6E3yzwecnJpTtucvohjkaM6hmBtk8YDteodq/4Hpbefg.',1530774992,1530780703,1530780703),
	(6,'aaa','$2y$10$s3hScM6mtOviB5qit0D./OpKF0Nj9JW9U6uMuG8JWFTpmL99ShzR6',1530775312,1530779991,1530779991),
	(7,'xxx','$2y$10$EP/w5UWNFPFuBy8sxvoCw.VhOEUwJ1zq2lUy1.7GKbQPKpH.PM3KW',1530775324,1530779988,1530779988),
	(8,'ggg','$2y$10$IdGRfvdRIJ2Ph4vzCWPBfuOAx/gk3A14dXKzZVxxp.g76ReFXz2xK',1530777118,1530779987,1530779987),
	(9,'aa','$2y$10$HUTqGqoKtXcUpPBzJ9ob/udeVdbN3RCUc0vpd97VykgCxW6PF/GuG',1530778304,1530779985,1530779985),
	(10,'bb','$2y$10$03n//Vq75kxGyqh4t2yRLuIrpYHsLLdrOBGdF1FGvXf.4crGUOnTG',1530780372,1530780516,1530780516);

/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gbook
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gbook`;

CREATE TABLE `gbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `content` text,
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `gbook` WRITE;
/*!40000 ALTER TABLE `gbook` DISABLE KEYS */;

INSERT INTO `gbook` (`id`, `username`, `content`, `create_time`)
VALUES
	(1,'用户','留言',0),
	(2,'用户','留言',1530162813),
	(3,'用户','留言',1530162873),
	(4,'bbbbb','aaaaa',1530163144),
	(5,'电饭锅蛋糕分','迭代速度',1530163637);

/*!40000 ALTER TABLE `gbook` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table setting
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;

INSERT INTO `setting` (`id`, `key`, `name`, `value`, `create_time`, `update_time`, `delete_time`)
VALUES
	(1,'webname','网站名称','教学项目22233',0,1530870673,NULL),
	(2,'is_reg','是否允许注册(1表示允许)','33333123333eee',0,1530870673,NULL);

/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table test
# ------------------------------------------------------------

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `testname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;

INSERT INTO `test` (`id`, `testname`)
VALUES
	(1,'b'),
	(2,'ccc'),
	(3,'2020175824'),
	(4,'715418096'),
	(5,'修改数据'),
	(6,'1419855017'),
	(7,'128391134'),
	(8,'549102271'),
	(9,'133951942'),
	(10,'807119863'),
	(11,'1975406526'),
	(12,'我是新数据'),
	(13,'我是新数据'),
	(14,'数组形式传递'),
	(15,'a'),
	(16,'b');

/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `nickname` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `user_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '保存用户状态，1表示可用，0表示禁用',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `nickname`, `phone`, `email`, `user_status`, `create_time`, `update_time`, `delete_time`)
VALUES
	(1,'aaa','111','aaa','1123','123134',0,111,1531203505,NULL),
	(2,'bbb','222','333','444','555',0,0,1531203413,NULL),
	(3,'cccc','$2y$10$zSUFrAt8.oPZNyDbf1HElOJ3HmN2MoUo1b/RKhm9icswlakHo7Pj2','wo ','13333333333','dfklfdslkj@LKj.com',0,1531205749,1531206573,NULL),
	(4,'dddd','$2y$10$b.TDWgbMAq9HVyrBaTBUyuDSxwJv5AX2P9iF0.lSjLd2dYa20q9CW','123','15534333333','123@123.com',1,1531206590,1531206955,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
