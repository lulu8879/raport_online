/*
SQLyog Ultimate v8.8 
MySQL - 5.7.26 : Database - raport_online
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`raport_online` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `raport_online`;

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip_unique` (`nip`),
  KEY `FKId_mapel` (`id_mapel`),
  CONSTRAINT `FKId_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`id`,`nip`,`nama`,`id_mapel`) values (1,'223170031','Lala',1),(2,'223170032','Lili',2);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(2) NOT NULL,
  `id_guru` int(11) NOT NULL COMMENT 'get wali kelas',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_unique` (`kelas`),
  KEY `FKId_guru` (`id_guru`),
  CONSTRAINT `FKId_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id`,`kelas`,`id_guru`) values (1,'1A',1),(2,'2A',2);

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mapel_unique` (`mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mapel` */

insert  into `mapel`(`id`,`mapel`) values (1,'Fisika'),(2,'Matematika');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tugas1` int(3) DEFAULT NULL,
  `tugas2` int(3) DEFAULT NULL,
  `kuis` int(3) DEFAULT NULL,
  `uts` int(3) DEFAULT NULL,
  `uas` int(3) DEFAULT NULL,
  `semester` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKId_guru_nilai` (`id_guru`),
  KEY `FKId_siswa_nilai` (`id_siswa`),
  CONSTRAINT `FKId_guru_nilai` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  CONSTRAINT `FKId_siswa_nilai` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

insert  into `nilai`(`id`,`id_siswa`,`id_guru`,`tugas1`,`tugas2`,`kuis`,`uts`,`uas`,`semester`) values (1,1,1,91,92,93,94,96,'1'),(7,3,1,81,82,NULL,NULL,NULL,'1'),(8,1,1,98,NULL,NULL,NULL,NULL,'2'),(9,3,1,NULL,NULL,89,NULL,NULL,'2'),(10,1,1,NULL,NULL,NULL,97,NULL,'5'),(11,2,1,NULL,NULL,87,NULL,NULL,'1'),(12,1,2,99,NULL,NULL,NULL,NULL,'1'),(13,3,2,NULL,96,NULL,NULL,NULL,'1'),(14,2,2,76,NULL,NULL,NULL,NULL,'1');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`role`) values (1,'Admin'),(2,'Guru'),(3,'Ortu');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `nama_ortu` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nis_unique` (`nis`),
  KEY `FKId_kelas` (`id_kelas`),
  CONSTRAINT `FKId_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`id`,`nis`,`nama`,`id_kelas`,`nama_ortu`) values (1,'123170031','Sakti Wicaksono',1,'Icak'),(2,'123170030','Linda',2,'Lila'),(3,'123170032','Rifky',1,'Izha'),(4,'123170029','Sono',2,'Sana');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_role` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKId_role` (`id_role`),
  CONSTRAINT `FKId_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`id_role`) values (1,'admin','admin',1),(3,'223170031','223170031',2),(4,'223170032','223170032',2),(5,'123170031','123170031',3),(6,'123170032','123170032',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
