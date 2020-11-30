/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - bdproyectopro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdproyectopro` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `bdproyectopro`;

/*Table structure for table `tabla_ejemplo2` */

DROP TABLE IF EXISTS `tabla_ejemplo2`;

CREATE TABLE `tabla_ejemplo2` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `nose` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tabla_ejemplo2` */

insert  into `tabla_ejemplo2`(`fecha`,`nose`) values ('2020-11-03 12:31:10','n'),('2020-11-03 12:32:10','m');

/*Table structure for table `tblabono` */

DROP TABLE IF EXISTS `tblabono`;

CREATE TABLE `tblabono` (
  `idabono` int(11) NOT NULL AUTO_INCREMENT,
  `idadeudo` int(11) NOT NULL,
  `fechaabono` datetime DEFAULT NULL,
  `pago` double DEFAULT NULL,
  `saldoactu` double DEFAULT NULL,
  PRIMARY KEY (`idabono`),
  KEY `fk_tbladeudo` (`idadeudo`),
  CONSTRAINT `fk_tbladeudo` FOREIGN KEY (`idadeudo`) REFERENCES `tbladeudos` (`idadeudos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblabono` */

/*Table structure for table `tblabono_respaldo` */

DROP TABLE IF EXISTS `tblabono_respaldo`;

CREATE TABLE `tblabono_respaldo` (
  `abon_idAbono` int(11) NOT NULL AUTO_INCREMENT,
  `abo_Fkade_id` int(11) DEFAULT NULL,
  `idadeudo` int(11) NOT NULL,
  `fechaabono` datetime DEFAULT NULL,
  `pago` double DEFAULT NULL,
  `saldoactu` double DEFAULT NULL,
  PRIMARY KEY (`abon_idAbono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblabono_respaldo` */

/*Table structure for table `tbladeudos` */

DROP TABLE IF EXISTS `tbladeudos`;

CREATE TABLE `tbladeudos` (
  `idadeudos` int(11) NOT NULL AUTO_INCREMENT,
  `totaladeudo` float DEFAULT NULL,
  `idventa` int(11) NOT NULL,
  PRIMARY KEY (`idadeudos`),
  KEY `fk_tblventaadeudo` (`idventa`),
  CONSTRAINT `fk_tblventaadeudo` FOREIGN KEY (`idventa`) REFERENCES `tblventas` (`idventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbladeudos` */

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliusuario` varchar(30) DEFAULT NULL,
  `clipassword` varchar(40) DEFAULT NULL,
  `clinombre` varchar(20) DEFAULT NULL,
  `cliap` varchar(30) DEFAULT NULL,
  `cliam` varchar(30) DEFAULT NULL,
  `clidomicilio` varchar(40) DEFAULT NULL,
  `clitelefono` varchar(12) DEFAULT NULL,
  `clicorreo` varchar(50) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblcliente` */

insert  into `tblcliente`(`idcliente`,`cliusuario`,`clipassword`,`clinombre`,`cliap`,`cliam`,`clidomicilio`,`clitelefono`,`clicorreo`,`Tipo`) values (1,'kike','1234','Enrique','Francisco','Ramirez','buena','777777','enriquegmail','Cliente'),(5,'nose','qwe','nose','hdez','hdez','lejos','76176261261','noce@gmail.com','Cliente'),(9,'yh','h','hh','h','h','hh','hh','h','Cliente'),(11,'prueba','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','ppm','pm','pmp','mp','p','mmp','Cliente'),(12,'jnjnnjj','d1854cae891ec7b29161ccaf79a24b00c274bdaa','jnj','n','jn','jn','jnnj','n','Cliente'),(13,'prueba2','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','prueba2','nm','mn','mnm','mnmn','mn','Cliente');

/*Table structure for table `tblempleados` */

DROP TABLE IF EXISTS `tblempleados`;

CREATE TABLE `tblempleados` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `vchusuario` varchar(20) DEFAULT NULL,
  `vchpassword` varchar(200) DEFAULT NULL,
  `emnombre` varchar(30) DEFAULT NULL,
  `emap` varchar(40) DEFAULT NULL,
  `emam` varchar(40) DEFAULT NULL,
  `emdomicilio` varchar(50) DEFAULT NULL,
  `emtelefono` varchar(12) DEFAULT NULL,
  `emcorreo` varchar(50) DEFAULT NULL,
  `idpuesto` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `fk_tblpuesto` (`idpuesto`),
  KEY `fk_tblturno` (`idturno`),
  KEY `fk_tblsucursal` (`idsucursal`),
  CONSTRAINT `fk_tblpuesto` FOREIGN KEY (`idpuesto`) REFERENCES `tblpuesto` (`idpuesto`),
  CONSTRAINT `fk_tblsucursal` FOREIGN KEY (`idsucursal`) REFERENCES `tblsucursal` (`idsucursal`),
  CONSTRAINT `fk_tblturno` FOREIGN KEY (`idturno`) REFERENCES `tblturno` (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblempleados` */

insert  into `tblempleados`(`idempleado`,`vchusuario`,`vchpassword`,`emnombre`,`emap`,`emam`,`emdomicilio`,`emtelefono`,`emcorreo`,`idpuesto`,`idturno`,`idsucursal`) values (2,'kike','1234','enrique','Francisco','Ramirez','Buenavista','12345677899','enrique',1,1,1);

/*Table structure for table `tblentrada` */

DROP TABLE IF EXISTS `tblentrada`;

CREATE TABLE `tblentrada` (
  `identrada` int(11) NOT NULL AUTO_INCREMENT,
  `vchfecha` timestamp NULL DEFAULT current_timestamp(),
  `totalen` float DEFAULT NULL,
  `idtipopago` int(11) NOT NULL,
  `identrega` int(12) DEFAULT NULL,
  `idproductor` int(11) NOT NULL,
  `cantidad` float DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`identrada`),
  KEY `fk_tbltipopago` (`idtipopago`),
  KEY `fk_tblproductorentr` (`idproductor`),
  KEY `fk_tblentrega` (`identrega`),
  KEY `fk_tblproducto` (`idproducto`),
  KEY `fk_tblestado` (`idestado`),
  CONSTRAINT `fk_tblestado` FOREIGN KEY (`idestado`) REFERENCES `tblestado` (`idestado`),
  CONSTRAINT `fk_tblproducto` FOREIGN KEY (`idproducto`) REFERENCES `tblproductos` (`idproductos`),
  CONSTRAINT `fk_tblproductorentr` FOREIGN KEY (`idproductor`) REFERENCES `tblproductor` (`idproductor`),
  CONSTRAINT `fk_tbltipoentrega` FOREIGN KEY (`identrega`) REFERENCES `tbltipoentrega` (`idtientrega`),
  CONSTRAINT `fk_tbltipopago` FOREIGN KEY (`idtipopago`) REFERENCES `tbltipopago` (`idpago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblentrada` */

insert  into `tblentrada`(`identrada`,`vchfecha`,`totalen`,`idtipopago`,`identrega`,`idproductor`,`cantidad`,`idproducto`,`idestado`) values (1,'2020-11-10 12:18:11',30,1,1,9,1,1,1),(2,'2020-11-29 19:27:31',300,1,1,15,10,1,1);

/*Table structure for table `tblestado` */

DROP TABLE IF EXISTS `tblestado`;

CREATE TABLE `tblestado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `vchestado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblestado` */

insert  into `tblestado`(`idestado`,`vchestado`) values (1,'En proceso'),(2,'Verificando');

/*Table structure for table `tblproductor` */

DROP TABLE IF EXISTS `tblproductor`;

CREATE TABLE `tblproductor` (
  `idproductor` int(11) NOT NULL AUTO_INCREMENT,
  `prousuario` varchar(30) DEFAULT NULL,
  `propassword` varchar(30) DEFAULT NULL,
  `pronombre` varchar(40) DEFAULT NULL,
  `proap` varchar(40) DEFAULT NULL,
  `proam` varchar(40) DEFAULT NULL,
  `prodomicilio` varchar(50) DEFAULT NULL,
  `protelefono` varchar(12) DEFAULT NULL,
  `procorreo` varchar(50) DEFAULT NULL,
  `Tipo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idproductor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblproductor` */

insert  into `tblproductor`(`idproductor`,`prousuario`,`propassword`,`pronombre`,`proap`,`proam`,`prodomicilio`,`protelefono`,`procorreo`,`Tipo`) values (3,'nmnnjn','fff','t','yt','t','tt','t','t','Productor'),(9,'jnjn','3612ab7d0269532b363624fd173d24','jnj','nj','n','jn','jnnj','nhhn','Productor'),(12,'HH','fc5d4b9117ba9e87388174aee4f497','H','H','HH','H','HH','H','Productor'),(13,'prueba','7110eda4d09e062aa5e4a390b0a572','nose','n','nn','n','nn','nn','Productor'),(14,'nose','7110eda4d09e062aa5e4a390b0a572','nose','nose','nose','nose','981981989898','ennemn','Productor'),(15,'pmwmmkw','999999','iijiji','iji','jijji','jiji','jjij','ijijij','Productor');

/*Table structure for table `tblproductos` */

DROP TABLE IF EXISTS `tblproductos`;

CREATE TABLE `tblproductos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT,
  `vchnomproduct` varchar(30) DEFAULT NULL,
  `Proprecio` double DEFAULT NULL,
  `Procosto` double DEFAULT NULL,
  `existencia` double DEFAULT NULL,
  `JPG` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idproductos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblproductos` */

insert  into `tblproductos`(`idproductos`,`vchnomproduct`,`Proprecio`,`Procosto`,`existencia`,`JPG`) values (1,'Naranja',30,25,90,'naranja.jpg'),(4,'prueba2',NULL,20,NULL,'pagina 113 parte 1y2.jpeg');

/*Table structure for table `tblpuesto` */

DROP TABLE IF EXISTS `tblpuesto`;

CREATE TABLE `tblpuesto` (
  `idpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `vchpuesto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idpuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpuesto` */

insert  into `tblpuesto`(`idpuesto`,`vchpuesto`) values (1,'Gerente');

/*Table structure for table `tblsucursal` */

DROP TABLE IF EXISTS `tblsucursal`;

CREATE TABLE `tblsucursal` (
  `idsucursal` int(11) NOT NULL AUTO_INCREMENT,
  `vchnomsucursal` varchar(30) DEFAULT NULL,
  `vchsucdireccion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblsucursal` */

insert  into `tblsucursal`(`idsucursal`,`vchnomsucursal`,`vchsucdireccion`) values (1,'Almacen','Huejutla');

/*Table structure for table `tbltipoentrega` */

DROP TABLE IF EXISTS `tbltipoentrega`;

CREATE TABLE `tbltipoentrega` (
  `idtientrega` int(11) NOT NULL AUTO_INCREMENT,
  `vchentrega` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtientrega`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltipoentrega` */

insert  into `tbltipoentrega`(`idtientrega`,`vchentrega`) values (1,'Sucursal');

/*Table structure for table `tbltipopago` */

DROP TABLE IF EXISTS `tbltipopago`;

CREATE TABLE `tbltipopago` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `vchnompago` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltipopago` */

insert  into `tbltipopago`(`idpago`,`vchnompago`) values (1,'Efectivo');

/*Table structure for table `tblturno` */

DROP TABLE IF EXISTS `tblturno`;

CREATE TABLE `tblturno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `vchturno` varchar(30) DEFAULT NULL,
  `horaentrada` varchar(10) DEFAULT NULL,
  `horasalida` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblturno` */

insert  into `tblturno`(`idturno`,`vchturno`,`horaentrada`,`horasalida`) values (1,'En la Mañana','8:00','6:00');

/*Table structure for table `tblventas` */

DROP TABLE IF EXISTS `tblventas`;

CREATE TABLE `tblventas` (
  `idventas` int(11) NOT NULL AUTO_INCREMENT,
  `totalven` float DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `idtipopago` int(11) NOT NULL,
  `idtipoentrega` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `cantidad` float DEFAULT NULL,
  `lugarentrega` varchar(100) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idventas`),
  KEY `fk_tbltipopagove` (`idtipopago`),
  KEY `fk_tblentrega` (`idtipoentrega`),
  KEY `fk_tblcliente` (`idcliente`),
  KEY `fk_tblproductos` (`idproducto`),
  KEY `fk_estado` (`idestado`),
  CONSTRAINT `fk_estado` FOREIGN KEY (`idestado`) REFERENCES `tblestado` (`idestado`),
  CONSTRAINT `fk_tblcliente` FOREIGN KEY (`idcliente`) REFERENCES `tblcliente` (`idcliente`),
  CONSTRAINT `fk_tblentrega` FOREIGN KEY (`idtipoentrega`) REFERENCES `tbltipoentrega` (`idtientrega`),
  CONSTRAINT `fk_tblproductos` FOREIGN KEY (`idproducto`) REFERENCES `tblproductos` (`idproductos`),
  CONSTRAINT `fk_tbltipopagove` FOREIGN KEY (`idtipopago`) REFERENCES `tbltipopago` (`idpago`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblventas` */

insert  into `tblventas`(`idventas`,`totalven`,`fecha`,`idtipopago`,`idtipoentrega`,`idcliente`,`cantidad`,`lugarentrega`,`idproducto`,`idestado`) values (22,90,NULL,1,1,1,3,'Nose',1,2),(23,60,NULL,1,1,1,2,'nose',1,1),(24,30,'2020-11-03 12:36:13',1,1,1,1,'nonm',1,1),(25,120,'2020-11-03 12:39:38',1,1,1,4,'nose',1,1),(26,90,'2020-11-03 13:10:57',1,1,1,3,'nkms',1,1),(27,30,'2020-11-10 11:12:00',1,1,1,1,'nose',1,2),(28,120,'2020-11-10 11:22:35',1,1,1,4,'mskww',1,1),(29,30,'2020-11-18 09:54:45',1,1,1,1,'mnmd',1,1),(30,60,'2020-11-18 13:03:08',1,1,13,2,'nose',1,1),(31,600,'2020-11-29 19:32:09',1,1,13,20,'lejos',1,1);

/* Trigger structure for table `tblentrada` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `entradas` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `entradas` AFTER INSERT ON `tblentrada` FOR EACH ROW update tblproductos set existencia=existencia+NEW.cantidad WHERE idproductos=NEW.idproducto */$$


DELIMITER ;

/* Trigger structure for table `tblventas` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ventas` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ventas` AFTER INSERT ON `tblventas` FOR EACH ROW UPDATE tblproductos SET existencia=existencia-NEW.cantidad WHERE idproductos=NEW.idproducto */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
