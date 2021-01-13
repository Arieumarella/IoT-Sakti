/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.7.24 : Database - iot-sakti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iot-sakti` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `iot-sakti`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idx` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `idx` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`idx`,`name`,`username`,`password`,`created_at`) values 
(9,'Arie','Arie','026372ae33d2083cb9d466bb5412379f','2020-11-11 11:44:08'),
(11,'iya','iya','00e11252db1051387c47521767296b42','2020-11-11 15:28:36'),
(14,'dfgdfgszd','xgfdgfdxzddz','83d6cfd9959da718e6f9bfbb989494d6','2020-11-13 23:00:45'),
(15,'simen','simen','2d5b54ae33650083f4cd74fda556268f','2020-11-13 23:09:30'),
(16,'dh','dgfh','86c73f7f6e21b10c82046e36c930f06a','2020-11-20 13:21:07');

/*Table structure for table `device` */

DROP TABLE IF EXISTS `device`;

CREATE TABLE `device` (
  `idx` int(20) NOT NULL AUTO_INCREMENT,
  `name_device` varchar(255) DEFAULT NULL,
  `device_status` enum('daftar','ready') DEFAULT NULL,
  `device_key` varchar(255) DEFAULT NULL,
  `id_sidikJari` text,
  `status_door` enum('open','close') DEFAULT NULL,
  `respon_mikrokonroler1` text,
  `respon_mikrokonroler2` text,
  `respon_mikrokonroler3` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `device` */

insert  into `device`(`idx`,`name_device`,`device_status`,`device_key`,`id_sidikJari`,`status_door`,`respon_mikrokonroler1`,`respon_mikrokonroler2`,`respon_mikrokonroler3`,`created_at`) values 
(15,'Kamar Mandi',NULL,'DC-97811','12','close','0','0',NULL,'2020-11-11 03:40:45'),
(20,'Kamar Ari','ready','DC-49711','0','close','0','0','0','2020-11-13 21:15:39'),
(22,'Kamar Aldi','ready','DC-86449',NULL,'close',NULL,NULL,NULL,'2020-11-15 14:44:13');

/*Table structure for table `record_tap` */

DROP TABLE IF EXISTS `record_tap`;

CREATE TABLE `record_tap` (
  `idx` int(100) NOT NULL AUTO_INCREMENT,
  `id_device` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `tap_time` datetime DEFAULT NULL,
  `setatus_door_taping` enum('open','close') DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `id_device` (`id_device`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `record_tap_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`idx`),
  CONSTRAINT `record_tap_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

/*Data for the table `record_tap` */

insert  into `record_tap`(`idx`,`id_device`,`id_user`,`tap_time`,`setatus_door_taping`) values 
(21,20,114,'2020-11-29 21:50:21','close'),
(22,20,114,'2020-11-29 21:50:57','open'),
(23,20,114,'2020-11-29 21:55:18','close'),
(24,20,114,'2020-11-30 01:01:13','close'),
(25,20,114,'2020-11-30 01:09:58','close'),
(26,20,122,'2020-11-30 01:27:24','open'),
(27,20,122,'2020-11-30 01:27:34','open'),
(28,20,122,'2020-11-30 01:28:42','open'),
(29,20,122,'2020-11-30 01:29:46','open'),
(30,20,122,'2020-11-30 01:30:46','open'),
(31,20,122,'2020-11-30 01:31:04','open'),
(32,20,122,'2020-11-30 01:31:32','open'),
(33,20,122,'2020-11-30 01:32:03','open'),
(34,20,122,'2020-11-30 01:33:24','open'),
(35,20,122,'2020-11-30 01:34:36','open'),
(36,20,122,'2020-11-30 01:34:48','open'),
(37,20,122,'2020-11-30 01:36:07','open'),
(38,20,122,'2020-11-30 01:39:19','open'),
(39,20,122,'2020-11-30 01:39:43','open'),
(40,20,122,'2020-11-30 01:40:04','close'),
(41,20,122,'2020-11-30 01:40:17','close'),
(42,20,122,'2020-11-30 01:40:20','close'),
(43,20,122,'2020-11-30 01:40:37','open'),
(44,20,122,'2020-11-30 01:42:24','open'),
(45,20,122,'2020-11-30 01:42:36','close'),
(46,20,122,'2020-11-30 01:42:47','open'),
(47,20,122,'2020-11-30 01:44:01','open'),
(48,20,125,'2020-11-30 23:24:29','close'),
(49,20,125,'2020-11-30 23:24:55','open'),
(50,20,125,'2020-11-30 23:25:11','close'),
(51,20,114,'2020-11-30 23:25:58','open'),
(52,20,114,'2020-11-30 23:26:11','open'),
(53,20,125,'2020-11-30 23:33:09','open'),
(54,20,125,'2020-11-30 23:34:36','close'),
(55,20,125,'2020-11-30 23:57:14','open'),
(56,20,125,'2020-11-30 23:57:32','close'),
(57,20,125,'2020-11-30 23:59:57','open'),
(58,20,125,'2020-12-01 00:00:42','close'),
(59,20,125,'2020-12-01 00:00:53','open'),
(60,20,125,'2020-12-01 00:07:34','close'),
(61,20,125,'2020-12-01 00:07:43','open'),
(62,20,125,'2020-12-01 00:09:04','close'),
(63,20,125,'2020-12-01 00:09:16','open'),
(64,20,114,'2020-12-01 00:10:24','close'),
(65,20,114,'2020-12-01 00:15:50','close'),
(66,20,125,'2020-12-01 00:17:28','close'),
(67,20,125,'2020-12-01 00:17:37','open'),
(68,20,125,'2020-12-01 00:17:57','close'),
(69,20,125,'2020-12-01 00:18:11','open'),
(70,20,125,'2020-12-01 00:18:43','close'),
(71,20,125,'2020-12-01 00:18:53','open'),
(72,20,125,'2020-12-01 00:19:16','close'),
(73,20,125,'2020-12-01 00:19:29','open'),
(74,20,125,'2020-12-01 00:20:20','close'),
(75,20,125,'2020-12-01 00:20:39','open'),
(76,20,121,'2020-12-01 00:36:30','open'),
(77,20,124,'2020-12-01 00:39:59','close'),
(78,20,124,'2020-12-01 00:40:18','open'),
(79,20,114,'2020-12-01 00:40:44','close'),
(80,20,125,'2020-12-01 00:40:51','close'),
(81,20,125,'2020-12-01 00:41:28','open'),
(82,20,124,'2020-12-01 00:41:44','close'),
(83,20,124,'2020-12-01 00:42:04','open'),
(84,20,124,'2020-12-01 00:42:21','close'),
(85,20,124,'2020-12-01 00:42:34','open'),
(86,20,124,'2020-12-01 00:42:45','close'),
(87,20,125,'2020-12-01 00:43:07','open'),
(88,20,125,'2020-12-01 00:50:36','open'),
(89,20,125,'2020-12-01 00:50:57','close'),
(90,20,125,'2020-12-01 00:51:23','open'),
(91,20,125,'2020-12-01 00:55:41','open'),
(92,20,125,'2020-12-01 00:55:59','close');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `idx` int(20) NOT NULL AUTO_INCREMENT,
  `id_device` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `data_sidik_jari` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `id_device` (`id_device`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`idx`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`idx`,`id_device`,`name`,`username`,`password`,`data_sidik_jari`,`created_at`) values 
(114,20,'Orang Tidak DI kenal','Orang Tidak DI kenal','7815696ecbf1c96e6894b779456d330e','11','2020-11-15 14:26:57'),
(121,20,'Wullan','Wullan','87623c734e70347127c13b0518bac592','9','2020-11-26 03:26:48'),
(122,20,'Adena','Adena','92b9c40c4e27929c9164ecc68f97aa67','90','2020-11-26 03:31:56'),
(124,20,'Opik','Opik','6b5db107026729e26f2c80c050f510c8','91','2020-11-26 03:39:13'),
(125,20,'Sakti','Sakti','a443eea077c2073af2e138edc4db6c88','1','2020-11-27 23:06:19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
