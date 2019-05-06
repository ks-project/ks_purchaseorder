/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.0.38-MariaDB-cll-lve : Database - sidelear_sisfo_11
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sidelear_sisfo_11` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `sidelear_sisfo_11`;

/*Table structure for table `bahanbaku` */

DROP TABLE IF EXISTS `bahanbaku`;

CREATE TABLE `bahanbaku` (
  `idbahanbaku` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL DEFAULT '0',
  `namabahanbaku` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `harga` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbahanbaku`),
  KEY `bahanbaku_barang_fk` (`idbarang`),
  CONSTRAINT `bahanbaku_barang_fk` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `bahanbaku` */

insert  into `bahanbaku`(`idbahanbaku`,`idbarang`,`namabahanbaku`,`qty`,`harga`) values 
(1,3,'ASdasdas',40,20000),
(3,5,'sadsdwqewqe',50,0),
(4,7,'qrqweqweq',56,0);

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `url` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idbarang`),
  UNIQUE KEY `newtable_un` (`kodebarang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`idbarang`,`nama`,`kodebarang`,`url`) values 
(1,'Pisang','1826281',NULL),
(2,'Tepung','828282',NULL),
(3,'Gula','28288282',NULL),
(4,'Margarin','2882828',NULL),
(5,'Telur','2728291',NULL),
(6,'Ahh','2215','adasda'),
(7,'Bengbeng','12312','sdgs');

/*Table structure for table `buylist` */

DROP TABLE IF EXISTS `buylist`;

CREATE TABLE `buylist` (
  `idbuylist` int(11) NOT NULL AUTO_INCREMENT,
  `idtransaction` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`idbuylist`),
  KEY `buylist_transaction_fk` (`idtransaction`),
  KEY `buylist_barang_fk` (`idbarang`),
  CONSTRAINT `buylist_barang_fk` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `buylist_transaction_fk` FOREIGN KEY (`idtransaction`) REFERENCES `transaction` (`idtransaction`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buylist` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `customer_un` (`email`),
  CONSTRAINT `customer_user_fk` FOREIGN KEY (`customerid`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

/*Table structure for table `distribusi` */

DROP TABLE IF EXISTS `distribusi`;

CREATE TABLE `distribusi` (
  `iddistribusi` int(11) NOT NULL AUTO_INCREMENT,
  `idtoko` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddistribusi`),
  KEY `distribusi_toko_fk` (`idtoko`),
  CONSTRAINT `distribusi_toko_fk` FOREIGN KEY (`idtoko`) REFERENCES `toko` (`idtoko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `distribusi` */

insert  into `distribusi`(`iddistribusi`,`idtoko`,`tanggal`,`status`) values 
(1,2,'2019-05-02','1'),
(2,2,'2019-05-18','0'),
(3,2,'0000-00-00','0'),
(4,2,'2019-05-11','1');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`idkaryawan`),
  CONSTRAINT `karyawan_user_fk` FOREIGN KEY (`idkaryawan`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`idkaryawan`,`level`) values 
(3,1),
(5,1),
(6,2);

/*Table structure for table `manager` */

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `idmanager` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`idmanager`),
  CONSTRAINT `manager_user_fk` FOREIGN KEY (`idmanager`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `manager` */

insert  into `manager`(`idmanager`,`level`) values 
(1,2),
(4,1),
(7,0);

/*Table structure for table `offlinetransaction` */

DROP TABLE IF EXISTS `offlinetransaction`;

CREATE TABLE `offlinetransaction` (
  `idofflinetransaction` int(11) NOT NULL,
  `idkaryawanikasir` int(11) NOT NULL,
  PRIMARY KEY (`idofflinetransaction`),
  KEY `offlinetransaction_karyawan_fk` (`idkaryawanikasir`),
  CONSTRAINT `offlinetransaction_karyawan_fk` FOREIGN KEY (`idkaryawanikasir`) REFERENCES `karyawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `offlinetransaction_transaction_fk` FOREIGN KEY (`idofflinetransaction`) REFERENCES `transaction` (`idtransaction`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `offlinetransaction` */

/*Table structure for table `onlinetransaction` */

DROP TABLE IF EXISTS `onlinetransaction`;

CREATE TABLE `onlinetransaction` (
  `idonlinetransaction` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idonlinetransaction`),
  KEY `onlinetransaction_customer_fk` (`idcustomer`),
  CONSTRAINT `onlinetransaction_customer_fk` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`customerid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `onlinetransaction_transaction_fk` FOREIGN KEY (`idonlinetransaction`) REFERENCES `transaction` (`idtransaction`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `onlinetransaction` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `harga` float NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`idproduk`),
  CONSTRAINT `produk_barang_fk` FOREIGN KEY (`idproduk`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`idproduk`,`harga`,`stock`) values 
(6,500,90),
(7,700,10);

/*Table structure for table `proposal` */

DROP TABLE IF EXISTS `proposal`;

CREATE TABLE `proposal` (
  `idproposal` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `idkaryawanpengaju` int(11) NOT NULL,
  `idmanager` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `idbuktilist` int(11) DEFAULT NULL,
  `deadline` date NOT NULL,
  `created` date NOT NULL,
  `idsupplier` int(11) NOT NULL,
  `budget` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idproposal`),
  KEY `proposal_karyawan_fk` (`idkaryawanpengaju`),
  KEY `proposal_manager_fk` (`idmanager`),
  KEY `proposal_supplier_fk` (`idsupplier`),
  CONSTRAINT `proposal_karyawan_fk` FOREIGN KEY (`idkaryawanpengaju`) REFERENCES `karyawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proposal_manager_fk` FOREIGN KEY (`idmanager`) REFERENCES `manager` (`idmanager`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proposal_supplier_fk` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `proposal` */

insert  into `proposal`(`idproposal`,`judul`,`idkaryawanpengaju`,`idmanager`,`status`,`idbuktilist`,`deadline`,`created`,`idsupplier`,`budget`) values 
(1,'Stok Harian',6,1,0,0,'2019-05-04','2019-05-03',2,500000),
(2,'Stok Mingguan',3,1,2,0,'2019-05-03','2019-04-20',2,30000),
(3,'Stok Bulanan',3,7,1,0,'2019-05-19','2019-04-29',2,100000),
(4,'Stok Tahunan',6,1,-1,0,'2019-05-04','2019-05-02',2,50000);

/*Table structure for table `proposalbuylist` */

DROP TABLE IF EXISTS `proposalbuylist`;

CREATE TABLE `proposalbuylist` (
  `idproposalbuylist` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `idproposal` int(11) NOT NULL,
  PRIMARY KEY (`idproposalbuylist`),
  KEY `proposalbuylist_proposal_fk` (`idproposal`),
  KEY `proposalbuylist_barang_fk` (`idbarang`),
  CONSTRAINT `proposalbuylist_barang_fk` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proposalbuylist_proposal_fk` FOREIGN KEY (`idproposal`) REFERENCES `proposal` (`idproposal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `proposalbuylist` */

insert  into `proposalbuylist`(`idproposalbuylist`,`idbarang`,`qty`,`idproposal`) values 
(5,2,10,2),
(6,4,20,2),
(7,5,12,2),
(8,3,5,3),
(9,2,4,3),
(10,1,2,3),
(11,5,4,3),
(12,1,1,4),
(14,5,20,1);

/*Table structure for table `stokkirim` */

DROP TABLE IF EXISTS `stokkirim`;

CREATE TABLE `stokkirim` (
  `idstokkirim` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `iddistribusi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`idstokkirim`),
  KEY `stokkirim_distribusi_fk` (`iddistribusi`),
  KEY `stokkirim_barang_fk` (`idbarang`),
  CONSTRAINT `stokkirim_barang_fk` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stokkirim_distribusi_fk` FOREIGN KEY (`iddistribusi`) REFERENCES `distribusi` (`iddistribusi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `stokkirim` */

insert  into `stokkirim`(`idstokkirim`,`idbarang`,`iddistribusi`,`jumlah`) values 
(1,7,2,1),
(2,3,2,1),
(3,1,3,1),
(4,2,3,1),
(5,6,4,5),
(6,2,4,1);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`idsupplier`),
  CONSTRAINT `supplier_user_fk` FOREIGN KEY (`idsupplier`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`idsupplier`,`perusahaan`,`alamat`) values 
(2,'Ausländer N. V.','Somewhere');

/*Table structure for table `toko` */

DROP TABLE IF EXISTS `toko`;

CREATE TABLE `toko` (
  `idtoko` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(400) NOT NULL,
  `idmanager` int(11) NOT NULL,
  PRIMARY KEY (`idtoko`),
  KEY `toko_manager_fk` (`idmanager`),
  CONSTRAINT `toko_manager_fk` FOREIGN KEY (`idmanager`) REFERENCES `manager` (`idmanager`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `toko` */

insert  into `toko`(`idtoko`,`alamat`,`idmanager`) values 
(2,'buah batu',4);

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `idtransaction` int(11) NOT NULL AUTO_INCREMENT,
  `tanggaltransaction` date NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idtransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `user_un` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`iduser`,`username`,`password`,`role`,`nama`) values 
(1,'hre','123',0,'heinrich'),
(2,'supplier','123',2,'dheo'),
(3,'peasant','123',1,'dheo2'),
(4,'managerToko','manager',0,'supri'),
(5,'karyawanGud','karyawan',1,'toon'),
(6,'karyawanPur','karyawan',1,'deho3'),
(7,'admin','123',0,'online');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
