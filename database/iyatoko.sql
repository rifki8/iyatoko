/*
SQLyog Ultimate v8.4 
MySQL - 5.6.26 : Database - iyatoko
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iyatoko` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `iyatoko`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spesifikasi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`id_kategori`,`nama_barang`,`spesifikasi`,`gambar`,`harga`,`stok`,`status`) values (1,1,'Gitar','Waw','guitar-pics-22.jpg',1500000,12,'on'),(2,1,'Iphone 7','<p>Wow</p>','1053278sub-buzz-14973-1473277751-1780x390.jpg',13000000,10,'on');

/*Table structure for table `tb_detail_pesanan` */

DROP TABLE IF EXISTS `tb_detail_pesanan`;

CREATE TABLE `tb_detail_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_pesanan` */

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`,`status`) values (1,'Alat Musik','on'),(2,'Smartphone','on');

/*Table structure for table `tb_konfirmasi_pembayaran` */

DROP TABLE IF EXISTS `tb_konfirmasi_pembayaran`;

CREATE TABLE `tb_konfirmasi_pembayaran` (
  `id_konfirmasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(10) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_konfirmasi_pembayaran` */

/*Table structure for table `tb_kota` */

DROP TABLE IF EXISTS `tb_kota`;

CREATE TABLE `tb_kota` (
  `id_kota` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(150) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kota` */

/*Table structure for table `tb_pesanan` */

DROP TABLE IF EXISTS `tb_pesanan`;

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(10) NOT NULL AUTO_INCREMENT,
  `id_kota` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pesanan` */

/*Table structure for table `tb_slider` */

DROP TABLE IF EXISTS `tb_slider`;

CREATE TABLE `tb_slider` (
  `id_slider` int(10) NOT NULL AUTO_INCREMENT,
  `nama_slider` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_slider` */

insert  into `tb_slider`(`id_slider`,`nama_slider`,`gambar`,`link`,`status`) values (1,'Gitar','guitar-pics-22.jpg','index.php?page=detail&id_barang=1','on'),(2,'Iphone 6','1053278sub-buzz-14973-1473277751-1780x390.jpg','index.php?page=detail&id_barang=2','on');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `level_user` varchar(30) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `email_user` varchar(160) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`level_user`,`nama_user`,`email_user`,`password`,`status`) values (1,'superadmin','Super Admin','superadmin@iyatoko.com','1b3231655cebb7a1f783eddf27d254ca','on'),(2,'costumer','User','user@iyatoko.com','ee11cbb19052e40b07aac0ca060c23ee','on');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
