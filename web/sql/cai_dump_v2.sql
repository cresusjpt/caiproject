/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.16-MariaDB : Database - cai
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cai` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cai`;

/*Table structure for table `bien_immobilier` */

DROP TABLE IF EXISTS `bien_immobilier`;

CREATE TABLE `bien_immobilier` (
  `id_bien` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `description` text,
  `date_modif` datetime NOT NULL,
  `vitrine` text,
  PRIMARY KEY (`id_bien`),
  KEY `bien_immobilier_ibfk_1` (`id_client`),
  CONSTRAINT `bien_immobilier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `bien_immobilier` */

insert  into `bien_immobilier`(`id_bien`,`nom`,`lieu`,`prix`,`categorie`,`id_client`,`description`,`date_modif`,`vitrine`) values (7,'BIEN CD25','BIARRITZ',145000,'Appartement',1,'6 LITS | PISCINES | 3 DOUCHE','0000-00-00 00:00:00','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!\r\n\r\nEx, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!\r\n\r\nNeque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!'),(9,'BIEN CD26','BIARRITZgr',145000,'Appartement',2,'6 LITS | PISCINES | 3 DOUCHE','0000-00-00 00:00:00','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!\r\n\r\nEx, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!\r\n\r\nNeque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!'),(10,'BIEN CD27','HASPARREN',1478570,'Maison',1,'Chateau | Piscine','0000-00-00 00:00:00','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!\r\n\r\nEx, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!\r\n\r\nNeque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!'),(11,'BIEN CD28','PARIS',120000,'Maison',2,'Cave à fin | Renovation récente','0000-00-00 00:00:00','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!\r\n\r\nEx, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!\r\n\r\nNeque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!'),(12,'BIEN CD29','DAX',145000,'Appartement',1,'Situation proches des curistes.','0000-00-00 00:00:00','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!\r\n\r\nEx, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!\r\n\r\nNeque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

insert  into `contact`(`id`,`nom`,`prenom`,`email`,`objet`,`message`) values (1,'tossou','Jeanpaul','tossoujeanpaul641@gmail.com','Kick you','je te ferai mal frere'),(2,'ddfdf','fdfdf','tossoujeanpaul641@gmail.com','sdfsdffsdfsd','fsfsfsfsd'),(3,'QZER','PREVIOUS','jp.tossou@etud.univ-pau.fr','Message','Je fais quoi encore ici'),(4,'QZER','Jeanpaul','jp.tossou@etud.univ-pau.fr','GMAIL','beurk'),(5,'tossou','fdfd','jp.tossou@etud.univ-pau.fr','GMAIL','dfdfdfd'),(6,'TOSSOU','Jeanpaul','jp.tossou@etud.univ-pau.fr','Message','Odette is cute, manon also.'),(7,'TOSSOU','KOKOU','j.tosou@olfaplexus.tech','oiuydgfshgjk','oîupiyugfcdxfcvblkn');

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(100) NOT NULL,
  `id_bien` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_bien` (`id_bien`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_bien`) REFERENCES `bien_immobilier` (`id_bien`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `image` */

insert  into `image`(`id_image`,`chemin`,`id_bien`) values (3,'bien_image/property_1.jpg',9),(4,'bien_image//property_2.jpg',10),(5,'bien_image//property_3.jpg',11),(6,'bien_image//property_4.jpg',12),(7,'bien_image//property_5.jpg',12),(8,'bien_image//property_5.jpg',7),(9,'bien_image//property_4.jpg',7);

/*Table structure for table `messageforum` */

DROP TABLE IF EXISTS `messageforum`;

CREATE TABLE `messageforum` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `date_message` datetime NOT NULL,
  `message` text NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `messageforum_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `messageforum` */

insert  into `messageforum`(`id_message`,`date_message`,`message`,`id_client`) values (1,'2020-03-22 14:26:41','Oh que cet forum est génial',3),(3,'2020-03-11 14:41:33','Je m\'ennuie réellement. frere viens on sort',2),(4,'2020-03-22 15:00:00','Je reposte',4),(5,'2020-03-22 15:00:33','un dernier message sur le forum',4);

/*Table structure for table `utilisateur` */

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `authkey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`id_user`,`id_client`,`nom`,`prenom`,`categorie`,`tel`,`email`,`identifiant`,`motdepasse`,`token`,`authkey`) values (1,1,'MAMADOU','SOW','','0601478914','tossou','sow.mamadou','admin',NULL,NULL),(2,1,'MAMADOU','SOW','','0601478914','tossou@gmail.com','sow.mamadou','admin',NULL,NULL),(3,0,'tossou','jeanpaul',NULL,'0601478914','tossou@gmail.com','admin.com','$2y$13$t8VCuqTRJ9T.uWcaJyeTaufJedVnzZKyOmsctmEKWiHLH0GBpzrGm','x4nwSwIYblJu8wd3guYpC0f2xupULNom','HQdNWlL5olBjmkDhGAZsyUg2fkksslVX'),(4,1,'coriolis','alexandre',NULL,'014589632','tossoujeanpaul641@gmail.com','alexandre','$2y$13$o7T5DdRrCcsBSGzzTz3zr.1FPfFtX2LXrGChMPY07P4IgB/5Ukwt2','Yd9uGejRQFjUp2M6Vfp1ZpIFPFrQgqpA','ct0eY1WTtR94iq7mJMLrPai-oYfJYlK0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
